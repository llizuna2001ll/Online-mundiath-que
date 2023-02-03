<?php

if(isset($_POST["submit-signup"])){

$email = $_POST["email"];
$domainCheck = explode("@", $email);
$username = $_POST["uid"];
$pwd = $_POST["pwd"];
$pwdRepeat = $_POST["pwdrepeat"];
$typeUser = $_POST['typeUser'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

    if(emptyInputSignup($email,$username,$pwd,$pwdRepeat) !== false || ($typeUser != 'student' && $typeUser != 'professor' ) ){
    header("location: ../signup.php?error=emptyinput");
    exit();
    }
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if($domainCheck[1] != 'mundiapolis.ma'){
        header("location: ../signup.php?error=invaliddomain");
        exit();
    }
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists_Admin($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    createUser($conn,$email,$username,$pwd,$typeUser );

}

else {
    header("location: ../signup.php");
    exit();
}


