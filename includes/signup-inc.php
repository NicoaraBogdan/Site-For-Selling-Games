<?php

if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdr = $_POST["pwdr"];
    $user_type = $_POST['usertype'];

    require_once 'dbh-inc.php';
    require_once 'validateInput-inc.php';

    if(!isset($_POST['agree'])){
        header("location: ../pages/index.php?error=agree");
        exit();
    }

    if(validInput($name, $email, $pwd, $pwdr)){
        header("location: ../pages/index.php?error=invalidinput");
        exit();
    }


    if(userExists($connection, $email) !== false){
        header("location: ../pages/index.php?error=userexists");
        exit();
    }

    createUser($connection, $name, $email, $pwd, $user_type);

}

else{
    header("location: ../pages/index.php");
}