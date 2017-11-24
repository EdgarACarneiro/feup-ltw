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

function getTaskById($id) {
    global $dbh;

    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        WHERE task_id = ?"
    );

    $stmt->execute(array($id));

    return $stmt->fetch();
}

function getAllItems() {
    global $dbh;
    
    $stmt = $dbh->prepare(
        "SELECT * FROM Item"
    );
    $stmt->execute();

    return $stmt->fetchAll();  
}

function getItemById($id) {
    global $dbh;
    
    $stmt = $dbh->prepare(
        "SELECT * FROM Item
        WHERE item_id = ?"
    );
    $stmt->execute(array($id));

    return $stmt->fetch();  
}

?>