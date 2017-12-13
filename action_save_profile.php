<?php
include_once('includes/init.php');
include_once('database/user.php');
include_once('includes/messages.php');

$currUser = $_SESSION['username'];

if ( changeUserAbout($currUser, htmlspecialchars($_POST['about'])) ) {
    setSuccessMessage("SUCCESS");
    echo json_encode("SUCCESS");
} else {
    setErrorMessage("ERROR");
    echo json_encode("ERROR");    
}

?>