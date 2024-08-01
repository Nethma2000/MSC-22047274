<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
  <title>StartupCompanion | Navigate your startup journey</title>

  <?php
  include ('../entrepreneurs/entreprenursession.php');
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/img/logo1.jpg" rel="icon">



  <link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../admins/assets/css/style.css" rel="stylesheet">


  <link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="forum.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>



<link href="../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

<link href="../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

<link href="../admins/assets/css/style.css" rel="stylesheet">


<header id="header" class="header fixed-top d-flex align-items-center"
  style="top: 0; width: 100%; z-index: 1000; margin-bottom: 0;">

  <div class="d-flex align-items-center justify-content-between">
    <a href="../../entrepreneurs/entrepreneurhome.php" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block" style="white-space: nowrap;">&nbsp&nbspEntrepreneur Dashboard</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn" style="margin-left: 40px;"></i>
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

          $sql = "SELECT * FROM entrepreneurs WHERE id_user='$loggedin_userid'";
          $result = $conn->query($sql);


          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

              if ($row['prof_img'] != "") { ?>
                <img src="../entrepreneurs/uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
              <?php } else { ?>
                <img src="../images/defaultimage.png" class="img-responsive">
              <?php } ?>
              <span class="d-none d-md-block dropdown-toggle ps-2">Welcome <?php echo $loggedin_session; ?></span>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6><?php echo $loggedin_session; ?></h6>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="../entrepreneurs/users-profile.php">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="../entrepreneurs/users-profile.php">
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
      <a class="nav-link collapsed" href="../entrepreneurs/entrepreneurhome.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-target="#components-nav" href="forum-home.php">
        <i class="bi bi-chat-square-text"></i>
        <span style="color:#1434A4;">Forum</span></i>
      </a>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i>
        <span>Learning</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../knowledge/entrepreneurside/allcourses.php">
            <i class="bi bi-circle"></i><span>All Courses</span>
          </a>
        </li>
        <li>
          <a href="../knowledge/entrepreneurside/mycourses.php">
              <i class="bi bi-circle"></i><span>Enrolled Courses</">
            <i class="bi bi-circle"></i><span>Enrolled Courses</span>
          </a>
        </li>
        <li>
            <!-- <a href="../knowledge/entrepreneurside/courseenrolled.php"> -->
              <a href="../knowledge/coursematerials.php">
              <i class="bi bi-circle"></i><span>Extra Reference Materials</span>
            </a>
          </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#compo-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-trophy"></i> <span>Idea Validation</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="compo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../ideaportal/advisorselection.php">
            <i class="bi bi-circle"></i><span>Advisors</span>
          </a>
        </li>
        <li>
          <a href="../ideaportal/user/index.php">
            <i class="bi bi-circle"></i><span>My Valiation Requests Sent</span>
          </a>
        </li>
        <li>
          <a href="../ideaportal/user/mailbox.php">
            <i class="bi bi-circle"></i><span>Mailbox</span>
          </a>
        </li>

      </ul>
    </li>



    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" href="../predictform.html">
        <i class="bi bi-gem"></i></i><span>Prediction</span></i>
      </a>

      <a class="nav-link collapsed" href="../admins/blog/">
        <i class="bi bi-journals"></i>
        <span>Blogs</span>
      </a>

      <a class="nav-link collapsed" href="../events/index.php">
        <i class="bi bi-calendar-event"></i>
        <span>Events</span>
      </a>



    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar2-plus"></i><span>Meetings</span><i class="bi bi-chevron-down ms-auto"></i>
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

      <a class="nav-link collapsed" href="../chat/login.php">
        <i class="bi bi-chat-dots"></i>
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
    </li>



  </ul>

</aside>

<div class="container-fluid">
  <div class="row" style="margin-top: 44px; margin-left: 100px; width: 80%;">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb" style="background-color: #f6f9ff;">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div id="ReplyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="color:#1434A4; font-weight:bold" class="modal-title">Reply Question</h4>
      </div>
      <div class="modal-body">
        <form name="frm1" method="post" id="replyForm">
          <input type="hidden" id="commentid" name="Rcommentid">
          <div class="form-group">
            <label for="usr">Write your name:</label>
            <input type="text" class="form-control" value="<?php echo $loggedin_session; ?>" name="Rname" readonly
              required>
          </div>



          <!-- <div class="form-group">
    <label for="field">Write your field:</label>

                        <select name="Rforumfield">
                        
                        <option value="Agriculture and Food-Tech">Agriculture and Food-Tech</option>
                        <option value="Consumer Goods">Consumer Goods</option>
                        <option value="Creative Arts and Media">Creative Arts and Media</option>
                        <option value="Education">Education</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Health and Wellness">Health and Wellness</option>
                        <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                        <option value="Manufacturing and Industry">Manufacturing and Industry</option>
                        <option value="Real Estate and Property Management">Real Estate and Property Management</option>
                        <option value="Retail and E-commerce">Retail and E-commerce</option>
                        <option value="Social Impact and Nonprofit">Social Impact and Nonprofit</option>
                        <option value="Technology">Technology</option>
                        <option value="Transportation and Logistics">Transportation and Logistics</option>

                        </select>
                    </div> -->



          <div class="form-group">
            <label for="comment">Write your reply:</label>
            <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
          </div>
          <!-- <input type="button" style="color:white; background-color:purple" id="btnreply" name="btnreply" class="btn btn-" value="Reply"> -->
          <input type="button" style="color:white; background-color:#1434A4	" id="btnreply" name="btnreply"
            class="btn btn-" value="Reply" onclick="submitReply()">
        </form>
      </div>
    </div>



  </div>
</div>

<script>
  function submitReply() {
    document.getElementById('replyMessage').value = '';

    document.getElementById('btnreply').disabled = false;

    $('#myModal').modal('hide');
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
<div class="container">

  <div class="panel panel-default" style="margin-top: 50px; margin-left: 250px; width: 80%;">
    <div class="panel-body">
      <h3 style="color:#1434A4;font-weight:bold">Forum to discuss general topics </h3>
      <h5 style="line-height: 1.6;">You can post any general questions you have, such as legal concerns, business
        registration guidelines, funding options, marketing strategies, product development, etc. related to startups.
        Also, please be kind enough to reply to posted questions if you have any ideas.</h5>

      <hr>
      <form name="frm" method="post" action="forum-questions-add.php">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
        <div class="form-group">
          <!-- <label for="usr">Write your name:</label>
    <input type="text" class="form-control" name="name" value="<?php echo $loggedin_session; ?>" readonly required>
    </div> -->

          <!-- <div class="form-group">
    <label for="field">Select your field:</label>

    
                        <select name="forumfield">
                        
                        <option value="Agriculture and Food-Tech">Agriculture and Food-Tech</option>
                        <option value="Consumer Goods">Consumer Goods</option>
                        <option value="Creative Arts and Media">Creative Arts and Media</option>
                        <option value="Education">Education</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Health and Wellness">Health and Wellness</option>
                        <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                        <option value="Manufacturing and Industry">Manufacturing and Industry</option>
                        <option value="Real Estate and Property Management">Real Estate and Property Management</option>
                        <option value="Retail and E-commerce">Retail and E-commerce</option>
                        <option value="Social Impact and Nonprofit">Social Impact and Nonprofit</option>
                        <option value="Technology">Technology</option>
                        <option value="Transportation and Logistics">Transportation and Logistics</option>



                        </select>
                    </div> -->



          <div class="form-group">
            <label for="comment">Write your question:</label>
            <textarea class="form-control" rows="5" name="msg" required></textarea>
          </div>

          <input type="submit" style="color:white ;background-color:#1434A4;" id="butsave" name="save" class="btn btn-"
            value="Send">
      </form>
    </div>
  </div>


  <div class="panel panel-default" style="margin-top: 50px; margin-left: 100px; width: 80%;">
    <div style="background-color: #1434A4	;" class="panel-body">
      <h4 style="color: white;font-weight:bold">Recent questions</h4>
      <table class="table" id="MyTable" style="background-color: #f4defa; border:0px;border-radius:10px">
        <tbody id="record">

        </tbody>
      </table>
    </div>
  </div>

</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>


</body>

</html>