<div id='linkedpeople_form' class="container">

    <div class="row">
        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> <b> Application Form No. </b></h5> </center>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls" style='margin-top:2px;'>
                <h5><?= $appnumber ?></h5>
            </div>
        </div>

        <div class="col-sm-5 control-group"></div>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> <b>
                            <div class="clientnamediv">
                                <?php
                                $first = 0;
                                foreach ($clientlist as $row) {
                                    if ($first == 0)
                                        echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
                                    $first++;
                                }
                                ?>
                            </div>
                        </b></h5> </center>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addPersonModal" data-toggle="modal">
            <i class="icon-plus-sign"></i>&nbsp;Add Linked Person
        </a>
    </div>

    <div class="row">
        <div class="box span4" onTablet="span6" onDesktop="span4">
            <div class="box-header">
                <h2><i class="icon-file"></i>People</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Participation</th>
                            <th>Contact Number</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button -->
    <div class="row">
        <div class="control-group pull-right">
            <label class="control-label" for="submit"></label>
            <div class="controls">
                <input type='button' id='btnpeoplenext' value='Next' class='btn btn-success'>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- START OF ADD LINKED PERSON MODAL -->
        <div class="modal fade" id="addPersonModal">
            <div class="modal-dialog-evidence">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Linked Person</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Name<span class="glyphicon glyphicon-asterisk"></span></b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'First', 'id' => 'personFirstName', 'name' => 'personFirstName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div> 
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Middle', 'id' => 'personMiddleName', 'name' => 'personMiddleName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>   
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Last', 'id' => 'personLastName', 'name' => 'personLastName', 'type' => 'text', 'class' => 'form-control')); ?>   
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
                                <?php echo form_input(array('placeholder' => 'House', 'id' => 'personAddressHouseNo', 'name' => 'personAddressHouseNo', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Street', 'id' => 'personAddressStreet', 'name' => 'personAddressStreet', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Area', 'id' => 'personAddressDistrict', 'name' => 'personAddressDistrict', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Town', 'id' => 'personAddressTown', 'name' => 'personAddressTown', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Postal Code', 'id' => 'personAddressPostalCode', 'name' => 'personAddressPostalCode', 'type' => 'text', 'class' => 'form-control')); ?>
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
                                <?php echo form_input(array('placeholder' => 'Home', 'id' => 'personCNHome', 'name' => 'personCNHome', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Office', 'id' => 'personCNOffice', 'name' => 'personCNOffice', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Mobile', 'id' => 'personCNMobile', 'name' => 'personCNMobile', 'type' => 'text', 'class' => 'form-control')); ?>
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
                                <select id="personParticipation" name="personParticipation" class="form-control">
                                    <option></option>
                                    <option value='3'>Possible Witness (Complainant)</option>
                                    <option value='4'>Possible Witness (Defendant)</option>
                                    <option value='5'>Sheriff</option>
                                    <option value='6'>Public Prosecutor</option>
                                    <option value='7'>Private Prosecutor</option>
                                    <option value='8'>Counsel for Accused</option>
                                    <option value='9'>Judge</option>
                                    <option value='10'>Clerk of Court</option>
                                    <option value='11'>Other Court Officer</option>
                                </select>
                            </div>   
                        </div>

                        <br><br>
                    </div>

                    <div class="modal-footer">
                        <input type="button" value="Add Person" class='btn btn-success'/>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF ADD LINKED PERSON MODAL -->

    </div>

</div>