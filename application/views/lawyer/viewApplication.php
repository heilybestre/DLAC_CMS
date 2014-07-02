<div id="content" class="col-lg-10 col-sm-11">
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
