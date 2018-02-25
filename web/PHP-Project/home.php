<?php
  // Start the session
  session_start();

  $search = $_SESSION['current_search'];
  if (isset($_POST['search']) && $_POST['search'] != '') {
      $_SESSION['current_search'] = $_POST['search'];
      $search = $_SESSION['current_search'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <?php

      require_once("dbConnect.php");
      require("header.php");

      $db = get_db();

      $current = "home";
      $display_name = '';
      if (!isset($_SESSION['display_name'])) {
        head($current);
        $display_name = 'Anonymous';
      } else {                               # user_head($current); }
        head($current);
        $display_name = $_SESSION['display_name'];
      }
      echo "<h2>Welcome, $display_name!</h2>";

      # Search process
      if ($search != NULL) {
        $stmt = $db->prepare("SELECT name, url FROM public.url WHERE name LIKE '%$search%'");
        $stmt->execute();
  
        foreach ($stmt->fetchAll() as $row) {
            echo '<p id="results" >' . $row["name"] . '<br />' . $row["url"] . '<br /></p>';
        }
      } else {
        $stmt = $db->prepare("SELECT name, url FROM public.url WHERE name='SiteMap'");
        $stmt->execute();
  
        foreach ($stmt->fetchAll() as $row) {
          echo "<p id='results' >" . $row['name'] . "<br />" . $row['url'] . "<br /></p>";
        }
      }
    ?>

    <?php
      if(!isset($_SESSION['display_name'])) {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
      }
    ?>
  </body>
</html>

