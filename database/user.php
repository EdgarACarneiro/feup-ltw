<?php

function isLoginCorrect($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() !== false;
  }

function registerUser($username, $email, $password) {
  global $dbh;

  if ($username == '' || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    return false;
  }

  $stmt = $dbh->prepare('INSERT INTO User VALUES (?, ?, ?, NULL)');
  return $stmt->execute(array($username, $email, sha1($password)));
}

?>