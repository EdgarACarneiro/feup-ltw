<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/tasks.php');

if ( ! ($item = setItemCompleted($_POST['item_id'], $_POST['completed'])) ) {
    // log error ?
}

echo json_encode($item);
?>