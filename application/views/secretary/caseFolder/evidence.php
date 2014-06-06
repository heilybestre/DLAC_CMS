<div class="container">

    <?php echo form_open(base_url() . 'caseFoler/evidence', array('class' => 'form-horizontal')); ?>

    <!-- FORMS -->
    <div class="col-sm-5">
        <div class="well row">
            <h4> Add Evidence </h4>
            <hr>
            <div class="form-inline"> 
                <div class="controls"> 
                    <b>Evidence of: </b>
                    <label class="radio" for="evidenceOf-0"> 
                        <input type="radio" name="evidenceof" id="evidenceOf-0" value='6' checked="checked">Client 
                    </label> &nbsp; 
                    <label class="radio" for="evidenceOf-1"> 
                        <input type="radio" name="evidenceof" id="evidenceOf-1" value="7"> Opposing Party 
                    </label> 
                </div> 
            </div> 

            <br>

            <div class="form-inline"> 
                <div class="controls">
                    <b>Choose Type:</b>
                    <label class="radio" for="type-0"> 
                        <input type="radio" name="type" id="type-0" value="Documentary" onclick="location.href = 'javascript:toggleAppEvidenceDoc();';"> Documentary 
                    </label>&nbsp;
                    <label class="radio"> 
                        <input type="radio" name="type" id="type-1" value="Object" onclick="location.href = 'javascript:toggleAppEvidenceObj();';"> Object
                    </label>&nbsp;
                    <label class="radio"> 
                        <input type="radio" name="type" id="type-2" value="Testimonial" onclick="location.href = 'javascript:toggleAppEvidenceTesti();';"> Testimonial
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
                        <?php echo form_input(array('id' => 'docname', 'name' => 'docname', 'type' => 'text', 'class' => 'form-control')); ?>   
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
                                <input type="radio" name="doctype" id="docType-0" value="Original" checked="checked"> Original
                            </label>&nbsp;
                            <label class="radio" for="docType-1"> 
                                <input type="radio" name="doctype" id="docType-1" value="Photocopy"> Photocopy
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
                        <?php echo form_textarea(array('style' => 'height: 80px', 'id' => 'docdesc', 'name' => 'docdesc', 'type' => 'text', 'class' => 'form-control')); ?>
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
                        <?php echo form_textarea(array('style' => 'height:80px', 'id' => 'docpurpose', 'name' => 'docpurpose', 'type' => 'text', 'class' => 'form-control')); ?>
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
                            <input type="text" class="form-control date-picker" id="docdateissued" name="docdateissued" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
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
                        <?php echo form_input(array('id' => 'docplaceissued', 'name' => 'docplaceissued', 'type' => 'text', 'class' => 'form-control')); ?>
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
                            <input type="text" class="form-control date-picker datereceived" id="docdatereceived" name="docdatereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
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
                    <div id='doctestifydiv' class="controls">
                        <select id="doctestify" name="doctestify" class="form-control">
                            <?php foreach ($externals as $row) : if ($row->personID != $clientid) { ?>
                                    <option value="<?= $row->personID ?>">
                                        <?= $row->lastname ?>, <?= $row->firstname ?> <?= substr($row->middlename, 0, 1) ?>.
                                    </option><?php } endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="col-sm-1 control-group">
                    <div class="controls">
                        <a class ="btn btn-success pull-left" href="#addPerSonToTestifyDoc" data-toggle="modal" style="margin-top:0px;"> <i class="icon-plus"></i> </a>
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
                                <input type="radio" name="docstatus" id="docStatus-0" value="Marked"> Marked
                            </label>&nbsp;
                            <label class="radio" for="docStatus-1"> 
                                <input type="radio" name="docstatus" id="docStatus-1" value="Unmarked" checked="checked"> Unmarked
                            </label> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 control-group"></div>

                <div class="col-sm-7">
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" id="btnadddocevidence" value="Add Evidence" class='btn btn-success col-sm-12'/>
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
                        <?php echo form_input(array('id' => 'objname', 'name' => 'objname', 'type' => 'text', 'class' => 'form-control')); ?>
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
                        <?php echo form_textarea(array('style' => 'height: 80px', 'id' => 'objdesc', 'name' => 'objdesc', 'type' => 'text', 'class' => 'form-control')); ?>
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
                            <input type="text" class="form-control date-picker datereceived" id="objdatereceived" name="objdatereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
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
                            <input type="text" class="form-control date-picker" id="objdateretrieved" name="objdateretrieved" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
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
                    <div id='objtestifydiv' class="controls">
                        <select id="objtestify" name="objtestify" class="form-control">
                            <?php foreach ($externals as $row) : if ($row->personID != $clientid) { ?>
                                    <option value="<?= $row->personID ?>">
                                        <?= $row->lastname ?>, <?= $row->firstname ?> <?= substr($row->middlename, 0, 1) ?>.
                                    </option><?php } endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-1 control-group">
                    <div class="controls">
                        <a class ="btn btn-success pull-left" href="#addPerSonToTestifyObj" data-toggle="modal" style="margin-top:0px;"> <i class="icon-plus"></i> </a>
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
                                <input type="radio" name="objstatus" id="objStatus-0" value="Marked"> Marked </input>
                            </label>&nbsp;
                            <label class="radio" for="objStatus-1"> 
                                <input type="radio" name="objstatus" id="objStatus-1" value="Unmarked" checked="checked"> Unmarked </input>
                            </label> 
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="col-sm-4 control-group"> </div>

                <div class="col-sm-7 control-group">
                    <div class="controls">
                        <input type="button" id="btnaddobjevidence" value="Add Evidence" class='btn btn-success col-sm-12'/>
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
                    <div id='tesnamediv' class="controls">
                        <select id="tesname" name="tesname" class="form-control externalsminusappclientdiv">
                            <?php foreach ($externals as $row) : if ($row->personID != $clientid) { ?>
                                    <option value="<?= $row->personID ?>">
                                        <?= $row->lastname ?>, <?= $row->firstname ?> <?= substr($row->middlename, 0, 1) ?>.
                                    </option><?php } endforeach; ?>
                        </select>
                    </div>
                </div>



                <div class="col-sm-1 control-group">
                    <div class="controls">
                        <a class ="btn btn-success pull-left" href="#addTestiPerson" data-toggle="modal" style="margin-top:0px;"> <i class="icon-plus"></i> </a>
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
                        <?php echo form_input(array('id' => 'tesrel', 'name' => 'tesrel', 'type' => 'text', 'class' => 'form-control')); ?>
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
                        <?php echo form_textarea(array('style' => 'height:100px', 'id' => 'tespurpose', 'name' => 'tespurpose', 'type' => 'text', 'class' => 'form-control')); ?>
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
                        <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'tesnarrative', 'name' => 'tesnarrative', 'type' => 'text', 'class' => 'form-control')); ?>     
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
                                <input type="radio" name="tesstatus" id="tesStatus-0" value="Marked"> Marked
                            </label>&nbsp;
                            <label class="radio" for="tesStatus-1"> 
                                <input type="radio" name="tesstatus" id="tesStatus-1" value="Unmarked" checked="checked"> Unmarked
                            </label> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 control-group"> </div>

                <div class="col-sm-9 control-group">
                    <div class="controls">
                        <input type="button" id="btnaddtesevidence" value="Add Evidence" class='btn btn-success col-sm-12'/>
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
                    <table id='docevidencetable' class="table table-striped table-bordered datatable" style="background-color:#f8f8f8;">
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
                                    <td><?php echo $row->dtestified ?></td>
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
                    <table id='objevidencetable' class="table table-striped table-bordered datatable" style="background-color:#f8f8f8;">
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
                                    <td><?php echo $row->otestified ?></td>
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
                    <table id='tesevidencetable' class="table table-striped table-bordered datatable" style="background-color:#f8f8f8;">
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
                                    <td><?php echo $row->ttestified ?></td>
                                    <td><?php echo $row->trelationsip ?></td>
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

    <!-- Button -->
    <div class="row">
        <div class="control-group pull-right pull-down">
            <label class="control-label" for="submit"></label>
            <div class="controls">
                <input type='button' id='btnevidencenext' value='Next' class='btn btn-success btnevidencenext'>
            </div>
        </div>
    </div>

</div>
