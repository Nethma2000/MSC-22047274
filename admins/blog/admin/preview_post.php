

<!-- Favicons -->
<link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

<!-- Vendor JS Files -->
<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
  <a class="nav-link collapsed" href="../../adminhome.php">
  <i class="bi bi-grid"></i>
	  <span>Dashboard</span>
	</a>
  </li><!-- End Dashboard Nav -->
  
  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
	<i class="bi bi-journals"></i>
	</i><span>Manage Blog</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icons-nav" class="nav-content " data-bs-parent="#sidebar-nav">
	  <li>
		<a class= "nav-link" href="index.php?page=posts">
		  <i class="bi bi-circle"></i><span>Blog articles</span>
		</a>
	  </li>
	  <li>
		<a href="index.php?page=category">
		  <i class="bi bi-circle"></i><span>Blog Categories</span>
		</a>
	  </li>
	  
	</ul>
  </li><!-- End Icons Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icos-nav1" data-bs-toggle="collapse" href="#">
	<i class="bi bi-book"></i>
	</i><span>Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icos-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	<li>
            <a href="../../../knowledge/courses.php">
              <i class="bi bi-circle"></i><span>All courses</span>
            </a>
          </li>
		  <li>
            <a href="../../../knowledge/coursematerials.php">
              <i class="bi bi-circle"></i><span>Course materials</span>
            </a>
          </li>
          <li>
            <a href="../../../knowledge/createcourses.php">
              <i class="bi bi-circle"></i><span>Create New Courses</span>
            </a>
          </li>
          <li>
            <a href="../../../knowledge/createcourses.php#Chapter">
              <i class="bi bi-circle"></i><span>Create New Chapters</span>
            </a>
          </li>
		  <a href="../../../knowledge/createcourses.php#Topic">
              <i class="bi bi-circle"></i><span>Create New Topics</span>
            </a>
          </li>
          <li>
            <a href="../../../knowledge/addcoursecontent.php">
              <i class="bi bi-circle"></i><span>Create Course Content</span>
            </a>
          </li>

	</ul>
  </li><!-- End Icons Nav -->

  <li class="nav-item">

	<a class="nav-link collapsed" href="../../../advisors/advisorscrud/index.php">
	<i class="bi bi-person-plus"></i>  	  
	<span>Advisors Section</span>
	</a>

	<a class="nav-link collapsed" href="../../../owners/advisorscrud/index.php">
	  <i class="bi bi-person"></i>
	  <span>Owners Section</span>
	</a>

	<a class="nav-link collapsed" href="../../../tips/admin-files-upload.php">
        <i class="bi bi-card-text"></i>    
        <span>Success Tips File Approval</span>
        </a>

	<a class="nav-link collapsed" href="../../inquiries.php">
	<i class="bi bi-envelope"></i>
	<span>Inquiries</span>
	</a>
	<!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
	  <i class="bi bi-person"></i>
	  <span>Advisors</span>
	</a> -->
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
  <a class="nav-link collapsed" href="../../faq/addfaq.php">
  <i class="bi bi-question-circle"></i>
	  <span>F.A.Q</span>
	</a>
  </li><!-- End F.A.Q Page Nav -->




</ul>

</aside><!-- End Sidebar-->



<?php 
	include('../db_connect.php');
	$qry = $conn->query("SELECT p.*,c.name as cname FROM posts p inner join category c on c.id = p.category_id where p.id =".$_GET['id']);
	foreach($qry->fetch_array() as $key => $value) {
		$meta[$key] = $value;
	}
?>
<div class="container-fluid">
	<div class="col-md-12">
		<h3>&nbsp&nbsp&nbsp&nbsp<?php echo isset($meta['title']) ? $meta['title'] : ''; ?></h3>
		&nbsp&nbsp&nbsp&nbsp<small>&nbsp&nbsp&nbsp&nbsp<?php echo isset($meta['cname']) ? $meta['cname'] : ''; ?></small>
	</div>
	<div class="col-md-12">
		<center>
			<img src="../assets/img/<?php echo isset($meta['img_path']) ? $meta['img_path'] : ''; ?>" alt="" class='col-md-5'>
		</center>
		<br>

	</div>
	<div class="col-md-12" style="margin-left: 40px;">
<?php echo isset($meta['post']) ? html_entity_decode($meta['post']) : ''; ?>
	
	</div>

</div>