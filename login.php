<?php
include_once('includes/session.php');
checkUserSession();

include_once('templates/header.php');
headerLogin();
include_once('includes/init.php');
?>

<body>
    
    <?php
        include_once('templates/nav-bar.php');
        anonymousNavBar();
    ?>

    <section class="main rnd-corners shadow-boxes" />
        <div class="sign-user">
            <div class="switch-btn btn">
               <input type="button" class="sign-in-btn" value="Sign-in">
               <input type="button" class="sign-up-btn" value="Sign-up"> 
            </div>

            <form action="action_login.php" method="post" id="sign-in">
                <fieldset>
                    <legend>LOG IN</legend>
                    USERNAME
                    <input
                        type="text"
                        placeholder="Username"
                        name="username"
                        pattern="[a-zA-Z0-9]{4,}"
                        title="Username should contain 4 or more letters/numbers."
                        required>
                    PASSWORD
                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        pattern=".{4,}"
                        title="Password should contain 4 or more characters."
                        required>
                    <input type="submit" value="SIGN-IN">
                </fieldset>
            </form>
        

            <form action="action_register.php" method="post" id="sign-up">
                <fieldset>
                    <legend>CREATE AN ACCOUNT</legend>
                    USERNAME
                    <input
                        type="text"
                        placeholder="What should we call you?"
                        name="username"
                        pattern="[a-zA-Z0-9]{4,}"
                        title="Username should contain 4 or more letters/numbers."
                        required>
                    E-MAIL
                    <input
                        type="email"
                        placeholder="Your e-mail goes here"
                        name="email"
                        title="Please use a valid email address."
                        required>
                    PASSWORD
                    <input
                        type="password"
                        placeholder="Secret password here!"
                        name="password"
                        pattern=".{4,}"
                        title="Password should contain 4 or more characters."
                        required>
                    REPEAT YOUR PASSWORD
                    <input
                        type="password"
                        placeholder="Do it again!"
                        name="password_check"
                        pattern=".{4,}"
                        title="Password should contain 4 or more characters and match the previous password."
                        required>
                    <input type="submit" value="SIGN-UP">
                </fieldset>
            </form>
        </div>

        <div class="site-description">
            <p>
                <h3>
                    Ezee Plan.<br>
                    Ezee Do.<br>
                    Ezee Accomplish.
                </h3><h4>
                    EzeeDo is a management platform with the objective of
                    making it easier for you to excel. From planning your shopping list
                    to managing your big next project, EzeeDo helps you in all.
                </h4> 
            </p>
        </div>
    </section>

<?php include_once('templates/footer.php') ?>