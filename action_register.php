<?php
include_once('includes/init.php');
include_once('includes/messages.php');
include_once('database/user.php');

if (preg_match("/^[\w\d]{4,}$/", $_POST['username']) &&
    (registerUser($_POST['username'], $_POST['email'], $_POST['password']))) {
  setCurrentUser($_POST['username']);
  setSuccessMessage("SUCCESS: account created.");
  echo json_encode("SUCCESS: account created.");
  die;
}

setErrorMessage("ERROR: username already taken.");
echo json_encode("ERROR: username already taken.");
?>