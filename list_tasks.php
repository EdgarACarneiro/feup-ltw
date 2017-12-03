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
    
    echo '<ul>';
    foreach (getTasksItems($task['task_id']) as $item) {
        echo '<li>' . $item['description'] . '</li>';
    }

    echo "<li><form onsubmit=\"return addItemToTask(this)\">";
        echo '<input type="text" id="input@' . $task['task_id'] . '" placeholder="Grab bananas" name="description" required>';
        echo '<input type="submit" value="Add Item">';
    echo '</form></li>';
    echo '</ul>';

    if ($nested) echo '</article>';
}

function listProject($project) {
    echo '<div class="masonry-item shadow-cards rnd-corners">';
    echo '<article class="rnd-corners">';

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