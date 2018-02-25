<?php
  // Start the session
  session_start();

  unset($_SESSION['display_name']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);

  header('Location: home.php');
  die();
?>