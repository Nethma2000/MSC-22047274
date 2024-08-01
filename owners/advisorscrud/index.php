

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartupCompanion | Navigate your startup journey</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <link href="../../admins/assets/img/favicon.png" rel="icon">
  <link href="../../admins/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="../../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">




</head>

<body>





<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>StartupCompanion | Naviagte your startup journey</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
	</style>

  
<style>
        body {
            background-color: 		#f6f9ff;
			 
        }
    </style>
</head>
<body>
<h1 style="background-color: #0096FF;height: 70px;text-align:center;padding-top:15px;color:black;font-weight:bold" class="page-header text-center">Manage Startup Owners</h1>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
				<!-- <a style="background-color:#177373" href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add New Startup Owner</a> -->
				<a style="margin-left: 30px;background-color:#62801d" href="../advisors.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Approve or Reject Advisor Account Ceation Requests</a>

			</div>
			<div class="height10">
			</div>
			<div class="row">

				<table style="padding-left: 10px;" id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Company</th>
						<th>Field</th>
						<th>Mobileno</th>
						<th>Email</th>
						<th>Linkedin</th>
						<th>Qualifications</th>
						<th>Work_experience</th>
						<th>Active Status</th>
						
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							include_once('oconnection.php');
							$sql = "SELECT * FROM owners";

								
						
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['id_advisor']."</td>
									<td>".$row['name']."</td>
									<td>".$row['company']."</td>
									<td>".$row['field']."</td>
									<td>".$row['mobileno']."</td>
									<td>".$row['email']."</td>
									<td>".$row['linkedin']."</td>
									<td>".$row['qualifications']."</td>
									<td>".$row['work_experience']."</td>
									<td>".$row['active']."</td>
									<td>
										<a href='#edit_".$row['id_advisor']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['id_advisor']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
							/////////////////

							//use for MySQLi Procedural
							// $query = mysqli_query($conn, $sql);
							// while($row = mysqli_fetch_assoc($query)){
							// 	echo
							// 	"<tr>
							// 		<td>".$row['id']."</td>
							// 		<td>".$row['firstname']."</td>
							// 		<td>".$row['lastname']."</td>
							// 		<td>".$row['address']."</td>
							// 		<td>
							// 			<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
							// 			<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
							// 		</td>
							// 	</tr>";
							// 	include('edit_delete_modal.php');
							// }
							/////////////////

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').DataTable();

    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</body>
<<style>
.PP{
	text-align: center;
}
</style>
</html>