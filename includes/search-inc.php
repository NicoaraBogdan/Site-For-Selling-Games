<?php
    require 'askDatabase-inc.php';

    if(isset($_GET['submit'])){
    //CHECKING SEARCH PARAMETERS
    $low = -1;
    $high = 9999;
    $year = -1;
    $type = $_GET['type'];

    if(!empty($_GET['price-low'])){
        $low = $_GET['price-low'];
    }
    
    if(!empty($_GET['price-high']))
        $high = $_GET['price-high'];

    if(!empty($_GET['release']))
        $year = $_GET['release'];

    
    askDB($low, $high, $year, $type);
}

?>