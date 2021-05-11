<!DOCTYPE hmtml>
<html>

    <head>
        <title>Serious Developers</title>
        <link rel="stylesheet" href="../style/global.css">
        <link rel="stylesheet" href="../style/bestSells.css">
    </head>
    

<?php

    include_once 'navbar.php'

?>

        <div class="table-container">
            <table class = "table table-sortable">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Number of sales</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="../images/gta2.jpeg" alt="" class="table-img">
                            <div class="img-name-popup">Some descripriton</div>
                        </td>
                        <td>Grand Theft Auto</td>
                        <td>9999$</td>
                        <td>1000</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>
                            <img src="../images/gta2.jpeg" alt="" class="table-img">
                            <div class="img-name-popup">Some descripriton</div>
                        </td>
                        <td>Hitman</td>
                        <td>99$</td>
                        <td>18000</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>
                            <img src="../images/gta2.jpeg" alt="" class="table-img">
                            <div class="img-name-popup">Some descripriton</div>
                        </td>
                        <td>DOOM</td>
                        <td>999$</td>
                        <td>1500</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>
                            <img src="../images/gta2.jpeg" alt="" class="table-img">
                            <div class="img-name-popup">Some descripriton</div>
                        </td>
                        <td>Call of Duty</td>
                        <td>500$</td>
                        <td>2000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script src="../scripts/sortTable.js"></script>
    </body>
</html>