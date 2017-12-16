<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/tasks.php');

if ( ! ($item = changePriorityOfTask($_POST['task_id'], $_POST['priority']))) {
    // log error ?
}

echo json_encode($item);
?>