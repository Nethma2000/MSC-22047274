<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
<title>Forum</title>

<?php
include('../entrepreneurs/entreprenursession.php');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="forum.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>




<!-- Vendor CSS Files -->



  <link href="../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet"> 
  
  <link href="../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../admins/assets/css/style.css" rel="stylesheet">


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="entrepreneurhome.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav"  href="../forum/forum-home.php">
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

    

        <a class="nav-link collapsed" href="../admins/blog/">
        <i class="bi bi-menu-button-wide"></i>
                  <span>Blogs</span>
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

  <div class="container-fluid">
    <div class="row" style="margin-top: 44px; margin-left: 100px; width: 80%;">
        <div class="col-md-3">
        <!-- Left side content, if any -->
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

<!-- Modal -->
<div id="ReplyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="color:purple; font-weight:bold" class="modal-title">Reply Question</h4>
    </div>
    <div class="modal-body">
        <form name="frm1" method="post" id="replyForm">
            <input type="hidden" id="commentid" name="Rcommentid">
            <div class="form-group">
                <label for="usr">Write your name:</label>
                <input type="text" class="form-control" value="<?php echo $loggedin_session; ?>" name="Rname" readonly required>
            </div>
            <div class="form-group">
                <label for="comment">Write your reply:</label>
                <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
            </div>
            <!-- <input type="button" style="color:white; background-color:purple" id="btnreply" name="btnreply" class="btn btn-" value="Reply"> -->
            <input type="button" style="color:white; background-color:purple" id="btnreply" name="btnreply" class="btn btn-" value="Reply"
            onclick="submitReply()">
          </form>
    </div>
</div>



  </div>
</div>

<script>
    function submitReply() {
        // Clear the reply message field
        document.getElementById('replyMessage').value = '';

        // Enable the reply button
        document.getElementById('btnreply').disabled = false;

        // Close the modal
        $('#myModal').modal('hide');
    }
</script>
<div class="container">

<div class="panel panel-default" style="margin-top: 50px; margin-left: 250px; width: 80%;">
  <div class="panel-body">
    <h3 style="color:purple;font-weight:bold">Forum</h3>

    <h5>You can post any question related to career development.Also be kind enough to reply the posted questions if you have any ideas.</h5>
    <hr>
    <form name="frm" method="post"  action="forum-questions-add.php">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
	<div class="form-group">
	  <!-- <label for="usr">Write your name:</label>
    <input type="text" class="form-control" name="name" value="<?php echo $loggedin_session; ?>" readonly required>
    </div> -->
    <div class="form-group">
      <label for="comment">Write your question:</label>
      <textarea class="form-control" rows="5" name="msg" required></textarea>
    </div>
	 <input type="button" style="color:white ;background-color:purple" id="butsave" name="save" class="btn btn-" value="Send">
  </form>
  </div>
</div>
  

<div class="panel panel-default" style="margin-top: 50px; margin-left: 100px; width: 80%;">
  <div style="background-color: purple;" class="panel-body">
    <h4 style="color: white;font-weight:bold">Recent questions</h4>           
	<table class="table" id="MyTable" style="background-color: #f4defa; border:0px;border-radius:10px">
	  <tbody id="record">
		
	  </tbody>
	</table>
  </div>
</div>

</div>


</body>
</html>