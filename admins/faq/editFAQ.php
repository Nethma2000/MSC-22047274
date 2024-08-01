<?php
 

$conn = new PDO("mysql:host=localhost;dbname=startupcompanion", "root", "");
 
    // check if FAQ exists
    $sql = "SELECT * FROM faqs WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_REQUEST["id"]
    ]);
    $faq = $statement->fetch();
 
    if (!$faq)
    {
        die("FAQ not found");
    }
 
if (isset($_POST["submit"]))
{

    $sql = "UPDATE faqs SET question = ?, answer = ? WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_POST["question"],
        $_POST["answer"],
        $_POST["id"]
    ]);
 
 header("Location:addFAQ.php");

    // header("Location: " . $_SERVER["HTTP_REFERER"]);
}

include('adminsession.php');

 
?>

<link rel="stylesheet" type="text/css" href="faqcss/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="faqfont-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="faqrichtext/richtext.min.css" />

  <link href="../../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../../admins/assets/css/style.css" rel="stylesheet">

<script src="faqjs/jquery-3.3.1.min.js"></script>
<script src="faqjs/bootstrap.js"></script>
<script src="faqrichtext/jquery.richtext.js"></script>

<style>
        body {
            background-color: 		#f6f9ff
			; 
        }
    </style>

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
        <i class="bi bi-book"></i><span>Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
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
<a class="nav-link" href="addFAQ.php">
  <i class="bi bi-question-circle"></i>
  <span>F.A.Q</span>
</a>
</li>

 


</ul>

</aside>End Sidebar


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="offset-md-3 col-md-9">
            <h1 class="text-center">Edit FAQ</h1>
 
            <form method="POST" action="editFAQ.php">
 
                <input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
 
                <div class="form-group">
                    <label>Enter Question</label>
                    <input type="text" name="question" class="form-control" value="<?php echo $faq['question']; ?>" required />
                </div>
 
                <div class="form-group">
                    <label>Enter Answer</label>
                    <textarea name="answer" id="answer" class="form-control" required><?php echo $faq['answer']; ?></textarea>
                </div>
 
         
                <input type="submit" name="submit" class="btn btn-warning" value="Edit FAQ" />
            </form>
        </div>
    </div>
</div>
 
<script>
    window.addEventListener("load", function () {
        $("#answer").richText();
    });
</script>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/chart.js/chart.umd.js"></script>
<script src="../assets/vendor/echarts/echarts.min.js"></script>
<script src="../assets/vendor/quill/quill.min.js"></script>
<script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<script src="../assets/js/main.js"></script>
