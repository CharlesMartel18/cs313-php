<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <?php

      include("header.php");
      $current = "home";
      head($current);
      $username = 'We have no idea who you are!';
      echo "<h2>Welcome: $username</h2>";

    ?>
  </body>
</html>

