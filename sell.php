<<<<<<< HEAD
<?php
session_start();
if ($_SESSION['toGoods'] == session_id()) {
    include "./include/dbconnect.php";
    $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
    $fetchiteReuslt = mysqli_query($connect, $fetchite);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="./assets/css/main.css" />



        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>


    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">In2Goods</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">

                        <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./sell.php">Sell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./liked.php">Favorites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./myads.php">My Ads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./manageProfile.php">Manage profile</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        Search
                    </button> -->
                    <a class="btn btn-danger mx-2 my-2 my-sm-0" href="logout.php">
                        Logout
                    </a>
                </form>
            </div>
        </nav>

        <div class="container">

            <form method="post" enctype="multipart/form-data">
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                            <input type="text" onfocusout="function adNameValidate(){
                                if(!document.getElementById('titleOfAd').value.match(/^[a-zA-Z\s]*$/)){
                                    alert('Incorrect format');
                                    document.getElementById('titleOfAd').value='';
                                }
                            };adNameValidate()" maxlength="50" name="titleOfAd" id="titleOfAd" class="border w-100 p-2 bg-white text-capitalize" placeholder="Ad title go There">
                            <span style="color: red;"></span>

                            <?php
                            $sql1 = "SELECT * FROM `car_company`";
                            $result1 = mysqli_query($connect, $sql1);
                            ?>


                            <h6 class="font-weight-bold pt-4 pb-1">Company</h6>
                            <select name="company_id" id="inputGroupSelect" class="w-100">
                                <option value="1">Select category</option>
                                <?php while ($row1 =  mysqli_fetch_array($result1)) {
                                ?>
                                    <option value="<?php echo $row1['company_id']; ?>"><?php echo $row1['company_name']; ?></option>
                                <?php } ?>
                            </select>
                            <h6 class="font-weight-bold pt-4 pb-1">Car:</h6>
                            <input type="text" onfocusout="function carNameValidation(){
                                if(!document.getElementById('carName').value.match(/^[a-zA-Z0-9\-_]{0,40}$/)){
                                    alert('Incorrect format');
                                    document.getElementById('carName').value='';
                                }
                            };carNameValidation()" maxlength="30" name="itemName" id="carName" class="border w-100 p-2 bg-white text-capitalize" placeholder="Enter Your Car">
                            <span style="color: red;"></span>



                            <h6 class="font-weight-bold pt-4 pb-1">Ad Type:</h6>
                            <div class="row px-3">
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white">
                                    <input type="radio" name="adType" value="personal" id="personal">
                                    <label for="personal" class="py-2">Personal</label>
                                </div>
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white ">
                                    <input type="radio" name="adType" value="business" id="business">
                                    <label for="business" class="py-2">Business</label>
                                </div>
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="desc" maxlength="300" id=" descri" class="border p-3 w-100" rows="7" placeholder="Write details about your product"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            $sql1 = "select DISTINCT car_type from car_category";
                            $result1 = mysqli_query($connect, $sql1);
                            ?>
                            <h6 class="font-weight-bold pt-4 pb-1">Select Category:</h6>
                            <select name="item_category" id="inputGroupSelect" class="w-100">
                                <option value="1">Select category</option>
                                <?php
                                $fetch = "SELECT DISTINCT car_type FROM `car_category`";
                                while ($row1 =  mysqli_fetch_array($result1)) {
                                    $id = $row1['company_id'];

                                    $fetchResult = mysqli_query($connect, $fetch);
                                    $row2 = mysqli_fetch_array($fetchResult);
                                ?>
                                    <option value="<?php echo $row1['car_type']; ?>"><?php echo $row1['car_type']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Item Price:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="price" style="outline:none" class="border-0 py-2 w-100 price" placeholder="Price" min="100000" max="10000000" id="price">
                                        <span style="color: red;"></span>
                                    </div>

                                    <div class="col-lg-4 mrx-4 rounded bg-white my-2 ">
                                        <label for="Negotiable" class="py-2">Negotiable:</label><br>
                                        <input type="radio" name="negotiable" value="1" id="Negotiable">Yes
                                        <input type="radio" style="margin-left:10px" name="negotiable" value="0" id="Negotiable">No

                                    </div>
                                </div>
                            </div>

                            <div class="km">
                                <h6 class="font-weight-bold pt-4 pb-1">KM Driven:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="km" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="7" class="border-0 py-2 w-100 price" min="100" max="1000000" placeholder="KM" id="km">
                                        <span style="color: red;"></span>
                                    </div>

                                </div>
                            </div>

                            <div class="registration">
                                <h6 class="font-weight-bold pt-4 pb-1">Manufacture year</h6>
                                <div class="row px-3">
                                    <select class="select-box" name="mYear" id="">
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="1995">2001</option>
                                        <option value="1996">2002</option>
                                        <option value="1997">2003</option>
                                        <option value="1998">2004</option>
                                        <option value="1999">2005</option>
                                        <option value="2000">2006</option>
                                        <option value="1995">2007</option>
                                        <option value="1996">2008</option>
                                        <option value="1997">2009</option>
                                        <option value="1998">2010</option>
                                        <option value="1999">2011</option>
                                        <option value="2000">2012</option>
                                        <option value="1995">2013</option>
                                        <option value="1996">2014</option>
                                        <option value="1997">2015</option>
                                        <option value="1998">2016</option>
                                        <option value="1999">2017</option>
                                        <option value="2000">2018</option>
                                        <option value="1996">2019</option>
                                        <option value="1997">2020</option>
                                        <option value="1998">2021</option>
                                        <option value="1999">2022</option>

                                    </select>
                                </div>
                            </div>

                            <div class="km">
                                <h6 class="font-weight-bold pt-4 pb-1">Registration valid upto</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="valid" class="border-0 py-2 w-100 price" min="0" placeholder="Registration" id="txtstartdate">
                                    </div>

                                </div>

                            </div>
                            <script>
                                $("#txtstartdate").datepicker({
                                    minDate: 0,
                                    changeMonth: true,
                                    changeYear: true,
                                    yearRange: 'c-10:c+15',
                                    onSelect: function(date) {
                                        $("#txtenddate").datepicker('option', 'minDate', date);
                                    }
                                });
                            </script>



                            <div class="insurance">
                                <h6 class="font-weight-bold pt-4 pb-1">Type of Insurance:</h6>
                                <div class="row px-3">
                                    <select class="select-box" name="insurance" id="">
                                        <?php
                                        $fetchState = "SELECT `id`,`type` FROM `tbl_insurance`";
                                        $fetchStateResult = mysqli_query($connect, $fetchState);
                                        while ($row = mysqli_fetch_assoc($fetchStateResult)) {
                                        ?>
                                            <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="insurance" class="border-0 py-2 w-100 price" placeholder="Insurance Type" id="insurance">
                                    </div> -->

                                </div>
                            </div>

                            <div class="registration">
                                <h6 class="font-weight-bold pt-4 pb-1">Registration Details:</h6>
                                <div class="row px-3">
                                    <select class="select-box" name="regState" id="">
                                        <?php
                                        $fetchState = "SELECT `id`,`state` FROM `tbl_state`";
                                        $fetchStateResult = mysqli_query($connect, $fetchState);
                                        while ($row = mysqli_fetch_assoc($fetchStateResult)) {
                                        ?>
                                            <option value="<?php echo $row['state']; ?>"><?php echo $row['state']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="registration" class="border-0 py-2 w-100 price" placeholder="Registration" id="registration">
                                    </div> -->

                                </div>
                            </div>

                            <div class="fuel">
                                <h6 class="font-weight-bold pt-4 pb-1">Type of Fuel:</h6>
                                <div class="row px-3">
                                    <select class="select-box" name="fuel" id="">
                                        <?php
                                        $fetchState = "SELECT `id`,`fuel_type` FROM `tbl_fuel`";
                                        $fetchStateResult = mysqli_query($connect, $fetchState);
                                        while ($row = mysqli_fetch_assoc($fetchStateResult)) {
                                        ?>
                                            <option value="<?php echo $row['fuel_type']; ?>"><?php echo $row['fuel_type']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="fuel" class="border-0 py-2 w-100 price" placeholder="Fuel Type" id="fuel">
                                    </div> -->

                                </div>
                            </div>

                            <div class="owner">
                                <h6 class="font-weight-bold pt-4 pb-1">Ownership Number:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="owner" class="border-0 py-2 w-100 price" min="1" max="100" placeholder="Ownership" id="owner">
                                        <span style="color: red;"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="choose-file text-center my-4 py-4 rounded">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                                    <span class="d-block">Maximum upload file size: 500 KB</span>
                                    <input type="file" accept="image/jpeg, image/png" class="form-control-file d-none" id="file-upload" name="fileToUpload">
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Post Your ad end -->

                <!-- seller-information start -->
                <fieldset class="border p-4 my-5 seller-information bg-gray">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Seller Information</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                            <input type="text" placeholder="Contact name" id='cname' name='contact_name' class="border w-100 p-2">
                            <span style="color: red;"></span>
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Number:</h6>
                            <input type="text" placeholder="Contact Number" id='cnum' name='contact_no' class="border w-100 p-2">
                            <span style="color: red;"></span>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact email:</h6>
                            <input type="email" placeholder="name@yourmail.com" id='cemail' name='contact_email' class="border w-100 p-2">
                            <span style="color: red;"></span>
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Address:</h6>
                            <input type="text" placeholder="Your address" id='cadd' name='contact_address' class="border w-100 p-2">
                            <span style="color: red;"></span>
                        </div>
                    </div>
                </fieldset>
                <!-- seller-information end-->

                <!-- ad-feature start -->

                <!-- submit button -->
                <div class="checkbox d-inline-flex">
                    <input type="checkbox" id="terms-&-condition" class="mt-1">
                    <label for="terms-&-condition" class="ml-2">By click you must agree with our
                        <span> <a class="text-success">Terms & Condition and Posting Rules.</a></span>
                    </label>
                </div>
                <button type="submit" name="submitAdd" class="btn btn-primary d-block mt-2">Post Your Ad</button>
            </form>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}

if (isset($_POST['submitAdd'])) {
    $userId = $_SESSION['userId'];

    $titleOfAd = $_POST['titleOfAd'];
    $itemName = $_POST['itemName'];
    $company_id = $_POST['company_id'];
    $adType = $_POST['adType'];
    $negotiable = $_POST['negotiable'];
    $contact_name = $_POST['contact_name'];
    $contact_no = $_POST['contact_no'];


    $contact_email = $_POST['contact_email'];
    $contact_address = $_POST['contact_address'];
    $item_category = $_POST['item_category'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $km = $_POST['km'];
    $insurance = $_POST['insurance'];
    $regState = $_POST['regState'];
    $fuel = $_POST['fuel'];
    $owner = $_POST['owner'];
    $mYear = $_POST['mYear'];
    $valid = $_POST['valid'];




    $target_dir = "assets/images/";
    $file_exp = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    $target_file = $target_dir . time() . "." . $file_exp;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    if ($negotiable == 1) {
        $insert = "INSERT INTO `tbl_items`(`user_id`,`ad_title`, `items_name`,`company_id`, `ad_type`, `negotible`, `contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`,`km`, `insurance_type`, `Registration`, `Fuel_type`, `Ownership`, `items_desc`, `mYear`, `regEnd`)
            VALUES ('$userId','$titleOfAd','$itemName','$company_id','$adType','$negotiable','$contact_name','$contact_no','$contact_email','$contact_address','$target_file','$item_category','$price','$km','$insurance','$regState','$fuel','$owner','$desc','$mYear','$valid')";
    } else {
        $insert = "INSERT INTO `tbl_items`(`user_id`,`ad_title`, `items_name`,`company_id`, `ad_type`, `negotible`,`contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`, `km`, `insurance_type`, `Registration`, `Fuel_type`, `Ownership`,`items_desc`, `mYear`, `regEnd`)
            VALUES ('$userId','$titleOfAd','$itemName','$company_id','$adType','$negotiable','$contact_name','$contact_no','$contact_email','$contact_address','$target_file','$item_category','$price','$km','$insurance','$regState','$fuel','$owner','$desc','$mYear','$valid')";
    }
    if (mysqli_query($connect, $insert)) {
        echo "<script>alert('Ad posted')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
?>
<script type="text/javascript">
    let ad = document.getElementById('titleOfAd');
    let span = document.getElementsByTagName('span');
    let car = document.getElementById('carName');
    let price = document.getElementById('price');
    let km = document.getElementById('km');
    let owner = document.getElementById('owner');

    ad.onkeydown = function() {
        var regex = /^([\a-zA-Z  ]+)$/;
        if (regex.test(ad.value)) {
            span[2].innerText = "";

        } else {
            span[2].innerText = "enter a valid title";
            span[2].style.color = 'red';

        }
    }
    car.onkeydown = function() {
        var regex = /^([\a-zA-Z]+)([\a-zA-Z 0-9]+)$/;
        if (regex.test(car.value)) {
            span[3].innerText = "";

        } else {
            span[3].innerText = "enter a car name";
            span[3].style.color = "red";


        }
    }
    price.onkeyup = function() {
        var regex = /^([\1-9]+)([\0-9]+)([\0-9]+)([\0-9]+)([\0-9]+)([\0-9]+)$/;
        if (regex.test(price.value)) {
            span[4].innerText = "";

        } else {
            span[4].innerText = "enter a valid price";
            span[4].style.color = "red";

        }
    }
    km.onkeyup = function() {
        var regex = /^([\1-9]+)([\0-9]+)([\0-9]+)$/;
        if (regex.test(km.value)) {
            span[5].innerText = "";

        } else {
            span[5].innerText = "enter a valid km";
            span[5].style.color = "red";

        }
    }
    owner.onkeyup = function() {
        var regex = /^([\5-9]+)$/;
        if (regex.test(owner.value)) {
            span[6].innerText = "";

        } else {
            span[6].innerText = "enter a valid ownership number";
            span[6].style.color = "red";

        }
    }
</script>
<script>

</script>
<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>
=======
<?php
session_start();
if ($_SESSION['toGoods'] == session_id()) {
    include "./include/dbconnect.php";
    $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
    $fetchiteReuslt = mysqli_query($connect, $fetchite);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="./assets/css/main.css" />
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">In2Goods</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">

                        <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./sell.php">Sell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./liked.php">Favorites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./myads.php">My Ads</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        Search
                    </button> -->
                    <a class="btn btn-danger mx-2 my-2 my-sm-0" href="logout.php">
                        Logout
                    </a>
                </form>
            </div>
        </nav>

        <div class="container">

            <form method="post" enctype="multipart/form-data">
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                            <input type="text" onfocusout="function adNameValidate(){
                                if(!document.getElementById('titleOfAd').value.match(/^[a-zA-Z\s]*$/)){
                                    alert('Incorrect format');
                                    document.getElementById('titleOfAd').value='';
                                }
                            };adNameValidate()" name="titleOfAd" id="titleOfAd" class="border w-100 p-2 bg-white text-capitalize" placeholder="Ad title go There">
                            <h6 class="font-weight-bold pt-4 pb-1">Car:</h6>
                            <input type="text" onfocusout="function carNameValidation(){
                                if(!document.getElementById('carName').value.match(/^[a-zA-Z0-9\-_]{0,40}$/)){
                                    alert('Incorrect format');
                                    document.getElementById('carName').value='';
                                }
                            };carNameValidation()" name="itemName" id="carName" class="border w-100 p-2 bg-white text-capitalize" placeholder="Enter Your Car">
                            <?php
                            $sql1 = "SELECT * FROM `car_company`";
                            $result1 = mysqli_query($connect, $sql1);
                            ?>


                            <h6 class="font-weight-bold pt-4 pb-1">Company</h6>
                            <select name="company_id" id="inputGroupSelect" class="w-100">
                                <option value="1">Select category</option>
                                <?php while ($row1 =  mysqli_fetch_array($result1)) {
                                ?>
                                    <option value="<?php echo $row1['company_id']; ?>"><?php echo $row1['company_name']; ?></option>
                                <?php } ?>
                            </select>


                            <h6 class="font-weight-bold pt-4 pb-1">Ad Type:</h6>
                            <div class="row px-3">
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white">
                                    <input type="radio" name="adType" value="personal" id="personal">
                                    <label for="personal" class="py-2">Personal</label>
                                </div>
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white ">
                                    <input type="radio" name="adType" value="business" id="business">
                                    <label for="business" class="py-2">Business</label>
                                </div>
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="desc" id="" class="border p-3 w-100" rows="7" placeholder="Write details about your product"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            $sql1 = "select * from car_category";
                            $result1 = mysqli_query($connect, $sql1);
                            ?>
                            <h6 class="font-weight-bold pt-4 pb-1">Select Category:</h6>
                            <select name="item_category" id="inputGroupSelect" class="w-100">
                                <option value="1">Select category</option>
                                <?php
                                $fetch = "SELECT DISTINCT car_type FROM `car_category`";
                                while ($row1 =  mysqli_fetch_array($result1)) {
                                    $id = $row1['company_id'];

                                    $fetchResult = mysqli_query($connect, $fetch);
                                    $row2 = mysqli_fetch_array($fetchResult);
                                ?>
                                    <option value="<?php echo $row1['car_type']; ?>"><?php echo $row1['car_type']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Item Price:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="number" name="price" class="border-0 py-2 w-100 price" min="0" placeholder="Price" id="price">
                                    </div>
                                    <div class="col-lg-4 mrx-4 rounded bg-white my-2 ">
                                        <label for="Negotiable" class="py-2">Negotiable:</label><br>
                                        <input type="radio" name="negotiable" value="1" id="Negotiable">Yes<br>
                                        <input type="radio" name="negotiable" value="0" id="Negotiable">No

                                    </div>
                                </div>
                            </div>

                            <div class="km">
                                <h6 class="font-weight-bold pt-4 pb-1">KM Driven:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="number" name="km" class="border-0 py-2 w-100 price" min="0" placeholder="KM" id="km">
                                    </div>

                                </div>
                            </div>


                            <div class="insurance">
                                <h6 class="font-weight-bold pt-4 pb-1">Type of Insurance:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="insurance" class="border-0 py-2 w-100 price" placeholder="Insurance Type" id="insurance">
                                    </div>

                                </div>
                            </div>

                            <div class="registration">
                                <h6 class="font-weight-bold pt-4 pb-1">Registration Details:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="registration" class="border-0 py-2 w-100 price" placeholder="Registration" id="registration">
                                    </div>

                                </div>
                            </div>

                            <div class="fuel">
                                <h6 class="font-weight-bold pt-4 pb-1">Type of Fuel:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="fuel" class="border-0 py-2 w-100 price" placeholder="Fuel Type" id="fuel">
                                    </div>

                                </div>
                            </div>

                            <div class="owner">
                                <h6 class="font-weight-bold pt-4 pb-1">Ownership Details:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="number" name="owner" class="border-0 py-2 w-100 price" min="0" placeholder="Ownership" id="owner">
                                    </div>

                                </div>
                            </div>
                            <div class="choose-file text-center my-4 py-4 rounded">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                                    <span class="d-block">Maximum upload file size: 500 KB</span>
                                    <input type="file" accept="image/jpeg, image/png" class="form-control-file d-none" id="file-upload" name="fileToUpload">
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Post Your ad end -->

                <!-- seller-information start -->
                <fieldset class="border p-4 my-5 seller-information bg-gray">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Seller Information</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                            <input type="text" placeholder="Contact name" name='contact_name' class="border w-100 p-2">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Number:</h6>
                            <input type="number" placeholder="Contact Number" name='contact_no' class="border w-100 p-2">
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact email:</h6>
                            <input type="email" placeholder="name@yourmail.com" name='contact_email' class="border w-100 p-2">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Address:</h6>
                            <input type="text" placeholder="Your address" name='contact_address' class="border w-100 p-2">
                        </div>
                    </div>
                </fieldset>
                <!-- seller-information end-->

                <!-- ad-feature start -->

                <!-- submit button -->
                <div class="checkbox d-inline-flex">
                    <input type="checkbox" id="terms-&-condition" class="mt-1">
                    <label for="terms-&-condition" class="ml-2">By click you must agree with our
                        <span> <a class="text-success">Terms & Condition and Posting Rules.</a></span>
                    </label>
                </div>
                <button type="submit" name="submitAdd" class="btn btn-primary d-block mt-2">Post Your Ad</button>
            </form>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}

if (isset($_POST['submitAdd'])) {
    $userId = $_SESSION['userId'];

    $titleOfAd = $_POST['titleOfAd'];
    $itemName = $_POST['itemName'];
    $company_id = $_POST['company_id'];
    $adType = $_POST['adType'];
    $negotiable = $_POST['negotiable'];
    $contact_name = $_POST['contact_name'];
    $contact_no = $_POST['contact_no'];


    $contact_email = $_POST['contact_email'];
    $contact_address = $_POST['contact_address'];
    $item_category = $_POST['item_category'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $km = $_POST['km'];
    $insurance = $_POST['insurance'];
    $registration = $_POST['registration'];
    $fuel = $_POST['fuel'];
    $owner = $_POST['owner'];




    $target_dir = "assets/images/";
    $file_exp = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    $target_file = $target_dir . time() . "." . $file_exp;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    if ($negotiable == 1) {
        $insert = "INSERT INTO `tbl_items`(`user_id`,`ad_title`, `items_name`,`company_id`, `ad_type`, `negotible`, `contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`,`km`, `insurance_type`, `Registration`, `Fuel_type`, `Ownership`, `items_desc`)
            VALUES ('$userId','$titleOfAd','$itemName','$company_id','$adType','$negotiable','$contact_name','$contact_no','$contact_email','$contact_address','$target_file','$item_category','$price','$km','$insurance','$registration','$fuel','$owner','$desc')";
    } else {
        $insert = "INSERT INTO `tbl_items`(`user_id`,`ad_title`, `items_name`,`company_id`, `ad_type`, `negotible`,`contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`, `km`, `insurance_type`, `Registration`, `Fuel_type`, `Ownership`,`items_desc`)
            VALUES ('$userId','$titleOfAd','$itemName','$company_id','$adType','$negotiable','$contact_name','$contact_no','$contact_email','$contact_address','$target_file','$item_category','$price','$km','$insurance','$registration','$fuel','$owner','$desc')";
    }
    if (mysqli_query($connect, $insert)) {
        echo "<script>alert('Ad posted')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
?>
>>>>>>> f737eafffc939620e57d7d77f6e9244504842cc4
