<?php
include_once('database/connection.php');
include_once('database/tasks.php');
$tasks = getAllTasksWithDueDate();

function listNextTask($task) {
    echo '<li class="next-tasks-item">';
            echo '<div class="date-of-next-taks">';
                echo '<p>' . $task['duedate'] . '</p>';
            echo '</div>';
        echo '<ul>';
            echo '<li><h4>' . $task['title'] . '</h4>';
            if($task['parent_task'] != null){
                echo '<h5>' . $task['parent_task'] . '</h5></li>';
            }
            else {
                echo '<h5>' . $task['category'] . '</h5></li>';
            }
        echo '</ul>';
    echo '</li>';
}

foreach ($tasks as $task) {
    listNextTask($task);    
}

?>