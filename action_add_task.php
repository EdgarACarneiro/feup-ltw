<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( NULL != ($task = addTask($_POST['creator'])) ) {
    // log error ?
}

echo json_encode($task);
?>