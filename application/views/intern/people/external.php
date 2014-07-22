<div class="container">
    <div class="row">
        <br>
        <div class="col-lg-12">

            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Case Related</th>
                        <th>Contact Number</th>
                        <th></th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($external as $row): ?>
                        <tr>
                            <td><?php echo "$row->firstname $row->middlename $row->lastname" ?></td>
                            <td><?php echo $row->caseName ?></td>
                            <td>
                                <?php if ($row->contacthome != null){echo $row->contacthome . ' (Home) ; ';} ?>
                                <?php if ($row->contactoffice != null){echo $row->contactoffice . ' (Office) ; ';} ?>
                                <?php if ($row->contactmobile != null){echo $row->contactmobile . ' (Mobile)';} ?>
                            </td>
                            <td> <a class ="btn btn-medium btn-success" href="#editPersonModal" data-toggle="modal">
            <i class="icon-edit"></i></a>
                            <a class ="btn btn-medium btn-danger" href="#deletePersonModal" data-toggle="modal">
            <i class="icon-remove"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
    
    <!-- EDIT -->
    
    <div class="row">

        <div class="modal fade" id="editPersonModal">
            <div class="modal-dialog-evidence">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Linked Person Information</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Name<span class="glyphicon glyphicon-asterisk"></span></b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'First', 'id' => 'partyFirstName', 'name' => 'partyFirstName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div> 
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Middle', 'id' => 'partyMiddleName', 'name' => 'partyMiddleName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>   
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Last', 'id' => 'partyLastName', 'name' => 'partyLastName', 'type' => 'text', 'class' => 'form-control')); ?>   
                            </div>   
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Address</b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'House', 'id' => 'partyAddressHouseNo', 'name' => 'partyAddressHouseNo', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>      </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Street', 'id' => 'partyAddressStreet', 'name' => 'partyAddressStreet', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Town', 'id' => 'partyAddressTown', 'name' => 'partyAddressTown', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'District', 'id' => 'partyAddressDistrict', 'name' => 'partyAddressDistrict', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Postal Code', 'id' => 'partyAddressPostalCode', 'name' => 'partyAddressPostalCode', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Contact Number</b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Home', 'id' => 'partyCNHome', 'name' => 'partyCNHome', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Office', 'id' => 'partyCNOffice', 'name' => 'partyCNOffice', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Mobile', 'id' => 'partyCNOffice', 'name' => 'partyCNOffice', 'type' => 'text', 'class' => 'form-control', 'onkeyup' => 'saveThis(this.id)')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center><b><h5><b>Participation<span class="glyphicon glyphicon-asterisk"></span></b></h5></b></center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <h5></h5>
                            </div>   
                        </div>

                        <br><br>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Save</button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
     <!--START OF DELETE LINKED PERSON modal -->

    <div class="row">

        <div class="modal fade" id="deletePersonModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Linked Person</h4>
                    </div>
                    <div class="modal-body">

                        <h2>
                            Are you sure you want to delete (Name)?
                        </h2>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!--END OF DELETE LINKED PEOPLE modal -->
    
    
</div>