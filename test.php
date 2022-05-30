<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- End of Sidebar -->

<!-- Begin Page Content -->
<form action="#" method="POST">
    <div class="table" style="padding: 0px;">
        <?php
        include('../../include/dbconnect.php');
        //error_reporting(0);
        $query = "SELECT * FROM tbl_all_car";
        $data = mysqli_query($connect, $query);
        $tot = mysqli_num_rows($data);
        if ($tot != 0) {
        ?>
            <table class="table">
                <thead class="thead-dark w-100">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Car type</th>
                        <th scope="col">Car Name</th>
                        <th scope="col">Car Chasis No.</th>
                        <th scope="col">Registration No.</th>
                        <th scope="col">Car Colour</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Fuel</th>
                        <th scope="col">Rate/hour</th>
                        <th scope="col">Image</th>


                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                <?php
                $i=1;
                while ($res = mysqli_fetch_assoc($data)) {
                    echo "<tr>
    <th scope='row'>" .$i. "</th>
		<td>" . $res['car_company'] . "</td>
        <td>" . $res['car_type'] . "</td>
        <td>" . $res['car_name'] . "</td>
        <td>" . $res['chasis_num'] . "</td>
        <td>" . $res['reg_num'] . "</td>
        <td>" . $res['colour'] . "</td>
		<td>" . $res['car_model'] . "</td>
        <td>" . $res['car_fuel'] . "</td>
        <td>" . $res['car_rate'] . "</td>

        <td><img src='". $res['car_image'] ."' alt='' class='car img-fluid img-thumbnail'>  </td>
        <td><button type='submit' class='btn btn-danger' name='deleteItem' value=" . $res['id'] . "><i class='fas fa-trash'></i></button></td>

		</tr>";
        $i++;
                }
            }
                ?>
                <?php
                if (isset($_POST['deleteItem'])) {
                    extract($_POST);


                    echo $sqlq = "DELETE from tbl_all_car where id ='$deleteItem'";

                    if (mysqli_query($connect, $sqlq)) {
                        // header("Location: ./admin_consumers.php");
                        echo ("<script LANGUAGE='JavaScript'>
    
		    window.location.href='./display_cars.php';
		  </script>");
                    }
                }
                ?>
    </div>


    </tbody>
    </table>
    </div>
    </div>
</form>


<!-- Bootstrap core JavaScript-->
<?php
include('includes/scripts.php');

?>