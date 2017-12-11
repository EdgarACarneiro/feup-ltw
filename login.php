<?php
include_once('includes/session.php');
checkUserSession();

include_once('templates/header.php');
include_once('includes/init.php');
?>
<script src="scripts/sign-in-up-switch.js"></script>

<body>
    
    <?php
        include_once('templates/nav-bar.php');
        anonymousNavBar();
    ?>

    <section class="main rnd-corners shadow-boxes" />
        <div class="sign-user">
            <div class="switch-btn btn">
               <input type="button" class="sign-in-btn" value="Sign-in" onclick="showSignIn()">
               <input type="button" class="sign-up-btn" value="Sign-up" onclick="showSignUp()"> 
            </div>

            <form action="action_login.php" method="post" id="sign-in">
                <fieldset>
                    <legend>LOG IN</legend>
                    USERNAME<input type="text" placeholder="Username" name="username" required>
                    PASSWORD<input type="password" placeholder="Password" name="password" required>
                    <input type="submit" value="SIGN-IN">
                </fieldset>
            </form>
        

            <form action="action_register.php" method="post" id="sign-up">
                <fieldset>
                    <legend>CREATE AN ACCOUNT</legend>
                    USERNAME<input type="text" placeholder="What should we call you?" name="username" required>
                    E-MAIL<input type="e-mail" placeholder="Your e-mail goes here" name="email" required>
                    PASSWORD<input type="password" placeholder="Secret password here!" name="password" required>
                    REPEAT YOUR PASSWORD<input type="password" placeholder="Do it again!" name="password_check" required>
                    <input type="submit" value="SIGN-UP">
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