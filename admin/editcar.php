<?php
include '../include/dbconnect.php';
if (!empty($_GET['carId'])) {
    $cardId = $_GET['carId'];
} else {
    header("Location: ./Car-category.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <form class="container mt-3" method="post">
        <?php
        $isSaved = "SELECT * FROM `car_category` WHERE `car_id`='$cardId'";
        $likedAd = mysqli_query($connect, $isSaved);
        if (mysqli_num_rows($likedAd) > 0) {
            $savedAds = mysqli_fetch_assoc($likedAd);

            echo '<div class="form-group">
            <label for="carName">Car name</label>
            <input type="text" name="carName" value="' . $savedAds['car_details'] . '" class="form-control" id="carName">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Car company</label>
            <select name="carCompany" class="form-control">';
            $companyNameQ = "SELECT * FROM `car_company`";
            $companyQ = mysqli_query($connect, $companyNameQ);
            while ($eachCompany = mysqli_fetch_assoc($companyQ)) {
                if ($savedAds['company_id'] == $eachCompany['company_id']) {
                    echo '<option selected value="' . $eachCompany['company_id'] . '">' . $eachCompany['company_name'] . '</option>';
                } else {
                    echo '<option value="' . $eachCompany['company_id'] . '">' . $eachCompany['company_name'] . '</option>';
                }
            }
            echo '
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Car type</label>
            <input name="carType" value="' . $savedAds['car_type'] . '" class="form-control">
        </div>
        <button type="submit" value="' . $savedAds['car_id'] . '" name="updateButton" class="btn btn-primary">Save Change</button>';
        }
        ?>

    </form>

    <?php
    if (isset($_POST['updateButton'])) {
        extract($_POST);
        $updateCategory = "UPDATE `car_category` SET `car_details`='$carName',`car_type`='$carType',`company_id`='$carCompany' WHERE `car_id`='$updateButton'";
        if (mysqli_query($connect, $updateCategory)) {
            header("Location: ./Car-category.php");
            die();
        }
    }
    ?>
</body>

</html>