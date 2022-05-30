<<<<<<< HEAD
<?php
include "./include/dbconnect.php";
session_start();
if (isset($_POST['item'])) {
    $input = $_POST['item'];
    $searchQuery = "SELECT * FROM `tbl_items` WHERE items_name LIKE '{$input}%'";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row = mysqli_fetch_assoc($searchResult)) {
?>

            <div class="card" style="width: 18rem;margin:5px;">
                <img style="width: 100%; height: 180px;" src="<?php echo $row['items_img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">
                        <?php echo $row['items_name'] ?>
                    </h5>
                    <h6><?php echo $row['items_category'] ?></h6>
                    <p class="card-text" style="display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;"><?php echo $row['items_desc'] ?></p>
                    <p class="price-container">
                        <span>Rs: <?php echo $row['items_price'] ?></span>
                    </p>
                    <div class="row">

                        <?php
                        $item_id = $row['items_id'];
                        $userId = $_SESSION['userId'];
                        $isSaved = "SELECT * FROM `tbl_save` WHERE `items_id`=$item_id AND `user_id`= $userId";
                        $likedAd = mysqli_query($connect, $isSaved);
                        if (mysqli_num_rows($likedAd) > 0) {
                            $savedAds = mysqli_fetch_assoc($likedAd)
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-success col-10 m-2" value="<?php echo $savedAds['save_id'] ?>" name="unlikeButton">Unlike</button>
                            </form>
                        <?php
                        } else {
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-primary col-10 m-2" value="<?php echo $row['items_id'] ?>" name="likeButton">Like</button>
                            </form>
                        <?php
                        }
                        ?>
                        <a href="javascript:void(0);" class="btn btn-primary col m-2" data-toggle="modal" data-target="#<?php echo $row['items_name']; ?>Modal">More info</a>
                    </div>

                    <div class="modal fade" id="<?php echo $row['items_name']; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <form class="modal-content" action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['items_name'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <center><img class="img-fluid" src="<?php echo $row['items_img']; ?>" class="img-responsive" /></center>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"></label>
                                        <p><?php echo $row['ad_title'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputEmail1">Car details</label>
                                        <p><?php echo $row['items_desc'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Item Category</label>
                                        <p><?php echo $row['items_category'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Price</label>
                                        <p><?php echo $row['items_price'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Name</label>
                                        <p><?php echo $row['contact_name'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Address</label>
                                        <p><?php echo $row['contact_address'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Category email</label>
                                        <p><?php echo $row['contact_email'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Number</label>
                                        <p><?php echo $row['contact_number'] ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
        <?php
    } else {
        echo '<b> No result found</b>';
    }
}

//Category
if (isset($_POST['car'])) {
    $input = $_POST['car'];
    $searchQuery = "SELECT * FROM `tbl_items` WHERE items_name LIKE '%{$input}%'";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row = mysqli_fetch_assoc($searchResult)) {
        ?>

            <div class="card" style="width: 18rem;margin:5px;">
                <img style="width: 100%; height: 180px;" src="<?php echo $row['items_img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">
                        <?php echo $row['items_name'] ?>
                    </h5>
                    <h6><?php echo $row['items_category'] ?></h6>
                    <p class="card-text" style="display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;"><?php echo $row['items_desc'] ?></p>
                    <p class="price-container">
                        <span>Rs: <?php echo $row['items_price'] ?></span>
                    </p>
                    <div class="row">

                        <?php
                        $item_id = $row['items_id'];
                        $userId = $_SESSION['userId'];
                        $isSaved = "SELECT * FROM `tbl_save` WHERE `items_id`=$item_id AND `user_id`= $userId";
                        $likedAd = mysqli_query($connect, $isSaved);
                        if (mysqli_num_rows($likedAd) > 0) {
                            $savedAds = mysqli_fetch_assoc($likedAd)
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-success col-10 m-2" value="<?php echo $savedAds['save_id'] ?>" name="unlikeButton">Unlike</button>
                            </form>
                        <?php
                        } else {
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-primary col-10 m-2" value="<?php echo $row['items_id'] ?>" name="likeButton">Like</button>
                            </form>
                        <?php
                        }
                        ?>
                        <a href="javascript:void(0);" class="btn btn-primary col m-2" data-toggle="modal" data-target="#<?php echo $row['items_name']; ?>Modal">More info</a>
                    </div>

                    <div class="modal fade" id="<?php echo $row['items_name']; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <form class="modal-content" action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['items_name'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <center><img class="img-fluid" src="<?php echo $row['items_img']; ?>" class="img-responsive" /></center>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"></label>
                                        <p><?php echo $row['ad_title'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputEmail1">Car details</label>
                                        <p><?php echo $row['items_desc'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Item Category</label>
                                        <p><?php echo $row['items_category'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Price</label>
                                        <p><?php echo $row['items_price'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Name</label>
                                        <p><?php echo $row['contact_name'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Address</label>
                                        <p><?php echo $row['contact_address'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Category email</label>
                                        <p><?php echo $row['contact_email'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Number</label>
                                        <p><?php echo $row['contact_number'] ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
<?php
    } else {
        echo '<b> No result found</b>';
    }
}
=======
<?php
include "./include/dbconnect.php";
session_start();
if (isset($_POST['item'])) {
    $input = $_POST['item'];
    $searchQuery = "SELECT * FROM `tbl_items` WHERE items_name LIKE '%{$input}%'";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row = mysqli_fetch_assoc($searchResult)) {
?>

            <div class="card" style="width: 18rem;margin:5px;">
                <img style="width: 100%; height: 180px;" src="<?php echo $row['items_img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">
                        <?php echo $row['items_name'] ?>
                    </h5>
                    <h6><?php echo $row['items_category'] ?></h6>
                    <p class="card-text" style="display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;"><?php echo $row['items_desc'] ?></p>
                    <p class="price-container">
                        <span>Rs: <?php echo $row['items_price'] ?></span>
                    </p>
                    <div class="row">

                        <?php
                        $item_id = $row['items_id'];
                        $userId = $_SESSION['userId'];
                        $isSaved = "SELECT * FROM `tbl_save` WHERE `items_id`=$item_id AND `user_id`= $userId";
                        $likedAd = mysqli_query($connect, $isSaved);
                        if (mysqli_num_rows($likedAd) > 0) {
                            $savedAds = mysqli_fetch_assoc($likedAd)
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-success col-10 m-2" value="<?php echo $savedAds['save_id'] ?>" name="unlikeButton">Unlike</button>
                            </form>
                        <?php
                        } else {
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-primary col-10 m-2" value="<?php echo $row['items_id'] ?>" name="likeButton">Like</button>
                            </form>
                        <?php
                        }
                        ?>
                        <a href="javascript:void(0);" class="btn btn-primary col m-2" data-toggle="modal" data-target="#<?php echo $row['items_name']; ?>Modal">More info</a>
                    </div>

                    <div class="modal fade" id="<?php echo $row['items_name']; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <form class="modal-content" action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['items_name'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <center><img class="img-fluid" src="<?php echo $row['items_img']; ?>" class="img-responsive" /></center>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"></label>
                                        <p><?php echo $row['ad_title'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputEmail1">Car details</label>
                                        <p><?php echo $row['items_desc'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Item Category</label>
                                        <p><?php echo $row['items_category'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Price</label>
                                        <p><?php echo $row['items_price'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Name</label>
                                        <p><?php echo $row['contact_name'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Address</label>
                                        <p><?php echo $row['contact_address'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Category email</label>
                                        <p><?php echo $row['contact_email'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Number</label>
                                        <p><?php echo $row['contact_number'] ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
<?php
    } else {
        echo '<b> No result found</b>';
    }
}

//Category
if (isset($_POST['car'])) {
    $input = $_POST['car'];
    $searchQuery = "SELECT * FROM `tbl_items` WHERE items_name LIKE '%{$input}%'";
    $searchResult = mysqli_query($connect, $searchQuery);
    if (mysqli_num_rows($searchResult) > 0) {
        // $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
        // $fetchiteReuslt = mysqli_query($connect, $fetchite);
        while ($row = mysqli_fetch_assoc($searchResult)) {
?>

            <div class="card" style="width: 18rem;margin:5px;">
                <img style="width: 100%; height: 180px;" src="<?php echo $row['items_img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">
                        <?php echo $row['items_name'] ?>
                    </h5>
                    <h6><?php echo $row['items_category'] ?></h6>
                    <p class="card-text" style="display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;"><?php echo $row['items_desc'] ?></p>
                    <p class="price-container">
                        <span>Rs: <?php echo $row['items_price'] ?></span>
                    </p>
                    <div class="row">

                        <?php
                        $item_id = $row['items_id'];
                        $userId = $_SESSION['userId'];
                        $isSaved = "SELECT * FROM `tbl_save` WHERE `items_id`=$item_id AND `user_id`= $userId";
                        $likedAd = mysqli_query($connect, $isSaved);
                        if (mysqli_num_rows($likedAd) > 0) {
                            $savedAds = mysqli_fetch_assoc($likedAd)
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-success col-10 m-2" value="<?php echo $savedAds['save_id'] ?>" name="unlikeButton">Unlike</button>
                            </form>
                        <?php
                        } else {
                        ?>
                            <form action="save.php" method="post">
                                <button type="submit" class="btn btn-primary col-10 m-2" value="<?php echo $row['items_id'] ?>" name="likeButton">Like</button>
                            </form>
                        <?php
                        }
                        ?>
                        <a href="javascript:void(0);" class="btn btn-primary col m-2" data-toggle="modal" data-target="#<?php echo $row['items_name']; ?>Modal">More info</a>
                    </div>

                    <div class="modal fade" id="<?php echo $row['items_name']; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <form class="modal-content" action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['items_name'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <center><img class="img-fluid" src="<?php echo $row['items_img']; ?>" class="img-responsive" /></center>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"></label>
                                        <p><?php echo $row['ad_title'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputEmail1">Car details</label>
                                        <p><?php echo $row['items_desc'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Item Category</label>
                                        <p><?php echo $row['items_category'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Price</label>
                                        <p><?php echo $row['items_price'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Name</label>
                                        <p><?php echo $row['contact_name'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Address</label>
                                        <p><?php echo $row['contact_address'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Category email</label>
                                        <p><?php echo $row['contact_email'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:red;" for="exampleInputPassword1">Contact Number</label>
                                        <p><?php echo $row['contact_number'] ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
<?php
    } else {
        echo '<b> No result found</b>';
    }
}
>>>>>>> f737eafffc939620e57d7d77f6e9244504842cc4
?>