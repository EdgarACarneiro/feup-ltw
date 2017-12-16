<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/tasks.php');

if ( ! deleteTask((int) $_POST['task_id']) ) {
    echo json_encode('ERROR deleting task ' . $_POST['task_id']);
}

echo json_encode('SUCCESS deleting task ' . $_POST['task_id']);
?>