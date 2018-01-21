<!DOCTYPE html>
<html>
  <head>
    <title>Cutler Hollist's Personal Page</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Cutler Hollist's Personal Page</h1>
    <hr />
    <img src="profile-picture.jpg" alt="Engagement Photo">
    <br />
    <?php 
      echo "<p id='intro'>Hi, I'm Cutler Hollist, and the beautiful woman in the image
        above is my wife! I wanted to share some of the things I appreciate most about
        computer science because of the incredible opportunities it provides to make
        this world a better place. <br /><br /> Some technologies I am interested in
        include the following:</p>";
    ?>
    <ul class="interests" onmouseover="style.backgroundColor = '#4169e1'"
        onmouseout="style.backgroundColor = 'white'">
      <li class="interests"><a href="http://sigmajs.org/" >Dataset Maps</a></li>
      <li class="interests"><a href="https://www.magicleap.com/" >Mixed Reality</a></li>
      <li class="interests"><a href="https://sovrin.org/" >Secure Systems</a></li>
  </ul>
    <?php
      echo "<p>Of course, there are many other things that are really cool - political
      structure of communities, city planning, my wonderful family - but I thought you
      might be more responsive to some of the above items. :)</p>"
    ?>
    <br />
    <hr />
    <nav>
      <a href="assignments.php"><i>CS 313 Assignments</i></a>
    </nav>
    <br />
  </body>
</html>
