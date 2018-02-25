<?php
  // Start the session
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
  </head>
  <body>
    <?php

      require_once("dbConnect.php");
      require("header.php");
      
      $current = "about";
      head($current);
      echo "<p>
          SiteMap is a very different search engine from what you may be
          used to. Type something in the search bar and see it displayed
          to you graphically (coming soon)!
        </p>";

    ?>
  </body>
</html>