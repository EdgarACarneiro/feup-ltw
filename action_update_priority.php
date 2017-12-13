<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( ! ($item = changePriorityOfTask($_POST['task_id'], $_POST['priority']))) {
    // log error ?
}

echo json_encode($item);
?>