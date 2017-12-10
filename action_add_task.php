<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( NULL != ($task = addTask($_POST['creator'], $_POST['title'], (int) $_POST['priority'], $_POST['date'], $_POST['description'])) ) {
    // log error ?
}

echo json_encode([$task, getTasksItems($task['task_id'])]);

?>