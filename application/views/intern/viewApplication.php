<div id="content" class="col-lg-10 col-sm-11">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"><br><br>
                    <ul class="nav tab-menu nav-tabs pull-left" style="font-size: 15px;">
                        <!-- <li><a href="#directorsremarks" data-toggle="tab">Director's Remarks</a></li> -->

                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'legaladvice') echo 'class="active"'; ?> id='liViewLegalAdvice'><a href="#legalAdvice" data-toggle="tab">Legal Advice</a></li>

                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'linkedpeople') echo 'class="active"'; ?> id='liViewLinkedPeople'><a href="#linkedPeople" data-toggle="tab">People</a></li>

                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'documents') echo 'class="active"'; ?> id='liViewDocuments'><a href="#documents" data-toggle="tab">Legal Documents</a></li>

                        <li <?php if (isset($_GET['tid']) && $_GET['tid'] == 'evidence') echo 'class="active"'; ?> id='liViewEvidence'><a href="#evidence" data-toggle="tab">Evidence</a></li>

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
                            <?php $this->load->view('intern/viewApplication/viewclientinfo'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'casefacts') echo 'active'; ?>" id="caseFacts" style='padding:10px;'>
                            <?php $this->load->view('intern/viewApplication/viewcasefacts'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'documents') echo 'active'; ?>" id="documents" style='padding:10px;'>
                            <?php $this->load->view('intern/viewApplication/viewdocuments'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'evidence') echo 'active'; ?>" id="evidence" style='padding:10px;'>
                            <?php $this->load->view('intern/viewApplication/viewevidence'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'linkedpeople') echo 'active'; ?>" id="linkedPeople" style='padding:10px;'>
                            <?php $this->load->view('intern/viewApplication/viewlinkedpeople'); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['tid']) && $_GET['tid'] == 'legaladvice') echo 'active'; ?>" id="legalAdvice" style='padding:10px;'>
                            <?php $this->load->view('intern/viewApplication/viewlegaladvice'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col-->
    </div>
</div>
