<?php
 include "./include/dbconnect.php";
                if (isset($_POST['del'])) {
                  include "./include/dbconnect.php";
                  $id = $_POST['del'];
                  $query = "UPDATE `tbl_items` SET `items_status` = 0 WHERE `items_id` = '$id'";
                  $res = mysqli_query($connect, $query);

                echo'<script> alert("are you sure want to delete this item!")';
                header("location: ./myads.php");
                }

                ?>