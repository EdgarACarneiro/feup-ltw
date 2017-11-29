<?php
include_once('includes/init.php');
include_once('database/user.php');

if (isLoginCorrect($_POST['username'], $_POST['password'])) {
  setCurrentUser($_POST['username']);
  header('Location: index.php');
  die;
}

echo "WRONG USERNAME BITCH";
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>