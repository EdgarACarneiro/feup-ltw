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

    <section class="profile-container" id="profile">
		<div class="profile-pic">
			<img src="images/user/default.png" alt="user profile picture" width="300" height="300">
		</div>
		<div class="username-info">
			<h2>Username</h1>
			<h4>
				Co-founder and CEO of the most powerful company on the Internet today. 
				My personal wealth is estimated to be $20.3 billion, ranking me #13 on the Forbes 400 list of richest Americans. 
				Active investor in alternative energy companies, such as Tesla Motors.
			</h4>
		</div>
		<button type="button" class="btn edit-profile"><i class="fa fa-pencil">  Edit Profile</i></button>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>