<html>
<head>
    <title>StartupCompanion | Navigate your startup journey</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="globe.png" rel="shortcut icon">
    <?php
    date_default_timezone_set("Asia/Calcutta");
    ?>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'startupcompanion');
    if (isset($_POST['submit']) != "") {
        $name = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $type = $_FILES['photo']['type'];
        $temp = $_FILES['photo']['tmp_name'];
        $date = date('Y-m-d H:i:s');
        $caption1 = $_POST['caption'];
        $link = $_POST['link'];
        move_uploaded_file($temp, "files/" . $name);
        $query = $conn->query("INSERT INTO fileupload (name,date) VALUES ('$name','$date')");
        if ($query) {
            header("location:admin-files-upload.php");
        } else {
            die(mysqli_error($conn));
        }
    }
    ?>
	<?php
  include ('../admins/adminsession.php');
  ?>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
    <style>
        .table tr th {
            border: #d9a7e8 1px solid;
            position: relative;
            font-size: 12px;
            text-transform: uppercase;
        }
        table tr td {
            border: #d9a7e8 1px solid;
            color: black;
            position: relative;
            font-size: 12px;
            text-transform: uppercase;
        }
        #photo {
            font-family: Arial;
            font-size: 20px;
        }
        .disabled-icon {
            color: #ccc; /* Light gray to indicate disabled state */
            pointer-events: none; /* Disables clicking */
        }
    </style>

<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="icon" href="../assets/img/logo1.jpg" type="image/jpg" sizes="150x130">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
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
      <a href="../admins/adminhome.php" class="logo d-flex align-items-center">

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
                  <a class="dropdown-item d-flex align-items-center" href="../admins/users-profile.php">
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
        <a class="nav-link collapsed" href="../admins/adminhome.php">
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
        <i class="bi bi-person-plus"></i> 
                  <span>Advisors Section</span>
        </a>

        <a class="nav-link collapsed" href="../owners/advisorscrud/index.php">
          <i class="bi bi-person"></i>
          <span>Owners Section</span>
        </a>


        <a class="nav-link" href="../tips/admin-files-upload.php">
        <i class="bi bi-card-text"></i>    
          <span>Startup Success Tips</span>
        </a>

        <a class="nav-link collapsed" href="../admins/inquiries.php">
        <i class="bi bi-envelope"></i>
          <span>Inquiries</span>
        </a>
        <!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
          <i class="bi bi-person"></i>
          <span>Advisors</span>
        </a> -->
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../admins/faq/addfaq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->




    </ul>

  </aside><!-- End Sidebar-->
    <!-- <div style="background-color: purple;width:100%;height:80px;margin-top:0px">
        <h3 style="color: white;text-align: center;padding-top:22px;">Startup Tips</h3>
    </div> -->
    <br>
    <form enctype="multipart/form-data" action="" id="wb_Form1" name="form" method="post">
        <!-- <input type="file" name="photo" id="photo" required="required"> -->
        <!-- <input style="background-color: purple;color:white;" type="submit" class="btn btn-" value="UPLOAD" name="submit"> -->
    </form>
    <div class="col-md-18" style="margin-top: 130px;margin-left:280px;">
        <div class="container-fluid" style="margin-top:0px;">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form method="post" action="file-delete.php">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed" id="example">
                                    <thead>
                                        <tr>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px;width:50px;text-transform:none;">File ID</th>
											<th style="color:#751b8f; font-weight:bolder; font-size:15px; width:350px;text-transform:none;">File Name</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px;width:150px;text-transform:none;">Uploaded Date</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px;width:50px;text-transform:none;">Download</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px;width:50px;text-transform:none;">Delete</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px;width:50px;text-transform:none;">Publish</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px;width:80px;text-transform:none;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM fileupload ORDER BY id DESC") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $date = $row['date'];
                                            $publishStatus = $row['publish']; // Use 'publish' for the column name
                                        ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td style="text-transform: none;font-size:14px;"><?php echo $name; ?></td>
                                                <td style="font-size:12px;"><?php echo $date; ?></td>
                                                <td>
                                                    <a href="file-download.php?filename=<?php echo $name; ?>" title="click to download"><span class="glyphicon glyphicon-download" style="font-size:20px; color:purple"></span></a>
                                                </td>
                                                <td>
                                                    <a href="file-delete.php?del=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
                                                </td>
                                                <td>
                                                    <?php if ($publishStatus == 'yes') { ?>
                                                        <span class="glyphicon glyphicon-upload disabled-icon" style="font-size:20px; color:#ccc"></span>
                                                    <?php } else { ?>
                                                        <a href="publish.php?del=<?php echo $id; ?>"><span class="glyphicon glyphicon-upload" style="font-size:20px; color:green"></span></a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($publishStatus == 'yes') { ?>
                                                        <button style="font-size:14px;" type="button" class="btn btn-success" disabled>Published</button>
                                                    <?php } else { ?>
                                                        <button style="font-size:14px;" type="button" class="btn btn-warning" disabled>Pending</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
