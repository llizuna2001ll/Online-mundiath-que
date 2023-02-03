<?php


if (isset($_POST["submit-signup_admin"])) {

    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $typeUser = "admin";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($email, $username, $pwd, $pwdRepeat) !== false || ($typeUser != 'admin')) {
        header("location: ../signupAdmin.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signupAdmin.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signupAdmin.php?error=invalidemail");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signupAdmin.php?error=emptyinput");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signupAdmin.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signupAdmin.php?error=usernametaken");
        exit();
    }
    createAdmin($conn, $email, $username, $pwd, $typeUser);

} else {
    header("location: ../signupAdmin.php");
    exit();
}

