<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( NULL == ($task = addTask($_SESSION['username'],
    htmlspecialchars($_POST['title']),
    (int) $_POST['priority'],
    htmlspecialchars($_POST['category']),
    $_POST['date'],
    htmlspecialchars($_POST['description']),
    $_POST['parent_task'])) ) {
    echo json_encode("ERROR adding new task");
    die;
}

echo json_encode([$task, getTasksItems($task['task_id'])]);

?>