<?php
require_once '../includes/printListOfGames-inc.php';
?>
<!DOCTYPE hmtml>
<html>

    <head>
        <title>Serious Developers</title>
        <link rel="stylesheet" href="../style/global.css">
        <link rel="stylesheet" href="../style/mySells.css">
        <link rel="stylesheet" href="../style/bestSells.css">
    </head>
    
    <?php include_once 'navbar.php'?>

    <div class="container">
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

                <tbody>

                <?php  printListOfGamesOfCurrentUser();?>
                
                </tbody>
            </table>
        </div>
    </div>
    
        <script src = "../scripts/myPage.js"></script>
        <script src= "../scripts/sortTable.js"></script>
    </body>
    </html>