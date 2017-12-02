<?php
include_once('database/connection.php');
include_once('database/tasks.php');
?>
<script type="text/javascript" src="database/ajax.js"></script>

<?php
$projects = getParentTasks();

function listToDoList($task) {
    ?>
    <article class="rnd-corners">
    <?php echo '<h4>'.$task['title'].'</h4>' ?>
    <ul>

    <?php
    foreach (getTasksItems($task['task_id']) as $item) {
        echo '<li>' . $item['description'] . '</li>';
    }
    ?>
    </ul>
        <form <?php echo 'id="addItem@'.$task['task_id'].'" onsubmit="return addItemToTask('.$task['task_id'].')">' ?>
            <input type="text" placeholder="Grab bananas" name="description" required>
            <input type="submit" value="Add Item">
        </form>
    </article>

    <?php
    // echo '<button onclick="addItem(' . $task['task_id'] . ')"><i class="fa fa-plus-circle"></i> Add Item</button>';
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

    echo '<button><i class="fa fa-plus-circle"></i> Add To-Do List</button>';
    echo '</article>';
    echo '</div>';
}

foreach ($projects as $project) {
    listProject($project);
}

?>