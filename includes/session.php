<?php
include_once("includes/utils.php");

session_start();

function setCurrentUser($username) {
  $_SESSION['username'] = $username;
}

function checkUserSession() {

  if (currentPHP() == "login.php" && isset($_SESSION['username'])) {
    redirect("index.php");    
  } else if (currentPHP() != "login.php" && (! isset($_SESSION['username'])) ) {
    redirect("login.php");
  }

}

function getCurrentUser() {
  if (isset($_SESSION['username']))
    return $_SESSION['username'];

  return NULL;
}

?>
