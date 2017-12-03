<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if (! addItem($_GET['task_id'], $_GET['description'])) {
    // log error ?
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>