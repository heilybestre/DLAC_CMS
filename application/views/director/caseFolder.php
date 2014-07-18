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
                                <label class='label label-primary'> Difficulty Level: <?php echo $case->difficultyLevel ?></label>
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

                    <br>
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
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane <?php if (!isset($_GET['tid'])) echo 'active'; ?>" id="general">
                            <?php $this->load->view('director/caseFolder/general'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'actionplan') echo 'active'; ?>" id="actionPlan">
                            <?php $this->load->view('director/caseFolder/actionplan'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'linkedpeople') echo 'active'; ?>" id="linkedPeople">
                            <?php $this->load->view('director/caseFolder/linkedPeople'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'documents') echo 'active'; ?>" id="documents">
                            <?php $this->load->view('director/caseFolder/documents'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'evidence') echo 'active'; ?>" id="evidence">
                            <?php $this->load->view('director/caseFolder/evidence'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'events') echo 'active'; ?>" id="events">
                            <?php $this->load->view('director/caseFolder/events'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'minutes') echo 'active'; ?>" id="minutes">
                            <?php $this->load->view('director/caseFolder/minutes'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'research') echo 'active'; ?>" id="research">
                            <?php $this->load->view('director/caseFolder/research'); ?>
                        </div>
                    </div>
                    <!-- end: Tab contents -->
                        
                </div>
            </div>
        </div><!--/col-->
    </div>


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
                                <h5> <h5><?php echo $case->caseName ?></h5> </h5> 
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
                                <h5> <h5><?php echo $case->stageName ?></h5> </h5> 
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
                                <center> <h5> <b> Reason:</b> </h5> </center>
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
                        <a href="<?php echo base_url() . "cases/rejectCaseClose/$case->caseID" ?>" class="btn btn-primary" >Reject Request</a>
                        <a href="<?php echo base_url() . "cases/caseClose/$case->caseID" ?>" class="btn btn-danger" >Close Case</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- END OF VIEWAPPLYCLOSEMODAL -->

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
                                <center> <h5> <b> Current Stage:</b> </h5> </center>
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
                                <h5><?php echo $casecondition->reason ?></h5>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b> Requested by:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <h5><?php echo "$casecondition->firstname $casecondition->lastname" ?></h5>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url() . 'cases/transferCase/' . $case->caseID ?>" class="btn btn-success"> Choose New Intern </a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Reject Request</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- END OF VIEWAPPLYTRANSFERMODAL -->
</div>
<!-- CASE FOLDER -->