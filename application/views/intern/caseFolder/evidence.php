<div class="container">

    <!-- FORMS -->
    <div class="col-sm-5">
        <div class="well row" style='margin-left:-5px;'>
            <h4> Add Evidence </h4>
            <hr>
            <div class="form-inline"> 
                <input type='hidden' ID='inputCaseID' value="<?php echo $case->caseID?>">
                <div class="controls"> 
                    <b>Evidence of: </b>
                    <label class="radio" for="evidenceOf-0">
                        <input type="radio" name="case-evidenceof" id="evidenceOf-0" value='6' checked="checked"> Client 
                    </label> &nbsp; 
                    <label class="radio" for="evidenceOf-1"> 
                        <input type="radio" name="case-evidenceof" id="evidenceOf-1" value="7"> Opposing Party 
                    </label> 
                </div> 
            </div> 

            <br>

            <div class="form-inline"> 
                <div class="controls">
                    <b>Choose Type:</b>
                    <a href="events.php"></a>
                    <label class="radio" for="type-0"> 
                        <input type="radio" name="case-type" id="type-0" value="Documentary" onclick="location.href = 'javascript:toggleAppEvidenceDoc();';"> Documentary 
                    </label>&nbsp;
                    <label class="radio"> 
                        <input type="radio" name="case-type" id="type-1" value="Object" onclick="location.href = 'javascript:toggleAppEvidenceObj();';"> Object
                    </label>&nbsp;
                    <label class="radio"> 
                        <input type="radio" name="case-type" id="type-2" value="Testimonial" onclick="location.href = 'javascript:toggleAppEvidenceTesti();';"> Testimonial
                    </label>
                </div>
            </div>

            <br>

            <!-- START OF ADD DOCUMENTARY EVIDENCE -->
            <div id="toggleAppDoc" style="display: none">
                <span class="label label-info">Documentary Evidence</span><br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Document Name</b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <?php echo form_input(array('id' => 'case-docname', 'name' => 'case-docname', 'type' => 'text', 'class' => 'form-control')); ?>   
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Document Type</b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="form-inline"> 
                        <div class="controls"> 
                            <label class="radio" for="docType-0"> 
                                <input type="radio" name="case-doctype" id="docType-0" value="Original" checked="checked"> Original
                            </label>&nbsp;
                            <label class="radio" for="docType-1"> 
                                <input type="radio" name="case-doctype" id="docType-1" value="Photocopy"> Photocopy
                            </label> 
                        </div> 
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Description</b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <?php echo form_textarea(array('style' => 'height: 80px', 'id' => 'case-docdesc', 'name' => 'case-docdesc', 'type' => 'text', 'class' => 'form-control')); ?>
                    </div>
                </div>

                <br><br><br><br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Purpose</b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <?php echo form_textarea(array('style' => 'height:80px', 'id' => 'case-docpurpose', 'name' => 'case-docpurpose', 'type' => 'text', 'class' => 'form-control')); ?>
                    </div>
                </div>

                <br><br><br><br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Date Issued </b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                            <input type="text" class="form-control date-picker" id="case-docdateissued" name="case-docdateissued" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Place Issued</b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <?php echo form_input(array('id' => 'case-docplaceissued', 'name' => 'case-docplaceissued', 'type' => 'text', 'class' => 'form-control')); ?>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Date Received</b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                            <input type="text" class="form-control date-picker datereceived" id="case-docdatereceived" name="case-docdatereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Person to Testify</b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-6 control-group">
                    <div id='case-doctestifydiv' class="controls">
                        <select id="case-doctestify" name="case-doctestify" class="form-control">
                            <?php foreach ($externals as $row) : if ($row->personID != $clientid) { ?>
                            <option value="<?= $row->personID ?>">
                                <?= $row->lastname ?>, <?= $row->firstname ?> <?php if(isset($row->middlename) && $row->middlename!='' || $row->middlename!=NULL) echo substr($row->middlename, 0, 1) . '.'; ?>
                            </option>
                            <?php } endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="col-sm-1 control-group">
                    <div class="controls">
                        <a class ="btn btn-success pull-left" href="#addPersonToTestify" data-toggle="modal" style="margin-top:0px;"> <i class="icon-plus"></i> </a>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b> Status </b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="form-inline">
                        <div class="controls">
                            <label class="radio" for="docStatus-0"> 
                                <input type="radio" name="case-docstatus" id="docStatus-0" value="Marked"> Marked
                            </label>&nbsp;
                            <label class="radio" for="docStatus-1"> 
                                <input type="radio" name="case-docstatus" id="docStatus-1" value="Unmarked" checked="checked"> Unmarked
                            </label> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 control-group"></div>

                <div class="col-sm-7">
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" id="case-btnadddocevidence" value="Add Evidence" class='btn btn-success col-sm-12'/>
                </div>
            </div>
            <!-- END OF ADD DOCUMENTARY EVIDENCE -->


            <!-- START OF ADD OBJECT EVIDENCE -->
            <div id="toggleAppObj" style="display: none">
                <span class="label label-warning">Object Evidence</span><br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b> Object</b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <?php echo form_input(array('id' => 'case-objname', 'name' => 'case-objname', 'type' => 'text', 'class' => 'form-control')); ?>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <b> <h5> Description </b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <?php echo form_textarea(array('style' => 'height: 80px', 'id' => 'case-objdesc', 'name' => 'case-objdesc', 'type' => 'text', 'class' => 'form-control')); ?>
                    </div>
                </div>

                <br><br><br><br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b> Date Received </b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                            <input type="text" class="form-control date-picker datereceived" id="case-objdatereceived" name="case-objdatereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Date Retrieved</b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                            <input type="text" class="form-control date-picker" id="case-objdateretrieved" name="case-objdateretrieved" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Person to Testify</b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-6 control-group">
                    <div id='case-objtestifydiv' class="controls">
                        <select id="case-objtestify" name="case-objtestify" class="form-control">
                            <?php foreach ($externals as $row) : if ($row->personID != $clientid) { ?>
                            <option value="<?= $row->personID ?>">
                                <?= $row->lastname ?>, <?= $row->firstname ?> <?php if($row->middlename!='' || $row->middlename!=NULL) echo substr($row->middlename, 0, 1) . '.'; ?>
                            </option><?php } endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-1 control-group">
                    <div class="controls">
                        <a class ="btn btn-success pull-left" href="#addPersonToTestify" data-toggle="modal" style="margin-top:0px;"> <i class="icon-plus"></i> </a>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group">
                    <div class="controls">
                        <center> <h5> <b>Status</b> </h5> </center>
                    </div>
                </div>

                <div class="col-sm-7 control-group">
                    <div class="form-inline">
                        <div class="controls">
                            <label class="radio" for="objStatus-0"> 
                                <input type="radio" name="case-objstatus" id="case-objStatus-0" value="Marked"> Marked </input>
                            </label>&nbsp;
                            <label class="radio" for="objStatus-1"> 
                                <input type="radio" name="case-objstatus" id="case-objStatus-1" value="Unmarked" checked="checked"> Unmarked </input>
                            </label> 
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group"> </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <input type="button" id="case-btnaddobjevidence" value="Add Evidence" class='btn btn-success col-sm-12'/>
                    </div>
                </div>  
            </div>
            <!-- END OF ADD OBJECT EVIDENCE -->

            <!-- START OF ADD TESTI EVIDENCE -->
            <div id="toggleAppTesti" style="display: none">
                <span class="label label-danger">Testimonial Evidence</span><br><br>

                <div class="col-sm-3 control-group">
                    <div class="controls">
                        <center> <h5><b>Name<span class="glyphicon glyphicon-asterisk"></span></b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-6 control-group">
                    <div id='case-tesnamediv' class="controls">
                        <select id="case-tesname" name="case-tesname" class="form-control externalsminusappclientdiv">
                            <?php foreach ($externals as $row) : if ($row->personID != $clientid) { ?>
                            <option value="<?= $row->personID ?>">
                                <?= $row->lastname ?>, <?= $row->firstname ?> <?php if($row->middlename!='' || $row->middlename!=NULL) echo substr($row->middlename, 0, 1) . '.'; ?>
                            </option>
                            <?php } endforeach; ?>
                        </select>
                    </div>
                </div>



                <div class="col-sm-1 control-group">
                    <div class="controls">
                        <a class ="btn btn-success pull-left" href="#addPersonToTestify" data-toggle="modal" style="margin-top:0px;"> <i class="icon-plus"></i> </a>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-3 control-group">
                    <div class="controls">
                        <center> <h5><b>Relationship</b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-9 control-group">
                    <div class="controls">
                        <?php echo form_input(array('id' => 'case-tesrel', 'name' => 'case-tesrel', 'type' => 'text', 'class' => 'form-control')); ?>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-3 control-group">
                    <div class="controls">
                        <center> <h5><b>Purpose</b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-9 control-group">
                    <div class="controls">
                        <?php echo form_textarea(array('style' => 'height:100px', 'id' => 'case-tespurpose', 'name' => 'case-tespurpose', 'type' => 'text', 'class' => 'form-control')); ?>
                    </div>
                </div>

                <br><br><br><br><br><br>

                <div class="col-sm-3 control-group">
                    <div class="controls">
                        <center> <h5><b>Narrative</b></h5> </center>
                    </div>
                </div>

                <div class="col-sm-9 control-group">
                    <div class="controls">
                        <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'case-tesnarrative', 'name' => 'case-tesnarrative', 'type' => 'text', 'class' => 'form-control')); ?>     
                    </div>
                </div>

                <br><br><br><br><br><br>

                <div class="col-sm-3 control-group">
                    <div class="controls">
                        <center> <h5><b>Status</b></center> </center>
                    </div>
                </div>

                <div class="col-sm-9 control-group">
                    <div class="form-inline">
                        <div class="controls">
                            <label class="radio" for="tesStatus-0"> 
                                <input type="radio" name="case-tesstatus" id="tesStatus-0" value="Marked"> Marked
                            </label>&nbsp;
                            <label class="radio" for="tesStatus-1"> 
                                <input type="radio" name="case-tesstatus" id="tesStatus-1" value="Unmarked" checked="checked"> Unmarked
                            </label> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 control-group"> </div>

                <div class="col-sm-9 control-group">
                    <div class="controls">
                        <input type="button" id="case-btnaddtesevidence" value="Add Evidence" class='btn btn-success col-sm-12'/>
                    </div>
                </div>
            </div>
            <!-- END OF ADD TESTI EVIDENCE -->

        </div>
    </div>

    <div class="col-sm-1"></div>

    <!-- TABLES -->
    <div class="col-sm-6">
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
