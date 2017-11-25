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

    <aside class="sidebar-calendar">
        <section class="calendar-widget">
            <div class="header">
                <i class="fa fa-angle-left" aria-hidden="true" id="prev" onclick="prevMonth()"></i>
                <div>
                    <p class="year" id="label-year">2017</p>
                    <p class="month" id="label-month">November</p>
                </div>
                <i class="fa fa-angle-right" aria-hidden="true" id="next" onclick="nextMonth()"></i>
            </div>
            <table id="cal-frame">
                <tr id="days-of-week">
                    <th>SUN</th>
                    <th>MON</th>
                    <th>TUE</th>
                    <th>WED</th>
                    <th>THU</th>
                    <th>FRI</th>
                    <th>SAT</th>
                </tr>
                <tr>
                    <td>
                        <p id="0"></p>
                    </td>
                    <td>
                        <p id="1"></p>
                    </td>
                    <td>
                        <p id="2"></p>
                    </td>
                    <td>
                        <p id="3"></p>
                    </td>
                    <td>
                        <p id="4"></p>
                    </td>
                    <td>
                        <p id="5"></p>
                    </td>
                    <td>
                        <p id="6"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="7"></p>
                    </td>
                    <td>
                        <p id="8"></p>
                    </td>
                    <td>
                        <p id="9"></p>
                    </td>
                    <td>
                        <p id="10"></p>
                    </td>
                    <td>
                        <p id="11"></p>
                    </td>
                    <td>
                        <p id="12"></p>
                    </td>
                    <td>
                        <p id="13"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="14"></p>
                    </td>
                    <td>
                        <p id="15"></p>
                    </td>
                    <td>
                        <p id="16"></p>
                    </td>
                    <td>
                        <p id="17"></p>
                    </td>
                    <td>
                        <p id="18"></p>
                    </td>
                    <td>
                        <p id="19"></p>
                    </td>
                    <td>
                        <p id="20"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="21"></p>
                    </td>
                    <td>
                        <p id="22"></p>
                    </td>
                    <td>
                        <p id="23"></p>
                    </td>
                    <td>
                        <p id="24"></p>
                    </td>
                    <td>
                        <p id="25"></p>
                    </td>
                    <td>
                        <p id="26"></p>
                    </td>
                    <td>
                        <p id="27"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="28"></p>
                    </td>
                    <td>
                        <p id="29"></p>
                    </td>
                    <td>
                        <p id="30"></p>
                    </td>
                    <td>
                        <p id="31"></p>
                    </td>
                    <td>
                        <p id="32"></p>
                    </td>
                    <td>
                        <p id="33"></p>
                    </td>
                    <td>
                        <p id="34"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="35"></p>
                    </td>
                    <td>
                        <p id="36"></p>
                    </td>
                    <td>
                        <p id="37"></p>
                    </td>
                    <td>
                        <p id="38"></p>
                    </td>
                    <td>
                        <p id="39"></p>
                    </td>
                    <td>
                        <p id="40"></p>
                    </td>
                    <td>
                        <p id="41"></p>
                    </td>
                </tr>
            </table>
        </section>
    </aside>

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