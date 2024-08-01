<?php

session_start();

require_once("oconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">


  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">




      </head>
<body style="background-color: #f6f9ff;" class="hold-transition skin- sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <nav class="navbar navbar-static-top">
     
    </nav>
  </header>

  


       
    <h3 style="background-color: #0096FF;height: 70px;text-align:center;padding-top:15px;color:black;font-weight:bold" class="page-header text-center">Approve/Reject Advisor Account Creations</h3>

            <!-- <h3 style="color: purple;font-weight:bolder;text-align:center"></h3> -->
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                    <th>Owner Name</th>
                      <th>Company Name</th>
                      <th>Field</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Linkedin</th>
                      
                      <th>Qualification</th>
                      <th>Work experience</th>
                      <th>Active Status</th>
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
                        <td><?php echo $row['field']; ?></td>
                        <td><?php echo $row['mobileno']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['linkedin']; ?></td>
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

  

  
  <div class="control-sidebar-bg"></div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
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
