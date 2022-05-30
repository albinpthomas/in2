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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script>
      function fetchCar(CarBrand) {
        var value = $('#company_name :selected').val();
        $.ajax({
          url: "./server.php",
          type: "POST",
          data: {
            Url: value
          },
          success: function(data, status) {
            $('#car_name').html(data);
            $('#websiteLoading').css('display', 'none');
            if (data == 404) {
              websiteStatus = false;
              $('#websiteError').css('display', 'inline-block');

            } else if (data == 200) {
              websiteStatus = true;
              $('#websiteSuccess').css('display', 'inline-block');
            }
          }
        });
      }

      function cate(category) {
        var car = $('#car_name :selected').val();
        console.log(car);
        document.querySelector(".allResult").classList.add("displayNone");
        document.querySelector(".datas").classList.remove("displayNone");
        $.ajax({
          url: "./search.php",
          method: "POST",
          data: {
            car: car
          },
          success: function(data) {
            $('#search-result').html(data);
          }
        })
      }

      function searchItem(item) {
        if (item.length != 0) {
          document.querySelector(".allResult").classList.add("displayNone");
          document.querySelector(".datas").classList.remove("displayNone");
          $.ajax({
            url: "./search.php",
            method: "POST",
            data: {
              item: item
            },
            success: function(data) {
              $('#search-result').html(data);
            }
          })
        } else {
          document.querySelector(".allResult").classList.remove("displayNone");
          document.querySelector(".datas").classList.add("displayNone");
        }
      }
    </script>



  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">In2Goods</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
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




          <li class="nav-item active">
            <a class="nav-link">
              <select id="company_name" name="company_name" onchange="fetchCar(this)">
                <option value="0">--Select--</option>
                <option value="Maruti Suzuki ">Maruti Suzuki </option>
                <option value="Toyota">Toyota</option>
                <option value="Tata">Tata</option>
                <option value="Honda">Honda </option>
                <option value="Hyundai">Hyundai</option>
              </select>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link">
              <select id="car_name" name="car_name" onchange="cate(this)">
                <option value="0">--- Choose a Car ---</option>
              </select>
            </a>
          </li>


        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" onkeyup="searchItem(this.value)" type="search" placeholder="Search" aria-label="Search" />
          <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button> -->
          <a class="btn btn-danger mx-2 my-2 my-sm-0" href="logout.php">
            Logout
          </a>
        </form>
      </div>
    </nav>

    <div class="p-4">

      <div class="row datas" id="search-result">
        <!-- Inject search reult -->
      </div>

      <div class="row allResult">
        <?php
        while ($row = mysqli_fetch_assoc($fetchiteReuslt)) {
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
                        <label style="color:red;" for="exampleInputPassword1">Kilometer driven</label>
                        <p><?php echo $row['km'] ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Manufactured year</label>
                        <p><?php echo $row['mYear'] ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Registration end date</label>
                        <p><?php echo $row['regEnd'] ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Negotiable</label>
                        <p><?php if ($row['negotible'] == '0') {
                              echo "No";
                            } else {
                              echo "Yes";
                            } ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Insurance type</label>
                        <p><?php echo $row['insurance_type'] ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Price</label>
                        <p><?php echo $row['items_price'] ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Registration</label>
                        <p><?php echo $row['Registration'] ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Fuel type</label>
                        <p><?php echo $row['Fuel_type'] ?></p>
                      </div>
                      <div class="form-group">
                        <label style="color:red;" for="exampleInputPassword1">Ownership number</label>
                        <p><?php echo $row['Ownership'] ?></p>
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
                      <?php
                      $userid = $row['user_id'];
                      $s = "SELECT name FROM tbl_user WHERE user_id = '$userid'";
                      $res = mysqli_query($connect, $s);
                      $r = mysqli_fetch_assoc($res);
                      $username = $r['name'];
                      ?>
                      <input type="hidden" name="uname" id="uname" value="<?php echo $username; ?>">
                      <a href="payment.php?price=<?php echo $row['items_price'] ?>&name=<?php echo $row['items_name'] ?>"><button type="button" class="btn btn-secondary">Pay Advance</button></a>
                      <button type="button" class="btn btn-secondary allChat" id="allChat" value="<?php echo $row['user_id']; ?>">Chat</button>
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

      </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
      var amt = 50 * 100;
      var options = {
        "key": "rzp_test_jqyotl0ncBkCMx", // Enter the Key ID generated from the Dashboard
        "amount": amt, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "In2Goods",
        "description": "Test Transaction",
        "image": "./assets/vectors/Logo.svg",
        "handler": function(response) {

        }
      };
      var rzp1 = new Razorpay(options);
      document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
      }
    </script>
    <script>
      $(".allChat").click(function() {
        var chatId = $(this).val();
        var uname = $("#uname").val();
        $.post("./chatScreen.php", {
          chatId: chatId,
          uname: uname
        }, function(data) {
          window.location.href = "./chats.php";
          $("#newChatModal").modal("hide");
          $("#chatScreen").html(data);
          $("#chatList").load("./chatList.php");
        });

      });
    </script>
    <script src="./assets/js/action.js" async defer></script>
    <script type="text/javascript">
      function preventBack() {
        window.history.forward();
      }
      setTimeout("preventBack()", 0);
      window.onunload = function() {
        null
      };
    </script>
  </body>

  </html>
<?php
} else {
  header("Location: index.php");
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script>
      function fetchCar(CarBrand) {
        var value = $('#company_name :selected').val();
        $.ajax({
          url: "./server.php",
          type: "POST",
          data: {
            Url: value
          },
          success: function(data, status) {
            $('#car_name').html(data);
            $('#websiteLoading').css('display', 'none');
            if (data == 404) {
              websiteStatus = false;
              $('#websiteError').css('display', 'inline-block');

            } else if (data == 200) {
              websiteStatus = true;
              $('#websiteSuccess').css('display', 'inline-block');
            }
          }
        });
      }

      function cate(category){
        var car= $('#car_name :selected').val();
        console.log(car);
        document.querySelector(".allResult").classList.add("displayNone");
          document.querySelector(".datas").classList.remove("displayNone");
          $.ajax({
            url: "./search.php",
            method: "POST",
            data: {
              car: car
            },
            success: function(data) {
              $('#search-result').html(data);
            }
          })
      }

      function searchItem(item) {
        if (item.length != 0) {
          document.querySelector(".allResult").classList.add("displayNone");
          document.querySelector(".datas").classList.remove("displayNone");
          $.ajax({
            url: "./search.php",
            method: "POST",
            data: {
              item: item
            },
            success: function(data) {
              $('#search-result').html(data);
            }
          })
        } else {
          document.querySelector(".allResult").classList.remove("displayNone");
          document.querySelector(".datas").classList.add("displayNone");
        }
      }
    </script>



  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">In2Goods</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./sell.php">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./liked.php">Favorites</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./myads.php">My Ads</a>
          </li>




          <li class="nav-item active">
            <a class="nav-link">
              <select id="company_name" name="company_name" onchange="fetchCar(this)">
                <option value="0">--Select--</option>
                <option value="Maruti Suzuki ">Maruti Suzuki </option>
                <option value="Toyota">Toyota</option>
                <option value="Tata">Tata</option>
                <option value="Honda">Honda </option>
                <option value="Hyundai">Hyundai</option>
              </select>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link">
              <select id="car_name" name="car_name" onchange="cate(this)">
                <option value="0">--- Choose a Car ---</option>
              </select>
            </a>
          </li>


        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" onkeyup="searchItem(this.value)" type="search" placeholder="Search" aria-label="Search" />
          <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button> -->
          <a class="btn btn-danger mx-2 my-2 my-sm-0" href="logout.php">
            Logout
          </a>
        </form>
      </div>
    </nav>

    <div class="p-4">

      <div class="row datas" id="search-result">
        <!-- Inject search reult -->
      </div>

      <div class="row allResult">
        <?php
        while ($row = mysqli_fetch_assoc($fetchiteReuslt)) {
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

      </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>

  </html>
<?php
} else {
  header("Location: index.php");
}
>>>>>>> f737eafffc939620e57d7d77f6e9244504842cc4
?>