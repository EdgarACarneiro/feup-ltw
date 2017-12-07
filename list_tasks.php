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
        listItem($item);
    }

    ?>
    <li><form id="form@<?php echo $task['task_id']; ?>" onsubmit="return addItemToTask(this)">
    <input type="text" placeholder="Grab bananas" name="description" required>
    </form></li>
    </ul>

    <?php
    if ($nested) echo '</article>';
}

function listItem($item) {
    ?><li class="todo">
    <input class="todo__state" type="checkbox" onclick="return setItemCompleted(this)" <?php if ($item['completed'] == 1) echo "checked"; ?>/>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25 25" class="todo__icon">
        <use xlink:href="#todo__box" class="todo__box"></use>
        <use xlink:href="#todo__check" class="todo__check"></use>
        <use xlink:href="#todo__circle" class="todo__circle"></use>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 10" class="todo__icon todo__icon_line">
    <use xlink:href="#todo__line" class="todo__line"></use>
    </svg>
    <div id="li@<?php echo $item['item_id']; ?>" class="todo__text" onclick="console.log(this)"><?php echo $item['description']; ?></div>
    </li>
    <?php
}

function listProject($project) {
    echo '<div class="masonry-item">';
    echo '<article class="rnd-corners shadow-cards">';

    listToDoList($project, false);

    foreach (getChildTasks($project['task_id']) as $subtask) {
        listToDoList($subtask, true);
    }

    echo '<button><i class="fa fa-plus-circle"></i> Add Sub-List</button>';
    echo '</article>';
    echo '</div>';
}

foreach ($projects as $project) {
    listProject($project);
}

?>

<script type="text/javascript" src="scripts/modal.js"></script>