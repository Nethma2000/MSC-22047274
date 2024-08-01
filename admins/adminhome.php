<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include ('adminsession.php');
  ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="icon" href="../assets/img/logo1.jpg" type="image/jpg" sizes="150x130">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">




<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="adminhome.php" class="logo d-flex align-items-center">

        <span class="d-none d-lg-block">Admin Dashboard</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <?php

            $sql = "SELECT * FROM admins WHERE email='$loggedin_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                if ($row['prof_img'] != "") { ?>
                  <img src="uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
                <?php } else { ?>
                  <img src="../images/defaultimage.png" class="img-responsive">
                <?php } ?>
                <span class="d-none d-md-block dropdown-toggle ps-2">Welcome <?php echo $loggedin_session; ?></span>
              </a>


              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6><?php echo $loggedin_session; ?></span>
                  </h6>
                  <span>Admin</span>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                    <i class="bi bi-person"></i>
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
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="../logout.php">
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
        <a class="nav-link " href="adminhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journals"></i>
        </i><span>Manage Blog</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="blog/admin/index.php?page=posts">
              <i class="bi bi-circle"></i><span>Blog articles</span>
            </a>
          </li>
          <li>
            <a href="blog/admin/index.php?page=category">
              <i class="bi bi-circle"></i><span>Blog Categories</span>
            </a>
          </li>

        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i>
      </i><span>Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../knowledge/courses.php">
              <i class="bi bi-circle"></i><span>All courses</span>
            </a>
          </li>
          <li>
            <a href="../knowledge/coursematerials.php">
              <i class="bi bi-circle"></i><span>Course materials</span>
            </a>
          </li>
          <li>
            <a href="../knowledge/createcourses.php">
              <i class="bi bi-circle"></i><span>Create New Courses</span>
            </a>
          </li>
          <li>
            <a href="../knowledge/createcourses.php#Chapter">
              <i class="bi bi-circle"></i><span>Create New Chapters</span>
            </a>
          </li>
          <li>
            <a href="../knowledge/createcourses.php#Topic">
              <i class="bi bi-circle"></i><span>Create New Topics</span>
            </a>
          </li>
          <li>
            <a href="../knowledge/addcoursecontent.php">
              <i class="bi bi-circle"></i><span>Create Course Content</span>
            </a>
          </li>

          <li>
            <!-- <a href="blog/admin/index.php?page=category">
              <i class="bi bi-circle"></i><span>Course materials</span> -->
            </a>
          </li>

        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">

        <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
        <i class="bi bi-person-plus"></i>          <span>Advisors Section</span>
        </a>

        <a class="nav-link collapsed" href="../owners/advisorscrud/index.php">
          <i class="bi bi-person"></i>
          <span>Owners Section</span>
        </a>


        <a class="nav-link collapsed" href="../tips/admin-files-upload.php">
        <i class="bi bi-card-text"></i>    
        <span>Success Tips File Approval</span>
        </a>

        <a class="nav-link collapsed" href="inquiries.php">
        <i class="bi bi-envelope"></i>
               <span>Inquiries</span>
        </a>
        <!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
          <i class="bi bi-person"></i>
          <span>Advisors</span>
        </a> -->
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="faq/addfaq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->




    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
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
                  <h5 class="card-title">Pending Startup Owner Registration Approvals <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-fill-add"></i>
                                      </div>
                    <div class="ps-3">

                      <?php
                    $sql = "SELECT * FROM owners WHERE active = 2";

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
                  <h5 class="card-title">Unread Inquiries<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-question-square-fill" style="color: #40E0D0	;"></i>                    </div>
                    <div class="ps-3">

                      <?php
                    $sql = "SELECT * FROM inquiries WHERE status = 0";

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

            
            <!-- sample Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                    </li>

                  
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pending File Approvals <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-file-earmark-fill" style="color: #0818A8;"></i>                    </div>
                    <div class="ps-3">

                    <?php
$sql = "SELECT * FROM fileupload WHERE publish = 'no'";

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
            </div><!-- End sample Card -->

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
                  <h5 class="card-title">Entrepreneurs <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-fill" style="color: #00A36C;"></i>                    </div>
                    <div class="ps-3">

                      <?php
                    $sql = "SELECT * FROM entrepreneurs";

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
                  <h5 class="card-title">Advisors <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-vcard-fill" style="color: #7DF9FF;"></i>                    </div>
                    <div class="ps-3">

                      <?php
                    $sql = "SELECT * FROM advisor";

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
                  <h5 class="card-title">Startups Registered <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-building-fill-check" style="color: #6F8FAF;"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                    $sql = "SELECT * FROM owners";

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
// Initialize an empty array for events
$events = [];

try {
    // Fetch all events with active status = 1
    $sql = "SELECT title, field, date FROM events";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
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
        <h5 class="card-title">Upcoming Events</h5>

        <div class="news">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="post-item clearfix">
                        <div class="image-container">
                            <span class="event-date"><?= htmlspecialchars($event['date']) ?></span>
                        </div>
                        <h4><a href="#"><?= htmlspecialchars($event['title']) ?></a></h4>
                        <p>Field: <?= htmlspecialchars($event['field']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div><!-- End sidebar recent posts-->
    </div>
</div>

<style>
.image-container {
    float: left;
    width: 20%;
    text-align: center;
    padding-right: 10px;
}

.event-date {
    display: block;
    font-size: 14px;
    color: #888;
    margin-bottom: 10px;
}
</style>



          <!-- Website Traffic -->
          <!-- <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                        value: 1048,
                        name: 'Search Engine'
                      },
                      {
                        value: 735,
                        name: 'Direct'
                      },
                      {
                        value: 580,
                        name: 'Email'
                      },
                      {
                        value: 484,
                        name: 'Union Ads'
                      },
                      {
                        value: 300,
                        name: 'Video Ads'
                      }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div> -->
          <!-- End Website Traffic -->

   

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
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>