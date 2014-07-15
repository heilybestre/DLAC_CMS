<div class="container">


    <div class="col-sm-1"></div>
    <!-- TABLES -->
    <div class="col-sm-9">
        <!-- START OF DOC EVIDENCE TABLE -->
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Documentary Evidence</h2>
                </div>
                <div class="box-content" style='background-color:#e8eae4;'>
                    <table id='case-docevidencetable' class="table table-striped table-bordered datatable" style="background-color:#f8f8f8;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Person to Testify</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evidencedoc as $row): ?>
                                <tr>
                                    <td><?php echo $row->dname ?></td>
                                    <td><?php echo $this->People_model->getuserfield('lastname', $row->dtestified) . ', ' . $this->People_model->getuserfield('firstname', $row->dtestified) . ' ' . substr($this->People_model->getuserfield('middlename', $row->dtestified), 0, 1) . '.' ?></td>
                                    <td><?php echo $row->dstatus ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END OF DOC EVIDENCE TABLE -->

        <br>

        <!-- START OF OBJ EVIDENCE TABLE -->
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Object Evidence</h2>
                </div>
                <div class="box-content" style='background-color:#e8eae4;'>
                    <table id='case-objevidencetable' class="table table-striped table-bordered datatable" style="background-color:#f8f8f8;">
                        <thead>
                            <tr>
                                <th>Object</th>
                                <th>Person to Testify</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evidenceobj as $row): ?>
                                <tr>
                                    <td><?php echo $row->oobject ?></td>
                                    <td><?php echo $this->People_model->getuserfield('lastname', $row->otestified) . ', ' . $this->People_model->getuserfield('firstname', $row->otestified) . ' ' . substr($this->People_model->getuserfield('middlename', $row->otestified), 0, 1) . '.' ?></td>
                                    <td><?php echo $row->ostatus ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END OF OBJ EVIDENCE TABLE -->

        <br>

        <!-- START OF TES EVIDENCE TABLE -->
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Testimonial Evidence</h2>
                </div>
                <div class="box-content" style='background-color:#e8eae4;'>
                    <table id='case-tesevidencetable' class="table table-striped table-bordered datatable" style="background-color:#f8f8f8;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Relationship</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evidencetes as $row): ?>
                                <tr>
                                    <td><?php echo $this->People_model->getuserfield('lastname', $row->ttestified) . ', ' . $this->People_model->getuserfield('firstname', $row->ttestified) . ' ' . substr($this->People_model->getuserfield('middlename', $row->ttestified), 0, 1) . '.' ?></td>
                                    <td><?php echo $row->trelationship ?></td>
                                    <td><?php echo $row->tstatus ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END OF TES EVIDENCE TABLE -->
    </div>
    
        <div class="modal fade" id="addPersonToTestify">
            <div class="modal-dialog-evidence">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Person to Testify</h4>
                    </div>

                    <div class="modal-body">
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Name<span class="glyphicon glyphicon-asterisk"></span></b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'First', 'id' => 'objpersonFirstName', 'name' => 'objpersonFirstName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div> 
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Middle', 'id' => 'objpersonMiddleName', 'name' => 'objpersonMiddleName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>   
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Last', 'id' => 'objpersonLastName', 'name' => 'objpersonLastName', 'type' => 'text', 'class' => 'form-control')); ?>   
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
                                <?php echo form_input(array('placeholder' => 'House', 'id' => 'objpersonAddressHouseNo', 'name' => 'objpersonAddressHouseNo', 'type' => 'text', 'class' => 'form-control')); ?>      
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Street', 'id' => 'objpersonAddressStreet', 'name' => 'objpersonAddressStreet', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Town', 'id' => 'objpersonAddressTown', 'name' => 'objpersonAddressTown', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'District', 'id' => 'objpersonAddressDistrict', 'name' => 'objpersonAddressDistrict', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Postal Code', 'id' => 'objpersonAddressPostalCode', 'name' => 'objpersonAddressPostalCode', 'type' => 'text', 'class' => 'form-control')); ?>
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
                                <?php echo form_input(array('placeholder' => 'Home', 'id' => 'objpersonCNHome', 'name' => 'objpersonCNHome', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Office', 'id' => 'objpersonCNOffice', 'name' => 'objpersonCNOffice', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Mobile', 'id' => 'objpersonCNMobile', 'name' => 'objpersonCNMobile', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <br><br>
                    </div>

                    <div class="modal-footer">
                        <button id='btn_addperson' class="btn btn-success" data-dismiss="modal" aria-hidden="true" type="button">Add Person</button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>
      
</div>
