<?php

$connect = new PDO("mysql:host=localhost;dbname=startupcompanion", "root", "");
$message = '';
if (isset($_POST["email"])) {
    sleep(5);
    $query = "
 INSERT INTO owners 
 (name,company,designation,field,mobileno,email,password,medium,linkedin,github,qualifications,work_experience) VALUES 
 (:name, :company, :designation, :field, :mobileno, :email, :password,:medium, :linkedin, :github, :qualifications, :work_experience)
 ";
    //  $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $user_data = array(
        ':name'  => $_POST["name"],
        ':company'  => $_POST["company"],
        ':designation'   => $_POST["designation"],
        ':field'   => $_POST["field"],
        ':mobileno'  => $_POST["mobileno"],
        ':email'   => $_POST["email"],
        //':password'   => $password_hash,
        ':password'   => $_POST["password"],
        ':medium'   => $_POST["medium"],
        ':linkedin'   => $_POST["linkedin"],
        ':github'   => $_POST["github"],
        ':qualifications'   => $_POST["qualifications"],
        ':work_experience'   => $_POST["work_experience"]
    );

    $statement = $connect->prepare($query);
    if ($statement->execute($user_data)) {
        $message = '
  <div class="alert alert-success">
  Registration Completed Successfully. Wait for the admin approval to login!
  </div>
  ';
    } else {
        $message = '
  <div class="alert alert-success">
  There is an error in Registration! You may have already registered with the same email!
  </div>
  ';
    }
}
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Multi Step Registration Form Using JQuery Bootstrap in PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url("images/bgadv.png");

            background-position: center;
            background-size: cover;


        }

        .box {
            width: 500px;
            margin: 0 auto;
            background-color: rgb(204, 178, 241);

            margin: 8% auto;

            border-radius: 5px;
            position: relative;
        }


        .active_tab1 {
            background: linear-gradient(to right, #a506e4, #5907f3);
            color: white;
            font-weight: 600;
        }

        .inactive_tab1 {
            background-color: #f5f5f5;
            color: #590979;
            font-weight: 600;
            cursor: not-allowed;
        }

        .has-error {
            border-color: red;
            background-color: #CBC3E3;
        }
    </style>
</head>

<body>
    <br />
    <div class="container box">
        <br />

        <h2 align="center">Registration - Startup Owner</h2>
        <h4 align="center">Already have an account?<a href="login-advisor.php">    Login now</a></h4><br/><br>

        <?php echo $message; ?>
        <form method="post" id="register_form">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Login Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Contact Details</a>
                </li>
            </ul>
            <div class="tab-content" style="margin-top:16px;">
                <div class="tab-pane active" id="login_details">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login Details</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Enter Email Address</label>
                                <input type="text" name="email" id="email" class="form-control" />
                                <span id="error_email" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                                <span id="error_password" class="text-danger"></span>
                            </div>
                            <br />
                            <div align="center">
                                <button type="button" style="background:linear-gradient(to right,#a506e4, #5907f3);" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="personal_details">
                    <div class="panel panel-default">
                        <div class="panel-heading">Fill Personal Details</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Enter Name</label>
                                <input type="text" name="name" id="first_name" class="form-control" />
                                <span id="error_first_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Company</label>
                                <input type="text" name="company" id="last_name" class="form-control" />
                                <span id="error_last_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter designation</label>
                                <input type="text" name="designation" id="last_name" class="form-control" />
                                <span id="error_last_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter field</label>
                                <input type="text" name="field" id="last_name" class="form-control" />
                                <span id="error_last_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter age</label>
                                <input type="text" name="mobileno" id="last_name" class="form-control" />
                                <span id="error_last_name" class="text-danger"></span>
                            </div>
                            <!-- <div class="form-group">
                                <label>Enter Company</label>
                                <input type="text" name="company" id="last_name" class="form-control" />
                                <span id="error_last_name" class="text-danger"></span>
                            </div> -->

                            <br />
                            <div align="center">
                                <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
                                <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact_details">
                    <div class="panel panel-default">
                        <div class="panel-heading">Fill Contact Details</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Enter Mobile no</label>
                                <input type="text" name="medium" id="mobile_no" class="form-control" />
                                <span id="error_mobile_no" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>linkedinlink</label>
                                <input type="text" name="linkedin" id="mobile_no" class="form-control" />
                                <span id="error_mobile_no" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>github</label>
                                <input type="text" name="github" id="mobile_no" class="form-control" />
                                <span id="error_mobile_no" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>qualifications</label>
                                <textarea name="qualifications" id="address" class="form-control"></textarea>
                                <span id="error_address" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>work_experience</label>
                                <textarea name="work_experience" id="address" class="form-control"></textarea>
                                <span id="error_address" class="text-danger"></span>
                            </div>


                            <br />
                            <div align="center">
                                <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                                <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $('#btn_login_details').click(function() {

            var error_email = '';
            var error_password = '';
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if ($.trim($('#email').val()).length == 0) {
                error_email = 'Email is required';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');
            } else {
                if (!filter.test($('#email').val())) {
                    error_email = 'Invalid Email';
                    $('#error_email').text(error_email);
                    $('#email').addClass('has-error');
                } else {
                    error_email = '';
                    $('#error_email').text(error_email);
                    $('#email').removeClass('has-error');
                }
            }

            if ($.trim($('#password').val()).length == 0) {
                error_password = 'Password is required';
                $('#error_password').text(error_password);
                $('#password').addClass('has-error');
            } else {
                error_password = '';
                $('#error_password').text(error_password);
                $('#password').removeClass('has-error');
            }

            if (error_email != '' || error_password != '') {
                return false;
            } else {
                $('#list_login_details').removeClass('active active_tab1');
                $('#list_login_details').removeAttr('href data-toggle');
                $('#login_details').removeClass('active');
                $('#list_login_details').addClass('inactive_tab1');
                $('#list_personal_details').removeClass('inactive_tab1');
                $('#list_personal_details').addClass('active_tab1 active');
                $('#list_personal_details').attr('href', '#personal_details');
                $('#list_personal_details').attr('data-toggle', 'tab');
                $('#personal_details').addClass('active in');
            }
        });

        $('#previous_btn_personal_details').click(function() {
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active in');
            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_login_details').removeClass('inactive_tab1');
            $('#list_login_details').addClass('active_tab1 active');
            $('#list_login_details').attr('href', '#login_details');
            $('#list_login_details').attr('data-toggle', 'tab');
            $('#login_details').addClass('active in');
        });

        $('#btn_personal_details').click(function() {
            var error_first_name = '';
            var error_last_name = '';

            if ($.trim($('#first_name').val()).length == 0) {
                error_first_name = 'Name is required';
                $('#error_first_name').text(error_first_name);
                $('#first_name').addClass('has-error');
            } else {
                error_first_name = '';
                $('#error_first_name').text(error_first_name);
                $('#first_name').removeClass('has-error');
            }

            if ($.trim($('#last_name').val()).length == 0) {
                error_last_name = 'Company Name is required';
                $('#error_last_name').text(error_last_name);
                $('#last_name').addClass('has-error');
            } else {
                error_last_name = '';
                $('#error_last_name').text(error_last_name);
                $('#last_name').removeClass('has-error');
            }

            if (error_first_name != '' || error_last_name != '') {
                return false;
            } else {
                $('#list_personal_details').removeClass('active active_tab1');
                $('#list_personal_details').removeAttr('href data-toggle');
                $('#personal_details').removeClass('active');
                $('#list_personal_details').addClass('inactive_tab1');
                $('#list_contact_details').removeClass('inactive_tab1');
                $('#list_contact_details').addClass('active_tab1 active');
                $('#list_contact_details').attr('href', '#contact_details');
                $('#list_contact_details').attr('data-toggle', 'tab');
                $('#contact_details').addClass('active in');
            }
        });

        $('#previous_btn_contact_details').click(function() {
            $('#list_contact_details').removeClass('active active_tab1');
            $('#list_contact_details').removeAttr('href data-toggle');
            $('#contact_details').removeClass('active in');
            $('#list_contact_details').addClass('inactive_tab1');
            $('#list_personal_details').removeClass('inactive_tab1');
            $('#list_personal_details').addClass('active_tab1 active');
            $('#list_personal_details').attr('href', '#personal_details');
            $('#list_personal_details').attr('data-toggle', 'tab');
            $('#personal_details').addClass('active in');
        });

        $('#btn_contact_details').click(function() {
            var error_address = '';
            var error_mobile_no = '';
            var mobile_validation = /^\d{10}$/;
            if ($.trim($('#address').val()).length == 0) {
                error_address = 'Address is required';
                $('#error_address').text(error_address);
                $('#address').addClass('has-error');
            } else {
                error_address = '';
                $('#error_address').text(error_address);
                $('#address').removeClass('has-error');
            }

            if ($.trim($('#mobile_no').val()).length == 0) {
                error_mobile_no = 'Mobile Number is required';
                $('#error_mobile_no').text(error_mobile_no);
                $('#mobile_no').addClass('has-error');
            } else {
                if (!mobile_validation.test($('#mobile_no').val())) {
                    error_mobile_no = 'Invalid Mobile Number';
                    $('#error_mobile_no').text(error_mobile_no);
                    $('#mobile_no').addClass('has-error');
                } else {
                    error_mobile_no = '';
                    $('#error_mobile_no').text(error_mobile_no);
                    $('#mobile_no').removeClass('has-error');
                }
            }
            if (error_address != '' || error_mobile_no != '') {
                return false;
            } else {
                $('#btn_contact_details').attr("disabled", "disabled");
                $(document).css('cursor', 'prgress');
                $("#register_form").submit();
            }

        });

    });
</script>