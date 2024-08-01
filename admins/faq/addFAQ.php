<?php
include ('adminsession.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - Manage Frequently Asked Questions</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="icon" href="../../assets/img/logo1.jpg" type="image/jpg" sizes="150x130">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <link href="../../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../../admins/assets/css/style.css" rel="stylesheet">



</head>

<body style="background-color: #f6f9ff;">

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../adminhome.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
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
            <img src="../../images/defaultimage.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Welcome <?php echo $loggedin_session; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $loggedin_session; ?></span>
                <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../users-profile.php">
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
              <a class="dropdown-item d-flex align-items-center" href="../../logout.php">
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
        <a class="nav-link collapsed" href="../adminhome.php">
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
            <a href="../blog/admin/index.php?page=posts">
              <i class="bi bi-circle"></i><span>Blog articles</span>
            </a>
          </li>
          <li>
            <a href="../blog/admin/index.php?page=category">
              <i class="bi bi-circle"></i><span>Blog Categories</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i></i><span>Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../knowledge/courses.php">
              <i class="bi bi-circle"></i><span>All courses</span>
            </a>
          </li>
          <li>
            <a href="../../knowledge/coursematerials.php">
              <i class="bi bi-circle"></i><span>Course materials</span>
            </a>
          </li>
          <li>
            <a href="../../knowledge/createcourses.php">
              <i class="bi bi-circle"></i><span>Create New Courses</span>
            </a>
          </li>
          <li>
            <a href="../../knowledge/Courses-add.php#Chapter">
              <i class="bi bi-circle"></i><span>Create New Chapters</span>
            </a>
          </li>
          <li>
            <a href="../../knowledge/Courses-add.php#Topic">
              <i class="bi bi-circle"></i><span>Create New Topics</span>
            </a>
          </li>
          <li>
            <a href="../../knowledge/addcoursecontent.php">
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

        <a class="nav-link collapsed" href="../../advisors/advisorscrud/index.php">
          <i class="bi bi-person-plus"></i>
          <span>Advisors Section</span>
        </a>

        <a class="nav-link collapsed" href="../../owners/advisorscrud/index.php">
          <i class="bi bi-person"></i>
          <span>Owners Section</span>
        </a>

        <a class="nav-link collapsed" href="../../tips/admin-files-upload.php">
          <i class="bi bi-card-text"></i>
          <span>Success Tips File Approval</span>
        </a>

        <a class="nav-link collapsed" href="../inquiries.php">
          <i class="bi bi-envelope"></i>
          <span>Inquiries</span>
        </a>
        <!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
  <i class="bi bi-person"></i>
  <span>Advisors</span>
</a> -->
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>




    </ul>

  </aside>End Sidebar



  <?php


  $conn = new PDO("mysql:host=localhost;dbname=startupcompanion", "root", "");

  if (isset($_POST["submit"])) {
    $sql = "CREATE TABLE IF NOT EXISTS faqs (
            id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
            question TEXT NULL,
            answer TEXT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
    $statement = $conn->prepare($sql);
    $statement->execute();




    $sql = "INSERT INTO faqs (question, answer) VALUES (?, ?)";
    $statement = $conn->prepare($sql);
    $statement->execute([
      $_POST["question"],
      $_POST["answer"]
    ]);
  }


  $sql = "SELECT * FROM faqs ORDER BY id DESC";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $faqs = $statement->fetchAll();

  ?>








  <html>

  <head>

    <link rel="stylesheet" type="text/css" href="faqcss/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="faqfont-awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="faqrichtext/richtext.min.css" />

    <title>FAQ Section - Add FAQ</title>


    <script src="faqjs/jquery-3.3.1.min.js"></script>
    <script src="faqjs/bootstrap.js"></script>
    <script src="faqrichtext/jquery.richtext.js"></script>

  </head>


  <body>



    <div class="container" style="margin-top: 50px; margin-bottom: 50px;">

      <div class="row">
        <div class="offset-md-3 col-md-9">
          <h1 style="color: purple;" class="text-center">Add FAQ</h1>


          <form method="POST" action="addfaq.php">

            <div style="color: purple;" class="form-group">
              <label>Enter Question</label>
              <input type="text" name="question" class="form-control" required />
            </div>

            <div style="color: purple;" class="form-group">
              <label>Enter Answer</label>
              <textarea name="answer" id="answer" class="form-control" required></textarea>
            </div>

            <!-- <input  style="background-color: purple;color:white" type="submit" name="submit" class="btn btn-info" value="Add FAQ" /> -->
            <input style="background-color: purple; color: white; margin-bottom: 20px;" type="submit" name="submit"
              class="btn btn-info" value="Add FAQ" />

          </form>
        </div>
      </div>

      <div class="row">
        <div class="offset-md-3 col-md-9">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="color: purple;">ID</th>
                <th style="color: purple;">Question</th>
                <th style="color: purple;">Answer</th>
                <th style="color: purple;">Actions</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($faqs as $faq): ?>
                <tr>
                  <td><?php echo $faq["id"]; ?></td>
                  <td><?php echo $faq["question"]; ?></td>
                  <td><?php echo $faq["answer"]; ?></td>
                  <td>
                    <a style="background-color: #0eb082;color:white" href="editFAQ.php?id=<?php echo $faq['id']; ?>"
                      class="btn btn- btn-sm">
                      Edit
                    </a>

                    <form method="POST" action="deleteFAQ.php"
                      onsubmit="return confirm('Are you sure you want to delete this FAQ ?');">
                      <input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
                      <input type="submit" value="Delete" style="background-color: #d13c0f;color:white"
                        class="btn btn- btn-sm" />
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <script>
      window.addEventListener("load", function () {
        $("#answer").richText();
      });
    </script>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <script src="../assets/js/main.js"></script>

  </body>

  </html>