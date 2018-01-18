<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="head-style.css">
  </head>
  <body>
    <?php
      echo '<h1>SiteMap<h1>';

      function head($current){
        echo '<nav><ul><li><a href="home.php"';
        if($current == "home") {
                echo 'class="active"';
        }
        echo '>Home</a></li><li><a href="about.php"'; 
        if($current == "about") {
            echo 'class="active"';
        }
        echo '>About</a></li><li><a href="login.php"';
        if($current == "login") {
          echo 'class="active"';
        }
        echo '>Login</a></li></ul></nav>';
      }
    ?>
  </body>
</html>

