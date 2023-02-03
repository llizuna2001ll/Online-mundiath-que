<?php
include_once "header.php";
?>
<body>
<!-- START LOGIN -->
<section class="login">
    <div class="login-logo">
        <div class="login-logo-div"><img src="images/mundiapolis.png" alt="mundiapolis" class="img"/></div>
        <div class="login-text-div">
            <h2 class="login-text">Welcome</h2>
            <h2 class="login-text">To your online Library</h2>
        </div>
    </div>
    <div class="login-form">
        <div class="login-login"><span><a class="login-form-text" href="login.php">Sign in</a></span> <span> <a class="login-form-text" href="signup.php">/Sign up</a></span></div>
        <form class="form-login" action="includes/login.inc.php" method="post">
        <div class="login-input">
            <input
                type="text"
                name="uid"
                id="userName"
                placeholder="Username"
            />
            <br>
            <input
                type="password"
                name="pwd"
                id="password"
                placeholder="Password"
            />
            <?php
            if(isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p class='form-alert'>Fill in all fields!</p>";
                } else if ($_GET["error"] == "wronglogin") {
                    echo "<p class='form-alert'>Invalid username or password!</p>";
                }
            }
            ?>
        </div>
        <div class="password-div"><br><a href="#" class="login-pasword">Forgot password?</a></div>
        <button class="btn btn-login" name="submit-login">Login</button>
    </div>
    </form>

</section>

<!-- END LOGIN -->
</body>

</html>

