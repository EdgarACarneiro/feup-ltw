<?php
include_once('database/connection.php');
include_once('database/tasks.php');

$projects = getParentTasks();

function listToDoList($task) {
    echo '<article class="rnd-corners">';
    echo '<h4>' . $task['title'] . '</h4>';
    echo '<ul>';

    foreach (getTasksItems($task['task_id']) as $item) {
        echo '<li>' . $item['description'] . '</li>';
    }

    echo '</ul>';
    echo '<a href="action_add_item.php>';
    echo '<i class="fa fa-plus-circle"></i>Add Item</a>';
    echo '</article>';
}

function listProject($project) {
    echo '<div class="masonry-item shadow-cards rnd-corners">';
    echo '<article class="rnd-corners">';
    echo '<h2>' . $project['title'] . '</h2>';
    echo '<ul>';
    
    $items = getTasksItems($project['task_id']);
    foreach ($items as $item) {
        echo '<li>' . $item['description'] . '</li>';
    }
    echo '</ul>';

    foreach (getChildTasks($project['task_id']) as $subtask) {
        listToDoList($subtask);
    }

    echo '<a href="action_add_task.php">';
    echo '<i class="fa fa-plus-circle"></i>Add To-Do List</a>';
    echo '</article>';
    echo '</div>';
}

foreach ($projects as $project) {
    listProject($project);
}

?>