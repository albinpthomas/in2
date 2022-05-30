<?php
session_start();
include "./include/dbconnect.php";
$uid = $_SESSION['userId'];
extract($_POST);
if(isset($_POST['changePassBtn'])){
    if(!empty($_POST['oldPass']) && !empty($_POST['newPass']) && !empty($_POST['confirmPass'])){
        $oldPass = md5($oldPass);
        $newPass = md5($newPass);
        $confirmPass = md5($confirmPass);
        $checkOldPass = "SELECT * FROM `tbl_user` WHERE `user_id`='$uid' and `password`='$oldPass'";
        $checkOldPassResult = mysqli_query($connect, $checkOldPass);
        $checkOldPassCount = mysqli_num_rows($checkOldPassResult);
        if($checkOldPassCount == 1){
            if($newPass == $confirmPass){
                $updatePass = "UPDATE `tbl_user` SET `password`='$newPass' WHERE `user_id`='$uid'";
                $updatePassResult = mysqli_query($connect, $updatePass);
                $_SESSION['profileUpdateMsg'] = 'Password Updated Successfully';
                $_SESSION['profileUpdateMsgHeading'] = 'Success';
                
                header('location:./manageProfile.php');
                die();
            }else{
                $_SESSION['profileUpdateMsg'] = "New Password and Confirm Password does not match";
                $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
                header('location:./manageProfile.php');
                die();
            }
        }else{
            $_SESSION['profileUpdateMsg'] = "Old Password does not match";
            $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
            header('location:./manageProfile.php');
            die();
        }
    
    }else{
        $_SESSION['profileUpdateMsg'] = "Please fill all the fields";
        $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
        header('location:./manageProfile.php');
        die();
    }
}
    
// header("Location: ../manageProfile.php");

?>