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
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./sell.php">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Buy</a>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
          <a class="btn btn-danger mx-2 my-2 my-sm-0" href="logout.php">
            Logout
          </a>
        </form>
      </div>
    </nav>

    <div class="filter-bar position-sticky">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          All Category
        </a>
        <?php
        $fetchmodel = "SELECT * FROM `tbl_items` ";
        $fetchItems = mysqli_query($connect, $fetchmodel);
        while ($carRows = mysqli_fetch_assoc($fetchItems)) {
  ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        
        <a class="dropdown-item" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $carRows['brand_name'];
                                                ?></a>
        </a>
          <!-- <a class="dropdown-item" href="#"> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
        <?php
        }
        ?>
      </li>
    </div>
    
    <div class="container">
      <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($fetchiteReuslt)) {
        ?>

          <div class="col-xl-6 col-lg-6 col-sm-12">
            <!-- First product box start here-->
            <div class="prod-info-main prod-wrap clearfix">
              <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="product-image">
                    <img class="img-fluid" src="<?php
                                                echo $row['items_img'];
                                                ?>" class="img-responsive" />

                  </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                  <div class="product-deatil">
                    <h5 class="name">
                      <a href="#"> <?php echo $row['items_name'] ?> </a>
                      <a href="#">
                        <span><?php echo $row['items_category'] ?></span>
                      </a>
                    </h5>
                    <p class="price-container">
                      <span>Rs: <?php echo $row['items_price'] ?></span>
                    </p>
                    <span class="tag1"></span>
                  </div>
                  <div class="description">
                    <p><?php echo $row['items_desc'] ?></p>
                  </div>
                  <div class="product-info smart-form">
                    <div class="row">
                      <div class="col-12">
                        <a href="javascript:void(0);" class="btn btn-info" onclick="modalStart()">More info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end product -->
          </div>
        <?php
        }
        ?>

      </div>

    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form class="modal-content" action="#" method="post">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['items_name'] ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <img class="img-fluid" src="<?php
                      echo $row['items_img'];
                      ?>" class="img-responsive" />
              </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Price</label>
                  <p><?php echo $row['items_name'] ?></p>
              </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Car details</label>
                      <p><?php echo $row['items_desc'] ?></p>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Price</label>
                      <p><?php echo $row['items_price'] ?></p>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </form>
      </div>
  </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script></script>
  </body>

  </html>
<?php
}
else
{
  header("Location: index.php");
}
?>