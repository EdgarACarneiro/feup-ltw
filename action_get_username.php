<?php
include_once('includes/init.php');

if ( NULL == ($username = getCurrentUser()) ) {
    // log error ?
}

echo json_encode($username);
?>