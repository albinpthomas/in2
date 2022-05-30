<?php
session_start();
include "./include/dbconnect.php";
$userId = $_SESSION['userId'];
//bussiness register
if (isset($_POST['likeButton'])) {
    $saveAd = $_POST['likeButton'];
    $insertAd = "INSERT INTO `tbl_save`(`user_id`, `items_id`) VALUES 
    ('$userId','$saveAd')";
    mysqli_query($connect, $insertAd);
    header("Location: ./home.php");
    die();
}


if (isset($_POST['unlikeButton'])) {
    $saveId = $_POST['unlikeButton'];
    $deleteSaved = "DELETE FROM `tbl_save` WHERE `save_id`='$saveId'";
    mysqli_query($connect, $deleteSaved);
    header("Location: ./home.php");
    die();
}
