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
            <!-- Centrar isto -->
            <li id="info">
                <img src="logo" alt="The website logo">
                <h1><a href="index.php">EzeeDo</a></h1>
            </li>
            <!-- Nao dar display a estes dois aqui -->
            <li id="search">
                <i class="fa fa-search"></i>
                <input type="text" id="search-bar" placeholder="Search" name="search">
            </li>
            <li id="user">
                <a href="index.php"><i class="fa fa-rss"></i></a>
                <a href="profile.php"><i class="fa fa-user-circle"></i></a>
                <input type="checkbox" id="more">
                <label class="more" for="more"></label>
            </li>
        </ul>
    </nav>

    <section class="sign-user">
        <form action="logIn.php" method="post" id="sign-in">
            <fieldset>
                <legend>Log In:</legend>
                E-mail: <input type="text" name="email">
                Password: <input type="password" name="password">
                <input type="submit" value="Send">
            </fieldset>
        </form>

        <form action="registerUser.php" method="post" id="sign-up">
            <fieldset>
                <legend>Create an Account:</legend>
                Username: <input type="text" name="username">
                E-mail: <input type="text" name="email">
                Password: <input type="password" name="password">
                Repeat your Password: <input type="password" name="password-check">
                <input type="submit" value="Send">
            </fieldset>
        </form>
    </section>

    <section id="site-description">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut libero tincidunt, pharetra libero a, molestie felis. 
            Etiam vehicula lacus vel imperdiet sagittis. Curabitur accumsan a lacus sed accumsan. 
            Nulla nulla justo, bibendum sit amet aliquet faucibus, fringilla vel ex. 
            Sed ac lacus sed sapien euismod tempus sit amet ac purus. 
            Mauris ac sapien efficitur, tristique velit ut, semper lectus. 
            Proin et congue ipsum. Vestibulum faucibus ex egestas, malesuada augue nec, vehicula purus. 
            Sed et risus sit amet lectus rhoncus consequat. Nam sagittis sapien risus, vitae vestibulum risus bibendum quis. 
            Aenean faucibus vulputate suscipit. Vivamus eleifend vel leo varius molestie. Donec semper nisl quis volutpat mollis.
        </p>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>
</body>

</html>