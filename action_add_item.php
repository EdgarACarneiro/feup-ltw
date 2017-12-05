<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( NULL != ($item = addItem($_POST['task_id'], $_POST['description'])) ) {
    // log error ?
}

echo json_encode($item);
?>