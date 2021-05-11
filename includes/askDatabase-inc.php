<?php

function askDB($low, $high, $year, $type){
    require 'dbh-inc.php';

    if($type !== "none"){
        $sql = "SELECT * FROM games WHERE games.type = ? AND games.price between ? and ? and games.release_year > ?;";
    }
    else{
        $sql = "SELECT * FROM games WHERE games.price > ? and games.price < ? and games.release_year > ?;";
    }

    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../pages/home.php?error=stmtfailed");
        exit();
    }
    
    if($type !== "none")
        mysqli_stmt_bind_param($stmt, "siii", $type, $low, $high, $year);
    else
        mysqli_stmt_bind_param($stmt, "iii", $low, $high, $year);        

    mysqli_stmt_execute($stmt);
    
    $result =  mysqli_stmt_get_result($stmt);

    $rows = [];

    while($row = mysqli_fetch_array($result))
    {
        $rows[] = $row;
    }

    session_start();
    $_SESSION['games_to_print'] = $rows;

    mysqli_stmt_close($stmt);
    header("location: ../pages/home.php");
}