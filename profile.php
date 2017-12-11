<?php
include_once('includes/init.php');
include_once('includes/session.php');
checkUserSession();

include_once('templates/header.php');
?>

<script type="module" src="scripts/edit_profile.js"></script>"

<body onload="initCalendar()">

    <?php
        include_once('templates/nav-bar.php');
        userNavBar();
        include_once('templates/calendar.php');
        include_once('show_user_info.php');
    ?>

    <section class="profile-container" id="profile">
        <?php displayCurrUserInfo(); ?>
        <button type="button" class="btn edit-profile" >
            <span><i class="fa fa-pencil"></i>Edit Profile</span>
        </button>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>