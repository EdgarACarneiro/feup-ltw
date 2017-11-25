<?php
include_once('database/connection.php');
include_once('database/tasks.php');
$tasks = getAllTasks();

function listTask($task) {
    echo '<div class="masonry-item shadow-cards rnd-cornes">';
    echo '<article class="rnd-cornes">';
    echo '<h2>' . $task['title'] . '</h2>';
    echo '<ul>';
    
    $items = getTasksItems($task['task_id']);
    foreach ($items as $item) {
        echo '<li>' . $item['description'] . '</li>';
    }
    echo '</ul>';
    echo '<a href="action_add_item.php">';
    echo '<i class="fa fa-plus-circle"></i>Add Item</a>';
    echo '</article>';
    echo '</div>';
}

foreach ($tasks as $task) {
    listTask($task);    
}

?>