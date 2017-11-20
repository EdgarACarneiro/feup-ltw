<!DOCTYPE html>
<html lang="en">

<head>
    <META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="en-US">
    <META charset="UTF-8">
    <META NAME="KEYWORDS" CONTENT="todo, to-do, list, todolist, to-dolist, to-do-list, todo-list, job, group, school, ltw, feup">
    <META NAME="viewport" CONTENT="width=device-width, initial-scale=1">
    <title>EzeeDo</title>
    <!-- Slogan p pagina principal: Ezee Plan. Ezee Do. Ezee Acomplish. -->
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/fonts.css" rel="stylesheet">
</head>

<body>
    <nav id="top-bar" class="nav-bar">
        <ul>
            <li id="info">
                <img src="logo" alt="The website logo">
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
    <main>
        <div class="btn-bar">
            <div class="btn btn-group">
                <a href="projects.php">Projects</a>
                <a href="addProject.php">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
            <div class="btn btn-group">
                <a href="todoLists.php">To-Do Lists</a>
                <a href="addToDo.php">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
        </div>

        <section class="feed-container masonry" id="feed">
            <div class="masonry-item">
                <article>
                    <h2>Project Title</h2>
                    <article>
                        <h4>To-Do List 1 Title</h4>
                        <ul>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                            <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                        </ul>
                        <a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
                    </article>
                    <article>
                        <h4>To-Do List 2 Title</h4>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Ut feugiat velit nec feugiat bibendum.</li>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                        </ul>
                        <a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
                    </article>
                    <a href="addToDo.php"><span class="fa fa-plus-circle">Add To-Do List</a>
                </article>
            </div>

            <div class="masonry-item">
                <article>
                    <h2>To-Do List Title</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Ut feugiat velit nec feugiat bibendum.</li>
                        <li>Fusce venenatis enim sed erat congue laoreet.</li>
                        <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                    </ul>
                    <a href="addItem.php"><span class="fa fa-plus-circle">Add Item</span></a>
                </article>
            </div>

            <div class="masonry-item">
                <article>
                    <h2>To-Do List Title</h2>
                    <ul>
                        <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                    </ul>
                    <a href="addItem.php"><span class="fa fa-plus-circle">Add Item</span></a>
                </article>
            </div>

            <div class="masonry-item">
                <article>
                    <h2>Project Title</h2>
                    <article>
                        <h4>To-Do List 1 Title</h4>
                        <ul>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                            <li>Ut mollis augue ac sem fringilla, et molestie sapien laoreet.</li>
                            <li>Aliquam rutrum nisi non maximus sagittis.</li>
                            <li>Quisque tempor massa id arcu ullamcorper, vitae efficitur odio facilisis.</li>
                        </ul>
                        <a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
                    </article>

                    <article>
                        <h4>To-Do List 2 Title</h4>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Ut feugiat velit nec feugiat bibendum.</li>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                        </ul>
                        <a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
                    </article>

                    <article>
                        <h4>To-Do List 3 Title</h4>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Etiam eget metus sit amet nisl maximus tristique cursus ut lorem.</li>
                            <li>Fusce venenatis enim sed erat congue laoreet.</li>
                            <li>Integer at eros in felis dictum semper ut consequat turpis.</li>
                        </ul>
                        <a href="addItem.php"><span class="fa fa-plus-circle">Add Item</a>
                    </article>

                    <a href="addToDo.php"><span class="fa fa-plus-circle">Add To-Do List</a>
                </article>
            </div>
        </section>

    </main>

    <footer>
        &copy; 2017 EzeeDo
    </footer>

</body>

</html>