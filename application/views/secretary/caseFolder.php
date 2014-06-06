<div id="content" class="col-lg-10 col-sm-11">
    <!-- CASE FOLDER -->
    <div class="row">
        <!-- https://github.com/sathomas/responsive-tabs -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h2> 
                        <?php echo $case->caseName; ?>
                    </h2><br>
                    <ul class="nav casetabs tab-menu nav-tabs">

                        <!--  <li><a href="#appClosing" data-toggle="tab">Application for Closing</a></li>
                         <li><a href="#appTransfer" data-toggle="tab">Application for Transfer</a></li> -->
                     <li><a href="#events" data-toggle="tab">Events</a></li>
                      <li><a href="#linkedPeople" data-toggle="tab">People</a></li>
                      <li><a href="#documents" data-toggle="tab">Legal Documents</a></li>
                      <li><a href="#evidence" data-toggle="tab">Evidence</a></li>
                      <li><a href="#actionTaken" data-toggle="tab">Action Taken</a></li>
                      <li><a href="#actionPlan" data-toggle="tab">Action Plan</a></li>
                      <li class="active"><a href="#general" data-toggle="tab">General</a></li>   
                    </ul>
                </div>
                <div class="box-content" id="boxcontent">

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="general">
                            <?php $this->load->view('secretary/caseFolder/general'); ?>
                        </div>
                        <div class="tab-pane" id="actionPlan">
                            <?php $this->load->view('secretary/caseFolder/actionplan'); ?>
                        </div>
                        <div class="tab-pane" id="actionTaken">
                            <?php $this->load->view('secretary/caseFolder/actionTaken'); ?>
                        </div>
                        <div class="tab-pane" id="linkedPeople">
                            <?php $this->load->view('secretary/caseFolder/linkedPeople'); ?>
                        </div>
                        <div class="tab-pane" id="documents">
                            <?php $this->load->view('secretary/caseFolder/documents'); ?>
                        </div>
                        <div class="tab-pane" id="evidence">
                            <?php $this->load->view('secretary/caseFolder/evidence'); ?>
                        </div>
                        <div class="tab-pane" id="events">
                            <?php $this->load->view('secretary/caseFolder/events'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col-->
    </div>

    <!-- START OF APPLYTOTRANSFERMODAL -->

    <div class="row">

        <div class="modal fade" id="caseTransferApplicationModal">
            <div class="modal-dialog-applyToTransfer">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Application for Case Transfer</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Case Title: </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <?php echo $row->caseName ?>
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
                                <?php echo $row->stageName ?>
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
                                (reason)
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
                        <button type="button" class="btn btn-success" data-dismiss="modal">Transfer Case</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- END OF APPLYTOTRANSFERMODAL -->

        <!-- START OF APPLYTOCLOSEMODAL -->

        <div class="modal fade" id="caseClosingApplicationModal">
            <div class="modal-dialog-applyToClose">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Application for Case Closing</h4>
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
                                (Stage)
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
                                (Reason)
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close Case</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- END OF APPLYTOCLOSEMODAL -->
    </div>

    <!-- CASE FOLDER -->

</div>
<!-- CASE FOLDER -->