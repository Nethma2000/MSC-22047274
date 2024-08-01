<!DOCTYPE html>
<html lang="en">

<head>

<?php
include('../owners/ownersession.php');
?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../admins/assets/img/favicon.png" rel="icon">
  <link href="../../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../admins/assets/css/style.css" rel="stylesheet">

 

</head>

<body>


  <header id="header" class="header fixed-top d-flex align-items-center"
    style="top: 0; width: 100%; z-index: 1000; margin-bottom: 0;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../owners/ownerhome.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block" style="white-space: nowrap;">&nbsp&nbspStartup Owner Dashboard</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="margin-left: 70px;"></i>
    </div>



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
          
        </li>



        <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

  <?php 

$sql = "SELECT * FROM owners WHERE id_advisor='$loggedin_ownerid'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    
if($row['prof_img'] != "") { ?>
<img src="../owners/uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
<?php } else { ?>
<img src="../images/defaultimage.png" class="img-responsive">
<?php } ?>
          <span class="d-none d-md-block dropdown-toggle ps-2">Welcome <?php echo $loggedin_session; ?></span>
          </a>

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li class="dropdown-header">
    <h6><?php echo $loggedin_session; ?></h6>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="../owners/owner_profile.php">
      <i class="bi bi-person"></i>
      <span>My Profile</span>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="../owners/owner_profile.php">
      <i class="bi bi-gear"></i>
      <span>Account Settings</span>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>


  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
  <a class="dropdown-item d-flex align-items-center"  href="../logout.php">
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
        <a class="nav-link collapsed" href="../owners/ownerhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

     



    


      <li class="nav-item">

        <a class="nav-link collapsed" href="../uni-company-chat/login.php">
        <i class="bi bi-chat-dots"></i>       
                <span>Live Chat</span>
        </a>

        <a class="nav-link collapsed" href="#">
        <i class="bi bi-chat-square-text"></i>
        <span>Forum</span>
        </a>

        <!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
          <i class="bi bi-person"></i>
          <span>Advisors</span>
        </a> -->
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ic-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar-event"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ic-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../events/index.php">
              <i class="bi bi-circle"></i><span>View Events</span>
            </a>
          </li>
         
          <li>
            <a href="../events/viewevents.php">
              <i class="bi bi-circle"></i><span>Create Events</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
      <a class="nav-link" href="#">
      <i class="bi bi-journals"></i>
          <span>Blog</span>
        </a>
      </li>

      <a class="nav-link collapsed" href="../tips/uploadfiles.php">
      <i class="bi bi-card-text"></i>    
            <span>Startup Success Tips</span>
        </a>



    </ul>

  </aside>

  <div class="pagetitle" style="margin-top: 0; !important">
  <h1>Blog</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../owners/ownerhome.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Blog</li>
      </ol>
    </nav>
  </div>

  <section class="d-flex align-items-center">
    <div class="container">
      <?php
      include 'db_connect.php';

      $qry = $qry = $conn->query("SELECT p.*,c.name as category from posts p inner join category c on c.id = p.category_id where p.status = 1 order by date(p.date_published) desc limit 5");
      while ($row = $qry->fetch_assoc()) {
        ?>
        <div class="card col-md-12 list-items" data-id="<?php echo $row['id'] ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <center><img src="../admins/blog/assets/img/<?php echo $row['img_path'] ?>" alt="" class='col-sm-10'></center>
              </div>
              <div class="col-md-8 truncate">
                <h5><b><?php echo $row['title'] ?></b></h5>
                <p class="text-truncate">
                  <?php echo html_entity_decode($row['post']) ?>
                </p>

              </div>
            </div>

          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <style type="text/css">
    .list-items p {
      text-align: left !important;
    }

    .list-items {
      cursor: pointer;
    }

    .truncate {
      max-height: 10vw;
      overflow: hidden;
    }
  </style>
  <script>
    $(document).ready(function () {
      $('.list-items').click(function () {
        location.replace('index.php?page=preview_post&id=' + $(this).attr('data-id'))
      })
    })
  </script>


<script src="../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../admins/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../admins/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../admins/assets/vendor/quill/quill.min.js"></script>
  <script src="../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../admins/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../admins/assets/vendor/php-email-form/validate.js"></script>

  <script src="../admins/assets/js/main.js"></script>

   