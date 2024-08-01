<?php

include('../ensession.php');

include('../db.php');
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select id_user,email,name from entrepreneurs where email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['name'];
$loggedin_id=$row['email'];
$loggedin_userid=$row['id_user'];

if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>StartupCompanion | Navigate your startup journey</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  
  <link href="../../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
  <link href="../../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="../../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../../admins/assets/css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 150 });</script>
 
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


        <style>
    body {
      background-color: #f6f9ff;
    }
  </style>
      </head>
<body>


<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="../../entrepreneurs/entrepreneurhome.php" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <div style="width: auto;">
    <span class="d-none d-lg-block" style="white-space: nowrap;">Entrepreneur Dashboard</span>
</div>    </a>
  <i class="bi bi-list toggle-sidebar-btn" style="margin-left: 30px;"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
   


    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <?php

$sql = "SELECT * FROM entrepreneurs WHERE id_user='$loggedin_userid'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {

if ($row['prof_img'] != "") { ?>
  <img src="../../entrepreneurs/uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
<?php } else { ?>
  <img src="../../images/defaultimage.png" class="img-responsive">
<?php } ?>
<span class="d-none d-md-block dropdown-toggle ps-2">Welcome <?php echo $loggedin_session; ?></span>

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
<li class="dropdown-header">
  <h6><?php echo $loggedin_session; ?></h6>
</li>
<li>
  <hr class="dropdown-divider">
</li>

<li>
  <a class="dropdown-item d-flex align-items-center" href="../../entrepreneurs/users-profile.php">
    <i class="bi bi-person"></i>
    <span>My Profile</span>
  </a>
</li>
<li>
  <hr class="dropdown-divider">
</li>

<li>
  <a class="dropdown-item d-flex align-items-center" href="../../entrepreneurs/users-profile.php">
    <i class="bi bi-gear"></i>
    <span>Account Settings</span>
  </a>
</li>
<li>
  <hr class="dropdown-divider">
</li>
</li>
<li>
  <hr class="dropdown-divider">
</li>

<li>
  <a class="dropdown-item d-flex align-items-center" href="../../logout.php">
    <i class="bi bi-box-arrow-right"></i>
    <span>Sign Out</span>
  </a>
</li>

</ul>
</li>
<?php

}
}
?>
</ul>
</nav>

</header>
</header>


 
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="../../entrepreneurs/entrepreneurhome.php">
      <i class="bi bi-grid"></i>
      <span  style="font-size: 17px;">Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" href="../../forum/forum-home.php">
    <i class="bi bi-chat-square-text"></i>
    </i><span style="font-size: 17px;">Forum</span></i>
    </a>

    <!-- <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav"  href="#">
      <i class="bi bi-menu-button-wide"></i><span>Learning</span></i>
    </a> -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-book"></i>
    <span style="font-size: 17px;">Learning</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../knowledge/entrepreneurside/allcourses.php">
          <i class="bi bi-circle"></i><span style="font-size: 15px;">All Courses</span>
        </a>
      </li>
      <li>
        <a href="icons-remix.html">
          <i class="bi bi-circle"></i><span style="font-size: 15px;">Enrolled Courses</span>
        </a>
      </li>
    
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-bs-target="#compo-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-trophy"></i><span style="font-size: 17px;">Idea Validation</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="compo-nav" class="nav-content " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../advisorselection.php">
          <i class="bi bi-circle"></i><span style="font-size: 15px;">Advisors</span>
        </a>
      </li>
      <li>
        <!-- <a href="../ideaportal/user/index.php"> -->
        <a href="index.php">

          <i class="bi bi-circle"></i><span style="font-size: 15px;">My Validation Requests Sent</span>

          
        </a>
      </li>
      <li>
        <a class="nav-link"  href="mailbox.php">
          <i class="bi bi-circle"></i><span style="font-size: 15px;">Mailbox</span>
        </a>
      </li>

    </ul>
  </li>



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" href="#">
    <i class="bi bi-gem"></i><span style="font-size: 17px;">Prediction</span></i>
    </a>



    <a class="nav-link collapsed" href="../admins/blog/">
    <i class="bi bi-journals"></i>
      <span style="font-size: 17px;">Blogs</span>
    </a>

    
    <li class="nav-item">

    <a class="nav-link collapsed" href="../../events/index.php">
    <i class="bi bi-calendar-event"></i>
    <span>Events</span>
    </a>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-calendar2-plus"></i>
    <span style="font-size: 17px;">Meetings</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
        </a>
      </li>
      <li>
        <a href="icons-remix.html">
          <i class="bi bi-circle"></i><span>Remix Icons</span>
        </a>
      </li>
      <li>
        <a href="icons-boxicons.html">
          <i class="bi bi-circle"></i><span>Boxicons</span>
        </a>
      </li>
    </ul>
  </li>


  <li class="nav-item">

    <a class="nav-link collapsed" href="../chat/login.php">
    <i class="bi bi-chat-dots"></i>         
      <span style="font-size: 17px;">Live Chat</span>
    </a>

    <!-- <a class="nav-link collapsed" href="#">
      <i class="bi bi-person"></i>
      <span>Link 2</span>
    </a> -->

    <!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
      <i class="bi bi-person"></i>
      <span>Advisors</span>
    </a> -->
  </li>




</ul>

</aside>



  <div class="content-wrapper" style="margin-left: 0px; margin-top: 100px;background-color: #f6f9ff;">

<section id="candidates" class="content-header" style="margin-left: 400px;">
 
      <div class="col-md-9 bg-white padding-2">
      <form action="add-mail.php" method="post">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Compose New Message</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <select name="to" class="form-control">
                <?php 
$sql = "SELECT * FROM validationrequets INNER JOIN advisor ON validationrequets.id_advisor=advisor.id_advisor WHERE validationrequets.id_user='$loggedin_userid'";
$result = $conn->query($sql);
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['id_advisor'].'">'.$row['advisor_name'].'</option>';
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <input class="form-control" name="subject" placeholder="Subject:">
            </div>
            <div class="form-group">
              <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="pull-right">
              <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
            </div>
            <a href="mailbox.php" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</section>

    

  </div>



</div>

<script src="../../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../admins/assets/vendor/chart.js/chart.umd.js"></script>
<script src="../../admins/assets/vendor/echarts/echarts.min.js"></script>
<script src="../../admins/assets/vendor/quill/quill.min.js"></script>
<script src="../../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../../admins/assets/vendor/php-email-form/validate.js"></script>
<script src="../../admins/assets/js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>

</body>
</html>
