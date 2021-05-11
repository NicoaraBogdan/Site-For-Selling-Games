<?php
function printListOfGamesOfCurrentUser(){
                    require_once 'dbh-inc.php';
                    $currentID = $_SESSION["ID"];
                    $sql = "SELECT * FROM games WHERE games.userID = $currentID";
                    $res = mysqli_query($connection, $sql);
                    
                    if(mysqli_num_rows($res) > 0){
                        while($game = mysqli_fetch_assoc($res)){ ?>
                            
                            <tr>
                                <td>
                                    <img src="../uploads/<?=$game['image']?>" alt="" class="table-img">
                                    <div class="img-name-popup"><?php echo $game['name']?></div>
                                </td>

                                <td>
                                    <?php echo $game['name']?>
                                </td>

                                <td>
                                    <?php echo $game['price']?>
                                </td>

                                <td>
                                    <?php echo $game['release_year']?>
                                </td>
                            </tr>
            <?php   
                        }
                    } 
                    else{
                        $em = "No games to display";
                        if($_SESSION["type"] == "vendor" && empty($_GET["error"])){
                            header("location: ../pages/mySells.php?error=$em");
                            exit();
                        }
                        else if($_SESSION["type"] == "buyer" && empty($_GET["error"])){
                            header("location: ../pages/myGames.php?error=$em");
                            exit();
                        }
                        else{exit();}
                    }
}

function getAllGames(){
    require 'dbh-inc.php';
    $sql = "SELECT * from games";
    $result = mysqli_query($connection, $sql);

    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
}

function printAllGames(){
    require 'dbh-inc.php';
    mysqli_stmt_init($connection);
    if(!isset($_SESSION['games_to_print'])){
        $games_to_print = getAllGames();
    }
    else{
        $games_to_print = $_SESSION['games_to_print'];
    }
    
    if(count($games_to_print) < 1 && empty($_GET["error"])){
        $em = "No games to display;";
        header("location: ../pages/home.php?error=$em");
        exit();
    
    }else if(count($games_to_print) < 1) {
        exit();
    }
    
    else{
        $i = 0;
        while($i < count($games_to_print)){ 
            $game = $games_to_print[$i];?>
            <div id = "game">
                <div class = "game-details">
                    <a href="review.php">
                        <img class = "pick" src="../uploads/<?=$game['image']?>" alt="Image For The Game">
                    </a>
                </div>

                <div class = "game-details game-details-separator">   
                    <span class="game-details-text">Price : <?php echo $game['price'] ?>$</span>
                    <input class="Add-to-cart-btn" type="submit" name = "add-to-cart" value = "Add to cart..">
                </div>

                <div class = "game-details">
                    <span class="game-details-text"><?php echo $game['name'] ?></span>
                </div>
            </div>
<?php   $i++;
        }
    }
}
?>

<?php
function GetTypesDB(){
    require 'dbh-inc.php';
    print_r($connection);
    $sql = "SELECT type from games";
    $res = mysqli_query($connection, $sql);
    $types = array();
    while($game = mysqli_fetch_assoc($res)){
        if(!in_array($game['type'], $types)){ 
            array_push($types, $game['type']);?>
            <option value = "<?php echo $game['type'] ?>"><?php echo $game['type']?></option>
<?php
        }
    }
}
?>                  