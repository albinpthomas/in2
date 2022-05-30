<?php
include "./include/dbconnect.php";
if (isset($_POST['Url'])) {
    $carbrand = $_POST['Url'];

    $query1 = "SELECT company_id FROM car_company where company_name='$carbrand'";
    $result1 = mysqli_query($connect, $query1);
    $row = mysqli_fetch_array($result1);
    $id = $row['company_id'];
    $query = "SELECT * FROM car_category where company_id = '$id' ";
    $result = mysqli_query($connect, $query);
    echo "<option value='0' class='vechicle'>--- Choose a Car ---</option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=". $row['car_details'] ." class='vechicle'>" . $row['car_details'] . "</option>";
    }
}
