<?php
include_once('includes/session.php');
checkUserSession();
echo "User: " . $_SESSION['username'];

include_once('templates/header.php');
include_once('includes/init.php');
?>
<script src="scripts/sign-in-up-switch.js"></script>

<body>
    <nav id="top-bar" class="nav-bar">
        <ul>
            <!-- Centrar isto -->
            <li id="info">
                <img src="images/site/smallLogo.png" alt="The website logo">
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

    <section class="main rnd-corners shadow-boxes" />
        <div class="sign-user">
            <div class="switch-btn btn rnd-corners">
               <input type="button" class="sign-in-btn" value="Sign-in" onclick="showSignIn()">
               <input type="button" class="sign-up-btn" value="Sign-up" onclick="showSignUp()"> 
            </div>

            <form action="action_login.php" method="post" id="sign-in">
                <fieldset>
                    <legend>Log In</legend>
                    Username: <input type="text" placeholder="username" name="username">
                    Password: <input type="password" placeholder="password" name="password">
                    <input type="submit" value="Send">
                </fieldset>
            </form>
        

            <form action="action_register.php" method="post" id="sign-up">
                <fieldset>
                    <legend>Create an Account</legend>
                    Username: <input type="text" placeholder="username" name="username">
                    E-mail: <input type="text" placeholder="email" name="email">
                    Password: <input type="password" placeholder="password" name="password">
                    Repeat your Password: <input type="password" placeholder="password" name="password_check">
                    <input type="submit" value="Send">
                </fieldset>
            </form>
        </div>

        <div class="site-description">
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
        </div>
    </section>

    <footer>
        &copy; 2017 EzeeDo
    </footer>
</body>

</html>