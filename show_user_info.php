<?php
include_once('database/connection.php');
include_once('database/user.php');

$user = getUserInfo($_SESSION['username']);

function showInformation($user) {
    $username = $user['username'];
    $imgPath = ("images/user/" . $username . ".png");

    echo '<section class="profile-container" id="profile">';
    echo '<div class="profile-pic">';
    echo '<img src=' . 
        (file_exists($imgPath) ? $imgPath : "images/user/default.png").
        ' alt="user profile picture">';
    echo '</div>';
    echo '<div class="username-info">';
    echo '<h2>' . $username . '</h2>';
    echo '<h4>' . $user['about'] . '</h4>';
    echo '</div>';
    echo '<button type="button" class="btn edit-profile">
            <i class="fa fa-pencil" onclick=>  Edit Profile</i></button>';
    echo '</section>';
}

showInformation($user);

?>