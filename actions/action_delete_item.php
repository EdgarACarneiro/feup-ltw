<?php
include_once(dirname(__DIR__) . '/includes/init.php');
include_once(dirname(__DIR__) . '/database/tasks.php');

if ( ! deleteItem((int) $_POST['item_id']) ) {
    echo json_encode('ERROR deleting item ' . $_POST['item_id']);
}

echo json_encode('SUCCESS deleting item ' . $_POST['item_id']);
?>