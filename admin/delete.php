<?php
include '../include/dbconnect.php';
if(isset($_POST['deleteItem']))
{
    extract($_POST);
    $sqlq="DELETE from car_category where car_id='$deleteItem'";
    if(mysqli_query($connect,$sqlq))
    {
        header("Location: ./Car-category.php");
    }

}


?>