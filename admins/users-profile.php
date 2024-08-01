<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include ('adminsession.php');

  require_once ("../databaseconnection.php");

  ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">

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
        </li>



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
        <a class="nav-link " href="adminhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

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
      </li>

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
            <a href="../knowledge/Courses-add.php#Chapter">
              <i class="bi bi-circle"></i><span>Create New Chapters</span>
            </a>
          </li>
          <li>
            <a href="../knowledge/Courses-add.php#Topic">
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
      </li>

      <li class="nav-item">

        <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
          <i class="bi bi-person-plus"></i>
          <span>Advisors Section</span>
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
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="faq/addfaq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>




    </ul>

  </aside>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
              <?php

              $sql = "SELECT * FROM admins WHERE email='$loggedin_id'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                  if ($row['prof_img'] != "") { ?>
                    <img src="uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive"
                      style="max-height: 200px; max-width: 200px;">
                  <?php } else { ?>
                    <img src="../images/defaultimage.png" class="img-responsive">
                  <?php } ?>
                  <h2><?php echo $loggedin_session; ?></h2>

                </div>
              </div>

            </div>
            <?php
                }
              } ?>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                    Profile</button>
                </li>

                <li class="nav-item">
                  <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button> -->
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">


                <?php
                $sql = "SELECT * FROM admins WHERE email='$loggedin_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {

                    ?>

                    <div class="tab-pane fade show active profile-edit" id="profile-edit">
                      <form action="update-adminprofile.php" method="post" enctype="multipart/form-data">

                        <!-- <h5 class="card-title">Startup Idea on brief</h5>
                  <p class="small fst-italic"><?php echo $row['idea']; ?> -->

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="text" class="form-control" id="fullName"
                              value="<?php echo $loggedin_session; ?>">
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control input-lg" id="Email"
                              value="<?php echo $loggedin_id; ?>" readonly>
                          </div>
                        </div>


                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>

                    </div>

                    <?php
                  }
                }
                ?>
                </form>


                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">



                </div>



                <div class="tab-pane fade pt-3" id="profile-settings">


                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <form id="changePassword" action="change_adminpassword.php" method="post">

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="password" autocomplete="off" name="newpassword" type="password" class="form-control"
                          id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="cpassword" autocomplete="off" name="cpassword" type="password" class="form-control"
                          id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">

                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>

                    <style>
                      .hide-me {
                        display: none;
                      }
                    </style>
                    <div id="passwordError" class="color-red text-center hide-me">
                      Password Mismatch!!
                    </div>
                  </form>

                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  < <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>startupcompanion</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>


    <script src="../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../admins/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../admins/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../admins/assets/vendor/quill/quill.min.js"></script>
    <script src="../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../admins/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../admins/assets/vendor/php-email-form/validate.js"></script>

    <script src="../admins/assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../ideaportal/js/adminlte.min.js"></script>

    <script>
      $("#changePassword").on("submit", function (e) {
        e.preventDefault();
        if ($('#password').val() != $('#cpassword').val()) {
          $('#passwordError').show();
        } else {
          $(this).unbind('submit').submit();
        }
      });
    </script>

</body>

</html>