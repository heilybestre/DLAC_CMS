<div id="content" class="col-lg-10 col-sm-11">
    <!-- CASE FOLDER -->
    <div class="row">
        <!-- https://github.com/sathomas/responsive-tabs -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h2>
                        <?php echo "$case->caseName ($case->caseNum)"; ?>

                        <div style='display: inline-block; margin-left:10px;' class="hide">
                            <?php if ($case->difficultyLevel >= 7 && $case->difficultyLevel <= 10) { ?>
                            <label class='label label-danger'>Difficulty Level: <?php echo $case->difficultyLevel ?></label>
                            <?php } ?>
                            <?php if ($case->difficultyLevel >= 4 && $case->difficultyLevel <= 6) { ?>
                            <label class='label label-warning'>Difficulty Level: <?php echo $case->difficultyLevel ?></label>
                            <?php } ?>
                            <?php if ($case->difficultyLevel >= 1 && $case->difficultyLevel <= 3) { ?>
                            <label class='label label-primary'>Difficulty Level: <?php echo $case->difficultyLevel ?></label>
                            <?php } ?>
                        </div>
                    </h2>
                    <!-- start: Tabs -->
                    <ul class="nav casetabs tab-menu nav-tabs">
                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'research') echo 'class="active"'; ?> >
                            <a href="#research" data-toggle="tab">Research</a>
                        </li>
                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'events') echo 'class="active"'; ?> >
                            <a href="#events" data-toggle="tab">Events</a>
                        </li>
                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'linkedpeople') echo 'class="active"'; ?> >
                            <a href="#linkedPeople" data-toggle="tab">People</a>
                        </li>
                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'documents') echo 'class="active"'; ?> >
                            <a href="#documents" data-toggle="tab">Legal Documents</a>
                        </li>
                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'evidence') echo 'class="active"'; ?> >
                            <a href="#evidence" data-toggle="tab">Evidence</a>
                        </li>
                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'actionplan') echo 'class="active"'; ?>>
                            <a href="#actionPlan" data-toggle="tab">Action Plan</a>
                        </li>
                        <li <?php if (!isset($_GET['tid'])) echo 'class="active"'; ?>>
                            <a href="#general" id='tidgeneral' data-toggle="tab">General</a>
                        </li>
                    </ul>
                    <!-- end: Tabs -->
                </div>

                <div class="box-content" id="boxcontent">
                    <br><br>

                    <?php if ($case->status == 4) { ?>
                    <div class="row" style="background-color:#F67B8F;" id="appliedForClosing">
                        <h5 style="margin-left:15px;">This case was applied for closing. To view the details, click <a class ="" style='margin-bottom: 10px' href="#viewApplyCloseModal" data-toggle="modal" style="color:black;">here</a>. </h5>
                    </div>
                    <br>
                    <?php } ?>


                    <?php if ($casecondition != false && $casecondition->condition == 'applytotransfer') { ?>
                    <div class="row" style="background-color:#90C9E4;" id="appliedForTransfer">
                        <h5 style="margin-left:15px;">This case was applied for transferring. To view the details, click <a class ="" style='margin-bottom: 10px' href="#viewApplyTransferModal" data-toggle="modal" style="color:black;">here</a>. </h5>
                    </div>
                    <br>
                    <?php } ?>

                    <?php if ($case->status == 5) { ?>
                    <?php if ($case->strength == NULL && $case->weakness == NULL && $case->opportunity == NULL && $case->threat == NULL && $case->strategy == NULL) { ?>
                    <div class="row" style="background-color:#EEA4A4;" id="forAssessment">
                        <h5 style="margin-left:15px;">This case has been closed. Please assess it <a class ="" style='margin-bottom: 10px' href="#addAssessmentModal" data-toggle="modal" style="color:black;">here</a>. </h5>
                    </div>
                    
                    <?php } else { ?>
                    <div class="row" style="background-color:#CCD5C8;" id="viewAssessment">
                        <h5 style="margin-left:15px;">This case is closed. View assessment <a class ="" style='margin-bottom: 10px' href="#viewAssessmentModal" data-toggle="modal" style="color:black;">here</a>. </h5>
                    </div>
                    <br>
                    <?php } ?>
                    <?php } ?>

                    <!-- start: Tab contents -->
                    <div id="myTabContent" class="tab-content" style='padding: 10px;'>
                        <div class="tab-pane <?php if (!isset($_GET['tid'])) echo 'active'; ?>" id="general">
                            <?php $this->load->view('lawyer/caseFolder/general'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'actionplan') echo 'active'; ?>" id="actionPlan">
                            <?php $this->load->view('lawyer/caseFolder/actionplan'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'evidence') echo 'active'; ?>" id="evidence">
                            <?php $this->load->view('lawyer/caseFolder/evidence'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'linkedpeople') echo 'active'; ?>" id="linkedPeople">
                            <?php $this->load->view('lawyer/caseFolder/linkedPeople'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'documents') echo 'active'; ?>" id="documents">
                            <?php $this->load->view('lawyer/caseFolder/documents'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'events') echo 'active'; ?>" id="events">
                            <?php $this->load->view('lawyer/caseFolder/events'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'research') echo 'active'; ?>" id="research">
                            <?php $this->load->view('lawyer/caseFolder/research'); ?>
                        </div>
                    </div>
                    <!-- end: Tab contents -->

                </div>
            </div>
        </div><!--/col-->

    </div>

    <!-- START OF UPDATESTAGEMODAL -->

    <div class="row">

        <div class="modal fade" id="applyToUpdateStageModal">
            <div class="modal-dialog-updateStageModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Apply to Update Stage</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Case Title: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (title)
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Current Stage: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (title)
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Move to Stage: </h5> </center>
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
                                    <center> <h5> Document Needed: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (Doc)
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Upload: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">

                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    <a class ="btn btn-medium btn-success" style='margin-bottom: 10px' href="#addUpdateRelDocumentModal" data-toggle="modal">
                                        &nbsp;Add Related Document</a> &nbsp;
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Apply to Update Stage</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>

        <!-- END OF UPDATESTAGEMODAL -->

        <!-- START OF addRelatedDocument -->

        <div class="modal fade" id="addUpdateRelDocumentModal">
            <div class="modal-dialog-UpdateRelDocuments">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Related Document (update)</h4>
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
                                    <input type="button" class="btn btn-success btn-small" value="Pleadings/Motions by the Client" onclick="location.href = 'javascript:toggleUpdateRelDocClient();';">
                                    <input type="button" class="btn btn-success btn-small" value="Pleadings/Motions by the Opposing Party" onclick="location.href = 'javascript:toggleUpdateRelDocOpposing();';">
                                    <input type="button" class="btn btn-success btn-small" value="Document Issued by the Court" onclick="location.href = 'javascript:toggleUpdateRelDocCourt();';"> 
                                </div>
                            </div>

                            <br><br>

                            <?php echo form_open(base_url() . 'lawyer/docClient', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC BY CLIENT -->

                            <div id="toggleUpdateRelDocClient" style="display: none">
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

                            <?php echo form_open(base_url() . 'lawyer/docOpposing', array('class' => 'form-horizontal')); ?> <!-- START OF DOC BY OPPOSING -->
                            <div id="toggleUpdateRelDocOpposing" style="display: none">

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

                            <?php echo form_open(base_url() . 'lawyer/docCourt', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC FROM THE COURT -->
                            <div id="toggleUpdateRelDocCourt" style="display: none">
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

        <!-- START OF APPLYTOTRANSFERMODAL -->

        <div class="row">

            <div class="modal fade" id="applyToTransferModal">
                <div class="modal-dialog-applyToTransfer">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Apply to Transfer Case</h4>
                        </div>
                        <div class="modal-body">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Case Title: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (title)
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Current Stage: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (title)
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Reason: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-6 control-group">
                                <div class="controls">
                                    <select class="form-control">
                                        <option></option>
                                        <option>Completed Residency Hours</option>
                                        <option>Intern's Incompetency</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-6 control-group">
                                <div class="controls">
                                    <?php echo form_textarea(array('rows' => '3', 'id' => 'closeCaseReason', 'name' => 'closeCaseReasonDesc', 'type' => 'text', 'class' => 'form-control')); ?>
                                </div>
                            </div>
                            <br><br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Requested by: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (Intern name)
                                </div>
                            </div>
                            <br>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Add Action</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>

        <!-- END OF APPLYTOTRANSFERMODAL -->

        <!-- START OF APPLYTOCLOSEMODAL -->

        <div class="row">

            <div class="modal fade" id="applyToCloseModal">
                <div class="modal-dialog-applyToClose">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Apply to Close Case</h4>
                        </div>
                        <div class="modal-body">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Case Title: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (title)
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Current Stage: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (title)
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Reason: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-6 control-group">
                                <div class="controls">
                                    <select class="form-control">
                                        <option></option>
                                        <option>Client's Decision</option>
                                        <option>Court's Decision</option>
                                    </select>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Requested by: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    (Intern name)
                                </div>
                            </div>
                            <br>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Add Action</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>

        <!-- END OF APPLYTOCLOSEMODAL -->

        <!-- START OF ADDASSESSMENTMODAL -->
        <div class="row">
            <div class="modal fade" id="addAssessmentModal">
                <div class="modal-dialog-transferClose">
                    <div class="modal-content">
                        <?php echo form_open("cases/addAssessment", array('class' => 'form-horizontal')); ?>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Case Assessment</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <center> <h5> <b> Case Title: </b></h5> </center>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <h5><?php echo $case->caseName ?></h5>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-3 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Offense: </b></h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <h5>
                                                <?php foreach ($caseoffense as $off) : ?>
                                                <label class="label label-danger">
                                                    <?php echo "$off->offense ($off->stage)" ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </h5>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-5">

                                <div class="col-sm-4 control-group">
                                    <div class="controls">
                                        <center> <h5> <b>Client's Stand: </b></h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-6 control-group">
                                    <div class="controls">
                                        <h5><?php echo $client->typeName ?></h5>
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-4 control-group">
                                    <div class="controls">
                                        <center> <h5><b> Court's Verdict:</b> </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-6 control-group">
                                    <div class="controls">
                                        <h5><?php echo $case->closedecision ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div style="overflow:scroll; height:400px; border-width:4px;">

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>
                                        <b>Strategy</b>
                                        <br>
                                        <h5>Input strategies used for the case. </h5>
                                        <?php echo form_textarea(array('id' => 'addStrategies', 'name' => 'addStrategies', 'type' => 'text', 'class' => 'form-control', 'style' => 'height:130px; width:750px;')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Strengths</b>
                                        <br>
                                        <h5>Input the strengths of the case. </h5>
                                        <?php echo form_textarea(array('id' => 'addStrengths', 'name' => 'addStrengths', 'type' => 'text', 'class' => 'form-control', 'style' => 'height:130px; width:750px;')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Weaknesses</b>
                                        <br>
                                        <h5>Input the weaknesses of the case. </h5>
                                        <?php echo form_textarea(array('id' => 'addWeaknesses', 'name' => 'addWeaknesses', 'type' => 'text', 'class' => 'form-control', 'style' => 'height:130px; width:750px;')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Opportunities</b>
                                        <br>
                                        <h5>Input the opportunities of the case. </h5>
                                        <?php echo form_textarea(array('id' => 'addOpportunities', 'name' => 'addOpportunities', 'type' => 'text', 'class' => 'form-control', 'style' => 'height:130px; width:750px;')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Threats</b>
                                        <br>
                                        <h5>Input the threats of the case. </h5>
                                        <?php echo form_textarea(array('id' => 'addThreats', 'name' => 'addThreats', 'type' => 'text', 'class' => 'form-control', 'style' => 'height:130px; width:750px;')); ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="cid" value="<?php echo $case->caseID ?>">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Submit'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END OF ADDASSESSMENTMODAL -->

    <!-- START OF VIEWASSESSMENTMODAL -->
    <div class="row">
        <div class="modal fade" id="viewAssessmentModal">
            <div class="modal-dialog-assessment">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Case Assessment</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-sm-5">

                                <div class="col-sm-3 control-group">
                                    <div class="controls">
                                        <center> <h5> <b> Case Title: </b></h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-7 control-group">
                                    <div class="controls">
                                        <h5><?php echo $case->caseName ?></h5>
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-3 control-group">
                                    <div class="controls">
                                        <center> <h5> <b>Offense: </b></h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-7 control-group">
                                    <div class="controls">
                                        <h5>
                                            <?php
                                            $count = 1;
                                            foreach ($caseoffense as $row) {
                                                if ($count > 1) {
                                                    echo ', ';
                                                }
                                                echo $row->offense;
                                                $count++;
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-5">

                                <div class="col-sm-4 control-group">
                                    <div class="controls">
                                        <center> <h5> <b>Client's Stand: </b></h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-6 control-group">
                                    <div class="controls">
                                        <h5>
                                            <?php echo $client->typeName ?>
                                        </h5>
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-4 control-group">
                                    <div class="controls">
                                        <center> <h5><b> Court's Verdict:</b> </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-6 control-group">
                                    <div class="controls">
                                        <h5></h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div style="overflow:scroll; height:400px; border-width:4px;">

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>
                                        <b>Strategy</b>
                                        <br><br>
                                        <p><?php echo $case->strategy ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Strengths</b>
                                        <br><br>
                                        <p><?php echo $case->strength ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Weaknesses</b>
                                        <br><br>
                                        <p><?php echo $case->weakness ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Opportunities</b>
                                        <br><br>
                                        <p><?php echo $case->opportunity ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Threats</b>
                                        <br><br>
                                        <p><?php echo $case->threat ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- END OF VIEWASSESSMENTMODAL -->

    <!-- CASE FOLDER -->
    
<!-- START OF VIEWAPPLYTRANSFERMODAL -->
    <div class="row">
        <div class="modal fade" id="viewApplyTransferModal">
            <div class="modal-dialog-transferClose">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Application for Case Transfer</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Case Title:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5><?php echo $case->caseName ?></h5>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Current Stage:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5><?php echo $case->stageName ?></h5>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b> Client Name: </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5><?php echo "$client->firstname $client->lastname" ?></h5>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b> Client's Stand: </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5><?php echo $client->typeName ?></h5>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Reason:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-6 control-group">
                            <div class="controls">
                                <h5><?php echo $caseperson->reason ?></h5>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Requested by:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5><?php echo "$caseperson->firstname $caseperson->lastname" ?></h5>
                            </div>
                        </div>
                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- END OF VIEWAPPLYTRANSFERMODAL -->

</div>
<!-- CASE FOLDER -->