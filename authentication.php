<?php
session_start();
include "./include/dbconnect.php";
//user login
if (isset($_POST['submitBtn'])) {
    extract($_POST);
    $password = md5($password);
    $selectUser = "SELECT * FROM `tbl_user` WHERE username='$email' and user_status!=0";
    $userFetchResult = mysqli_query($connect, $selectUser);
    if (mysqli_num_rows($userFetchResult) > 0) {
        $userRow = mysqli_fetch_assoc($userFetchResult);
        if ($userRow['password'] == $password) {
            if ($userRow['user_status'] == 2) {
                $_SESSION['toGoods'] = session_id();
                $_SESSION['userId'] = $userRow['user_id'];
                $_SESSION['userName'] = $userRow['name'];

                echo '<script>alert("Admin Login");
                window.location.href = "./admin/admin.php";
    </script>';
            } else {
                if ($userRow['bussiness_name'] == 0) {
                    $_SESSION['toGoods'] = session_id();
                    $_SESSION['userId'] = $userRow['user_id'];
                    header("Location:home.php");
                } else {
                    echo "Bussinesss Logined";
                }
            }
        } else {
            echo '<script>
            alert("password incorrect");
            window.location.href="index.php";
            </script>';
        }
    } else {
        echo "user not found";
    }
}
//user register
if (isset($_POST['submitBtnReg'])) {
    extract($_POST);

    $full_name = $fname . " " . $lname;
    $today = date('d-m-y');
    $selectUnique = "SELECT * from tbl_user where username='$email'";
    $selectUniqueRes = mysqli_query($connect, $selectUnique);
    if (mysqli_num_rows($selectUniqueRes) < 1) {
        if ($cpassword == $password) {
            $password = md5($password);
            $insertUser = "INSERT INTO `tbl_user`( `username`, `password`, `name`, `user_created_at`) VALUES ('$email','$password','$full_name','$today')";
            if (mysqli_query($connect, $insertUser)) {
                echo '<script>alert("User inserted");
                window.location.href = "index.php";
    </script>';
            } else {
                echo "some error occured";
            }
        } else {
            echo "password mismatch";
        }
    } else {
        echo '<script>alert("User already exisit");
        window.location.href = "register.php";
</script>';
    }
}
//bussiness register
if (isset($_POST['submitBtnBussiness'])) {
    extract($_POST);
    $today = date('d-m-y');
    if ($cpassword == $password) {
        $insertUser = "INSERT INTO `tbl_user`( `username`, `password`, `name`, `user_created_at`,`bussiness_name`) VALUES ('$bemail','$password','$bownername','$today','$bname')";
        if (mysqli_query($connect, $insertUser)) {
            echo "Business user inserted";
        } else {
            echo "some error occured";
        }
    } else {
        echo "password mismatch";
    }
}
