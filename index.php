<?php
include_once('includes/init.php');
include_once('includes/session.php');
checkUserSession();

include_once('templates/header.php');
?>

<body onload="initCalendar()">

<svg viewBox="0 0 0 0" style="position: absolute; z-index: -1; opacity: 0;">
    <defs>
        <linearGradient id="boxGradient" gradientUnits="userSpaceOnUse" x1="0" y1="0" x2="25" y2="25">
        <stop offset="0%"   stop-color="#80E3D1"/>
        <stop offset="100%" stop-color="#53C5B9"/>
        </linearGradient>

        <linearGradient id="lineGradient">
        <stop offset="0%"    stop-color="#53C5B9"/>
        <stop offset="100%"  stop-color="#80E3D1"/>
        </linearGradient>

        <path id="todo__line" stroke="url(#lineGradient)" d="M21 5h158v0.1z"></path>
        <path id="todo__box" stroke="url(#boxGradient)" d="M21 12.7v5c0 1.3-1 2.3-2.3 2.3H8.3C7 20 6 19 6 17.7V7.3C6 6 7 5 8.3 5h10.4C20 5 21 6 21 7.3v5.4"></path>
        <path id="todo__check" stroke="url(#boxGradient)" d="M10 13l2 2 5-5"></path>
        <circle id="todo__circle" cx="13.5" cy="12.5" r="10"></circle>
    </defs>
</svg>

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
</div>

        </main>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>

</html>