<?php
  include('../../entrepreneurs/econfig.php');
  $user_check=$_SESSION['login_user'];
  $ses_sql=mysqli_query($conn,"select id_user,email,name from entrepreneurs where email='$user_check'");
  $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $loggedin_session=$row['name'];
  $loggedin_id=$row['email'];
  $loggedin_userid=$row['id_user'];

  require_once ("../../entrepreneurs/econfig.php");

  ?>

<link href="../../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <link href="../../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../../admins/assets/css/style.css" rel="stylesheet">


<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="../../entrepreneurs/entrepreneurhome.php" class="logo d-flex align-items-center">
    <img src="../../assets/img/logo.png" alt="">
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
    </li>

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
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
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
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
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

<!-- Vendor JS Files -->
<script src="../../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../admins/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../admins/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../admins/assets/vendor/quill/quill.min.js"></script>
  <script src="../../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../admins/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../admins/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../admins/assets/js/main.js"></script>