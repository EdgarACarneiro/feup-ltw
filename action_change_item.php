<?php
include_once('includes/init.php');
include_once('database/tasks.php');

if ( ! ($item = changeItemDescription($_POST['item_id'], htmlspecialchars($_POST['description']))) ) {
    // log error ?
}

echo json_encode($item);
?>