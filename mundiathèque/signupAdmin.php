<?php
include_once "header.php";
include_once "navbar.php";
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
        <div class="login-login"><span><a class="login-form-text">ADD ADMIN</a></span></div>
        <form class="form-login" action="includes/signupAdmin.inc.php" method="post">
            <div class="login-input">
                <input
                        type="text"
                        name="uid"
                        id="userName"
                        placeholder="Username..."
                />
                <input
                        type="text"
                        name="email"
                        id="userName"
                        placeholder="Email..."
                />
                <input
                        type="password"
                        name="pwd"
                        id="userName"
                        placeholder="Password..."
                />
                <input
                        type="password"
                        name="pwdrepeat"
                        id="userName"
                        placeholder="Confirm Password..."
                />

            </div>
            <button style="transform: translateX(230px) translateY(-10px)" class="btn btn-login" name="submit-signup_admin">ADD</button>
    </div>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p style='position: absolute; transform: translateY(200px) translateX(450px)' class='form-alert'>Fill in all fields!</p>";
        } else if ($_GET["error"] == "invaliduid") {
            echo "<p style='position: absolute; transform: translateY(200px) translateX(450px)' class='form-alert'>choose a proper username!</p>";
        } else if ($_GET["error"] == "invalidemail") {
            echo "<p style='position: absolute; transform: translateY(200px) translateX(450px)' class='form-alert'>choose a proper email!</p>";
        } else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p style='position: absolute; transform: translateY(200px) translateX(450px)' class='form-alert'>Passwords don't match!</p>";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "<p style='position: absolute; transform: translateY(200px) translateX(450px)' class='form-alert'>Something went wrong! Try again.</p>";
        } else if ($_GET["error"] == "usernametaken") {
            echo "<p style='position: absolute; transform: translateY(200px) translateX(450px)' class='form-alert'>Username already taken</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p style='position: absolute; transform: translateY(200px) translateX(450px)' class='form-alert'>Admin added</p>";
        }
    }
    ?>

</section>

<!-- END LOGIN -->
</body>

</html>
