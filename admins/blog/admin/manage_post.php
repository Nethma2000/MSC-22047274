

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
	<i class="bi bi-journals"></i>
	</i><span>Manage Blog</span><i class="bi bi-chevron-down ms-auto"></i>
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
  </li><!-- End Icons Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icos-nav1" data-bs-toggle="collapse" href="#">
	<i class="bi bi-book"></i>
	</i><span>Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icos-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	<li>
            <a href="../../../knowledge/courses.php">
              <i class="bi bi-circle"></i><span>All courses</span>
            </a>
          </li>
		  <li>
            <a href="../../../knowledge/coursematerials.php">
              <i class="bi bi-circle"></i><span>Course materials</span>
            </a>
          </li>
          <li>
            <a href="../../../knowledge/createcourses.php">
              <i class="bi bi-circle"></i><span>Create New Courses</span>
            </a>
          </li>
          <li>
            <a href="../../../knowledge/createcourses.php#Chapter">
              <i class="bi bi-circle"></i><span>Create New Chapters</span>
            </a>
          </li>
		  <a href="../../../knowledge/createcourses.php#Topic">
              <i class="bi bi-circle"></i><span>Create New Topics</span>
            </a>
          </li>
          <li>
            <a href="../../../knowledge/addcoursecontent.php">
              <i class="bi bi-circle"></i><span>Create Course Content</span>
            </a>
          </li>

	</ul>
  </li><!-- End Icons Nav -->

  <li class="nav-item">

	<a class="nav-link collapsed" href="../../../advisors/advisorscrud/index.php">
	<i class="bi bi-person-plus"></i>  	  
	<span>Advisors Section</span>
	</a>

	<a class="nav-link collapsed" href="../../../owners/advisorscrud/index.php">
	  <i class="bi bi-person"></i>
	  <span>Owners Section</span>
	</a>

	<a class="nav-link collapsed" href="../../../tips/admin-files-upload.php">
        <i class="bi bi-card-text"></i>    
        <span>Success Tips File Approval</span>
        </a>

	<a class="nav-link collapsed" href="../../inquiries.php">
	<i class="bi bi-envelope"></i>
	<span>Inquiries</span>
	</a>
	<!-- <a class="nav-link collapsed" href="../advisors/advisorscrud/index.php">
	  <i class="bi bi-person"></i>
	  <span>Advisors</span>
	</a> -->
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
  <a class="nav-link collapsed" href="../../faq/addfaq.php">
  <i class="bi bi-question-circle"></i>
	  <span>F.A.Q</span>
	</a>
  </li><!-- End F.A.Q Page Nav -->




</ul>

</aside><!-- End Sidebar-->


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

<div class="card col-lg-12">
	<div class="card-body">
		<?php 

		include '../db_connect.php';
		// include('./header.php'); 

		if(isset($_GET['id'])){
			$qry = $conn->query("SELECT * FROM posts where id=".$_GET['id']);
			foreach ($qry->fetch_array() as $key => $value) {
				$meta[$key] = $value;
			}
		}
		?>

		<div class="container-fluid">
			<form action="" id="manage-category">
				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
				<div class="form-group col-md-4">
					<label for="name" class="control-label">Title</label>
					<input type="text" id="name" name="name" class="form-control" value="<?php echo isset($meta['title']) ? $meta['title'] : '' ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label for="category_id" class="control-label">Category</label>
					<select type="text" id="category_id" name="category_id" class="form-control"  required>
						<option value=""></option>
						<?php
						$cat = $conn->query("SELECT * from category where status = 1 order by name asc");
						while($row= $cat->fetch_assoc()){
						 ?>
						 <option value="<?php echo $row['id'] ?>" <?php echo isset($meta['category_id']) && $meta['category_id'] == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="" class="control-label">Add Image to Content</label>
						<div>
						<img src="../assets/img/<?php echo isset($meta['img_path']) ? $meta['img_path'] : '' ?>" alt="" class="img-field">

						<br>
							<div class="input-group mb-3 col-md-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="">Upload</span>
							  </div>
							  <div class="custom-file">
							    <input type="file" name="img" class="custom-file-input" id="img" aria-describedby="" accept="image/*" onchange="displayImg(this,$(this))">
							    <label class="custom-file-label" for="img">Choose file</label>
							  </div>
							</div>
						</div>
				</div>
				<div class="form-group">
					<label for="post" class="control-label">Description</label>
					<textarea type="text" id="post" name="post" class="text-jqte" required><?php echo isset($meta['post']) ? html_entity_decode($meta['post']) : '' ?></textarea>
				</div>

				<center><button class="btn btn-primary btn-block col-md-2">Save</button></center>
			</form>
		</div>
		<script>
	$('.text-jqte').jqte();

			
			function displayImg(input,_this) {
			    if (input.files && input.files[0]) {
			        var reader = new FileReader();
			        reader.onload = function (e) {
			        	_this.parent().parent().parent().find('.img-field').attr('src', e.target.result);
            			_this.siblings('label').html(input.files[0]['name'])
            			_this.siblings('input[name="fname"]').val('<?php echo strtotime(date('y-m-d H:i:s')) ?>_'+input.files[0]['name'])
            			var p = $('<p></p>')
			            
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}

			$('#manage-category').submit(function(e){
				e.preventDefault();
				start_load();

				$.ajax({
					url: 'ajax.php?action=save_post',
				    data: new FormData($(this)[0]),
				    cache: false,
				    contentType: false,
				    processData: false,
				    method: 'POST',
				    type: 'POST', 
				    success: function(resp){
				    	resp =JSON.parse(resp)
				        if(resp.status== 1){
				        	alert_toast("Data successfully updated.",'success');
				        	setTimeout(function(){
				        	location.replace('index.php?page=preview_post&id='+resp.id)

				        },1500)
				        }
				    }
				})
			})

		</script>
	</div>
</div>
<style>
	img.img-field {
	max-width: 20vw;
	max-height: 11vh;
	}
</style>

