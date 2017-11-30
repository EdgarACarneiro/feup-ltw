<?php
  include_once('includes/init.php');

  session_destroy();

  header('Location: login.php');
?>
