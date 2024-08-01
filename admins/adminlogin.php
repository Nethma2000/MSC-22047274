<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>


<title>StartupCompanion | Navigate your startup journey</title>

    <head>
    <title>StartupCompanion | Navigate your startup journey</title>
    <link rel="stylesheet" type="text/css" href="../owners/advisorlogin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/img/logo1.jpg" type="image/jpg" sizes="150x130">
</head>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">

        </div>
        <img class="wave" src="../images/wave1.jpg">
        <div class="container">
            <div class="img">
                <img src="../images/img22-removebg-preview.png">
            </div>
            <div class="login-content">

                <form method="post" action="loginadmin.php">

                    <img src="../images/proimg.jpg">
                    <h2 class="title">Welcome</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">

                            <input type="text" class="input" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">

                            <input type="password" class="input" name="password" placeholder="Password">
                        </div>
                    </div>
                    <!-- <a href="#">Forgot Password?</a><br> -->
                    <!-- <a style="color: purple;" href="advisorregistration.php">Don't have an account? Create a new account </a> -->

                    <button type="submit" style="background-color:#0096FF;" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/advisorlogin.js"></script>


       
       


    </div>
    </div>
    </form>

    <br>

    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' 
            });
        });
    </script>
</body>

</html>