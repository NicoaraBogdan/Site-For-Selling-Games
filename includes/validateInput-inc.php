<?php

function validInput($name, $email, $pwd, $pwdr){
    $is_valid = true;

    if(empty($name) || empty($email) || empty($pwd) || empty($pwrd)){
        $is_valid = false;
    }

    if(!preg_match("/^[a-zA-Z]/", $name) || ctype_alnum($name)){
        $is_valid = false;
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $is_valid = false;
    }

    if($pwd !== $pwdr){
        $is_valid = false;
    }

    return $is_valid;
}

function validateLogin($connection, $email, $pwd){
    $user = userExists($connection, $email);

    if($user == false){
        header("location: ../pages/index.php?error=nouser");
        exit();
    }

    $pwd_hashed = $user["pwd"];
    $pwd_matched = password_verify($pwd, $pwd_hashed);

    if($pwd_matched !== true){
        header("location: ../pages/index.php?error=loginfailed");
        exit();
    }
    
    else if($pwd_matched === true){
        session_start();
        $_SESSION["type"] = $user["type"];
        $_SESSION["ID"] = $user["ID"];
        header("location: ../pages/home.php");
        exit(); 
    }
}

function userExists($connection, $email){
    $sql = "SELECT * from users WHERE email = ?;";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    else
        return false;
}

function createUser($connection, $name, $email, $pwd, $type){
    $sql = "INSERT INTO users (name, email, pwd, type) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/index.php?error=stmtfailed");
        exit();
    }

    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashed_pwd, $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/index.php?error=none");
    exit();
}

function test(){
    if(!isset($GLOBALS['games_to_print'])){
        echo "not set";
    }
    else {
        echo "set";
    }
}