<?php

include('../ensession.php');

$loggedin_userid = $row['id_user'];
$_SESSION["id_user"] = $loggedin_userid;


require_once("../db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <link href="../../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
  <link href="../../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
 
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <style>
    body {
      background-color: #f6f9ff;
    }
  </style>eta charset="utf-8">
  
</head>

<body>


  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../../entrepreneurs/entrepreneurhome.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="white-space: nowrap;">Entrepreneur Dashboard</span>
      </a>
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
<!-- 
    <li>
      <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>Need Help?</span>
      </a> -->
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
          <i class="bi bi-menu-button-wide"></i><span style="font-size: 17px;">Forum</span></i>
        </a>

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav"  href="#">
          <i class="bi bi-menu-button-wide"></i><span>Learning</span></i>
        </a> -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span style="font-size: 17px;">Learning</span><i class="bi bi-chevron-down ms-auto"></i>
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
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span style="font-size: 15px;">Cerificates</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#compo-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span style="font-size: 17px;">Idea Validation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="compo-nav" class="nav-content " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../advisorselection.php">
              <i class="bi bi-circle"></i><span style="font-size: 15px;">Advisors</span>
            </a>
          </li>
          <li>
            <!-- <a href="../ideaportal/user/index.php"> -->
            <a class="nav-link" href="index.php">

              <i class="bi bi-circle"></i><span style="font-size: 15px;">My Validation Requests Sent</span>

              
            </a>
          </li>
          <li>
            <a href="mailbox.php">
              <i class="bi bi-circle"></i><span style="font-size: 15px;">Mailbox</span>
            </a>
          </li>

        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" href="#">
          <i class="bi bi-menu-button-wide"></i><span style="font-size: 17px;">Prediction</span></i>
        </a>



        <a class="nav-link collapsed" href="../admins/blog/">
          <i class="bi bi-menu-button-wide"></i>
          <span style="font-size: 17px;">Blogs</span>
        </a>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span style="font-size: 17px;">Meetings</span><i class="bi bi-chevron-down ms-auto"></i>
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
          <i class="bi bi-person"></i>
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

  <main id="main" class="main">

    <div class="pagetitle" style="background-color: #f6f9ff;">
      <h1>My Validation Requests Sent</h1>
      <nav style="background-color: #f6f9ff;">
        <ol class="breadcrumb" style="background-color: #f6f9ff;">
          <li class="breadcrumb-item"><a href="../../entrepreneurs/entrepreneurhome.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="#">Idea Validation</a></li>
          <li class="breadcrumb-item active">My Validation Requests </li>
        </ol>
      </nav>
    </div>

    <!-- <section class="section dashboard"> -->
      <!-- <div class="row"> -->

        <!-- Left side columns -->
        <!-- <div class="col-lg-8"> -->
          <!-- <div class="row"> -->

      

            <!-- Customers Card -->

             <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px; background-color: #f6f9ff;">

  <div class="container" style="margin-left: 20px; margin-bottom: 20px;">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-solid">
          
        </div>
      </div>
      <div class="col-md-9 bg-white padding-2">
        <p>The status of the requests you have sent  are listed below</p>

        <?php
         $sql = "SELECT * FROM advisor_overview INNER JOIN validationrequets ON advisor_overview.id_jobpost=validationrequets.id_jobpost WHERE validationrequets.id_user='$loggedin_userid'";
              $result = $conn->query($sql);

              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {     
        ?>
        <div class="attachment-block clearfix padding-2">
            <h4 class="attachment-heading"><a href="view-advisors-applied.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
            <div class="attachment-text padding-2">
              <div class="pull-left"><i style="color: purple;" class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>  
              <?php 

              if($row['status'] == 0) {
                echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
              } else if ($row['status'] == 1) {
                echo '<div class="pull-right"><strong class="text-red">Idea Rejected</strong></div>';
              } else if ($row['status'] == 2) {
                echo '<div class="pull-right"><strong class="text-green">Accepted to proceed with the idea</strong></div> ';
              } else if ($row['status'] == 3) {
                echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
              }
              
              ?>
                            
            </div>
        </div>

        <?php
          }
        }
        ?>
        
      </div>
    </div>
  </div>
</section>



</div>


           
         

          </div>
        </div>

        <div class="col-lg-4">

         

        </div>

      </div>
    </section>

  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
    &copy; Copyright <strong><span>Startupcompanion</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="../../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../admins/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../admins/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../admins/assets/vendor/quill/quill.min.js"></script>
  <script src="../../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../admins/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../admins/assets/vendor/php-email-form/validate.js"></script>

  <script src="../../admins/assets/js/main.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/adminlte.min.js"></script>

</body>

</html>