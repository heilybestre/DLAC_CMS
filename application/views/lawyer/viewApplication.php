<div id="content" class="col-lg-10 col-sm-11">
       <div class="hide"><h1>Application for Reopening</h1></div>
       
           <a class ="btn btn-medium btn-warning pull-right hide" style='margin-bottom: 10px' href="#viewApplyToReopenModal" data-toggle="modal">
        &nbsp;View Reason for Reopening
    </a>
    
     <!-- START OF VIEWAPPLYTOREOPENMODAL -->
        <div class="row">
            <div class="modal fade" id="viewApplyToReopenModal">
                <div class="modal-dialog-applyToReopen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">View Reason for Reopening</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">

                                <div class="col-sm-5">

                                    <div class="col-sm-4 control-group">
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

                                    <div class="col-sm-4 control-group">
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

                                    <div class="col-sm-5 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Client's Stand: </b></h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <h5>
                                                <?php echo $caseclient[0]->typeName ?>
                                            </h5>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-5 control-group">
                                        <div class="controls">
                                            <center> <h5><b> Court's Verdict:</b> </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <h5></h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <br><br>

                            <div class="row">
                                
                                <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5><b> Reason for Reopening:</b> </h5> </center>
                                        </div>
                                </div>

                                <div class="col-sm-5 control-group">
                                    <div class="controls">
                                         <center> <h5></h5> </center>
                                    </div>
                                </div>
                                
                                <br><br>
                                
                                <div class="col-sm-4 control-group">
                                        <div class="controls">
                                           
                                        </div>
                                </div>

                                <div class="col-sm-6 control-group">
                                    <div class="controls">
                                        <center> <h5></h5> </center>
                                    </div>
                                </div>
                                
                             </div>
                                
                            </div>

                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                         </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
        <!-- END OF APPLYTOREOPENMODAL -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"><br><br>
                    <ul class="nav tab-menu nav-tabs pull-left" style="font-size: 15px;">
                        <!-- <li><a href="#directorsremarks" data-toggle="tab">Director's Remarks</a></li> -->

                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'legaladvice') echo 'class="active"'; ?> id='liViewLegalAdvice'><a href="#legalAdvice" data-toggle="tab">Legal Advice</a></li>

                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'casefacts') echo 'class="active"'; ?> id='liViewCaseFacts'><a href="#caseFacts" data-toggle="tab">Case Facts</a></li>

                        <li <?php if (!isset($_GET['tid'])) echo 'class="active"'; ?> id='liViewClientInfo'><a href="#clientInfo" data-toggle="tab">Client Information</a></li> 
                    </ul>
                </div>
                <div class="box-content" id="boxcontent">
                    <div class="row">

                        <div class="col-lg-9"><br>
                            &nbsp; &nbsp;<label class="label label-default"> Application No.: <?php echo $case->caseNum ?></label>
                            &nbsp; <label class="label label-important"> Status: <?php echo $case->statusName ?></label>
                            &nbsp; <label class="label label-success"> Title: <?php echo $case->caseName ?></label>

                        </div>
                        <div class="col-lg-9 hide"><br>
                            &nbsp; &nbsp;<label class="label label-primary"> Assigned Lawyer: Atty. Milabel Cristobel</label>
                            &nbsp; <label class="label label-info"> Assigned Interns: Mihaela Mamenta, Lewin Gaw</label>
                        </div>
                    </div>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane <?php if (!isset($_GET['tid'])) echo 'active'; ?>" id="clientInfo" style='padding:10px;'>
                            <?php $this->load->view('lawyer/viewApplication/viewclientinfo'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'casefacts') echo 'active'; ?>" id="caseFacts" style='padding:10px;'>
                            <?php $this->load->view('lawyer/viewApplication/viewcasefacts'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'legaladvice') echo 'active'; ?>" id="legalAdvice" style='padding:10px;'>
                            <?php $this->load->view('lawyer/viewApplication/viewlegaladvice'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col-->
    </div>
</div>
