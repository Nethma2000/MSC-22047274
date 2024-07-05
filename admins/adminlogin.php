<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../owners/advisorlogin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">

        </div>
        <!-- /.login-logo -->
        <img class="wave" src="../images/wave.jpg">
        <div class="container">
            <div class="img">
                <img src="../images/imgonline-com-ua-ReplaceColor-YFmjdxRxLy9eTky-removebg-preview.png">
            </div>
            <div class="login-content">

                <form method="post" action="loginadmin.php">

                    <img src="../images/3870822.png">
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

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/advisorlogin.js"></script>


       
       


    </div>
    </div>
    </form>

    <br>

    </div>
    <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- iCheck -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>