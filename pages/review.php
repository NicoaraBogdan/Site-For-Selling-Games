<!DOCTYPE hmtml>
<html>

    <head>
        <title>Serious Developers</title>
        <link rel="stylesheet" href="../style/global.css">
        <link rel="stylesheet" href="../style/review.css">
    </head>
    

<?php

    include_once 'navbar.php'

?>

        <div class="content">
            <div class ="top">
                <div class="name-rating">
                    <div class="name"> <strong> Grand Theft Auto </strong></div>
                    <div class="rating"> Rate: 5/5 </div>
                </div>

                <div class="game-photo">
                    <img src="../images/random.jpg" alt="Game Profile Pic" height="350">
                </div>
            </div>

            <div class="slider-container">
                <div>
                    <ul class="slides">
                    <li id="slide1"><img src="../images/random.jpg" alt="" /></li>
                    <li id="slide2"><img src="../images/gta1.jpeg" alt="" /></li>
                    <li id="slide3"><img src="../images/gta2.jpeg" alt="" /></li>
                    <li id="slide4"><img src="../images/gta3.pjeg.jpg" alt="" /></li>
                    <li id="slide5"><img src="../images/gta4.jpeg" alt="" /></li>
                    </ul>
                </div>

                <div>
                    <ul class="thumbnails">
                    <li>
                        <a href="#slide1"><img src="../images/random.jpg" /></a>
                    </li>
                    <li>
                        <a href="#slide2"><img src="../images/gta1.jpeg" /></a>
                    </li>
                    <li>
                        <a href="#slide3"><img src="../images/gta2.jpeg" /></a>
                    </li>
                    <li>
                        <a href="#slide4"><img src="../images/gta3.pjeg.jpg" /></a>
                    </li>
                    <li>
                        <a href="#slide5"><img src="../images/gta4.jpeg" /></a>
                    </li>
                    </ul>
                </div>
            </div>


            <div id="comment-section">
                <fieldset>
                    <img src="../images/user.png" alt="User photo" width="60" height="60">
                    <textarea name="comment" id="comment" cols="150" rows="3" readonly="readonly"></textarea>
                    <input type="file" name = "upload_file" multiple = "multiple">
                    <input type="submit" name="post_comment" value = "POST">
                </fieldset>
            </div>

          
        </div>

    </body>
</html>