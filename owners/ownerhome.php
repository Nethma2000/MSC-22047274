<!DOCTYPE html>
<html lang="en">

<head>
<?php
include('ownersession.php');
?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../admins/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="white-space: nowrap;">&nbsp&nbspStartup Owner Dashboard</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="margin-left: 70px;"></i>
    </div><!-- End Logo -->

 
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">


        <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">


  <?php 

$sql = "SELECT * FROM owners WHERE id_advisor='$loggedin_ownerid'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    
if($row['prof_img'] != "") { ?>
<img src="uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
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
    <a class="dropdown-item d-flex align-items-center" href="owner_profile.php">
      <i class="bi bi-person"></i>
      <span>My Profile</span>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="owner_profile.php">
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

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->
<?php

    }
  }
  ?>
</ul>
</nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="ownerhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     



      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
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
      </li> -->
      
      <!-- End Icons Nav -->


      <li class="nav-item">

        <a class="nav-link collapsed" href="../chat/login.php">
        <i class="bi bi-chat-dots"></i>         
         <span>Live Chat</span>

        </a>

        <a class="nav-link collapsed" href="../ownersforum/forum-home.php">
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
        <i class="bi bi-calendar-event"></i></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
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
      </li><!-- End Icons Nav -->



      <li class="nav-item">
      <a class="nav-link collapsed" href="../blog/">
      <i class="bi bi-journals"></i>
                <span>Blog</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <a class="nav-link collapsed" href="../tips/uploadfiles.php">
      <i class="bi bi-card-text"></i>    
            <span>Startup Success Tips</span>
        </a>


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
                  <h5 class="card-title">Events <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-event-fill"></i>
                                      </div>
                    <div class="ps-3">
                      <?php
                    $sql = "SELECT * FROM events";

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

         
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    </li>

                  
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Admin Panel <span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                      <th>Name</th>
                                <th>Email</th>
                                <th>Query</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Nethma Dhananjani</td>
                        <td><a href="mailto:rmndhananjani@gmail.com">Send Mail</a></td>
                        <td><span class="badge bg-danger">For any queries</span></td>
                      </tr>
                      <tr>
                        <td>Viraj Karunarathna</td>
                        <td><a href="mailto:virajlahiru9719@gmail.com">Send Mail</a></td>

                        <td><span class="badge bg-warning">For portal related queries</span></td>
                      </tr>
                      <tr>
                        <td>Nayana Kalyani</td>
                        <td><a href="mailto:nethud2000@gmail.com">Send Mail</a></td>
                        <td><span class="badge bg-success">For advisor help</span></td>
                      </tr>
                      <tr>
                        <td>Sunil Rajapaksha</td>
                        <td><a href="mailto:rmndhananjani@gmail.com">Send Mail</a></td>
                        <td><span class="badge bg-success">For advisor help</span></td>
                      </tr>
                    
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


     

<!-- Startups Registered with Us -->
<div class="card">
    <div class="filter">
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
            </li>
        </ul>
    </div>

    <div class="card-body 

    <?php

// Assuming $loggedin_ownerid and $loggedin_session are already set
$loggedin_field = ''; // Fetch the field of the logged-in user from the database

try {
    // Fetch the field of the logged-in user
    $sql_field = "SELECT field FROM owners WHERE id_advisor = ?";
    $stmt_field = $conn->prepare($sql_field);
    if (!$stmt_field) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }

    $stmt_field->bind_param("i", $loggedin_ownerid);
    $stmt_field->execute();
    $result_field = $stmt_field->get_result();
    if ($result_field->num_rows > 0) {
        $row_field = $result_field->fetch_assoc();
        $loggedin_field = $row_field['field'];
    } else {
        throw new Exception("Logged in user's field not found.");
    }

    // Fetch companies with the same field as the logged-in user, excluding the logged-in user's company, and with active status = 1
    $sql = "SELECT company, prof_img FROM owners WHERE field = ? AND id_advisor != ? AND active = 1";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }

    $stmt->bind_param("si", $loggedin_field, $loggedin_ownerid);
    $stmt->execute();
    $result = $stmt->get_result();

    $companies = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Prepend the correct folder path to the profile image path
            $row['prof_img'] = 'uploads/logo/' . $row['prof_img'];
            $companies[] = $row;
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

?>

<div class="card">
    <div class="filter">
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
            </li>
        </ul>
    </div>

    <div class="card-body pb-0">
        <h5 class="card-title">Startups registered with us related to your field</h5>

        <div class="news">
            <?php if (!empty($companies)): ?>
                <?php foreach ($companies as $company): ?>
                    <div class="post-item clearfix">
                        <?php if (!empty($company['prof_img'])): ?>
                          <img src="<?= htmlspecialchars($company['prof_img']) ?>" alt="Profile Image" style="width: 70px; height: auto;" class="img-fluid">
                        <?php endif; ?>
                        <h4><a href="#"><?= htmlspecialchars($company['company']) ?></a></h4>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No companies found.</p>
            <?php endif; ?>
        </div><!-- End sidebar recent posts-->
    </div>
</div><!-- End Startups Registered with Us -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>StartupCompanion</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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