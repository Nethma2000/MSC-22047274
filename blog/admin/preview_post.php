

<link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../../assets/css/style.css" rel="stylesheet">

<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <script src="../../assets/js/main.js"></script>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
  <a class="nav-link collapsed" href="../../adminhome.php">
  <i class="bi bi-grid"></i>
	  <span>Dashboard</span>
	</a>
  </li>
  
  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-gem"></i><span>Manage Blog</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icons-nav" class="nav-content " data-bs-parent="#sidebar-nav">
	  <li>
		<a class="nav-link" href="index.php?page=posts">
		  <i class="bi bi-circle"></i><span>Blog articles</span>
		</a>
	  </li>
	  <li>
		<a href="index.php?page=category">
		  <i class="bi bi-circle"></i><span>Blog Categories</span>
		</a>
	  </li>
	 
	</ul>
  </li>
  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icons-nav1" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-gem"></i><span>Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
  </li>

  <li class="nav-item">

	<a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
	  <i class="bi bi-person"></i>
	  <span>Advisors Section</span>
	</a>

	<a class="nav-link collapsed" href="../owners/advisorscrud/index.php">
	  <i class="bi bi-person"></i>
	  <span>Owners Section</span>
	</a>



	<a class="nav-link collapsed" href="inquiries.php">
	  <i class="bi bi-person"></i>
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