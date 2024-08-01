

<link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../../assets/css/style.css" rel="stylesheet">


<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
  <a class="nav-link collapsed" href="../../adminhome.php">
  <i class="bi bi-grid"></i>
	  <span>Dashboard</span>
	</a>
  </li>
  
  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-gem"></i><span>Manage Blog</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icons-nav" class="nav-content " data-bs-parent="#sidebar-nav">
	  <li>
		<a class= "nav-link" href="index.php?page=posts">
		  <i class="bi bi-circle"></i><span>Blog articles</span>
		</a>
	  </li>
	  <li>
		<a href="index.php?page=category">
		  <i class="bi bi-circle"></i><span>Blog Categories</span>
		</a>
	  </li>
	  
	</ul>
  </li>

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
  </li>

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
  </li>

  <li class="nav-item">
	<a class="nav-link collapsed" href="faq/addfaq.php">
	  <i class="bi bi-question-circle"></i>
	  <span>F.A.Q</span>
	</a>
  </li>



</ul>

</aside>






<div class="container-fluid">
	<div class="card col-md-12">
		<div class="card-body">
			<div class="col-md-12">
				<button type="button" class="btn btn-primary btn-sm btn-block col-sm-2" id="new_post"><i class="fa fa-plus"></i> New Post</button>
			</div>
			<br>
			<div class="col-md-12">
				<table class="table table-bordered" id="post-tbl">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Title</th>
							<th class="text-center">Category</th>
							<th class="text-center">Status</th>
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
		$('#new_post').click(function(){
				location.replace('index.php?page=manage_post')
		})
		window.load_tbl = function(){
			$('#post-tbl').dataTable().fnDestroy();
			$('#post-tbl tbody').html('<tr><td colspan="4" class="text-center">Please Wait...</td></tr>')
			$.ajax({
				url:'ajax.php?action=load_post',
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						if(Object.keys(resp).length > 0){
							$('#post-tbl tbody').html('')
							var i = 1;
							Object.keys(resp).map(k=>{
								var tr = $('<tr></tr>')
								tr.append('<td class="text-center">'+(i++)+'</td>')
								tr.append('<td>'+resp[k].title+'</td>')
								tr.append('<td>'+resp[k].category+'</td>')
								tr.append('<td>'+(resp[k].status == 0 ? 'For Review' : "Published")+'</td>')
								tr.append('<td><center><button class="btn btn-info btn-sm edit_post" data-id = "'+resp[k].id+'"><i class="fa fa-edit"></i> Edit</button><button class="btn btn-info btn-sm preview_post" data-id = "'+resp[k].id+'"><i class="fa fa-eye"></i> Preview</button><br><button class="btn btn-primary btn-sm publish_post" data-id = "'+resp[k].id+'"></i> Publish</button><button class="btn btn-danger btn-sm remove_post" data-id = "'+resp[k].id+'"><i class="fa fa-trash"></i> Delete</button></center></td>')
								$('#post-tbl tbody').append(tr)
							})
						}else{
						$('#post-tbl tbody').html('<tr><td colspan="4" class="text-center">No Data...</td></tr>')
						}
					}
				},
				complete:function(){
					$('#post-tbl').dataTable()
					manage_post();
				}
			})
		}
		function manage_post(){
			$('.edit_post').click(function(){
				location.replace('index.php?page=manage_post&id='+$(this).attr('data-id'))
			})
			$('.preview_post').click(function(){
				location.replace('index.php?page=preview_post&id='+$(this).attr('data-id'))
			})
			$('.remove_post').click(function(){
				// console.log('REMOVE')
				_conf("Are you sure to delete this data?",'remove_post',[$(this).attr('data-id')])
			})
			$('.publish_post').click(function(){
				// console.log('REMOVE')
				_conf("Are you sure to Publish this data?",'publish_post',[$(this).attr('data-id')])
			})
		}
		function remove_post($id){
			start_load()
			$.ajax({
				url:'ajax.php?action=remove_post',
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
		function publish_post($id){
			start_load()
			$.ajax({
				url:'ajax.php?action=publish_post',
				method:'POST',
				data:{id:$id},
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully published.",'success');
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

<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <script src="../../assets/js/main.js"></script>

</div>
<style type="text/css">
	td button{
		margin:10px !important;
	}
	td {
		vertical-align: middle !important;
	}
</style>

</body>
