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
                                <label class='label label-danger'> Difficulty Level: <?php echo $case->difficultyLevel ?></label>
                            <?php } ?>
                            <?php if ($case->difficultyLevel >= 4 && $case->difficultyLevel <= 6) { ?>
                                <label class='label label-warning'> Difficulty Level: <?php echo $case->difficultyLevel ?></label>
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
                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'minutes') echo 'class="active"'; ?> >
                            <a href="#minutes" data-toggle="tab">Minutes</a>
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

                    <div class="row">
                        <div class="pull-right">
                            <?php if ($case->status != 5 && $case->status != 6) { ?>
                                <?php if ($caseperson->condition != 'applytotransfer') { ?>
                                    <a class ="btn btn-medium btn-info" style='margin-bottom: 10px' href="#applyToTransferModal2" data-toggle="modal">
                                        &nbsp;Apply to Transfer
                                    </a>
                                <?php } ?>
                            <?php } ?>

                            <?php if ($case->status != 4 && $case->status != 5 && $case->status != 6) { ?>
                                <a class ="btn btn-medium btn-danger" style='margin-bottom: 10px' href="#applyToCloseModal2" data-toggle="modal">
                                    &nbsp;Close Case
                                </a>
                            <?php } ?>

                            <?php if ($case->status == 5) { ?>
                                <a class ="btn btn-medium btn-info" style='margin-bottom: 10px' href="#applyToTransferModal2" data-toggle="modal">
                                    &nbsp;Apply to Reopen
                                </a>
                            <?php } ?>
                            &nbsp;&nbsp;
                        </div>
                    </div>

                    <?php if ($case->status == 4) { ?>
                        <div class="row" style="background-color:#F67B8F;" id="appliedForClosing">
                            <h5 style="margin-left:15px;">This case was applied for closing. To view the details, click <a class ="" style='margin-bottom: 10px; color:black;' href="#viewApplyCloseModal" data-toggle="modal">here</a>. </h5>
                        </div>
                        <br>
                    <?php } ?>

                    <?php if (!in_array($case->status, array('5', '6'))) { ?>
                        <?php if ($caseperson->condition == 'applytotransfer') { ?>
                            <div class="row" style="background-color:#90C9E4;" id="appliedForTransfer">
                                <h5 style="margin-left:15px;">This case was applied for transferring. To view the details, click <a class ="" style='margin-bottom: 10px; color:black;' href="#viewApplyTransferModal" data-toggle="modal">here</a>. </h5>
                            </div>
                            <br>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($case->status == 5) { ?>
                        <?php if ($case->strength == NULL && $case->weakness == NULL && $case->opportunity == NULL && $case->threat == NULL && $case->strategy == NULL) { ?>
                            <div class="row" style="background-color:#EEA4A4;" id="forAssessment">
                                <h5 style="margin-left:15px;">This case has been closed. Please assess it <a class ="" style='margin-bottom: 10px' href="#addAssessmentModal" data-toggle="modal" style="color:black;">here</a>. </h5>
                            </div>
                            <br>
                        <?php } else { ?>
                            <div class="row" style="background-color:#CCD5C8;" id="viewAssessment">
                                <h5 style="margin-left:15px;">This case is closed. View assessment <a class ="" style='margin-bottom: 10px; color:black;' href="#viewAssessmentModal" data-toggle="modal">here</a>. </h5>
                            </div>
                            <br>
                        <?php } ?>
                    <?php } ?>

                    <br>

                    <!-- start: Tab contents -->
                    <div id="myTabContent" class="tab-content" style='padding: 10px;'>
                        <div class="tab-pane <?php if (!isset($_GET['tid'])) echo 'active'; ?>" id="general">
                            <?php $this->load->view('intern/caseFolder/general'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'actionplan') echo 'active'; ?>" id="actionPlan">
                            <?php $this->load->view('intern/caseFolder/actionPlan'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'evidence') echo 'active'; ?>" id="evidence">
                            <?php $this->load->view('intern/caseFolder/evidence'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'linkedpeople') echo 'active'; ?>" id="linkedPeople">
                            <?php $this->load->view('intern/caseFolder/linkedPeople'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'documents') echo 'active'; ?>" id="documents">
                            <?php $this->load->view('intern/caseFolder/documents'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'events') echo 'active'; ?>" id="events">
                            <?php $this->load->view('intern/caseFolder/events'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'minutes') echo 'active'; ?>" id="minutes">
                            <?php $this->load->view('intern/caseFolder/minutes'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'research') echo 'active'; ?>" id="research">
                            <?php $this->load->view('intern/caseFolder/research'); ?>
                        </div>
                    </div>
                    <!-- end: Tab contents -->

                </div>
            </div>
        </div><!--/col-->

    </div>

    <!-- START OF APPLYTOTRANSFER NA KELANGAN PARA AYOS-->
    <div class="row hide">

        <div class="modal fade" id="applyToTransferModal">
            <div class="modal-dialog-applyToTransfer">
                <div class="modal-content">
                    <?php echo form_open(base_url() . "cases/caseApplytotransfer", array('class' => 'form-horizontal')); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Apply to Transfer Case Naka-hide to</h4>
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
                                <center> <h5> <b>Reason:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-6 control-group">
                            <div class="controls">
                                <select name="reason"class="form-control">
                                    <option value=""></option>
                                    <option value="Intern's Incompetency">Intern's Incompetency</option>
                                    <option value="">Others</option>
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
                                <?php echo form_textarea(array('style' => 'width:100%;height:80px;', 'id' => 'transferCaseReason', 'name' => 'notes', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <br><br><br><br>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <input name='cid' type='hidden' value='<?php echo $case->caseID ?>'>
                        <input name='pid' type='hidden' value='<?php echo $this->session->userdata('userid'); ?>'>
                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> <!--modal-content -->
            </div> <!--modal-dialog -->
        </div> <!--modal -->
    </div> 
    <!-- END OF APPLYTOTRANSFER NA KELANGAN PARA AYOS-->

    <!-- START OF APPLYTOTRANSFER NA AYOS TALAGA -->
    <div class="row">
        <div class="modal fade" id="applyToTransferModal2">
            <div class="modal-dialog-applyToTransfer">
                <div class="modal-content">
                    <?php echo form_open(base_url() . "cases/caseApplytotransfer", array('class' => 'form-horizontal')); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Apply to Transfer Case</h4>
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
                                <h5>
                                    <?php $index = 0; ?>
                                    <?php foreach ($caseclient as $client) { ?>
                                        <?php if ($index > 0) { ?>
                                            <?php echo ", $client->firstname $client->lastname" ?>
                                        <?php } else { ?>
                                            <?php echo "$client->firstname $client->lastname" ?>
                                        <?php } ?>
                                        <?php $index++; ?>
                                    <?php } ?>
                                </h5>
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
                                <h5><?php echo $caseclient[0]->typeName ?></h5>
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
                                <select name="applytoclosereason"class="form-control">
                                    <option></option>
                                    <option value="Intern's Incompetency">Intern's Incompetency</option>
                                    <option value="Others">Others</option>
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
                                <?php echo form_textarea(array('style' => 'width:100%;height:80px;', 'id' => 'transferCaseReason', 'name' => 'notes', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <br><br><br><br>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <input name='cid' type='hidden' value='<?php echo $case->caseID ?>'>
                        <input name='pid' type='hidden' value='<?php echo $this->session->userdata('userid'); ?>'>
                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> <!--modal-content -->
            </div> <!--modal-dialog -->
        </div> <!--modal -->
    </div>
    <!-- END OF APPLYTOTRANSFER  NA AYOS TALAGA-->

    <!-- START OF APPLYTOCLOSEMODAL NA KELANGAN PARA AYOS-->
    <div class="row hide">
        <div class="modal fade" id="applyToCloseModal">
            <div class="modal-dialog-applyToClose">
                <div class="modal-content">
                    <?php echo form_open(base_url() . "cases/caseApplytoclose", array('class' => 'form-horizontal')); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Apply to Close Case</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b> Case Title: </b> </h5> </center>
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
                                <center> <h5> <b> Current Stage: </b> </h5> </center>
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
                                <center> <h5> <b> Reason: </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-6 control-group">
                            <div class="form-inline">
                                <div class="controls">
                                    <label class="radio" for="evidenceOf-0"> 
                                        <input type="radio" name="reason" id="courtsDecision-0" value="0" checked="checked" > Forum's/Court's Decision
                                    </label> &nbsp; 
                                    <label class="radio" for="evidenceOf-1"> 
                                        <input type="radio" name="reason" id="courtsDecision-1" value="1" > Client's Decision 
                                    </label>                               
                                </div></div>
                        </div>
                        <br><br>

                        <div id="radio-courts-decisionjoke" style="display:block;">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> <b> Forum's/Court's Decision: </b> </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-4 control-group">
                                <div class="form-inline"> 
                                    <div class="controls"> 
                                        <select class="form-control" name="decision">
                                            <option>Convict</option>
                                            <option>Acquit</option>
                                            <option>Dismissed</option>
                                        </select>
                                    </div> 
                                </div> 
                            </div>
                            <br><br>
                        </div>
                        <br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <div class="col-sm-6 control-group">
                            <div class="controls">
                                <?php echo form_textarea(array('class' => 'form-control', 'name' => 'notes', 'style' => 'width:100%; height:50px;')); ?>
                            </div>
                        </div>
                        <br><br><br>

                        <br>

                    </div>
                    <div class="modal-footer">
                        <input name='cid' type='hidden' value='<?php echo $case->caseID ?>'>
                        <input name='pid' type='hidden' value='<?php echo $this->session->userdata('userid'); ?>'>
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Submit'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- END OF APPLYTOCLOSEMODAL NA KELANGAN PARA AYOS-->

    <!-- START OF APPLYTOCLOSEMODAL NA AYOS TALAGA-->
    <div class="row">
        <div class="modal fade" id="applyToCloseModal2">
            <div class="modal-dialog-applyToClose">
                <div class="modal-content">
                    <?php echo form_open(base_url() . "cases/caseApplytoclose", array('class' => 'form-horizontal')); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Apply to Close Case</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b> Case Title: </b> </h5> </center>
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
                                <center> <h5> <b> Current Stage: </b> </h5> </center>
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
                                <h5>
                                    <?php $index = 0; ?>
                                    <?php foreach ($caseclient as $client) { ?>
                                        <?php if ($index > 0) { ?>
                                            <?php echo ", $client->firstname $client->lastname" ?>
                                        <?php } else { ?>
                                            <?php echo "$client->firstname $client->lastname" ?>
                                        <?php } ?>
                                        <?php $index++; ?>
                                    <?php } ?>
                                </h5>
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
                                <h5><?php echo $caseclient[0]->typeName ?></h5>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b> Reason: </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-6 control-group">
                            <div class="form-inline">
                                <div class="controls">
                                    <label class="radio" for="evidenceOf-0"> 
                                        <input type="radio" name="applytoclosereason" id="courtsDecision-0" value="0" checked="checked" > Forum's/Court's Decision
                                    </label> &nbsp; 
                                    <label class="radio" for="evidenceOf-1"> 
                                        <input type="radio" name="applytoclosereason" id="courtsDecision-1" value="1"> Client's Decision 
                                    </label>                               
                                </div></div>
                        </div>
                        <br><br>

                        <div id="radio-courts-decision" style="display:block;">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> <b> Forum's/Court's Decision: </b> </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-4 control-group">
                                <div class="form-inline"> 
                                    <div class="controls"> 
                                        <select class="form-control" name="decision">
                                            <option>Convict</option>
                                            <option>Acquit</option>
                                            <option>Dismissed</option>
                                        </select>
                                    </div> 
                                </div> 
                            </div>
                            <br><br>
                        </div>
                        <br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <div class="col-sm-6 control-group">
                            <div class="controls">
                                <?php echo form_textarea(array('class' => 'form-control', 'name' => 'notes', 'style' => 'width:100%; height:50px;')); ?>
                            </div>
                        </div>
                        <br><br><br>

                        <br>

                    </div>
                    <div class="modal-footer">
                        <input name='cid' type='hidden' value='<?php echo $case->caseID ?>'>
                        <input name='pid' type='hidden' value='<?php echo $this->session->userdata('userid'); ?>'>
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Submit'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF APPLYTOCLOSEMODAL NA AYOS TALAGA-->

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
                                <h5>
                                    <?php $index = 0; ?>
                                    <?php foreach ($caseclient as $client) { ?>
                                        <?php if ($index > 0) { ?>
                                            <?php echo ", $client->firstname $client->lastname" ?>
                                        <?php } else { ?>
                                            <?php echo "$client->firstname $client->lastname" ?>
                                        <?php } ?>
                                        <?php $index++; ?>
                                    <?php } ?>
                                </h5>
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
                                <h5><?php echo $caseclient[0]->typeName ?></h5>
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

    <!-- START OF VIEWAPPLYCLOSEMODAL -->
    <div class="row">
        <div class="modal fade" id="viewApplyCloseModal">
            <div class="modal-dialog-transferClose">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Application for Case Closing</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Case Title:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5> <?php echo $case->caseName ?> </h5> 
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
                                <h5> <?php echo $case->stageName ?> </h5> 
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
                                <h5>
                                    <?php $index = 0; ?>
                                    <?php foreach ($caseclient as $client) { ?>
                                        <?php if ($index > 0) { ?>
                                            <?php echo ", $client->firstname $client->lastname" ?>
                                        <?php } else { ?>
                                            <?php echo "$client->firstname $client->lastname" ?>
                                        <?php } ?>
                                        <?php $index++; ?>
                                    <?php } ?>
                                </h5>
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
                                <h5><?php echo $caseclient[0]->typeName ?></h5>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b> Reason: </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <?php if ($case->closereason == 0) { ?>
                                    <h5><?php echo "Forum's/Court's Decision" ?></h5>
                                <?php } else { ?>
                                    <h5><?php echo "Client's Decision" ?></h5>
                                <?php } ?>
                            </div>
                        </div>
                        <br><br>

                        <?php if ($case->closereason == 0) { ?>
                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> <b> Decision:</b> </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                    <h5><?php echo $case->closedecision ?></h5>
                                </div>
                            </div>
                        <?php } ?>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">

                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5><?php echo $case->closenotes ?></h5>
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
                                <h5> <?php echo "$case->firstname $case->lastname" ?> </h5> 
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
    <!-- END OF VIEWAPPLYCLOSEMODAL -->

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
                                                    <?php echo "$off->offenseName ($off->stage)" ?>
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
                                        <h5><?php echo $caseclient[0]->typeName ?></h5>
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
                                                echo $row->offenseName;
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
                                            <?php echo $caseclient[0]->typeName ?>
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
                                        <h5>
                                            <?php echo $case->closedecision; ?>
                                        </h5>
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
</div>
<!-- CASE FOLDER -->
