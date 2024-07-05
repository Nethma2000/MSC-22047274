<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_name" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Company:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_company" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Designation:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_designation" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Field:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_field" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Advising Components:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_advisingcomponent" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Tasks:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_workingtasks" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Experience:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_noofexperience" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_email" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Mobile No:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_mobile" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Linkedin:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_linkedin" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Qualifications:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_qualifications" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">NIC:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_nic" required>
					</div>
				</div>
				
				
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">password:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_password" required>
					</div>
				</div>
				

				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>