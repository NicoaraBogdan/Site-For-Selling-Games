<?php
require_once '../includes/printListOfGames-inc.php'
?>
<!DOCTYPE hmtml>
<html>

    <head>
        <title>Serious Developers</title>
        <link rel="stylesheet" href="../style/global.css">
        <link rel="stylesheet" href="../style/mySells.css">
        <link rel="stylesheet" href="../style/bestSells.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var gamesToLoad = 2;
                $("#btn-load").click(function(){
                    gamesToLoad = gamesToLoad + 2;
                    $("#load").load("../includes/ajaxload-inc.php", {
                        limit: gamesToLoad
                    });
                });
            });
        </script>
    </head>
    
    <?php include_once 'navbar.php'?>

    <div class="container">
        <div class="upload-game">
            <form action="../includes/gamesHandler.php" method="POST" enctype="multipart/form-data" class ="upload-form">
                <input type="text" name="game_name" class = "upload-game-field" placeholder="name" required>
                <input type="text" name="price" class = "upload-game-field" placeholder="price" required>
                <input type="text" name="release-year" class = "upload-game-field" placeholder="release year" required>
                <input type="text" name="type" class = "upload-game-field" placeholder="type" required>
                <input type="file" name="image" class = "upload-game-field" placeholder="image" required>
                <button type="submit" name="submit">Upload</button>
            </form> 
        </div>

        <div class="error">
        <?php
            if(isset($_GET['error'])): ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php endif ?> 
        </div>

        <div class="table-container">
            <table class = "table table-sortable">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Release year</th>
                    </tr>
                </thead>

                <tbody id="load">

                <!-- <?php printListOfGamesOfCurrentUser(); ?> -->

                    
                </tbody>
            </table>

        </div>
        
        <button id="btn-load">Load more games...</button>
    </div>
    
        <script src = "../scripts/myPage.js"></script>
        <script src= "../scripts/sortTable.js"></script>
    </body>
    </html>