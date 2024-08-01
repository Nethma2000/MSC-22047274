<?php

//To Handle Session Variables on This Page
include ('advisorsession.php');

include ('../../databaseconnection.php');


// session_start();
// Assuming $row is retrieved from a database query
$loggedin_advisor_id = $row['id_advisor'];
$_SESSION["id_advisor"] = $loggedin_advisor_id;

?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>StartupCompanion | Navigate your startup journey</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <link href="../../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
  <link href="../../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
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
      <i class="bi bi-list toggle-sidebar-btn" style="margin-left: 30px;"></i>
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
                    <a class="dropdown-item d-flex align-items-center" href="../../dvisors/advisor_profile.php">
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
          <i class="bi bi-gem"></i>
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
          <i class="bi bi-gem"></i><span style="font-size: 17px;">Idea Validation</span><i
            class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content " data-bs-parent="#sidebar-nav">

          <li>
            <a href="job-applications.php">
              <i class="bi bi-circle"></i><span style="font-size: 15px;">Validation Requests Received</span>
            </a>
          </li>
          <li>
            <a class="nav-link" href="mailbox.php">
              <i class="bi bi-circle"></i><span style="font-size: 15px;">Mailbox</span>
            </a>
          </li>
          <a href="resume-database.php">
            <i class="bi bi-circle"></i><span style="font-size: 15px;">Ideas Database</span>
          </a>
      </li>
    </ul>
    </li><!-- End Icons Nav -->

    <a class="nav-link collapsed" href="../ideaportal/company/index.php">
      <i class="bi bi-person"></i>
      <span style="font-size: 17px;">Meetings</span>
    </a>





    </ul>

  </aside><!-- End Sidebar-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px; margin-top: 100px;background-color: #f6f9ff;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">

              <div class="box-body no-padding">

              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title" style="margin-bottom: 20px;">Mailbox</h3>
                      <div class="pull-right">
                        <a href="createmail.php" class="btn btn-warning btn-flat"><i class="fa fa-envelope"></i>
                          Create</a>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th>Subject</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = "SELECT * FROM mailbox WHERE id_fromuser='$loggedin_advisor_id' OR id_touser='$loggedin_advisor_id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                  <td class="mailbox-subject"><a
                                      href="read-mail.php?id_mail=<?php echo $row['id_mailbox']; ?>"><?php echo $row['subject']; ?></a>
                                  </td>
                                  <td class="mailbox-date">
                                    <?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?>
                                  </td>
                                </tr>
                                <?php
                              }
                            }
                            ?>
                          </tbody>

                        </table>
                        <!-- /.table -->
                      </div>
                      <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->

                  </div>
                  <!-- /. box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </section>

          </div>
        </div>
      </div>
    </section>



  </div>
  <!-- /.content-wrapper -->





  </div>
  </div><!-- End Left side columns -->

  <!-- Right side columns -->
  <div class="col-lg-4">



  </div><!-- End Right side columns -->

  </div>
  </section>

  </main><!-- End #main -->



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
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script>
    $(function () {
      $('#example1').DataTable();
    })
  </script>

</body>

</html>