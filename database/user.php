<?php

function isLoginCorrect($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT password FROM User WHERE username = ?');
    $stmt->execute(array($username));
    if (($user = $stmt->fetch()) !== false) {
      return password_verify($password, $user['password']);
    }
    return false;
}

function registerUser($username, $email, $password) {
  global $dbh;

  if ($username == '' || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    return false;
  }

  $stmt = $dbh->prepare('INSERT INTO User VALUES (?, ?, ?, NULL)');
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  return $stmt->execute(array($username, $email, $hashed_password));
}

function getUserInfo($username) {
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));
  return $stmt->fetch();
}

function changeUserAbout($username, $about) {
  global $dbh;

  $stmt = $dbh->prepare(
    "UPDATE User
    SET about = ?
    WHERE username = ?"
  );

  return $stmt->execute(array($about, $username));
}

?>