<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/tasks.php');

if ( ! ($item = changeItemDescription($_POST['item_id'], htmlspecialchars($_POST['description']))) ) {
    // log error ?
}

echo json_encode($item);
?>