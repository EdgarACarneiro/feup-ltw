<?php
include_once('includes/init.php');
include_once('database/user.php');

if ($_POST['password'] == $_POST['password_check'] &&
   (registerUser($_POST['username'], $_POST['email'], $_POST['password']))) {
  setCurrentUser($_POST['username']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>