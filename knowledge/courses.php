
<?php
include('../admins/adminsession.php');
?>


<title>StartupCompanion | Navigate your startup journey</title>
  <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">


  <link href="../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 
 <link href="../admins/assets/css/style.css" rel="stylesheet">

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
        <img src="../assets/img/userimg.png" alt="Profile" class="rounded-circle">
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

      </ul>
    </li>

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
  </li>

  <li class="nav-item">

    <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
    <i class="bi bi-person-plus"></i>          <span>Advisors Section</span>
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

<?php 
session_start();
include "Utils/Util.php";


    include "controller/admincourse.php";
    $row_count = getCount();

    $page = 1;
    $row_num = 5;
    $offset = 0;
    $last_page = ceil($row_count / $row_num);
    if(isset($_GET['page'])){
    if($_GET['page'] > $last_page){
        $page = $last_page;
    }else if($_GET['page'] <= 0){
        $page = 1; 
    }else $page = $_GET['page'];
    }
    if($page != 1) $offset = ($page-1) * $row_num;
    $courses = getSomeCourses($offset, $row_num);
    # Header
    include "adheader.php";

?>

<div class="container" style="margin-left: 300px;">
  
  <div class="list-table pt-5">
  <?php if ($courses) { ?>
  <h4>All Courses (<?=$row_count?>)</h4>

  <table class="table table-bordered" style="width: 1000px;" >
      <tr>
        <th>#Id</th>
        <th>Full name</th>
     
      </tr>
      <?php foreach ($courses as $course) {?>
      <tr>
      <td><?=$course["course_id"]?></td>
      <!-- <td><a href="entrepreneurside/courseview.php?course_id=<?=$course["course_id"]?>"><?=$course["title"]?></a></td> -->
      <td><?=$course["title"]?></a></td>

       <!-- <td class="status"> <?=$course["status"]?></td> -->
       <!-- <td class="action_btn">
        <?php  
        $status = $course["status"];
        $course_id = $course["course_id"];
        $text_temp = $course["status"] == "Public" ? "Private": "Public";
        ?> 
        <a href="javascript:void()" onclick="ChangeStatus(this, <?=$course_id?>)" class="btn btn-warning"><?=$text_temp?></a>
       </td> -->
      </tr>
      <?php } ?>
      
  </table>
  <?php if ($last_page > 1 ) { ?>
  <div class="d-flex justify-content-center mt-3 border">
      <?php
            $prev = 1;
            $next = 1;
            $next_btn = true;
            $prev_btn = true;
            if($page <= 1) $prev_btn = false; 
            if($last_page ==  $page) $next_btn = false; 
            if($page > 1) $prev = $page - 1;
            if($page < $last_page) $next = $page + 1;
            
            if ($prev_btn){
            ?>
            <a href="Courses.php?page=<?=$prev?>" class="btn btn-secondary m-2">Prev</a>
           <?php }else { ?>
            <a href="#" class="btn btn-secondary m-2 disabled">Prev</a>
            
           <?php 
           }
           $push_mid = $page;
           if ($page >= 2)  $push_mid = $page - 1;
           if ($page > 3)  $push_mid = $page - 3;
          
           for($i = $push_mid; $i < 5 + $page; $i++){
            if($i == $page){ ?>
             <a href="Courses.php?page=<?=$i?>" class="btn btn-success m-2"><?=$i?></a>
           <?php }else{ ?>
             <a href="Courses.php?page=<?=$i?>" class="btn btn-secondary m-2"><?=$i?></a>

           <?php } 
           if($last_page <= $i)break;

            } 
            if($next_btn){
            ?>
            <a href="Courses.php?page=<?=$next?>" class="btn btn-secondary m-2">Next</a>
        <?php }else { ?>
           <a href="#" class="btn btn-secondary m-2 disabled" des>Next</a>
        <?php } ?>
  </div>

  <?php }}else { ?>
    <div class="alert alert-info" role="alert">
      0 students record found in the database
</div>

  <?php } ?>
  </div>



</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  var valu= "";
  var btext= "";
  function ChangeStatus(current, cou_id){
    var cStatus = $(current).parent().parent().children(".status").text().toString();
   
    if (cStatus == "Private") {
      valu = "Public";
      btext = "Private";
    }
    else {
      valu= "Private"; 
      btext = "Public"; 
    }

    $.post("Action/active-course.php",
    {
      course_id: cou_id,
      val: valu
    },
    function(data, status){
      if (status == "success") {
        $(current).parent().parent().children(".status").text(valu);
        $(current).parent().parent().children(".action_btn").children("a").text(btext);
       
      }

    });
  }
</script>

 <script src="../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../admins/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../admins/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../admins/assets/vendor/quill/quill.min.js"></script>
  <script src="../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../admins/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../admins/assets/vendor/php-email-form/validate.js"></script>

  <script src="../admins/assets/js/main.js"></script>

