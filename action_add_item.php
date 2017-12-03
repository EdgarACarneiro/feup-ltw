<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if (! addItem($_POST['task_id'], $_POST['description'])) {
    // log error ?
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>