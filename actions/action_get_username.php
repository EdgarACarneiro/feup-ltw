<?php
include_once(dirname(__DIR__) . '/includes/init.php');

if ( NULL == ($username = getCurrentUser()) ) {
    // log error ?
}

echo json_encode($username);
?>