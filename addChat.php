<?php
session_start();
include "./include/dbconnect.php";
extract($_POST);
//add chat to database
$user_id = $_SESSION['userId'];
$s = "SELECT name FROM tbl_user WHERE user_id = '$user_id'";
$res = mysqli_query($connect, $s);
$r = mysqli_fetch_assoc($res);
$senderName = $r['name'];
$sql = "INSERT INTO `tbl_chats`(`sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `chat_text`) VALUES ('$user_id','$senderName','$chatUserId','$chatUserName','$chatInput')";
$result = mysqli_query($connect, $sql);
$chat = mysqli_insert_id($connect);
$sql2 = "SELECT date_time FROM `tbl_chats` WHERE chat_id = '$chat'";
$result2 = mysqli_query($connect, $sql2);
$row = mysqli_fetch_assoc($result2);
$dateTime = $row['date_time'];
if($result){
    echo '
                        <div class="media w-50 ml-auto mb-3">
                            <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                ' . $chatInput . '
                                </div>
                                <p class="small text-muted">' . $dateTime . '</p>
                            </div>
                        </div>
                        ';
}else{
    echo "failed";
}
?>