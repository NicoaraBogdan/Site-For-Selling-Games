<!DOCTYPE hmtml>
<html>

    <head>
        <title>Serious Developers</title>
        <link rel="stylesheet" href="../style/global.css">
        <link rel="stylesheet" href="../style/home.css">
    </head>
    
<?php

    require_once 'navbar.php';
    require_once '../includes/printListOfGames-inc.php';
    require_once '../includes/search-inc.php';
?>
        <div class="content">
            <form action="../includes/search-inc.php" method="get" id = "filters">
                <div id="filter-item">
                    <span>Game type:</span> 
                    <select name="type">
                        <option value = "none">all</option>
                        <?php GetTypesDB()?>
                    </select>
                    <span class="custom-arrow"></span>
                </div>

                <div id="filter-item">
                    <span>Price:</span>
                    <input name="price-low"id="low_price" type="number" size="10"> - 
                    <input name="price-high"id="high_price" type="number" size="10">
                </div>

                <div id="filter-item">
                    <span> Release year:</span>
                    <input name="release" id = "realse_year" type="number" size="5" max="2021" min="1900   ">
                </div> 
                <button type="submit-search" name="submit">Search</button>
            </form>

            <br><br>
            <div class = "list-of-games">
            <?php 
                printAllGames();
            ?>    
            </div> 
        </div>

        <div class= "error">
        <?php
            if(isset($_GET['error'])): ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php endif ?> 
        </div>
    </body>
</html>