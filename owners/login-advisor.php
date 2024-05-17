<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Advisor Login</title>
    <link rel="stylesheet" type="text/css" href="advisorlogin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">

        </div>
        <!-- /.login-logo -->
        <img class="wave" src="../images/advWave.png">
        <div class="container">
            <div class="img">
                <img src="../images/undraw_secure_login_pdn4.svg">
            </div>
            <div class="login-content">

                <form method="post" action="checkadvisorlogin.php">

                    <img src="../images/undraw_profile_pic_ic-5-t.svg">
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
                    <a style="color: purple;" href="advisorregistration.php">Don't have an account? Create a new account </a>

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/advisorlogin.js"></script>


        <?php
        //If Company have successfully registered then show them this success message
        //Todo: Remove Success Message without reload?
        if (isset($_SESSION['registerCompleted'])) {
        ?>
            <div>
                <p class="text-center">You Have Registered Successfully! Your Account Approval Is Pending By Admin</p>
            </div>
        <?php
            unset($_SESSION['registerCompleted']);
        }
        ?>
        <?php
        //If Company Failed To log in then show error message.
        if (isset($_SESSION['loginError'])) {
        ?>
            <div>
                <?php
                echo '<script type="text/javascript">';
                echo 'alert( "Invalid Email/Password! Try Again!")';
                echo '</script>';
                ?>

            </div>
        <?php
            unset($_SESSION['loginError']);
        }
        ?>

        <?php
        //If Company Failed To log in then show error message.
        if (isset($_SESSION['companyLoginError2'])) {
        ?>
            <div>
                <?php
                echo '<script type="text/javascript">';
                echo 'alert( "Your Account Is Still Pending Approval By Admin.")';
                echo '</script>';
                ?>

            </div>
        <?php
            unset($_SESSION['companyLoginError2']);
        }
        ?>

        <?php
        //If Company Failed To log in then show error message.
        if (isset($_SESSION['companyLoginError3'])) {
        ?>
            <div>
                <?php
                echo '<script type="text/javascript">';
                echo 'alert( "Your Account Is Deactivated. Contact Admin For Reactivation.")';
                echo '</script>';
                ?>

            </div>
        <?php
            unset($_SESSION['companyLoginError3']);
        }
        ?>




        <?php
        if (isset($_SESSION['companyLoginError'])) {

            echo '<script type="text/javascript">';
            echo 'alert( "Your Account Is Rejected. Please Contact Admin For More Info.")';
            echo '</script>';
        ?>

            <div>
                <p class="text-center"><?php echo $_SESSION['companyLoginError'] ?></p>
            </div>
        <?php
            unset($_SESSION['companyLoginError']);
        }
        ?>
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