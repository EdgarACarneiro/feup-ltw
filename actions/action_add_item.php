<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/tasks.php');

if ( NULL != ($item = addItem($_POST['task_id'], htmlspecialchars($_POST['description']))) ) {
    // log error ?
}

echo json_encode($item);
?>