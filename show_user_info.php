<?php

function displayUserInfo($displayUser) {
    
    include_once('database/connection.php');
    include_once('database/user.php');

    $user = getUserInfo($displayUser);
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

function displayCurrUserInfo() {
    
    ?> <script type="module" src="scripts/edit_profile.js"></script> <?php
    displayUserInfo($_SESSION['username']);

    ?>
    <button type="button" class="btn" id="edit-profile" >
        <span><i class="fa fa-pencil"></i>Edit Profile</span>
    </button>
    <?php
}

function getUserProfile($user) {
    if ($user == $_SESSION['username'])
        displayCurrUserInfo();
    else
        displayUserInfo($user);
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