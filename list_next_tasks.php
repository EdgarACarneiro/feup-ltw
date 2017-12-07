<?php
include_once('database/connection.php');
include_once('database/tasks.php');
$tasks = getAllTasksWithDueDate($_SESSION['username']);

function listNextTask($task) {
    echo '<li class="next-tasks-item">';
            echo '<div class="date-of-next-taks">';
                echo '<p>' . $task['duedate'] . '</p>';
            echo '</div>';
        echo '<ul class="priority-' . $task['priority'] . '">';
            echo '<li><h4>' . $task['title'] . '</h4>';
            echo '<h5>' . $task['category'] . '</h5></li>';
        echo '</ul>';
    echo '</li>';
}

foreach ($tasks as $task) {
    listNextTask($task);    
}

?>