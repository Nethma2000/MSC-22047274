<?php

session_start();



require_once("oconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Approve/Reject Advisors</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body style="background-color: white;" class="hold-transition skin- sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
     >
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper" style="margin-left: 0px;"> -->

    <!-- <section id="candidates" class="content-header"> -->
       

            <h3 style="color: purple;font-weight:bolder;text-align:center">Approve/Reject Advisor Account Creations</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                    <th>Advisor Name</th>
                      <th>Company Name</th>
                      <th>Designation</th>
                      <th>Field</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Medium</th>
                      <th>Linkedin</th>
                      
                      <th>Github</th>
                      <th>Qualification</th>
                      <th>Work experience</th>
                      <th>active</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM owners";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                      <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['company']; ?></td>
                        <td><?php echo $row['designation']; ?></td>
                        <td><?php echo $row['field']; ?></td>
                        <td><?php echo $row['mobileno']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['medium']; ?></td>
                        <td><?php echo $row['linkedin']; ?></td>
                        <td><?php echo $row['github']; ?></td>
                        <td><?php echo $row['qualifications']; ?></td>
                        <td><?php echo $row['work_experience']; ?></td>
                        <td>
                        <?php
                          if($row['active'] == '1') {
                            // echo "Activated";
                           echo '<span style="color:green;font-weight:bold;">Activated</span>' ;
                          } else if($row['active'] == '2') {
                            ?>
                            <a style="color: Purple;font-weight:bold;" href="rejectadvisor.php?id=<?php echo $row['id_advisor']; ?>">Reject</a> <a style="color: purple;font-weight:bold;" href="approveadvisor.php?id=<?php echo $row['id_advisor']; ?>">Approve</a>
                            <?php
                          } else if ($row['active'] == '3') {
                            ?>
                              <a style="color: Purple;font-weight:bold;" href="approveadvisor.php?id=<?php echo $row['id_advisor']; ?>">Reactivate</a>
                            <?php
                          } else if($row['active'] == '0') {
                            echo '<span style="color:orange;font-weight:bold;">Rejected</span>' ;

                          }
                        ?>                          
                        </td>
                        <td><a style="color: red;font-weight:bold;" href="delete-advisor.php?id=<?php echo $row['id_advisor']; ?>">Delete</a></td>
                      </tr>  
                     <?php
                        }
                      }
                    ?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- /.content-wrapper -->

  

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
