<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/tasks.php');

if ( ! ($task = changeTaskTitle($_POST['task_id'], htmlspecialchars($_POST['title']))) ) {
    // log error ?
}

echo json_encode($task);
?>