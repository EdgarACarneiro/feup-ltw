<?php

function getAllTasksWithDueDate() {
    global $dbh;

    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        WHERE duedate IS NOT NULL
        ORDER BY duedate ASC, task_id DESC"
    );
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllTasks() {
    global $dbh;

    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        ORDER BY task_id DESC"
    );
    $stmt->execute();

    return $stmt->fetchAll();
}

// Projects are Tasks that have no parent Task
function getParentTasks() {
    global $dbh;

    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        WHERE parent_task IS NULL
        ORDER BY task_id DESC"
    );
    $stmt->execute();

    return $stmt->fetchAll();
}

function getChildTasks($parent_id) {
    global $dbh;
    
    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        WHERE parent_task = ?
        ORDER BY task_id DESC"
    );
    $stmt->execute(array($parent_id));

    return $stmt->fetchAll();  
}

function getTasksByCategory($cat) {
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

function getTasksItems($task_id) {
    global $dbh;
  
    $stmt = $dbh->prepare(
        "SELECT * FROM Item
        WHERE task_id = ?"
    );
    $stmt->execute(array($task_id));

    return $stmt->fetchAll();
}

function getUsersTasks($username) {
    global $dbh;
    
    $stmt = $dbh->prepare(
        "SELECT * FROM Task
        WHERE task_id in (
            SELECT task_id FROM UserTask
            WHERE username = ?
        )"
    );
    $stmt->execute(array($username));

    return $stmt->fetchAll();
}

function addItem($task_id, $description) {
    global $dbh;

    $stmt = $dbh->prepare(
        "INSERT INTO Item
        (task_id, description) VALUES
        (?, ?)"
    );

    $stmt->execute(array($task_id, $description));

    return getLastItem();
}

function getLastItem() {
    global $dbh;

    $stmt = $dbh->prepare(
        "SELECT * FROM Item
        ORDER BY item_id DESC LIMIT 1"
    );
    $stmt->execute();
    return $stmt->fetch();
}

?>