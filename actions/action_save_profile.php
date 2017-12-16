<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/user.php');

$currUser = $_SESSION['username'];

if ( NULL != ($user = changeUserAbout($currUser, htmlspecialchars($_POST['about']))) ) {
    // log error ?
}

echo json_encode($user);
?>