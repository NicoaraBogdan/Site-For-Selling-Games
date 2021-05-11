<?php

if(isset($_REQUEST['submit'])){

    $email = $_REQUEST["email"];
    $pwd = $_REQUEST["pwd"];
  
    require_once 'dbh-inc.php';
    require_once 'validateInput-inc.php';
    
    validateLogin($connection, $email, $pwd);
}

else{
    header("location: ../pages/index.php?error=nosubmit");
    exit();
}
