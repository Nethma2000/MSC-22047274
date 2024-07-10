
<?php
	session_start();
?>


<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<title>Manage Inquiries</title>
	<link rel="stylesheet" type="text/css" href="../advisors/advisorscrud/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../advisors/advisorscrud/datatable/dataTable.bootstrap.min.css">
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
	
<h1 style="background-color: #FFC451;height: 70px;text-align:center;padding-top:15px;color:black;font-weight:bold" class="page-header text-center">Manage Inquiries</h1>

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

			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table style="margin-left: -10px;" id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Id</th>
                     	<th>Name</th>
						<th>Subject</th>
                        <th>Email</th>
						<th>Message</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							include_once('inqconnection.php');
							$sql = "SELECT * FROM inquiries";

							$inqid;

							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								$inqid = $row['inquiry_id'];
								echo 
								"<tr>
									<td>".$row['inquiry_id']."</td>
									<td>".$row['inquiry_name']."</td>
									<td>".$row['inquiry_subject']."</td>
									<td>".$row['inquiry_email']."</td>
									<td>".$row['inquiry_message']."</td>
									
									<td>
										<a href='#reply".$row['inquiry_id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Reply</a>

									
										</td>
								</tr>";
								include('reply_modal.php');

							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<script src="../advisors/advisorscrud/jquery/jquery.min.js"></script>
<script src="../advisors/advisorscrud/bootstrap/js/bootstrap.min.js"></script>
<script src="../advisors/advisorscrud/datatable/jquery.dataTables.min.js"></script>
<script src="../advisors/advisorscrud/datatable/dataTable.bootstrap.min.js"></script>
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