<?php

function getAllTasks() {
    global $dbh;

    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        ORDER BY duedate ASC, task_id DESC"
    );
    $stmt->execute();

    return $stmt->fetchAll();
}

function getTasksByCat($cat) {
    global $dbh;

    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        WHERE category like ?
        task_id DESC"
    );
    $stmt->execute(array($cat));
    
    return $stmt->fetchAll();
}

?>