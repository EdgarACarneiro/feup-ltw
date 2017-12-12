<?php
include_once('database/connection.php');
include_once('database/tasks.php');
?>
<script type="module" src="scripts/ajax_item.js" async></script>
<script type="module" src="scripts/ajax_text_edit.js" async></script>

<?php
$projects = getParentTasks($_SESSION['username']);

function listToDoList($task, &$users, $nested = true) {
    if ($nested) {
        echo '<article class="rnd-corners">';
    }?>

    <div id="update-title@<?php echo $task['task_id']; ?>"
        class="todo__title priority-<?php echo $task['priority']; ?>">
    <span class="item-display"><?php echo ($task['title'] ? $task['title'] : "Add title..."); ?></span>
    <input type="text" class="item-edit" style="display:none"/>
    </div>
    
    <?php
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
    <?php echo ($nested? '<span class="category">' . $task['category'] . '</span>' : ''); ?>
    </ul>
    <a id="delete-task@<?php echo $task['task_id']; ?>" class="shadow-cards fa-circular-grey" href="">
        <i class="fa fa-times" aria-hidden="true"></i></a>

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
            <span class="item-display"><?php echo $item['description']; ?></span>
            <input type="text" class="item-edit" style="display:none"/>
        </div>
        <a id="delete-item@<?php echo $item['item_id']; ?>" class="fa-circular-grey" href="">
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
            <a id="<?php echo ($user . '"' . ' href="profile.php?user=' . $user); ?> "> 
                <img src= <?php getUserThumbnail($user); ?> alt="Contributor Thumbnail" class="thumbnail-circular">
            </a>
        <?php   
    }
    echo '<button class="addSubList"><i class="fa fa-plus-circle"></i> Add Sub-List</button></nav>';
    echo ($project['category']? '<span class="category">' . $project['category'] . '</span>' : '');
    echo '</div>';
    echo '</article>';
}

foreach ($projects as $project) {
    listProject($project);
}

?>

<script src="scripts/modal.js" defer></script>
<script src="scripts/collaborators.js" defer></script>
