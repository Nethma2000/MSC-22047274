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
						<label class="control-label modal-label">Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_name" value="<?php echo $row['advisor_name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Company:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_company" value="<?php echo $row['advisor_company']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Designation:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_designation" value="<?php echo $row['advisor_designation']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Field:</label>
					</div>
					<div class="col-sm-10">
					<select name="advisor_field" class="form-control" required>
						<option value="">Select a field</option>
						<option value="Agriculture and Food-Tech" <?php echo ($row['advisor_field'] == 'Agriculture and Food-Tech') ? 'selected' : ''; ?>>Agriculture and Food-Tech</option>
						<option value="Consumer Goods" <?php echo ($row['advisor_field'] == 'Consumer Goods') ? 'selected' : ''; ?>>Consumer Goods</option>
						<option value="Creative Arts and Media" <?php echo ($row['advisor_field'] == 'Creative Arts and Media') ? 'selected' : ''; ?>>Creative Arts and Media</option>
						<option value="Education" <?php echo ($row['advisor_field'] == 'Education') ? 'selected' : ''; ?>>Education</option>
						<option value="Entertainment" <?php echo ($row['advisor_field'] == 'Entertainment') ? 'selected' : ''; ?>>Entertainment</option>
						<option value="Health and Wellness" <?php echo ($row['advisor_field'] == 'Health and Wellness') ? 'selected' : ''; ?>>Health and Wellness</option>
						<option value="Hospitality and Tourism" <?php echo ($row['advisor_field'] == 'Hospitality and Tourism') ? 'selected' : ''; ?>>Hospitality and Tourism</option>
						<option value="Manufacturing and Industry" <?php echo ($row['advisor_field'] == 'Manufacturing and Industry') ? 'selected' : ''; ?>>Manufacturing and Industry</option>
						<option value="Real Estate and Property Management" <?php echo ($row['advisor_field'] == 'Real Estate and Property Management') ? 'selected' : ''; ?>>Real Estate and Property Management</option>
						<option value="Retail and E-commerce" <?php echo ($row['advisor_field'] == 'Retail and E-commerce') ? 'selected' : ''; ?>>Retail and E-commerce</option>
						<option value="Social Impact and Nonprofit" <?php echo ($row['advisor_field'] == 'Social Impact and Nonprofit') ? 'selected' : ''; ?>>Social Impact and Nonprofit</option>
						<option value="Technology" <?php echo ($row['advisor_field'] == 'Technology') ? 'selected' : ''; ?>>Technology</option>
						<option value="Transportation and Logistics" <?php echo ($row['advisor_field'] == 'Transportation and Logistics') ? 'selected' : ''; ?>>Transportation and Logistics</option>
					</select>				
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Advising components:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_advisingcomponent" value="<?php echo $row['advisor_advisingcomponent']; ?>">
					</div>
				</div>
			
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Experienec:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_noofexperience" value="<?php echo $row['advisor_noofexperience']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_email" value="<?php echo $row['advisor_email']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Mobile No:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_mobile" value="<?php echo $row['advisor_mobile']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Linkedin:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_linkedin" value="<?php echo $row['advisor_linkedin']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Qualifications:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="advisor_qualifications" value="<?php echo $row['advisor_qualifications']; ?>">
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

<div class="modal fade" id="delete_<?php echo $row['id_advisor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Advisor</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['advisor_name']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['id_advisor']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>