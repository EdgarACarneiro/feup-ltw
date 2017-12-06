<?php
include_once('database/connection.php');
include_once('database/tasks.php');
?>
<script type="text/javascript" src="scripts/ajax.js"></script>

<?php
$projects = getParentTasks($_SESSION['username']);

function listToDoList($task, $nested = true) {
    if ($nested) {
        echo '<article class="rnd-corners"><h4>'.$task['title'].'</h4>';
    } else {
        echo '<h2>'.$task['title'].'</h2>';
    }    
    
    echo '<ul id="ul@' . $task['task_id'] . '">';
    foreach (getTasksItems($task['task_id']) as $item) {
        echo '<label class="todo">
        <input class="todo__state" type="checkbox" />
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 25" class="todo__icon">
            <use xlink:href="#todo__box" class="todo__box"></use>
            <use xlink:href="#todo__check" class="todo__check"></use>
            <use xlink:href="#todo__circle" class="todo__circle"></use>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 25" class="todo__icon todo__icon_line">
        <use xlink:href="#todo__line" class="todo__line"></use>
        </svg>';
        echo '<div id="li' . $item['item_id'] . '" class="todo__text" >' . $item['description'] . '</div>';
        
        echo '</label>';
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