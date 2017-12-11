<script type="module" src="scripts/ajax_search.js"></script>

<nav id="top-bar" class="nav-bar">
    <ul>
        <li id="info">
            <img id="logo-img" src="images/site/smallLogo.png" alt="The website logo">
            <h1><a href="index.php">EzeeDo</a></h1>
        </li>
        <li id="search">
            <i class="fa fa-search"></i>
            <input class="no-select" type="text" id="search-bar" placeholder="Search" name="search" onkeyup="showSearchResult(this.value)">
        </li>
        <li id="user">
            <a href="index.php"><i class="fa fa-rss"></i></a>
            <a href="profile.php">
                <img class="mini-profile" src=

                <?php 
                include_once('includes/session.php');
                $imgPath = 'images/user/thumbnails/' . getCurrentUser() . '.jpg';

                echo ((file_exists($imgPath) ? 
                    '"' . $imgPath . '"' : '"images/user/thumbnails/default.jpg"'));
                ?>
                alt="User Profile thumbnail">
            </a>
            <form action="action_logout.php" method="post">
                <button type="submit" class="logout-btn"><i class="fa fa-sign-out"></i>
            </form>
        </li>
    </ul>
</nav>