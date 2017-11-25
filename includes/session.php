<?php
  session_start();

  function setCurrentUser($username) {
    $_SESSION['username'] = $username;
  }

  function checkUserSession() {
    if (!isset($_SESSION["username"])) {
      header("Location: login.php");
    } else {
      header("Location: index.php");
    }
  }

?>
