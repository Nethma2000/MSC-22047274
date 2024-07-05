<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Entrepreneur Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../admins/assets/img/favicon.png" rel="icon">
  <link href="../../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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


  
 
</head>

<body>
	

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="top: 0; width: 100%; z-index: 1000; margin-bottom: 0;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../../admins/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Entrepreneur Dashboard</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

	

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

        
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
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

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
 
 
 
 
 
 
 
 
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
	<a class="nav-link collapsed" href="../../entrepreneurs/entrepreneurhome.php">
	  <i class="bi bi-grid"></i>
	  <span>Dashboard</span>
	</a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#components-nav"  href="#">
	  <i class="bi bi-menu-button-wide"></i><span>Forum</span></i>
	</a>
   
	<li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#components-nav"  href="#">
	  <i class="bi bi-menu-button-wide"></i><span>Learning</span></i>
	</a>

	<li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#components-nav"  href="#">
	  <i class="bi bi-menu-button-wide"></i><span>Idea Validation portal</span></i>
	</a>

	
	<li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#components-nav"  href="#">
	  <i class="bi bi-menu-button-wide"></i><span>Prediction</span></i>
	</a>

	<li class="nav-item">
	<a class="nav-link" data-bs-target="#components-nav"  href="#">
	  <i class="bi bi-menu-button-wide"></i><span>Blog</span></i>
	</a>


  <!-- End Components Nav -->



  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-gem"></i><span>Meetings</span><i class="bi bi-chevron-down ms-auto"></i>
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
  </li><!-- End Icons Nav -->


  <li class="nav-item">

	<a class="nav-link collapsed" href="../uni-company-chat/login.php">
	  <i class="bi bi-person"></i>
	  <span>Live Chat</span>
	</a>

	<!-- <a class="nav-link collapsed" href="#">
	  <i class="bi bi-person"></i>
	  <span>Link 2</span>
	</a> -->

	<!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
	  <i class="bi bi-person"></i>
	  <span>Advisors</span>
	</a> -->
  </li><!-- End Profile Page Nav -->

 


</ul>

</aside><!-- End Sidebar-->
 
 
<div class="pagetitle">
      <h1>Blog</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../entrepreneurs/entrepreneurhome.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Blog</li>
        </ol>
      </nav>
    </div>

  <section class="d-flex align-items-center">
	<div class="container">
	    <?php
		include 'db_connect.php';

	    	$qry = $qry = $conn->query("SELECT p.*,c.name as category from posts p inner join category c on c.id = p.category_id where p.status = 1 order by date(p.date_published) desc limit 5");
	    	while($row=$qry->fetch_assoc()){
	    ?>
	    <div class="card col-md-12 list-items"  data-id="<?php echo $row['id'] ?>">
	    	<div class="card-body">
	    		<div class="row">
	    		<div class="col-md-4">
	    			<center><img src="assets/img/<?php echo $row['img_path'] ?>" alt="" class='col-sm-10'></center>
	    		</div>
	    		<div class="col-md-8 truncate">
	    			<h3><b><?php echo $row['title'] ?></b></h3>
	    			<p class="text-truncate">
	    				<?php echo html_entity_decode($row['post']) ?>
	    			</p>

	    		</div>
	    		</div>

	    	</div>
	    </div>
		<?php } ?>
		</div>
  </section>
  <style type="text/css">
  	.list-items p{
  		text-align: left !important;
  	}
  	.list-items{
  		cursor: pointer;
  	}
  	.truncate{
  		max-height: 10vw;
  		overflow: hidden;
  	}
  </style>
  <script>
  	$(document).ready(function(){
  		$('.list-items').click(function(){
  			location.replace('index.php?page=preview_post&id='+$(this).attr('data-id'))
  		})
  	})
  </script>

  
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

   