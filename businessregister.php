<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Business Register </title>
    <meta name="description">
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
           
            <form class="login-form" method="post" onsubmit="return FormSubmit()" action="./authentication.php">

                <span>
                    <h3>Register your Business</h3>
                </span>
                <div class="input-field">
                    <input class="effect" type="text" placeholder="Business Owner Name" id="businesownersname" name="bownername" required autocomplete="off" onblur="ValidatebusinessownerName()">
                    <span class="focus-border" ></span>
                    <span id="boname" class="text-danger font-weight-bold"> </span>
                </div>
                <div class="input-field">
                    <input class="effect" type="text" placeholder="Business Name" id="businessname" name="bname" required autocomplete="off" onblur="ValidatebusinessName()">
                    <span class="focus-border" ></span>
                    <span  id="bname"  class="text-danger font-weight-bold"> </span>
                </div>
                <div class="input-field">
                    <input class="effect" type="email" placeholder="Business Email" id="businessemail" name="bemail" required autocomplete="off" onblur="ValidatebusinessEmail()">
                    <span class="focus-border" ></span>
                    <span  id="bemail"  class="text-danger font-weight-bold"> </span>
                </div>
                <div class="input-field">
                    <input class="effect" type="password" placeholder="Password" id="password" name="password" required onblur="passwordValidate()"
                        autocomplete="off">
                    <span class="focus-border" ></span>
                    <span  id="pass"  class="text-danger font-weight-bold"> </span>
                </div>
                <div class="input-field">
                    <input class="effect" type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" required onblur="cpasswordValidate()"
                        autocomplete="off">
                    <span class="focus-border" ></span>
                    <span  id="cpass"  class="text-danger font-weight-bold"> </span>
                </div>

                
                <div class="input-field">
                    <input class="btn" type="submit" name="submitBtnBussiness" value="REGISTER">
                   
                </div>
                

                <span>Already have an account ?<a href="./index.php">Login</a></span>

            </form>
        </div>
    </div>

    <script src="./assets/js/action.js" async defer></script>
    <script>
        let count=0;
        function ValidatebusinessownerName() {
            var user = document.getElementById('businesownersname').value;
            if (user == "") {
                document.getElementById('boname').innerHTML = " ** Please fill the Firstname field";
                return false;
            } else {
                document.getElementById('boname').innerHTML = "";
                if (!isNaN(user)) {
                    document.getElementById('boname').innerHTML = " ** only characters are allowed";
                    return false;
                }
            }
            count++;
        }

        function ValidatebusinessName() {
            var user = document.getElementById('businessname').value;
            if (user == "") {
                document.getElementById('bname').innerHTML = " ** Please fill the Last name field";
                return false;
            } else {
                document.getElementById('bname').innerHTML = "";
                if (!isNaN(user)) {
                    document.getElementById('bname').innerHTML = " ** only characters are allowed";
                    return false;
                }
            }
            count++;
        }

        function ValidatebusinessEmail() {
            var emails = document.getElementById('businessemail').value;
            if (emails == "") {
                document.getElementById('bemail').innerHTML = " ** Please fill the email idx` field";
                return false;
            }
            if (emails.indexOf('@') <= 0) {
                document.getElementById('bemail').innerHTML = " ** @ Invalid Position";
                return false;
            }

            if ((emails.charAt(emails.length - 4) != '.') && (emails.charAt(emails.length - 3) != '.')) {
                document.getElementById('bemail').innerHTML = " ** . Invalid Position";
                return false;
            }
            else{
                document.getElementById('bemail').innerHTML = "";

            }
        }
        function passwordValidate() {
            var pass = document.getElementById('password').value;
            if(pass == ""){
				document.getElementById('pass').innerHTML =" ** Please fill the password field";
				return false;
			}
			else if((pass.length < 8) || (pass.length > 20)) {
				document.getElementById('pass').innerHTML =" ** Passwords lenght must be between  8 and 20";
				return false;	
			}
            else{
                document.getElementById('pass').innerHTML = "";

            }
            count++;
        }
        function cpasswordValidate() {
            var pass = document.getElementById('password').value;
            var cpass = document.getElementById('cpassword').value;
            if(cpass == ""){
				document.getElementById('cpass').innerHTML =" ** Please fill the confirm field";
				return false;
			}
			else if((cpass.length < 8) || (cpass.length > 20)) {
				document.getElementById('cpass').innerHTML =" ** Passwords lenght must be between  8 and 20";
				return false;	
			}
            else if(pass!=cpass){
				document.getElementById('cpass').innerHTML =" ** Password does not match the confirm password";
				return false;
			}
            count++;
        }
        function FormSubmit()
        {
            if(count==5)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
</body>

</html>