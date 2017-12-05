<?php
include_once('database/connection.php');
include_once('database/tasks.php');
?>
<script type="text/javascript" src="scripts/ajax.js"></script>

<?php
$projects = getParentTasks();

function listToDoList($task, $nested = true) {
    if ($nested) {
        echo '<article class="rnd-corners"><h4>'.$task['title'].'</h4>';
    } else {
        echo '<h2>'.$task['title'].'</h2>';
    }    
    
    echo '<ul id="ul@' . $task['task_id'] . '">';
    foreach (getTasksItems($task['task_id']) as $item) {
        echo '<li id="li' . $item['item_id'] . '">' . $item['description'] . '</li>';
    }

    echo '<li><form id="form@' . $task['task_id'] . "\" onsubmit=\"return addItemToTask(this)\">";
        echo '<input type="text" placeholder="Grab bananas" name="description" required>';
        echo '<input type="submit" value="Add Item">';
    echo '</form></li>';
    echo '</ul>';

    if ($nested) echo '</article>';
}

function listProject($project) {
    echo '<div class="masonry-item">';
    echo '<article class="rnd-corners shadow-cards">';

    listToDoList($project, false);

    foreach (getChildTasks($project['task_id']) as $subtask) {
        listToDoList($subtask, true);
    }

    echo '<button><i class="fa fa-plus-circle"></i> Add To-Do List</button>';
    echo '</article>';
    echo '</div>';
}

foreach ($projects as $project) {
    listProject($project);
}

?>
<script type="text/javascript" src="scripts/modal.js"></script>