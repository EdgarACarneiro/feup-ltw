<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/includes/messages.php');
include_once(dirname(__DIR__) . '/database/user.php');

if (isLoginCorrect($_POST['username'], $_POST['password'])) {
  setCurrentUser($_POST['username']);
  setSuccessMessage("SUCCESS: login successful.");  
  header('Location: index.php');
  die;
}

setErrorMessage("ERROR: login unsuccessful.");  
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>