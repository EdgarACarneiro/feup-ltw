<?php
include_once('database/connection.php');
include_once('database/tasks.php');
?>
<script type="module" src="scripts/ajax_item.js"></script>
<script type="module" src="scripts/modal.js"></script>
<script type="module" src="scripts/ajax_item_edit.js"></script>

<?php
$projects = getParentTasks($_SESSION['username']);

function listToDoList($task, &$users, $nested = true) {
    if ($nested) {
        echo '<article class="rnd-corners"><h4>'.$task['title'].'</h4>';
    } else {
        echo '<h2>'.$task['title'].'</h2>';
    }    
    
    echo '<ul id="ul@' . $task['task_id'] . '">';
    foreach (getTasksItems($task['task_id']) as $item) {
        if($item['assigneduser'] != NULL && !in_array($item['assigneduser'], $users)){
            array_push($users, $item['assigneduser']);
        }
        listItem($item);
    }

    ?>
    <li class="todo"><form id="form@<?php echo $task['task_id']; ?>">
        <input type="text" placeholder="Add Item..." name="description" required />
    </form></li>
    </ul>

    <?php
    if ($nested) echo '</article>';
}

function listItem($item) {
    ?><li
        <?php if($item['assigneduser'] != NULL){
            echo 'id="' . $item['assigneduser'] . '@' . $item['item_id'] . '"';
        }?> class="todo">
        <input class="todo__state" type="checkbox" <?php if ($item['completed'] == 1) echo "checked"; ?>/>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25 25" class="todo__icon">
            <use xlink:href="#todo__box" class="todo__box"></use>
            <use xlink:href="#todo__check" class="todo__check"></use>
            <use xlink:href="#todo__circle" class="todo__circle"></use>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 10" class="todo__icon todo__icon_line">
            <use xlink:href="#todo__line" class="todo__line"></use>
        </svg>
        <div id="li@<?php echo $item['item_id']; ?>" class="todo__text">
            <span class="li-item-display"><?php echo $item['description']; ?></span>
            <input type="text" class="li-item-edit" style="display:none"/>
        </div>
        <a class="fa-circular-grey" href="">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    </li>
    <?php
}

function listProject($project) {
    echo '<div class="masonry-item">';
    echo '<article class="rnd-corners shadow-cards">';

    $users = array();

    listToDoList($project, $users, false);

    foreach (getChildTasks($project['task_id']) as $subtask) {
        listToDoList($subtask, $users, true);
    }

    echo '<nav id="info-nav">';
    foreach ($users as $user){
        ?>
            <a id="<?php echo $user?>" href="" class="fa-circular-grey">
                <i class="fa fa-user" aria-hidden="true"></i>
            </a>
        <?php   
    }
    echo '<button class="addSubList"><i class="fa fa-plus-circle"></i> Add Sub-List</button></nav>';
    echo '</article>';
    echo '<a href="" class="shadow-cards fa-circular-grey">
            <i class="fa fa-times" aria-hidden="true"></i></a>';
    echo '</div>';
}

foreach ($projects as $project) {
    listProject($project);
}

?>

<script type="text/javascript" src="scripts/collaborators.js"></script>
