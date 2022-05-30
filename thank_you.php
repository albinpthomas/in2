<?php
include "include/dbconnect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <title>Payment Done</title>
</head>

<body>

    <!-- CONTENT -->
    <section id="content">
        <!-- MAIN -->
        <main>

            <div class="table-data">
                <div class="order">
                    <center>
                        <img class="panimation" src="./assets/images/101253-successful.gif" alt="paysucc">
                        <h1>PAYMENT SUCCESS</h1>
                        <a href="gen_receipt.php"><input class="btn btn-success m-2" type="button" value="Download Reciept"></a>
                    </center>
                </div>
            </div>




    </section>





    <script src="js/script.js"></script>
</body>

</html>