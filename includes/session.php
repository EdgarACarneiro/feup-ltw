<?php
session_start();

function setCurrentUser($username) {
  $_SESSION['username'] = $username;
}

// TODO check this function
// NOTE header calls must be executed before any white space or html
function checkUserSession() {
  if (!isset($_SESSION["username"])) {
    header("Location: login.php");
  } else {
    header("Location: index.php");
  }

  exit;
}

?>
