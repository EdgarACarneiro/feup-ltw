<?php
include_once('database/connection.php');
include_once('database/user.php');

$user = getUserInfo($_SESSION['username']);

function showInformation($user) {
    echo '<section class="profile-container" id="profile">';
    echo '<div class="profile-pic">';
    //TODO
    echo '<img src="images/user/default.png" alt="user profile picture" 
            width="300" height="300">';
    echo '</div>';
    echo '<div class="username-info">';
    echo '<h2>' . $user['username'] . '</h2>';
    echo '<h4>' . $user['about'] . '</h4>';
    echo '</div>';
    echo '<button type="button" class="btn edit-profile">
            <i class="fa fa-pencil" onclick=>  Edit Profile</i></button>';
    echo '</section>';
}

showInformation($user);

?>