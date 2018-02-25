<?php
  # Start the session
  session_start();

  # If the user has already logged in, this should be skipped
  if (isset($_SESSION['display_name'])) {
    header('Location: home.php');
    die();
  }

  # Prepare all the user input for the database
  $username = filter_var($_POST['txt_username'], FILTER_SANITIZE_STRING);
  $password = filter_var($_POST['txt_password'], FILTER_SANITIZE_STRING);
  $display_name = filter_var($_POST['txt_display_name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['txt_email'], FILTER_SANITIZE_STRING);
  $url = filter_var($_POST['txt_url'], FILTER_SANITIZE_STRING);
  $is_admin = $_POST['txt_admin'];

  # If they've submitted bad sign up info
  if (!isset($username) || $username == ""
      || !isset($password) || $password == ""
      || !isset($email) || $email == "") {
    header("Location: sign_up.php");
    die();
  }
  
  # Prepare all the user input for html files
  $username = htmlspecialchars($username);
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $display_name = htmlspecialchars($display_name);
  $email = htmlspecialchars($email);
  $url = htmlspecialchars($url);

  # Connect to the database
  require_once("dbConnect.php");
  $db = get_db();

  # Insert info into DB
  $query1 = 'INSERT INTO public.user(username, password, display_name, email) VALUES(
    :username, :password, :display_name, :email
  )';
    
  $stmt1 = $db->prepare($query1);
  $stmt1->bindValue(':username', $username);
  $stmt1->bindValue(':password', $hashed_password);
  if (isset($display_name) && $display_name != "") {
    $stmt1->bindValue(':display_name', $display_name);
  } else {
    $stmt1->bindValue(':display_name', $username);
    $display_name = $username;
  }
  $stmt1->bindValue(':email', $email);

  $stmt1->execute();

  # Set all important session variables
  $_SESSION['username'] = $username;
  $_SESSION['display_name'] = $display_name;
  $_SESSION['email'] = $email;

  # Pull up the user's home url on redirect
  $query2 = 'SELECT name from public.url WHERE url=:url';

  $stmt2 = $db->prepare($query2);
  $stmt2->bindValue(':url', $url);

  $result = $stmt2->execute();
  if ($result) {
    $row = $stmt2->fetch();
    $url_name = $row['name'];
    $_SESSION['current_search'] = $url_name;
  }

  # Ensure admin privileges are set (update later to allow for review)
  $query3 = 'INSERT INTO public.user_url(user_id, url_id, is_admin) VALUES(
    (SELECT id from public.user WHERE username=:username),
    (SELECT id from public.url WHERE url=:url),
    :is_admin
  )';

  $stmt3 = $db->prepare($query3);
  $stmt3->bindValue(':username', $username);
  $stmt3->bindValue(':url', $url);
  $stmt3->bindValue(':is_admin', $is_admin);

  $stmt3->execute();

  header("Location: home.php");
  die();
?>