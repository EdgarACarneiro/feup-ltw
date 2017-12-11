<section class="profile-container" id="profile">
    <div class="profile-pic">

        <?php
        include_once('database/connection.php');
        include_once('database/user.php');

        $user = getUserInfo($_SESSION['username']);
        $username = $user['username'];
        $about = $user['about'];
        $imgPath = ("images/user/profile/" . $username . ".jpg");

            echo '<img src=' . 
                (file_exists($imgPath) ? 
                $imgPath : "images/user/profile/default.jpg").
                ' alt="user profile picture">';
            echo '</div>';
            echo '<div class="username-info">';
            echo '<h2>' . $username . '</h2>';
            echo '<h4>' . $about . '</h4>';
        ?>
        
    </div>
    <button type="button" class="btn edit-profile" >
        <span><i class="fa fa-pencil"></i>Edit Profile</span>
    </button>
</section>