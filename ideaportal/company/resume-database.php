<?php

//To Handle Session Variables on This Page
include ('advisorsession.php');

include ('../../databaseconnection.php');
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn, "select advisor_email,advisor_name, id_advisor from advisor where advisor_email='$user_check'");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$loggedin_session = $row['advisor_name'];
$loggedin_id = $row['advisor_email'];
$loggedin_advisor_id = $row['id_advisor'];  // Fetch the id_advisor

if (!isset($loggedin_session) || $loggedin_session == NULL) {
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
  <link href="../../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">



  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../admins/assets/css/style.css" rel="stylesheet">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">


  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    body {
      background-color: #f6f9ff;
    }
  </style>



</head>

<body>
  <!-- <div class="wrapper"> -->

  <!-- <header class="main-header"> -->


  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../../advisors/advisorhome.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <div style="width: auto;">
          <span class="d-none d-lg-block" style="white-space: nowrap;">Advisor Dashboard</span>
        </div>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php

            $sql = "SELECT * FROM advisor WHERE id_advisor='$loggedin_advisor_id'";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                if ($row['prof_img'] != "") { ?>
                <img src="../../advisors/uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
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
                    <a class="dropdown-item d-flex align-items-center" href="../../advisors/advisor_profile.php">
                      <i class="bi bi-person"></i>
                      <span>My Profile</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="../../advisors/advisor_profile.php">
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

  </header>


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="../../advisors/advisorhome.php">
          <i class="bi bi-grid"></i>
          <span style="font-size: 17px;">Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="overview.php">
        <i class="bi bi-pencil-square"></i>
          <span style="font-size: 17px;">Create My Overview</span>
        </a>
      </li>


      <li class="nav-item">

        <!-- <a class="nav-link collapsed" href="../ideaportal/company/overview.php">
      <i class="bi bi-person"></i>
      <span>Idea Validation</span>
    </a> -->
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-trophy"></i> <span style="font-size: 17px;">Idea Validation</span><i
            class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content " data-bs-parent="#sidebar-nav">
         
          <li>
            <a href="job-applications.php">
              <i class="bi bi-circle"></i><span style="font-size: 15px;">Validation Requests Received</span>
            </a>
          </li>
          <li>
            <a href="mailbox.php">
              <i class="bi bi-circle"></i><span style="font-size: 15px;">Mailbox</span>
            </a>
          </li>
          <a class="nav-link" href="resume-database.php">
            <i class="bi bi-circle"></i><span style="font-size: 15px;">Ideas Database</span>
          </a>
      </li>
    </ul>
    </li><!-- End Icons Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ins-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar2-plus"></i></i><span>Meetings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ins-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
      </li><!-- End Icons Nav -->





    </ul>

  </aside><!-- End Sidebar-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px; margin-top: 100px;background-color: #f6f9ff;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">

            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2 style="color: #1434A4	;"><i><b>Ideas Database</b></i></h2>
            <p>In this section you can download idea files of all entrepreneurs who have sent idea validation requests to you</p>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>User's Name</th>
                      <th>Field</th>
                      <th>Age</th>
                      <th>Download Idea file</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT entrepreneurs.* FROM advisor_overview INNER JOIN validationrequets ON advisor_overview.id_jobpost=validationrequets.id_jobpost  INNER JOIN entrepreneurs ON entrepreneurs.id_user=validationrequets.id_user WHERE validationrequets.id_advisor='$loggedin_advisor_id' GROUP BY entrepreneurs.id_user";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                          // $skills = $row['skills'];
                          // $skills = explode(',', $skills);
                          ?>
                          <tr>
                            <td><?php echo $row['name']; ?></td>

                            <td><?php echo $row['field']; ?></td>
                            <td><?php echo $row['age']; ?></td>

                            <!-- <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['name'] . ' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td> -->
                            <td>
                              <?php
                              $filePath = '../../entrepreneurs/uploads/resume/' . $row['resume'];
                              $fileName = $row['name'] . ' idea file.pdf';

                              // Debugging: Check if the file exists
                              if (!file_exists($filePath)) {
                                echo "File not found: " . htmlspecialchars($filePath);
                              } else {
                                echo '<td><a href="' . htmlspecialchars($filePath) . '" download="' . htmlspecialchars($fileName) . '"><i class="fa fa-file-pdf-o"></i></a></td>';
                              }
                              ?>

                            </td>
                          </tr>
                          <?php

                        }
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


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

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>


  <script>
    $(function () {
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>
</body>

</html>