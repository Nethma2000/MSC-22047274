



<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Advisors</title>
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
</head>
<body>
<h1 style="background-color: #FFC451;height: 70px;text-align:center;padding-top:15px;color:black;font-weight:bold" class="page-header text-center">Manage Advisors</h1>

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
				<a style="background-color:#177373" href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add New Advisor</a>

			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table style="margin-left: -10px;" id="myTable" class="table table-bordered table-striped">
					<thead>
					<th>Name</th>
						<th>Company</th>
						<th>Designation</th>
						<th>Field</th>
						<th>Advising Components</th>
						<th>Working tasks</th>
						<th>Years of Experience</th>
						<th>Email</th>
						<th>Mobile No</th>
						<th>Linkedin</th>
						<th>Qualifications</th>
						<th>NIC</th>
						
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							include_once('aconnection.php');
							$sql = "SELECT * FROM advisor";

								
						
							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>




									<td>".$row['id_advisor']."</td>
									<td>".$row['advisor_name']."</td>
									<td>".$row['advisor_company']."</td>
									<td>".$row['advisor_designation']."</td>
									<td>".$row['advisor_advisingcomponent']."</td>
									<td>".$row['advisor_workingtasks']."</td>
									<td>".$row['advisor_noofexperience']."</td>
									<td>".$row['advisor_email']."</td>
									<td>".$row['advisor_mobile']."</td>
									<td>".$row['advisor_linkedin']."</td>
									<td>".$row['advisor_qualifications']."</td>

									<td>".$row['advisor_nic']."</td>
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
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
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