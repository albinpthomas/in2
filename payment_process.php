<?php
session_start();
include "./include/dbconnect.php";
if (isset($_POST['amt']) && isset($_POST['name'])) {
    $amt = $_POST['amt'];
    $name = $_POST['name'];
    $carName = $_POST['carName'];
    $payment_status = "pending";
    $added_on = date('Y-m-d h:i:s');
    $sql = "insert into payment(name,amount,car_name,payment_status,added_on) values ('$name','$amt','$carName','$payment_status','$added_on')";
    mysqli_query($connect, $sql);
    $_SESSION['OID'] = mysqli_insert_id($connect);
} else {
    echo mysqli_errno($connect);
}


if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    mysqli_query($connect, "update payment set payment_status='complete',payment_id='$payment_id' where id='" . $_SESSION['OID'] . "'");
} else {
}
