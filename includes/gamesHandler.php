<?php
session_start();
require_once 'dbh-inc.php';

if(isset($_POST['submit'])){
    if(isset($_FILES['image'])){
        print_r($_FILES['image']); 

        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        $game_name = $_POST['game_name'];
        $game_price = $_POST['price'];
        $game_release = $_POST['release-year'];
        $game_type = $_POST['type'];

        if(empty($game_name) || empty($game_price) || empty($game_release) || empty($game_type)){
            $em = "Invalid input";
            header("Location: ../pages/mySells.php?error=$em");
        }

        else if (preg_match('/[^0-9.]+/', $game_price)) {
            $em = "Insert only number or dot for price";
            header("Location: ../pages/mySells.php?error=$em");
        }

        else if (preg_match('/[^0-9]+/', $game_year)) {
            $em = "Insert only number for year";
            header("Location: ../pages/mySells.php?error=$em");
        }

        else if (preg_match('/[^a-zA-Z]+/', $game_type)) {
            $em = "Insert only characters for type";
            header("Location: ../pages/mySells.php?error=$em");
        }
        else{
            $current_userID = $_SESSION["ID"];

            if($error === 0){  
                if($img_size > 5000000){
                    $em = "Image size too larger then 5Mb";
                    header("Location: ../pages/mySells.php?error=$em");
                }else{
                    $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_extension_local = strtolower($img_extension);

                    $allowd_extension = array("jpg", "jpeg", "png");

                    if(in_array($img_extension_local, $allowd_extension)){
                        $new_img_name = uniqid("IMG-", true).'.'.$img_extension_local;
                        $img_upload_path = '../uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        //insert into database
                        $sql = "INSERT INTO games(name, price, release_year, type, image, userID)
                        VALUES ('$game_name', '$game_price', '$game_release', '$game_type', '$new_img_name', '$current_userID')";

                        mysqli_query($connection, $sql);
                        header("Location: ../pages/mySells.php");

                    }else{
                        $em = "You can't upload this type of file";
                        header("Location: ../pages/mySells.php?error=$em");
                    }
                }
            }
            else{
                $em = "Unknown error occurred";
                header("Location: ../pages/mySells.php?error=$em");
            }
        }
    }
    else{
        $em = "No image submited..";
        header("location: ../pages/mySells.php?error=$em");
        exit();
    }
}
else{
    echo "not set submit button";
}