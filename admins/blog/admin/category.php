
<!-- Favicons -->
<link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">



<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
  <a class="nav-link collapsed" href="../../adminhome.php">
	  <i class="bi bi-grid"></i>
	  <span>Dashboard</span>
	</a>
  </li><!-- End Dashboard Nav -->
  
  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-gem"></i><span>Manage Blog</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icons-nav" class="nav-content " data-bs-parent="#sidebar-nav">
	  <li>
		<a href="index.php?page=posts">
		  <i class="bi bi-circle"></i><span>Blog articles</span>
		</a>
	  </li>
	  <li>
		<a class= "nav-link" href="index.php?page=category">
		  <i class="bi bi-circle"></i><span>Blog Categories</span>
		</a>
	  </li>
	 
	</ul>
  </li><!-- End Icons Nav -->

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
  </li><!-- End Icons Nav -->

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
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="faq/addfaq.php">
	  <i class="bi bi-question-circle"></i>
	  <span>F.A.Q</span>
	</a>
  </li><!-- End F.A.Q Page Nav -->




</ul>
<!-- Vendor JS Files -->
<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>


</aside><!-- End Sidebar-->
  
<div class="container-fluid">
	<div class="card col-md-12">
		<div class="card-body">
			<div class="col-md-12">
				<button type="button" class="btn btn-primary btn-sm btn-block col-sm-2" id="new_category"><i class="fa fa-plus"></i> New Category</button>
			</div>
			<br>
			<div class="col-md-12">
				<table class="table table-bordered" id="category-tbl">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Description</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
	<script>
		$('#new_category').click(function(){
			uni_modal('New Category','manage_category.php');
		})
		window.load_tbl = function(){
			$('#category-tbl').dataTable().fnDestroy();
			$('#category-tbl tbody').html('<tr><td colspan="4" class="text-center">Please Wait...</td></tr>')
			$.ajax({
				url:'ajax.php?action=load_category',
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						if(Object.keys(resp).length > 0){
							$('#category-tbl tbody').html('')
							var i = 1;
							Object.keys(resp).map(k=>{
								var tr = $('<tr></tr>')
								tr.append('<td>'+(i++)+'</td>')
								tr.append('<td>'+resp[k].name+'</td>')
								tr.append('<td>'+resp[k].description+'</td>')
								tr.append('<td><center><button class="btn btn-info btn-sm edit_category" data-id = "'+resp[k].id+'"><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger btn-sm remove_category" data-id = "'+resp[k].id+'"><i class="fa fa-trash"></i> Delete</button></center></td>')
								$('#category-tbl tbody').append(tr)
							})
						}else{
						$('#category-tbl tbody').html('<tr><td colspan="4" class="text-center">No Data...</td></tr>')
						}
					}
				},
				complete:function(){
					$('#category-tbl').dataTable()
					manage_category();
				}
			})
		}
		function manage_category(){
			$('.edit_category').click(function(){
				uni_modal("Edit Category",'manage_category.php?id='+$(this).attr('data-id'))
			})
			$('.remove_category').click(function(){
				// console.log('REMOVE')
				_conf("Are you sure to delete this data?",'remove_category',[$(this).attr('data-id')])
			})
		}
		function remove_category($id){
			start_load()
			$.ajax({
				url:'ajax.php?action=remove_category',
				method:'POST',
				data:{id:$id},
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully deleted.",'success');
						$('.modal').modal('hide')
						load_tbl()
						end_load();
					}
				}
			})
		}
		$(document).ready(function(){
			load_tbl()
		})
	</script>

	<style>
		img.img-field {
		    max-height: 30vh;
		    max-width: 27vw;
		}
	</style>

</div>
	