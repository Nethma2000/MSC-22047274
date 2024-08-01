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
                                <select name="advisor_field" class="form-control" required>
                                    <option value="">Select a field</option>
                                    <option value="Agriculture and Food-Tech">Agriculture and Food-Tech</option>
                                    <option value="Consumer Goods">Consumer Goods</option>
                                    <option value="Creative Arts and Media">Creative Arts and Media</option>
                                    <option value="Education">Education</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Health and Wellness">Health and Wellness</option>
                                    <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                    <option value="Manufacturing and Industry">Manufacturing and Industry</option>
                                    <option value="Real Estate and Property Management">Real Estate and Property Management</option>
                                    <option value="Retail and E-commerce">Retail and E-commerce</option>
                                    <option value="Social Impact and Nonprofit">Social Impact and Nonprofit</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Transportation and Logistics">Transportation and Logistics</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Advising Components:</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Business Planning" id="business-planning">
                                    <label class="form-check-label" for="business-planning">Business Planning</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Funding and Finance" id="funding-finance">
                                    <label class="form-check-label" for="funding-finance">Funding and Finance</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Legal and Compliance" id="legal-compliance">
                                    <label class="form-check-label" for="legal-compliance">Legal and Compliance</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Marketing and Sales" id="marketing-sales">
                                    <label class="form-check-label" for="marketing-sales">Marketing and Sales</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Product Development" id="product-development">
                                    <label class="form-check-label" for="product-development">Product Development</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Operations and Management" id="operations-management">
                                    <label class="form-check-label" for="operations-management">Operations and Management</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Technology and Innovation" id="technology-innovation">
                                    <label class="form-check-label" for="technology-innovation">Technology and Innovation</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Networking and Partnerships" id="networking-partnerships">
                                    <label class="form-check-label" for="networking-partnerships">Networking and Partnerships</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Growth and Scaling" id="growth-scaling">
                                    <label class="form-check-label" for="growth-scaling">Growth and Scaling</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="advisor_advisingcomponent[]" value="Risk Management" id="risk-management">
                                    <label class="form-check-label" for="risk-management">Risk Management</label>
                                </div>
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
                                <input type="email" class="form-control" name="advisor_email" required>
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
                                <label class="control-label modal-label">Password:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="advisor_password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
