<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id_advisor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Member</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
				<input type="hidden" class="form-control" name="id_advisor" value="<?php echo $row['id_advisor']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">company:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="company" value="<?php echo $row['company']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">designation:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="designation" value="<?php echo $row['designation']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">field:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="field" value="<?php echo $row['field']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">mobileno:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mobileno" value="<?php echo $row['mobileno']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">medium:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="medium" value="<?php echo $row['medium']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">linkedin:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="linkedin" value="<?php echo $row['linkedin']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">github:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="github" value="<?php echo $row['github']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">qualifications:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="qualifications" value="<?php echo $row['qualifications']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">work_experience:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="work_experience" value="<?php echo $row['work_experience']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">active:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="active" value="<?php echo $row['active']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_advisor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Advisor</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['name']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['id_advisor']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>