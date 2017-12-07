<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( ! ($item = setItemCompleted($_POST['item_id'], $_POST['completed'])) ) {
    // log error ?
}

echo json_encode($item);
?>