<?php
require_once 'dbh-inc.php';
session_start();
$limit = $_POST['limit'];
echo $limit;
$currentID = $_SESSION["ID"];
$sql = "SELECT * FROM games WHERE games.userID = $currentID LIMIT $limit";
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