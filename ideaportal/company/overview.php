<!DOCTYPE html>
<html lang="en">

<head>
<?php
include('advisorsession.php');
include('../../databaseconnection.php');
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn, "select advisor_email,advisor_name, id_advisor from advisor where advisor_email='$user_check'");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$loggedin_session = $row['advisor_name'];
$loggedin_id = $row['advisor_email'];
$loggedin_advisor_id = $row['id_advisor'];

// Fetch existing advisor overview details if available
$overview_sql = "SELECT * FROM advisor_overview WHERE id_advisor='$loggedin_advisor_id'";
$overview_result = $conn->query($overview_sql);
$overview_row = $overview_result->fetch_assoc();
?>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>StartupCompanion | Navigate your startup journey</title>
  <link href="../../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../admins/assets/img/favicon.png" rel="icon">
  <link href="../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../../admins/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 300 });</script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin- sidebar-mini">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="../../advisors/advisorhome.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Advisor Dashboard</span>
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
          <?php
            }
          }
          ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $loggedin_session; ?></h6>
              <span>Advisor</span>
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
            <li>
              <a class="dropdown-item d-flex align-items-center" href="../index.html">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="../../advisors/advisorhome.php">
          <i class="bi bi-grid"></i>
          <span style="font-size: 17px;">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="overview.php">
        <i class="bi bi-pencil-square"></i>
          <span style="font-size: 17px;">Create My Overview</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-trophy"></i> <span style="font-size: 17px;">Idea Validation</span><i class="bi bi-chevron-down ms-auto"></i>
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
          <a href="resume-database.php">
            <i class="bi bi-circle"></i><span style="font-size: 15px;">Ideas Database</span>
          </a>
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="form-container">
                <form method="post" action="addoverview.php">
                  <!-- <div class="form-group">
                    <label for="jobtitle">Job Title</label>
                    <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="<?php echo isset($overview_row['jobtitle']) ? $overview_row['jobtitle'] : ''; ?>">
                  </div> -->

                  <div class="form-group" style="margin-top: 20px;">
                  <label for="jobtitle">Your Name</label>

              <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" value="<?php echo $loggedin_session; ?>" readonly>
              </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"><?php echo isset($overview_row['description']) ? $overview_row['description'] : ''; ?></textarea>
                  </div>

                  <?php
 $sql = "SELECT * FROM advisor WHERE id_advisor='$loggedin_advisor_id'";
 $result = $conn->query($sql);

 
 if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {


 ?>

<div class="form-group">
              <input type="hidden" class="form-control input-lg" id="field" name="field" value="<?php echo $row['advisor_field']; ?>" required readonly>
              </div>

              
              <div class="form-group">
                <input type="hidden" class="form-control  input-lg" id="components" name="components" placeholder="Advising components" value="<?php echo $row['advisor_advisingcomponent']; ?>" required="" readonly>
              </div>

              <div class="form-group">
            <input type="hidden" class="form-control  input-lg" id="experience" autocomplete="off" name="experience" value="<?php echo $row['advisor_noofexperience']; ?>" required="" readonly>
            </div>
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control  input-lg" id="linkedin" name="linkedin" value="<?php echo $row['advisor_linkedin']; ?>" required="" readonly>
              </div>


                  <!-- <div class="form-group">
                    <label for="field">Field</label>
                    <input type="text" class="form-control" id="field" name="field" value="<?php echo isset($overview_row['field']) ? $overview_row['field'] : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="components">Components</label>
                    <input type="text" class="form-control" id="components" name="components" value="<?php echo isset($overview_row['components']) ? $overview_row['components'] : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="experience">Experience</label>
                    <input type="text" class="form-control" id="experience" name="experience" value="<?php echo isset($overview_row['experience']) ? $overview_row['experience'] : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin" value="<?php echo isset($overview_row['linkedin']) ? $overview_row['linkedin'] : ''; ?>">
                  </div> -->
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
  }
}
?>
    </section>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

</html>
