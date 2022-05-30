<?php
include '../include/dbconnect.php';
if(isset($_POST['deleteItem']))
{
    extract($_POST);
    $sqlq="UPDATE tbl_user SET user_status=0 where user_id='$deleteItem'";
    if(mysqli_query($connect,$sqlq))
    {
        header("Location: ./admin.php");
    }

}
if(isset($_POST['deleteItem1']))
{
    extract($_POST);
    $sqlq="UPDATE tbl_user SET user_status=1 where user_id='$deleteItem1'";
    if(mysqli_query($connect,$sqlq))
    {
        header("Location: ./admin.php");
    }

}

?>