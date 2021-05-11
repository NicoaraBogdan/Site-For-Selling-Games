<?php

$server_name = "localhost";
$db_user_name = "root";
$db_pw_name = "";
$db_name = "Emag2.0";

$connection = mysqli_connect($server_name, $db_user_name, $db_pw_name, $db_name);

if(!$connection){
    die("Conncetion failed: " . mysqli_connect_error());
}