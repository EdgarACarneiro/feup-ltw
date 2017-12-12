<?php

function commonHeader() {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <META charset="UTF-8">
    <META NAME="KEYWORDS" CONTENT="todo, to-do, list, todolist, to-dolist, to-do-list, todo-list, job, group, school, ltw, feup">
    <META NAME="viewport" CONTENT="width=device-width, initial-scale=1">
    <title>EzeeDo</title>
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/fonts.css" rel="stylesheet">
    <link href="styles/fonts/font-awesome/sass/font-awesome.css" rel="stylesheet">

<?php
}

function headerIndex() {
    commonHeader();
    ?>
        <script src="scripts/calendar.js"></script>
        <script type="module" src="scripts/ajax_task.js" async></script>
    </head>
    <?php
}

function headerProfile() {
    commonHeader();
    ?>
        <script src="scripts/calendar.js"></script>
    </head>
    <?php
}

function headerLogin() {
    commonHeader();
    ?>
        <script src="scripts/sign-in-up-switch.js" asinc></script>
    </head>
    <?php
}