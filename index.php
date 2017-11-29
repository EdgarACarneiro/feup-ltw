<?php
include_once('includes/init.php');
include_once('includes/session.php');
checkUserSession();

include_once('templates/header.php');
?>

<body onload="initCalendar()">
    <nav id="top-bar" class="nav-bar">
        <ul>
            <li id="info">
                <img src="images/site/smallLogo.png" alt="The website logo">
                <h1><a href="index.php">EzeeDo</a></h1>
            </li>
            <li id="search">
                <i class="fa fa-search"></i>
                <input type="text" id="search-bar" placeholder="Search" name="search">
            </li>
            <li id="user">
                <a href="index.php"><i class="fa fa-rss"></i></a>
                <a href="profile.php"><i class="fa fa-user-circle"></i></a>
                <form action="action_logout.php" method="post">
                    <input type="submit" value="Logout">
                </form>
                <!--<input type="checkbox" id="more" onclick="action_logout.php">-->
                <label class="more" for="more"></label>
                <!-- 'More' é uma cena estilo a do hamburguer com log out, settings, entre outros -->
            </li>
        </ul>
    </nav>

    <?php
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

        <div class="masonry">
            <?php include_once('list_tasks.php'); ?>
        </div>

        </main>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>

</html>