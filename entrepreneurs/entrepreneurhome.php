<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include ('entreprenursession.php');

  require_once ("econfig.php");

  ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
  <link href="../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="entrepreneurhome.php" class="logo d-flex align-items-center">
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
        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <?php

            $sql = "SELECT * FROM entrepreneurs WHERE id_user='$loggedin_userid'";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                if ($row['prof_img'] != "") { ?>
                  <img src="uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
                <?php } else { ?>
                  <img src="../images/defaultimage.png" class="img-responsive">
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

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="entrepreneurhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" href="../forum/forum-home.php">
        <i class="bi bi-chat-square-text"></i>
        </i><span>Forum</span></i>
        </a>

       

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i>
        <span>Learning</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../knowledge/entrepreneurside/allcourses.php">
              <i class="bi bi-circle"></i><span>All Courses</span>
            </a>
          </li>
          <li>
            <!-- <a href="../knowledge/entrepreneurside/courseenrolled.php"> -->
              <a href="../knowledge/entrepreneurside/mycourses.php">
              <i class="bi bi-circle"></i><span>Enrolled Courses</span>
            </a>
          </li>

          <li>
            <!-- <a href="../knowledge/entrepreneurside/courseenrolled.php"> -->
              <a href="../knowledge/coursematerials.php">
              <i class="bi bi-circle"></i><span>Extra Reference Materials</span>
            </a>
          </li>
        
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#compo-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-trophy"></i> <span>Idea Validation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="compo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../ideaportal/advisorselection.php">
              <i class="bi bi-circle"></i><span>Advisors</span>
            </a>
          </li>
          <li>
            <a href="../ideaportal/user/index.php">
            <!-- <a href="../ideaportal/user/indexsample.php"> -->

              <i class="bi bi-circle"></i><span>My Validation Requests Sent</span>

              
            </a>
          </li>
          <li>
            <a href="../ideaportal/user/mailbox.php">
              <i class="bi bi-circle"></i><span>Mailbox</span>
            </a>
          </li>

        </ul>
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" href="../predictform.html">
        <i class="bi bi-gem"></i></i><span>Prediction</span></i>
        </a>



        <a class="nav-link collapsed" href="../admins/blog/">
        <i class="bi bi-journals"></i>
        <span>Blogs</span>
        </a>

        <a class="nav-link collapsed" href="../events/index.php">
        <i class="bi bi-calendar-event"></i>
        <span>Events</span>
        </a>



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar2-plus"></i></i><span>Meetings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../meetings/send.php">
              <i class="bi bi-circle"></i><span>Send Meeting Requests</span>
            </a>
          </li>
          <li>
            <a href="../meetings/myrequests.php">
              <i class="bi bi-circle"></i><span>Sent Requests</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Icons Nav -->


      <li class="nav-item">

        <a class="nav-link collapsed" href="../chat/login.php">
        <i class="bi bi-chat-dots"></i>         
          <span>Live Chat</span>
        </a>

        <!-- <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Link 2</span>
        </a> -->

        <!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
          <i class="bi bi-person"></i>
          <span>Advisors</span>
        </a> -->
      </li><!-- End Profile Page Nav -->




    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    </li>

                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Blogs <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-substack"></i>
                                      </div>
                    <div class="ps-3">

                      <?php
                    $sql = "SELECT * FROM posts";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                    } else {
                        $totalno = 0;
                    }
                    ?>
                                      <h6><?php echo $totalno; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    </li>

                  
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Events related to your field<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-event-fill"></i>
                                      </div>
                    <div class="ps-3">
                      <?php
                    $sql = "SELECT * FROM events Where field= (
                        SELECT field 
                        FROM entrepreneurs 
                        WHERE id_user = $loggedin_userid)";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                    } else {
                        $totalno = 0;
                    }
                    ?>
                                      <h6><?php echo $totalno; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->



                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">

                <div class="filter">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    </li>

                  
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pending Review Validation Requests<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-list-task"></i>     
                                                        </div>
                    <div class="ps-3">
                      <?php
                    $sql = "SELECT * FROM validationrequets Where id_user= (
                        SELECT id_user 
                        FROM entrepreneurs 
                        WHERE id_user = $loggedin_userid)";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                    } else {
                        $totalno = 0;
                    }
                    ?>
            <h6><?php echo $totalno; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


         <!-- Revenue Card -->
         <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                <div class="filter">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    </li>

                  
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pending Meeting Requests you sent<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i style="color:#008080;" class="bi bi-calendar2-plus-fill"></i>      
                                                        </div>
                    <div class="ps-3">
                      <?php
                    $sql = "SELECT * FROM validationrequets Where id_user= (
                        SELECT id_user 
                        FROM entrepreneurs 
                        WHERE id_user = $loggedin_userid)";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                    } else {
                        $totalno = 0;
                    }
                    ?>
            <!-- <h6><?php echo $totalno; ?></h6> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


    

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->

     
        <div class="col-lg-4">

        <?php


$files = [];

try {
    // Fetch files where 'publish' is 'yes'
    $sql_files = "SELECT name FROM fileupload WHERE publish = 'yes'";
    $result_files = $conn->query($sql_files);

    if ($result_files->num_rows > 0) {
        while ($row = $result_files->fetch_assoc()) {
            $files[] = $row;
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!-- Download Available Files -->
<div class="card">
    <div class="filter">
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
            </li>
        </ul>
    </div>

    <div class="card-body pb-0">
        <h3 class="card-title">Startup Success Tips</h3>

        <div class="file-list">
            <?php if (!empty($files)): ?>
                <?php foreach ($files as $file): ?>
                    <div class="file-item">
                        <h4 class="file-name"><?= htmlspecialchars($file['name']) ?></h4>
                        <a href="../tips/files/<?= urlencode($file['name']) ?>" download="<?= htmlspecialchars($file['name']) ?>" class="download-icon">
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No files available for download.</p>
            <?php endif; ?>
        </div>
    </div>
</div><!-- End Download Available Files -->

        
<style>
    .file-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .file-name {
        font-size: 14px;
        margin: 0;
    }
    .download-icon {
        margin-left: 10px;
    }
</style>
 

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Startupcompanion</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../admins/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../admins/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../admins/assets/vendor/quill/quill.min.js"></script>
  <script src="../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../admins/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../admins/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../admins/assets/js/main.js"></script>

</body>

</html>