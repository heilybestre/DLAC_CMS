
<div id='actiontaken_form' class="container">

    <div class="container">

        <?php echo form_open(base_url() . 'createApplication/actionTaken', array('class' => 'form-horizontal')); ?>

        <div class="row">

            <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addActionTakenModal" data-toggle="modal">
                <i class="icon-plus-sign"></i>&nbsp;Add Action Taken</a>

        </div>

        <div class="row">
            <h2> Current Stage: *show current stage here* </h2>
            <div id='docuploadnotediv' style='color: #67c2ef;'>
                <h3>Please upload documents for <? //php echo $uploaddocumentstages     ?></h3>
            </div>
            <br>
        </div>

        <div class="row">

            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="disabled"><a href="" data-toggle="tab"><b>STAGES:</b></a></li>
                    <li class="active"><a href="#tab1" data-toggle="tab">New</a></li>
                    <li><a href="#tab2" data-toggle="tab">Preliminary Investigation</a></li>
                    <li><a href="#tab5" data-toggle="tab">Pre-Trial</a></li>
                    <li><a href="#tab6" data-toggle="tab">Trial Court</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="30%">Action</th>
                                    <th width="30%">Related Document/Evidence</th>
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

                    <div class="tab-pane" id="tab2">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab5">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab6">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <br><br>

                <div class="row">
                    <!-- Button -->
                    <div class="control-group pull-right">
                        <label class="control-label" for="submit"></label>
                        <div class="controls">
                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Next'); ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- START OF ViewActionTakenModal -->
        <div class="row">

            <a class ="btn btn-medium btn-link pull-right" style='margin-bottom: 10px' href="#viewActionTakenModal" data-toggle="modal">
                &nbsp;View Action Taken</a>

        </div>


        <div class="row">
            <div class="modal fade" id="viewActionTakenModal">
                <div class="modal-dialog-actionTaken">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Action Taken</h4>
                        </div>
                        <div class="modal-body">

                            <div id="addActionTaken">

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Stage: </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">
                                        (Stage)
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Action Taken </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">
                                        (actionTaken)
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Date </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">
                                        (Date)
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Related: </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">

                                        <div id="tbl-related">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="15%"></th>
                                                        <th width="40%">Title</th>
                                                        <th width="20%">Type</th>
                                                    </tr>
                                                </thead>   
                                                <tbody>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>

                                    </div>
                                </div>

                                <br><br><br><br><br><br><br><br><br><br>

                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

        <!-- END OF ViewActionTakenModal -->


        <!-- START OF AddActionTakenModal -->

        <div class="row">
            <div class="modal fade" id="addActionTakenModal">
                <div class="modal-dialog-actionTaken">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add Action Taken</h4>
                        </div>
                        <div class="modal-body">

                            <div id="addActionTaken">

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Stage: </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">
                                        <select class="form-control">
                                            <option></option>
                                            <option>New</option>
                                            <option>Preliminary Investigation</option>
                                            <option>Pre-Trial</option>
                                            <option>Trial Court</option>
                                        </select>
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Action Taken </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">
                                        <?php echo form_input(array('id' => 'actionTaken', 'name' => 'actionTaken', 'type' => 'text', 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Date </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <select class="form-control">
                                            <option></option>
                                            <option>Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <select class="form-control">
                                            <option></option>
                                            <option>Day</option>
                                        </select>        
                                    </div>
                                </div>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <select class="form-control">
                                            <option></option>
                                            <option>Year</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls"></div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">

                                        <div class="row pull-right">
                                            <a class ="btn btn-medium btn-success" style='margin-bottom: 10px' href="#addRelatedDocumentModal" data-toggle="modal">
                                                <i class="icon-plus-sign"></i>&nbsp;Add Related Document</a> &nbsp;
                                            <a class ="btn btn-medium btn-success" style='margin-bottom: 10px' href="#addRelatedEvidenceModal" data-toggle="modal">
                                                <i class="icon-plus-sign"></i>&nbsp;Add Related Evidence</a>
                                        </div>
                                    </div>
                                </div>

                                <br><br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Related: </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">

                                        <div id="tbl-related">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="15%"></th>
                                                        <th width="40%">Title</th>
                                                        <th width="20%">Type</th>
                                                    </tr>
                                                </thead>   
                                                <tbody>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>

                                    </div>
                                </div>

                                <br><br><br><br><br><br><br><br><br><br>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Add Action</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

        <!-- END OF AddActionTakenModal -->


        <!-- START OF addRelatedDocument -->

        <div class="modal fade" id="addRelatedDocumentModal">
            <div class="modal-dialog-documents">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Related Document</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-sm-1 control-group">
                                <div class="controls">
                                    <center> <h5> Choose Type: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-14 control-group">
                                <div class="controls">
                                    <input type="button" class="btn btn-success btn-small" value="Pleadings/Motions by the Client" onclick="location.href = 'javascript:toggleDocClient();';">
                                    <input type="button" class="btn btn-success btn-small" value="Pleadings/Motions by the Opposing Party" onclick="location.href = 'javascript:toggleDocOpposing();';">
                                    <input type="button" class="btn btn-success btn-small" value="Document Issued by the Court" onclick="location.href = 'javascript:toggleDocCourt();';"> 
                                </div>
                            </div>

                            <br><br>

                            <?php echo form_open(base_url() . 'intern/docClient', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC BY CLIENT -->

                            <div id="toggleDocClient" style="display: none">
                                <div class="col-sm-7">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Title </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Month</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Day</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Month</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Day</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Filed by </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocFiledBy', 'name' => 'caseDocFiledBy', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Reason </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Remarks </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="caseDocRemarks" name="caseDocRemarks" class="form-control">
                                                <option></option>
                                                <option>Granted by the Court</option>
                                                <option>Denied by the Court</option>
                                                <option>Pending</option>
                                            </select>     
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Upload </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>  </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
                                        </div>
                                    </div>


                                </div>
                            </div><?php echo form_close(); ?> <!-- END OF DOC BY CLIENT -->

                            <?php echo form_open(base_url() . 'intern/docOpposing', array('class' => 'form-horizontal')); ?> <!-- START OF DOC BY OPPOSING -->
                            <div id="toggleDocOpposing" style="display: none">

                                <div class="col-sm-7">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Title </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Month</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Day</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Month</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Day</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Filed by </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocFiledBy', 'name' => 'caseDocFiledBy', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Reason </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Remarks </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="caseDocRemarks" name="caseDocRemarks" class="form-control">
                                                <option></option>
                                                <option>Granted by the Court</option>
                                                <option>Denied by the Court</option>
                                                <option>Pending</option>
                                            </select>     
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Upload </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>  </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div><?php echo form_close(); ?> <!-- END OF DOC BY OPPOSING -->

                            <?php echo form_open(base_url() . 'intern/docCourt', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC FROM THE COURT -->
                            <div id="toggleDocCourt" style="display: none">
                                <div class="col-sm-7">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Title </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Month</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Day</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Month</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Day</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Order </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocOrder', 'name' => 'caseDocOrder', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Reason </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Action Needed </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocNeededAction', 'name' => 'caseDocNeededAction', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>


                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Upload </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>  </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php echo form_close(); ?><!-- END OF DOC FROM THE COURT -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- END OF addRelatedDocument -->

        <!-- START OF addRelatedEvidence -->

        <div class="modal fade" id="addRelatedEvidenceModal">
            <div class="modal-dialog-evidence">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Related Evidence</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="controls">
                                Choose Type:
                                <input type="button" class="btn btn-success btn-small" value="Documentary" onclick="location.href = 'javascript:toggleRelEvidenceDoc();';">
                                <input type="button" class="btn btn-success btn-small" value="Object" onclick="location.href = 'javascript:toggleRelEvidenceObj();';">
                                <input type="button" class="btn btn-success btn-small" value="Testimonial" onclick="location.href = 'javascript:toggleRelEvidenceTesti();';">
                            </div><br><br>


                            <?php echo form_open(base_url() . 'createapplication/evidencedoc', array('class' => 'form-horizontal')); ?> <!-- START OF DOCUMENTARY EVIDENCE -->

                            <div id="toggleRelDoc" style="display: none">

                                <div class="col-sm-6">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Document Type </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="documentType" name="documentType" class="form-control">
                                                <option></option>
                                                <option>Original</option>
                                                <option>Photocopy</option>
                                            </select>    
                                        </div>
                                    </div>

                                    <br> <br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Document Name </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'documentInvolved', 'name' => 'documentInvolved', 'type' => 'text', 'class' => 'form-control')); ?>   
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Status </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="documentStatus" name="documentStatus" class="form-control">
                                                <option></option>
                                                <option>Available</option>
                                                <option>Not Available</option>
                                                <option>Lost</option>
                                                <option>Processing</option>
                                                <option>To Follow</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br> <br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Description </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'documentDesc', 'name' => 'documentDesc', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Purpose </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'documentPurpose', 'name' => 'documentPurpose', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('documentDateIssuedMonth', $months, '0', 'id="documentDateIssuedMonth" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('documentDateIssuedDay', $days, '0', 'id="documentDateIssuedDay" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('documentDateIssuedYear', $years, '0', 'id="documentDateIssuedYear" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Place Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'documentPlaceIssued', 'name' => 'documentPlaceIssued', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('documentDateReceivedMonth', $months, $monthnow, 'id="documentDateReceivedMonth" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('documentDateReceivedDay', $days, $daynow, 'id="documentDateReceivedDay" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('documentDateReceivedYear', $years, $yearnow, 'id="documentDateReceivedYear" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Person to Testify</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'personTestifyDoc', 'name' => 'personTestifyDoc', 'type' => 'text', 'class' => 'form-control')); ?>
                                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success', 'id' => 'btn-addEvidence'), 'Add Evidence'); ?>
                                        </div>
                                    </div>

                                    <br><br>


                                </div>
                            </div> <?php echo form_close(); ?> <!-- END OF DOCUMENTARY EVIDENCE -->

                            <?php echo form_open(base_url() . 'createapplication/evidenceobj', array('class' => 'form-horizontal')); ?> <!-- START OF OBJECT EVIDENCE -->

                            <div id="toggleRelObj" style="display: none">

                                <div class="col-sm-6">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Object </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'object', 'name' => 'object', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Status </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="objectStatus" name="objectStatus" class="form-control">
                                                <option></option>
                                                <option>In Possession</option>
                                                <option>Lost</option>
                                                <option>To Follow</option>
                                                <option>In Possession of Other Person</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Person </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('placeholder' => 'appear if In Possession of Other Person^', 'id' => 'possessionName', 'name' => 'possessionName', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Remarks </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="evidenceRemarks" name="evidenceRemarks" class="form-control">
                                                <option></option>
                                                <option>Favorable</option>
                                                <option>Not Favorable</option>
                                                <option>Neutral</option>
                                                <option>Immaterial</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Description </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'objectDesc', 'name' => 'objectDesc', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                </div>

                                <div class="col-sm-6">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Purpose </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'objectPurpose', 'name' => 'objectPurpose', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Location </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'objectFound', 'name' => 'objectFound', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('objectDateReceivedMonth', $months, $monthnow, 'id="objectDateReceivedMonth" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('objectDateReceivedDay', $days, $daynow, 'id="objectDateReceivedDay" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('objectDateReceivedYear', $years, $yearnow, 'id="objectDateReceivedYear" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Retrieved</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('objectDateRetrievedMonth', $months, '0', 'id="objectDateRetrievedMonth" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('objectDateRetrievedDay', $days, '0', 'id="objectDateRetrievedDay" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <?php echo form_dropdown('objectDateRetrievedYear', $years, '0', 'id="objectDateRetrievedYear" class="form-control"'); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Person to Testify </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'personTestifyObj', 'name' => 'personTestifyObj', 'type' => 'text', 'class' => 'form-control')); ?>
                                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Evidence'); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                </div>
                            </div>
                            <?php echo form_close(); ?> <!-- END OF OBJECT EVIDENCE -->

                            <?php echo form_open(base_url() . 'createapplication/evidencetes', array('class' => 'form-horizontal')); ?> <!-- START OF TESTIMONIAL EVIDENCE -->

                            <div id="toggleRelTesti" style="display: none">

                                <div class="col-sm-6">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Testified by </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'testimonialPerson', 'name' => 'testimonialPerson', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Contact Information</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'testimonialPersonCN', 'name' => 'testimonialPersonCN', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Purpose</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'testimonialPurpose', 'name' => 'testimonialPurpose', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Status</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="testimonialStatus" name="testimonialStatus" class="form-control">
                                                <option></option>
                                                <option>Testified</option>
                                                <option>Not Testified</option>
                                                <option>Available</option>
                                                <option>Not Available</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Reason</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('placeholder' => '', 'id' => 'testimonialNAreason', 'name' => 'testimonialNAreason', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Remarks</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="testimonialRemarks" name="testimonialRemarks" class="form-control">
                                                <option></option>
                                                <option>Favorable</option>
                                                <option>Not Favorable</option>
                                                <option>Neutral</option>
                                                <option>Immaterial</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Narrative</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'testimonialNarrative', 'name' => 'testimonialNarrative', 'type' => 'text', 'class' => 'form-control')); ?>     
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Presented to Court</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="form-inline">
                                            <div class="controls">
                                                <?php echo form_radio(array('name' => 'testimonialPresented', 'id' => 'evidenceType-0', 'value' => '1', 'checked' => TRUE)); ?>
                                                Yes &nbsp;
                                                <?php echo form_radio(array('name' => 'testimonialPresented', 'id' => 'evidenceType-1', 'value' => '2', 'checked' => FALSE)); ?>
                                                No &nbsp;   
                                            </div>   
                                        </div>
                                    </div>

                                    <br><br><br><br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>Proceeding</h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="testimonialPresentedProceeding" name="testimonialPresentedProceeding" class="form-control">
                                                <option></option>
                                                <option>A</option>
                                                <option>B</option>
                                            </select>        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Evidence'); ?>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                            </div> <?php echo form_close(); ?> <!-- END OF TESTIMONIAL EVIDENCE -->

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- END OF addRelatedEvidence-->

    </div>

    <div class="row">

        <a class ="btn btn-medium btn-link" style='margin-bottom: 10px' href="#viewDocEvi" data-toggle="modal">View Doc Evi</a>
        <a class ="btn btn-medium btn-link" style='margin-bottom: 10px' href="#viewObjEvi" data-toggle="modal">View Obj Evi</a>
        <a class ="btn btn-medium btn-link" style='margin-bottom: 10px' href="#viewTestiEvi" data-toggle="modal">View Testi Evi</a>

    </div>

    <!--START OF VIEW DOCUMENTARY EVIDENCE modal -->

    <div class="row">

        <div class="modal fade" id="viewDocEvi">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Documentary Evidence: (Evidence Name)</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Document Type:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Document Name:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Purpose:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Issued:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Place Issued:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Received:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Person to Testify:</th>
                                <td> </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!--END OF VIEW DOCUMENTARY EVIDENCE modal -->

    <!--START OF VIEW OBJECT EVIDENCE modal -->

    <div class="row">

        <div class="modal fade" id="viewObjEvi">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Object Evidence: (Evidence Name)</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Object:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>In Possession of:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Remarks:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Purpose:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Location:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Received:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Retrieved:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Person to Testify:</th>
                                <td> </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!--END OF VIEW OBJECT EVIDENCE modal -->

    <!--START OF VIEW TESTIMONIAL EVIDENCE modal -->

    <div class="row">

        <div class="modal fade" id="viewTestiEvi">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Testimonial Evidence: (Evidence Name)</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Testified by:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Contact Information:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Purpose:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Reason:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Remarks:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Narrative:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Presented to Court:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>In what proceeding:</th>
                                <td> </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!--END OF VIEW TESTIMONIAL EVIDENCE modal -->


</div>