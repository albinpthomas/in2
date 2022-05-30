<?php
session_start();
if (isset($_SESSION['toGoods']) == session_id()) {
    header("Location: home.php");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/css/style.css">
        <link href="./assets/css/all.css" rel="stylesheet">
        <script>
            function validateEmail() {
                var emails = document.getElementById('gmail').value;
                if (emails == "") {
                    document.getElementById('mail').innerHTML = " ** Please fill the email id field";
                    return false;
                }
                if (emails.indexOf('@') <= 0) {
                    document.getElementById('mail').innerHTML = " ** Incorrect format";
                    return false;
                }

                if ((emails.charAt(emails.length - 4) != '.') && (emails.charAt(emails.length - 3) != '.')) {
                    document.getElementById('mail').innerHTML = " ** . Invalid Position";
                    return false;
                } else {
                    document.getElementById('mail').innerHTML = "";

                }
            }

            function labelSwitch() {
                document.getElementById("nemail").style.visibility = "visible";
            }

            function revertSwitch() {
                var emails = document.getElementById('gmail').value;
                if (emails == "") {
                    document.getElementById("nemail").style.visibility = "hidden";
                    document.getElementsByTagName("INPUT")[0].setAttribute("placeholder", "Email");
                }
            }

            function labelPassSwitch() {
                document.getElementById("npass").style.visibility = "visible";
            }

            function revertPassSwitch() {
                var passwords = document.getElementById('opass').value;
                if (passwords == "") {
                    document.getElementById("npass").style.visibility = "hidden";
                    document.getElementsByTagName("INPUT")[1].setAttribute("placeholder", "Password");
                }
            }

            function labelSwitch() {
                document.getElementById("nemail").style.visibility = "visible";
            }

            function revertSwitch() {
                var emails = document.getElementById('gmail').value;
                if (emails == "") {
                    document.getElementById("nemail").style.visibility = "hidden";
                    document.getElementsByTagName("INPUT")[0].setAttribute("placeholder", "Email");
                }
            }
        </script>
    </head>

    <body>
        <div class="main-container">
            <div class="logo-container">
                <img class="logo" src="./assets/images/LOGO.svg">
            </div>
            <div class="login-container">
                <form class="login-form" method="post" action="./authentication.php">
                    <h1>Hello</h1>
                    <span>
                        <h3>Login to your account</h3>
                    </span>
                    <div class="newlabel" id="nemail">Email</div>
                    <div class="input-field">
                        <input class="effect" type="email" oninput="labelSwitch(); revertSwitch();" onblur="validateEmail()" placeholder="Email" id="gmail" name="email" required autocomplete="off">
                        <span class="focus-border"></span><br>

                    </div>
                    <span id="mail" class="text-danger font-weight-bold"> </span>
                    <div class="newlabel" id="npass">Password</div>
                    <div class="input-field">
                        <input class="effect" type="password" placeholder="Password" oninput="labelPassSwitch(); revertPassSwitch();" id="opass" name="password" required autocomplete="off">
                        <span class="focus-border"></span>
                        <span id="opass" class="text-danger font-weight-bold"> </span>
                    </div>
                    <span style="text-align: right;margin-right: 30px;"><a>Forgot password ?</a></span>
                    <div class="input-field">
                        <input class=btn type="submit" name="submitBtn" value="LOG IN">
                    </div>

                    <span>Don't have account ?<a href="register.php">Sign Up</a></span>

                </form>
            </div>
        </div>

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
}
