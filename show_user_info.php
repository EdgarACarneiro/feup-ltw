<?php
function displayCurrUserInfo() {
    include_once('database/connection.php');
    include_once('database/user.php');

    $user = getUserInfo($_SESSION['username']);
    $username = $user['username'];
    $about = $user['about'];
    $imgPath = ("images/user/profile/" . $username . ".jpg");

    echo '<div class="profile-pic">';
    echo '<img src=' . 
        (file_exists($imgPath) ? 
        $imgPath : "images/user/profile/default.jpg").
        ' alt="user profile picture">';
    echo '</div>';
    echo '<div class="username-info">';
    echo '<h2>' . $username . '</h2>';
    echo '<h4>' . $about . '</h4>';
    echo '</div>';
}

function getUserThumbnail($user) {
    $imgPath = ("images/user/thumbnails/" . $user . ".jpg");

    if (file_exists($imgPath))
        echo '"' . $imgPath . '"';
    else
        echo '"images/user/thumbnails/default.jpg"';
}

function getCurrUserThumbnail() {
    include_once('includes/session.php');
    getUserThumbnail(getCurrentUser());
}
?>