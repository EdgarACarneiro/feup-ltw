<?php
include_once('includes/session.php');
include_once('templates/header.php');
?>

<body onload="initCalendar()">
    <nav id="top-bar" class="nav-bar">
        <ul>
            <li id="info">
                <img src="images/site/smallLogo.png" alt="The website logo">
                <h1><a href="index.php">EzeeDo</a></h1>
            </li>
            <li id="search">
                <i class="fa fa-search"></i>
                <input type="text" id="search-bar" placeholder="Search" name="search">
            </li>
            <li id="user">
                <a href="index.php"><i class="fa fa-rss"></i></a>
                <a href="profile.php"><i class="fa fa-user-circle"></i></a>
                <input type="checkbox" id="more">
                <label class="more" for="more"></label>
                <!-- 'More' é uma cena estilo a do hamburguer com log out, settings, entre outros -->
            </li>
        </ul>
    </nav>

    <?php
        include_once('templates/calendar.php');
    ?>
    
    <section class="feed-container" id="feed">
        <div class="btn-bar">
            <div class="btn btn-group shadow-cards">
                <a href="projects.php">Projects</a>
                <a href="action_add_task.php">
                    <i class="fa fa-plus circle-box"></i>
                </a>
            </div>
            <div class="btn btn-group shadow-cards">
                <a href="todoLists.php">To-Do Lists</a>
                <a href="action_add_task.php">
                    <i class="fa fa-plus circle-box"></i>
                </a>
            </div>
        </div>

        <div class="masonry">
            <div class="masonry-item shadow-cards rnd-cornes">
                <article class="rnd-cornes">
                    <h2>Project Title</h2>
                    <article>
                        <h4>To-Do List 1 Title</h4>
                        <ul>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                            <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                        </ul>
                        <a href="action_add_item.php">
                            <i class="fa fa-plus-circle"></i>Add Item</a>
                    </article>
                    <article>
                        <h4>To-Do List 2 Title</h4>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Ut feugiat velit nec feugiat bibendum.</li>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                        </ul>
                        <a href="action_add_item.php">
                            <i class="fa fa-plus-circle"></i>Add Item</a>
                    </article>
                    <a href="action_add_task.php">
                        <i class="fa fa-plus-circle"></i>Add To-Do List</a>
                </article>
            </div>

            <div class="masonry-item shadow-cards rnd-cornes">
                <article class="rnd-cornes">
                    <h2>To-Do List Title</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Ut feugiat velit nec feugiat bibendum.</li>
                        <li>Fusce venenatis enim sed erat congue laoreet.</li>
                        <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                    </ul>
                    <a href="action_add_item.php">
                        <i class="fa fa-plus-circle"></i>Add Item</a>
                </article>
            </div>

            <div class="masonry-item shadow-cards rnd-cornes">
                <article class="rnd-cornes">
                    <h2>To-Do List Title</h2>
                    <ul>
                        <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                    </ul>
                    <a href="action_add_item.php">
                        <i class="fa fa-plus-circle"></i>Add Item</a>
                </article>
            </div>

            <div class="masonry-item shadow-cards rnd-cornes">
                <article class="rnd-cornes">
                    <h2>Project Title</h2>
                    <article>
                        <h4>To-Do List 1 Title</h4>
                        <ul>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                            <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                            <li>Aliquam rutrum nisi non maximus sagittis.</li>
                            <li>Quisque tempor massa id arcu ullamcorper, vitae efficitur odio facilisis.</li>
                        </ul>
                        <a href="action_add_item.php">
                            <i class="fa fa-plus-circle"></i>Add Item</a>
                    </article>

                    <article>
                        <h4>To-Do List 2 Title</h4>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Ut feugiat velit nec feugiat bibendum.</li>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                        </ul>
                        <a href="action_add_item.php">
                            <i class="fa fa-plus-circle"></i>Add Item</a>
                    </article>

                    <article>
                        <h4>To-Do List 3 Title</h4>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Etiam eget metus sit amet nisl maximus tristique cursus ut lorem.</li>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                            <li>Integer at eros in felis dictum semper ut consequat turpis.</li>
                        </ul>
                        <a href="action_add_item.php">
                            <i class="fa fa-plus-circle"></i>Add Item</a>
                    </article>

                    <a href="action_add_task.php">
                        <i class="fa fa-plus-circle"></i>Add To-Do List</a>
                </article>
            </div>
        </div>

        </main>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>

</html>