<!DOCTYPE html>
<html lang="en">

<head>
<?php

include('advisorsession.php');



?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">

  <meta content="" name="description">
  <meta content="" name="keywords">



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
      <a href="advisorhome.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Advisor Dashboard</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
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

$sql = "SELECT * FROM advisor WHERE id_advisor='$loggedin_advisorid'";
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
              <span>Advisor</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="advisor_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="advisor_profile.php">
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
        <a class="nav-link " href="advisorhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item ">
        <a class="nav-link collapsed" href="../ideaportal/company/overview.php">
        <i class="bi bi-pencil-square"></i>
                  <span>Create My Overview</span>
        </a>
      </li>


      <li class="nav-item">


        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-trophy"></i> <span>Idea Validation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         
          <li>
          <a href="../ideaportal/company/job-applications.php">
          <i class="bi bi-circle"></i><span>Validation Requests Received</span>
            </a>
          </li>
          <li>
          <a href="../ideaportal/company/mailbox.php">
          <i class="bi bi-circle"></i><span>Mailbox</span>
            </a>
          </li>
          <a href="../ideaportal/company/resume-database.php">
          <i class="bi bi-circle"></i><span>Ideas Database</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item ">
        <a class="nav-link collapsed" href="../meetings/showrequests.php">
        <i class="bi bi-calendar2-plus"></i>
                          <span>Meetings</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ins-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar2-plus"></i></i><span>Meetings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ins-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../meetings/showrequests.php">
              <i class="bi bi-circle"></i><span>Show the Meeting Requests</span>
            </a>
          </li>
       
        </ul>
      </li> -->
      

  

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
                  <h5 class="card-title">New Meeting Requests Pending<span></span></h5>

                  <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-calendar2-plus-fill"></i>                  </div>
                    <div class="ps-3">
                      <?php
                    $sql = "SELECT * FROM validationrequets WHERE status = 0";

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
                  <h5 class="card-title">New Validation Requests Pending <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-list-task"></i>                                      </div>
                    <div class="ps-3">
                      <?php
                    $sql = "SELECT * FROM validationrequets WHERE status = 0";

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

        <?php


// Fetch advisor data
$query = "SELECT advisor_name, advisor_field, advisor_company 
          FROM advisor 
          WHERE advisor_name != $loggedin_advisorid
          ORDER BY advisor_name ASC";$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();


?>

<!-- Recent Activity -->
<div class="card">
    

    <div class="card-body">
        <h5 class="card-title">All Advisors Registered With Us <span></span></h5>

        <div class="activity">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                  <div class="activity-item">
                  <div class="activity-labels">
    <div class="activity-label"><?php echo htmlspecialchars($row['advisor_name']); ?></strong></div>
    <div class="activity-label">from <strong><?php echo htmlspecialchars($row['advisor_company']); ?></strong></div>
</div>
<div class="activity-content">
   [Field: <?php echo htmlspecialchars($row['advisor_field']); ?>]
</div>
</div>
<?php endwhile; ?>
<?php else: ?>
    <p>No advisor data available.</p>
<?php endif; ?>
</div>
</div>
</div><!-- End Recent Activity -->

<style>
    .activity-item {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px; /* Add some spacing between items */
    }
    .activity-labels {
        display: flex;
        flex-wrap: wrap; /* Ensure it wraps properly on smaller screens */
        align-items: baseline;
    }
    .activity-label {
        margin-right: 5px;
    }
    .activity-content {
        margin-top: 5px;
    }
</style>

      

      
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
    &copy; Copyright <strong><span>startupcompanion</span></strong>. All Rights Reserved
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