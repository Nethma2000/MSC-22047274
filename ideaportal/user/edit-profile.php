<?php

session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body style="background-color: purple;" class="hold-transition skin- sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <a href="index.php" class="logo logo-bg">
      <span class="logo-mini"><b>J</b>P</span>
      <span style="color: white;" class="logo-lg"><b>Job Portal</b> </span>
    </a>

    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
              
        </ul>
      </div>
    </nav>
  </header>


  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="edit-profile.php"><i style="color: purple;" class="fa fa-user"></i> Edit Profile</a></li>
                  <li><a href="index.php"><i style="color: purple;" class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="../jobs.php"><i style="color: purple;" class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="mailbox.php"><i style="color: purple;" class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="settings.php"><i style="color: purple;" class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="../logout.php"><i style="color: purple;" class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2 style="color: purple;"><i><b>Edit Profile</b></i></h2>
            <form action="update-profile.php" method="post" enctype="multipart/form-data">
            <?php
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);


            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>
              <div class="row">
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                     <label for="fname">First Name</label>
                    <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name" onkeypress="return validateName(event);" value="<?php echo $row['firstname']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name" onkeypress="return validateName(event);" value="<?php echo $row['lastname']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" class="form-control input-lg" rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control input-lg" id="city" name="city" onkeypress="return validateName(event);" value="<?php echo $row['city']; ?>" placeholder="city">
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control input-lg" id="state" name="state"  placeholder="state" onkeypress="return validateName(event);" value="<?php echo $row['state']; ?>">
                  </div>
                  <div class="form-group">
                    <button style="background-color: purple;color:white;" type="submit" class="btn btn-flat btn-">Update</button>
                  </div>
                </div>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <label for="contactno">Contact Number</label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" onkeypress="return validatePhone(event);" maxlength="10" minlength="10" value="<?php echo $row['contactno']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="qualification">Highest Qualification</label>
                    <input type="text" class="form-control input-lg" id="qualification" name="qualification" placeholder="Highest Qualification" value="<?php echo $row['qualification']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="stream">Stream</label>
                    <input type="text" class="form-control input-lg" id="stream" name="stream" placeholder="stream" value="<?php echo $row['stream']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Skills</label>
                    <textarea class="form-control input-lg" rows="4" name="skills" onkeypress="return validateName(event);" ><?php echo $row['skills']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Upload/Change Resume</label>
                    <input type="file" name="resume" class="btn btn-default">
                  </div>
                </div>
              </div>
              <?php
                }
              }
            ?>   
            </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    

  </div>

  <div class="control-sidebar-bg"></div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="../js/adminlte.min.js"></script>
<script type="text/javascript">
  

       function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }




       function validateName(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 32) {
        
          return true;
        } else if( key < 65 || key > 90 && key < 97 || key > 122) {
          // 65-90 97-122 is A-Z a-z alphabets on your keyboard.
          return false;
        } else return true;
      }


</script>
</body>
</html>
