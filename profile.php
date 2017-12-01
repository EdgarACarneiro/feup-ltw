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

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>