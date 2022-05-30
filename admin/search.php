<?php
include "../include/dbconnect.php";
session_start();
if (isset($_POST['item'])) {
    $input = $_POST['item'];
    $searchQuery = "SELECT * FROM `tbl_user` WHERE `username` LIKE '{$input}%' OR `name` LIKE '{$input}%'";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row1 =  mysqli_fetch_array($searchResult)) {
            echo "<tr class='allResult'>
                                        <td>" . $row1['username'] . "</td>
                                        <td>" . $row1['name'] . "</td>
                                        <td>" . $row1['user_created_at'] . "</td>
                                        <td>";
            if ($row1['user_status'] == 1) {
                echo 'Active';
            } else {
                echo 'Disable';
            }
            echo "
                                        </td>
                                          <td>";
            if ($row1['user_status'] == 1) {
                echo "
                                          <form action='./changestatus.php' method='post'><button type='submit' name='deleteItem' value='" . $row1['user_id'] . "' data-toggle='tooltip' title='Deactivate User' class='pd-setting-ed'><i class='fa fa-close' aria-hidden='true'></i></button></form>";
            } else {
                echo "
                                            <form action='./changestatus.php' method='post'><button type='submit' name='deleteItem1' value='" . $row1['user_id'] . "' data-toggle='tooltip' title='Active User' class='pd-setting-ed1'><i class='fa fa-check' aria-hidden='true'></i></button></form>";
            }

            echo "</td>
                                    </tr>";
        }
    } else {
        echo '<b> No result found</b>';
    }
}


if (isset($_POST['item1'])) {
    $input = $_POST['item1'];
    $searchQuery = "SELECT * FROM `car_category` WHERE `car_details` LIKE '{$input}%' OR `car_type` LIKE '{$input}%'";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row1 =  mysqli_fetch_array($searchResult)) {
            $id = $row1['company_id'];
            $fetch = "SELECT * from car_company where company_id='$id'";
            $fetchResult = mysqli_query($connect, $fetch);
            $row2 = mysqli_fetch_array($fetchResult);
            echo "<tr class='allResult'>
                                        
                                        <td>" . $row1['car_details'] . "</td>
                                        <td>" . $row1['car_type'] . "</td>
                                        <td>" . $row2['company_name'] . "</td>
                                        
                                        <td class='d-flex'>
                                            <form action='./delete.php' method='post'><button type='submit' name='deleteItem' value='" . $row1['car_id'] . "' data-toggle='tooltip' title='Trash' class='pd-setting-ed'><i class='fa fa-trash-o' aria-hidden='true'></i></button></form>
                                        </td>
                                        <td><a href='./editcar.php?carId=" . $row1['car_id'] . "'><button class='btn btn-success'>Edit</button></a></td>
                                    </tr>";
        }
    } else {
        echo '<b> No result found</b>';
    }
}
if (isset($_POST['default'])) {
    $searchQuery = "SELECT * FROM `tbl_user` ";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row1 =  mysqli_fetch_array($searchResult)) {
            echo "<tr class='allResult'>
                                        <td>" . $row1['username'] . "</td>
                                        <td>" . $row1['name'] . "</td>
                                        <td>" . $row1['user_created_at'] . "</td>
                                        <td>";
            if ($row1['user_status'] == 1) {
                echo 'Active';
            } else {
                echo 'Disable';
            }
            echo "
                                        </td>
                                          <td>";
            if ($row1['user_status'] == 1) {
                echo "
                                          <form action='./changestatus.php' method='post'><button type='submit' name='deleteItem' value='" . $row1['user_id'] . "' data-toggle='tooltip' title='Deactivate User' class='pd-setting-ed'><i class='fa fa-close' aria-hidden='true'></i></button></form>";
            } else {
                echo "
                                            <form action='./changestatus.php' method='post'><button type='submit' name='deleteItem1' value='" . $row1['user_id'] . "' data-toggle='tooltip' title='Active User' class='pd-setting-ed1'><i class='fa fa-check' aria-hidden='true'></i></button></form>";
            }

            echo "</td>
                                    </tr>";
        }
    } else {
        echo '<b> No result found</b>';
    }
}
if (isset($_POST['default2'])) {

    $searchQuery = "SELECT * FROM `car_category`";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row1 =  mysqli_fetch_array($searchResult)) {
            $id = $row1['company_id'];
            $fetch = "SELECT * from car_company where company_id='$id'";
            $fetchResult = mysqli_query($connect, $fetch);
            $row2 = mysqli_fetch_array($fetchResult);
            echo "<tr class='allResult'>
                                        
                                        <td>" . $row1['car_details'] . "</td>
                                        <td>" . $row1['car_type'] . "</td>
                                        <td>" . $row2['company_name'] . "</td>
                                        
                                        <td class='d-flex'>
                                            <form action='./delete.php' method='post'><button type='submit' name='deleteItem' value='" . $row1['car_id'] . "' data-toggle='tooltip' title='Trash' class='pd-setting-ed'><i class='fa fa-trash-o' aria-hidden='true'></i></button></form>
                                        </td>
                                        <td><a href='./editcar.php?carId=" . $row1['car_id'] . "'><button class='btn btn-success'>Edit</button></a></td>
                                    </tr>";
        }
    } else {
        echo '<b> No result found</b>';
    }
}
