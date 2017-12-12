<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( NULL == ($task = addTask($_SESSION['username'],
    htmlspecialchars($_POST['title']),
    (int) $_POST['priority'], $_POST['date'],
    htmlspecialchars($_POST['description']))) ) {
    echo json_encode("ERROR adding new task");
    die;
}

echo json_encode([$task, getTasksItems($task['task_id'])]);

?>