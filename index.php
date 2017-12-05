<?php
include_once('includes/init.php');
include_once('includes/session.php');
checkUserSession();

include_once('templates/header.php');
?>

<body onload="initCalendar()">

    <?php
        include_once('templates/nav-bar.php');
        include_once('templates/calendar.php');
    ?>
    
    <section class="feed-container" id="feed">
        <div class="btn-bar">
            <div class="btn btn-group shadow-cards">
                <a href="projects.php">Projects</a>
                <a href="action_add_task.php">
                    <i class="fa fa-plus circle-box"></i>
                </a>
            </div>
            <div class="btn btn-group shadow-cards">
                <a href="todoLists.php">To-Do Lists</a>
                <a href="action_add_task.php">
                    <i class="fa fa-plus circle-box"></i>
                </a>
            </div>
        </div>

        <div id="modal" class="modal"></div>

        <div class="masonry" id="tasks-list">
            <?php include_once('list_tasks.php'); ?>
        </div>

        </main>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>

</html>