<?php
  // Start the session
  session_start();

  $badLogin = false;

  # if the user has already logged in, this should be skipped
  if (isset($_SESSION['username'])) {
    header('Location: home.php');
    die();
  }

  # if they've submitted login info
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    # Connect to the database
    require_once("dbConnect.php");
    $db = get_db();

    $query = 'SELECT password, display_name from public.user WHERE username=:username';
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);

    $result = $stmt->execute();

    $display_name = $username;
    if ($result) {
      $row = $stmt->fetch();
      $hashed_pwd_from_db = $row['password'];
      $display_name = $row['display_name'];

      # verify password - matching
      if (password_verify($password, $hashed_pwd_from_db)) {
        # correct
        $_SESSION['display_name'] = $display_name;

        # pull up the user's home url on redirect
        $query2 = 'SELECT name from public.url WHERE url=:url';

        $stmt2 = $db->prepare($query2);
        $stmt2->bindValue(':url', $url);

        $result2 = $stmt2->execute();
        if ($result2) {
          $row = $stmt2->fetch();
          $url_name = $row['name'];
          $_SESSION['current_search'] = $url_name;
        }

        header("Location: home.php");
        die();
      } else {
        $badLogin = true;
      }
    } else {
      $badLogin = true;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <?php
      require("header.php");

      $current = "login";
      head($current);

      if ($badLogin) {
        echo "<h5>Incorrect username or password!<br /><br /></h5>";
      }
    ?>
    <h2>Please Log In Below</h2>
    <form id='login_form' action='login.php' method='post'>
      <input id='username' name='username' placeholder='Username' />
      <br /><br />
      <input id='password' name='password' placeholder='Password' type='password'/>
      <br /><br />
      <input type='submit' value='Sign In' />
    </form>
    <br />
    <h5>Or <a href="sign_up.php">Sign Up</a> for a new account.</h5>
  </body>
</html>