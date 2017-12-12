<?php
include_once('includes/init.php');
include_once('includes/messages.php');
include_once('database/user.php');

if (isLoginCorrect($_POST['username'], $_POST['password'])) {
  setCurrentUser($_POST['username']);
  setSuccessMessage("SUCCESS: login successful.");  
  header('Location: index.php');
  die;
}

setSuccessMessage("ERROR: login unsuccessful.");  
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>