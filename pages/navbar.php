    <?php

    session_start();
    
    ?>
    
    
    <body>
        <header>
        </header>
        
        <nav class ="nav">
            <div class = "items">
                <a class = "nav-link" href="home.php">HOME</a>
            </div> 
            
            <div class = "items"> 
            <?php
                
                if(isset($_SESSION["type"])){
                    if($_SESSION["type"] === "vendor")
                        echo '<a class = "nav-link" href="mySells.php">MY SELLS</a>';
                    else
                        echo '<a class = "nav-link" href="myGames.php">MY GAMES</a>';
                }
                
                ?> 
            </div> 

            <div class = "items">
                <a class = "nav-link" href="bestSells.php">BEST SELLERS</a>
            </div>   

            <div class = "items">
            <?php
                if ($_SESSION["type"] === "buyer"){
                    echo '
                    <div class = "nav-link">
                        <div class="random-text">MORE</div>
                        <ul class = "nav-link-submenu">

                            <li class="nav-link-submenu-item">
                                <a href="myCart.php" class="submenu-link">My Cart</a>
                            </li>

                            <li class="nav-link-submenu-item">
                                <a href="index.php" class="submenu-link">Log out</a>
                            </li>
                        </ul>
                    </div>';
                }
                else {
                    echo '
                    <div class = "items">
                        <a class = "nav-link" href="index.php">LOG OUT</a>
                    </div>';
                }
            
            ?>
            </div>  
        </nav>

        