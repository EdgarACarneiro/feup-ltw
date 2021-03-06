<?php
include_once('includes/init.php');
checkUserSession();

include_once('templates/header.php');
headerProfile();

function displayProfile($user = null) {
?>
<body onload="initCalendar()">

    <?php
        include_once('templates/nav-bar.php');
        userNavBar();
        include_once('templates/calendar.php');
        include_once('show_user_info.php');
    ?>

    <section class="profile-container" id="profile">
        <?php $user? getUserProfile($user) : displayCurrUserInfo(); ?>
    </section>

<?php include_once('templates/footer.php') ?>

<?php
}

if (isset($_GET['user']))
    displayProfile($_GET['user']);
else
    displayProfile();
?>