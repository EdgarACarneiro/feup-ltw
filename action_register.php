<?php
include_once('includes/init.php');
include_once('database/user.php');

if (registerUser($_POST['username'], $_POST['email'], $_POST['password'])) {
  setCurrentUser($_POST['username']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>