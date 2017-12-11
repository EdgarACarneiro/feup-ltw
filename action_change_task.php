<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( ! ($task = changeTaskTitle($_POST['task_id'], htmlspecialchars($_POST['title']))) ) {
    // log error ?
}

echo json_encode($task);
?>