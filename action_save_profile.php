<?php
include_once('includes/init.php');
include_once('database/user.php');

$currUser = getUserInfo($_SESSION['username'])['username'];

if ( NULL != ($user = changeUserAbout($currUser, $_POST['about'])) ) {
    // log error ?
}

echo json_encode($user);
?>