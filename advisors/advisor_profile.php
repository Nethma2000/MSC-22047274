<!DOCTYPE html>
<html lang="en">

<head>
<?php
include('advisorsession.php');

require_once("../databaseconnection.php");

?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">

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

  <link href="../admins/assets/css/style.css" rel="stylesheet">


</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
      <a href="advisorhome.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="white-space: nowrap;">Advisor Dashboard</span>

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

$sql = "SELECT * FROM advisor WHERE id_advisor='$loggedin_advisorid'";
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
        <a class="nav-link " href="advisorhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
  
  
      <li class="nav-item ">
        <a class="nav-link collapsed" href="../ideaportal/company/overview.php">
        <i class="bi bi-pencil-square"></i>
          <span>Create My Overiview</span>
        </a>
      </li>
        <li class="nav-item">

<!-- <a class="nav-link collapsed" href="../ideaportal/company/overview.php">
  <i class="bi bi-person"></i>
  <span>Idea Validation</span>
</a> -->
<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
<i class="bi bi-trophy"></i><span>Idea Validation</span><i class="bi bi-chevron-down ms-auto"></i>
</a>


<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
 
  <li>
  <a href="../ideaportal/company/job-applications.php">
  <i class="bi bi-circle"></i><span>Valiation Requests Received</span>
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
</li>

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

$sql = "SELECT * FROM advisor WHERE id_advisor='$loggedin_advisorid'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
              
              if($row['prof_img'] != "") { ?>
                    <img src="uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } else { ?>
                      <img src="../images/defaultimage.png" class="img-responsive">
                      <?php } ?>
              <h2><?php echo $loggedin_session; ?></h2>
             
            </div>
          </div>

        </div>
        <?php
  }
}?>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

           
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">


              <?php
            $sql = "SELECT * FROM advisor WHERE id_advisor='$loggedin_advisorid'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
          
?>

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <!-- <h5 class="card-title">Startup Idea on brief</h5>
                  <p class="small fst-italic"><?php echo $row['idea']; ?> -->

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $loggedin_session; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $loggedin_id; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Field</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['advisor_field']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['advisor_company']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Designation</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['advisor_designation']; ?></div>
                  </div>

           

                </div>

                <?php
                }
              }
            ?>   
                        </form>


                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <form action="update-advisorprofile.php" method="post" enctype="multipart/form-data">
                    
                   

                    <?php
            $sql = "SELECT * FROM advisor WHERE id_advisor='$loggedin_advisorid'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
          

            ?>

<div class="form-group">
                    <label>Change Profile image</label>
                    <input type="file" name="prof_img" class="btn btn-default">
              <?php if($row['prof_img'] != "") { ?>
                 <!-- <img src="uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">  -->
                    <?php } else { ?>
                      <!-- <img src="../images/defaultimage.png" class="img-responsive"> -->
                      <?php } ?>
                  </div>

                  
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $loggedin_session; ?>">
                      </div>
                    </div>

                    
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control input-lg" id="Email" value="<?php echo $loggedin_id; ?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Field</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" name="field" class="form-control input-lg" id="field" placeholder="field" value="<?php echo $row['advisor_field']; ?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?php echo $row['advisor_company']; ?>">
                      </div>
                    </div>
                    

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Designation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="designation" type="text" class="form-control" id="designation" value="<?php echo $row['advisor_designation']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Advising Components</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="components" type="text" class="form-control" id="components" value="<?php echo $row['advisor_advisingcomponent']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Experience</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="expereience" type="number" class="form-control" id="expereience" value="<?php echo $row['advisor_noofexperience']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Mobile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile" type="text" class="form-control" id="mobile" value="<?php echo $row['advisor_mobile']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="linkedin" value="<?php echo $row['advisor_linkedin']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Qualifications</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="qualifications" type="text" class="form-control" id="qualifications" value="<?php echo $row['advisor_qualifications']; ?>">
                      </div>
                    </div>

                   

            

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                    <?php
                }
              }
            ?>   
                  </form>
                </div>



                <div class="tab-pane fade pt-3" id="profile-settings">


                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <form id="changePassword" action="change_advisorpassword.php" method="post">

               
               
                 
        
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="password" autocomplete="off" name="newpassword" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  id="cpassword" autocomplete="off" name="cpassword" type="password" class="form-control" id="renewPassword">
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

  <footer id="footer" class="footer">
    <div class="copyright">
    &copy; Copyright <strong><span>startupcompanion</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
       Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
  $("#changePassword").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>

</body>

</html>