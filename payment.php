<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance Payment</title>
    <link rel="stylesheet" href="./styles/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
</head>

<body class="pbody">
    <form>
        <h1 class="phead">Pay Advance</h1>
        <div class="paybox">
            <input class="form-control mr-sm-2" type="textbox" name="name" id="name" placeholder="Enter your name" required /><br /><br />
            <input class="form-control mr-sm-2" type="text" disabled id="nameOfItem" value="<?php echo $_GET['name'] ?>"><br><br>
            <input class="form-control mr-sm-2" type="text" disabled id="price" value="5000"><br><br>
            <input class="btn btn-success col-12 m-2" type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
        </div>
    </form>
</body>

</html>

<script>
    function pay_now() {
        var name = jQuery('#name').val();
        var price = jQuery('#price').val();
        var nameOfItem = jQuery('#nameOfItem').val();


        jQuery.ajax({
            type: 'post',
            url: 'payment_process.php',
            data: {
                "amt": price,
                "name": name,
                "carName": nameOfItem
            },
            success: function(result) {
                var options = {
                    "key": "rzp_test_rHL7LKby0aHazx",
                    "amount": price * 100,
                    "currency": "INR",
                    "name": "In2goods",
                    "description": "Secure Transaction",
                    "image": "./assets/images/Logo.png",
                    "handler": function(response) {
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "thank_you.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });


    }
</script>