<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Your Acoount</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./assets/css/all.css" rel="stylesheet">
    <style>
        .text-danger {
            color: red;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="logo-container">
            <img class="logo" src="./assets/images/LOGO.svg">
        </div>
        <div class="login-container">

            <form class="login-form" method="post" action="./authentication.php">
                <h1>Welcome</h1>
                <span>
                    <h3>Create your account</h3>
                </span>
                <div class="newlabel" id="nfname">First Name:</div>
                <div class="input-field">
                    <input class="effect" type="text" placeholder="First Name" id="firstname" name="fname" oninput="labelFnameSwitch(); revertFnameSwitch();" required autocomplete="off" onblur="ValidateFirstName()">
                    <span class="focus-border"></span>
                    <span id="fname" class="text-danger font-weight-bold"> </span>
                </div>
                <div id="errorfname"></div>
                <div class="newlabel" id="nlname">Last Name:</div>
                <div class="input-field">
                    <input class="effect" type="text" placeholder="Last Name" id="lastname" name="lname" oninput="labelLnameSwitch(); revertLnameSwitch();" required autocomplete="off" onblur="ValidatelastName()">
                    <span class="focus-border"></span>
                    <span id="lname" class="text-danger font-weight-bold"> </span>
                </div>
                <div id="errorlname"></div>
                <div class="newlabel" id="nemail">Email:</div>
                <div class="input-field">
                    <input class="effect" type="email" placeholder="Email" id="email" name="email" oninput="labelSwitch(); revertSwitch();" required autocomplete="off" onblur="validateEmail()">
                    <span class="focus-border"></span>
                    <span id="gmail" class="text-danger font-weight-bold"> </span>
                </div>
                <div id="erroremail"></div>
                <div class="newlabel" id="npass">Password:</div>
                <div class="input-field">
                    <input class="effect" type="password" placeholder="Password" id="password" name="password" oninput="labelpasswordSwitch(); revertpasswordSwitch();" required autocomplete="off" onblur="passwordValidate()">
                    <span class="focus-border"></span>
                    <span id="pass" class="text-danger font-weight-bold"> </span>
                </div>
                <div id="errorpassword"></div>
                <div class="newlabel" id="ncpass">Confirm Password:</div>
                <div class="input-field">
                    <input class="effect" type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" oninput="labelcpasswordSwitch(); revertcpasswordSwitch();" required autocomplete="off" onblur="cpasswordValidate()">
                    <span class="focus-border"></span>
                    <span id="cpass" class="text-danger font-weight-bold"> </span>
                </div>
                <div id="errorcpassword"></div>


                <div class="input-field">
                    <input class="btn" type="submit" name="submitBtnReg" value="REGISTER" />
                </div>
                <span>Already have an account ?<a href="./index.php">Login</a></span>
                <!--   <span>Don't have Business account ?<a href="./businessregister.php">Sign Up Business</a></span>-->

            </form>
        </div>
    </div>

    <script>
        let count = 0;

        function ValidateFirstName() {
            var user = document.getElementById('firstname').value;

            if (user.match(/^[a-zA-Z]+$/)) {
                document.getElementById('errorfname').innerHTML = "";
                return true;
            } else if (user == "") {
                document.getElementById('errorfname').innerHTML = "";
                document.getElementById('errorfname').innerHTML = " ** Blank field!!! Enter your First Name";
                return false;
            } else {
                document.getElementById('errorfname').innerHTML = "";
                document.getElementById('errorfname').innerHTML = " ** only alphabets are allowed";
                return false;
            }
            count++;
        }

        function ValidatelastName() {
            var user = document.getElementById('lastname').value;
            if (user.match(/^[a-zA-Z]+$/)) {
                document.getElementById('errorlname').innerHTML = "";
                return true;
            } else if (user == "") {
                document.getElementById('errorlname').innerHTML = "";
                document.getElementById('errorlname').innerHTML = " ** Blank field!!! Enter your Last Name";
                return false;
            } else {
                document.getElementById('errorlname').innerHTML = "";
                document.getElementById('errorlname').innerHTML = " ** only alphabets are allowed";
                return false;
            }
            count++;
        }

        function validateEmail() {
            var emails = document.getElementById('email').value;
            var emailChk = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (emails.match(emailChk)) {
                document.getElementById('erroremail').innerHTML = "";
                return true;
            } else if (emails == "") {
                document.getElementById('erroremail').innerHTML = " ** Please fill the email id field";
                return false;
            } else {
                document.getElementById('erroremail').innerHTML = " ** Invalid Email";
                return false;
            }
        }

        function passwordValidate() {
            var pass = document.getElementById('password').value;

            if (pass == "") {
                document.getElementById('errorpassword').innerHTML = " ** Please fill the password field";
                return false;
            } else if ((pass.length < 8) || (pass.length > 20)) {
                document.getElementById('errorpassword').innerHTML = " ** Passwords lenght must be between  8 and 20";
                return false;
            } else {
                document.getElementById('errorpassword').innerHTML = "";
                return true;
            }
            count++;
        }

        function cpasswordValidate() {
            var pass = document.getElementById('password').value;
            var cpass = document.getElementById('cpassword').value;
            if (cpass == "") {
                document.getElementById('errorcpassword').innerHTML = " ** Please fill the confirm field";
                return false;
            } else if ((cpass.length < 8) || (cpass.length > 20)) {
                document.getElementById('errorcpassword').innerHTML = " ** Passwords lenght must be between  8 and 20";
                return false;
            } else if (pass != cpass) {
                document.getElementById('errorcpassword').innerHTML = " ** Password does not match the confirm password";
                return false;
            } else {
                document.getElementById('errorcpassword').innerHTML = "";
                return true;
            }
            count++;
        }

        function FormSubmit() {
            if (count == 5) {
                return true;
            } else {
                return false;
            }
        }

        function labelFnameSwitch() {
            document.getElementById("nfname").style.visibility = "visible";
        }

        function revertFnameSwitch() {
            var emails = document.getElementById('firstname').value;
            if (emails == "") {
                document.getElementById("nfname").style.visibility = "hidden";
                document.getElementsByTagName("INPUT")[0].setAttribute("placeholder", "First Name");
            }
        }

        function labelLnameSwitch() {
            document.getElementById("nlname").style.visibility = "visible";
        }

        function revertLnameSwitch() {
            var emails = document.getElementById('lastname').value;
            if (emails == "") {
                document.getElementById("nlname").style.visibility = "hidden";
                document.getElementsByTagName("INPUT")[0].setAttribute("placeholder", "First Name");
            }
        }

        function labelSwitch() {
            document.getElementById("nemail").style.visibility = "visible";
        }

        function revertSwitch() {
            var emails = document.getElementById('email').value;
            if (emails == "") {
                document.getElementById("nemail").style.visibility = "hidden";
                document.getElementsByTagName("INPUT")[2].setAttribute("placeholder", "Email");
            }
        }

        function labelpasswordSwitch() {
            document.getElementById("npass").style.visibility = "visible";
        }

        function revertpasswordSwitch() {
            var emails = document.getElementById('password').value;
            if (emails == "") {
                document.getElementById("npass").style.visibility = "hidden";
                document.getElementsByTagName("INPUT")[0].setAttribute("placeholder", "First Name");
            }
        }

        function labelcpasswordSwitch() {
            document.getElementById("ncpass").style.visibility = "visible";
        }

        function revertcpasswordSwitch() {
            var emails = document.getElementById('cpassword').value;
            if (emails == "") {
                document.getElementById("ncpass").style.visibility = "hidden";
                document.getElementsByTagName("INPUT")[0].setAttribute("placeholder", "First Name");
            }
        }
    </script>
</body>

</html>