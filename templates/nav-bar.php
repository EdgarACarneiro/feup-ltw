<?php

function userNavBar() {
 ?>
<script type="module" src="scripts/search.js" async></script>

<nav id="top-bar" class="nav-bar">
    <ul>
        <li id="info">
            <img src="images/site/smallLogo.png" alt="The website logo">
            <h1><a href="index.php">EzeeDo</a></h1>
        </li>
        <li id="search">
            <i class="fa fa-search"></i>
            <input class="no-select" type="text" id="search-bar" placeholder="Search" name="search">
        </li>
        <li id="user">
            <a href="index.php"><i class="fa fa-rss"></i></a>
            <a href="profile.php">
                <img class="mini-profile" src=
                <?php 
                include_once('show_user_info.php');
                getCurrUserThumbnail();
                ?>
                alt="User Thumbnail">
            </a>
            <form action="./actions/action_logout.php" method="post">
                <button type="submit" class="logout-btn"><i class="fa fa-sign-out"></i></button>
            </form>
        </li>
    </ul>
</nav>
<?php }

function anonymousNavBar() {
?>
<nav id="top-bar" class="anon-nav-bar">
    <div>
        <img src="images/site/smallLogo.png" alt="The website logo">
    </div>
    <h1><a href="index.php">EzeeDo</a></h1>
</nav>
<?php } ?>