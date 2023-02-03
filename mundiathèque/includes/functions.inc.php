<?php

//VERIFYING IF SIGN UP INPUTS ARE FULFILLED CORRECTLY
function emptyInputSignup($email,$username,$pwd,$pwdRepeat){
    $result;
    if( empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)  ) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//check username validity
function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Check email validity
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//check if password and its confirmation are the same
function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//check if the email or username already used
function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
    return $row;
    }
    else{
        $result = false;
        return $result;
    }
mysqli_stmt_close($stmt);
}

function uidExists_Admin($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
//Creating the user's account
function createUser($conn,$email,$username,$pwd,$typeUser ){
    $sql = "INSERT INTO users ( email, username, password, typeUser) VALUES ( ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "ssss",$email, $username, $hashedPwd, $typeUser);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
function createAdmin($conn,$email,$username,$pwd,$typeUser ){
    $sql = "INSERT INTO users ( email, username, password, typeUser) VALUES ( ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "ssss",$email, $username, $hashedPwd, $typeUser);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signupAdmin.php?error=none");
    exit();
}

//VERIFYING IF LOG IN INPUTS ARE FULFILLED CORRECTLY
function emptyInputLogin($username,$pwd){
    $result;
    if(empty($username) || empty($pwd)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Log In function
function loginUser($conn,$username,$pwd){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists == false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists['password'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["idUser"] = $uidExists['idUser'];
        $_SESSION["username"] = $uidExists['username'];
        $_SESSION["typeUser"] = $uidExists['typeUser'];
        header("location: ../home.php");
        exit();
    }
}

