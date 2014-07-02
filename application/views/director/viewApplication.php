<div id="content" class="col-lg-10 col-sm-11">

    <div class="row hide">
        <!--																																										ERROR ERROR ERROR
        <?php foreach ($casecount as $cc): ?>
                                <h3>The clinic currently handles <?php echo $cc->countactive ?> active cases. </h3>
        <?php endforeach; ?>
        -->
    </div>
    <!-- start: Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"><br><br>
                    <ul class="nav tab-menu nav-tabs pull-left" style="font-size: 15px;">
                        <!-- <li><a href="#directorsremarks" data-toggle="tab">Director's Remarks</a></li> -->
                        <!-- <li><a href="#recommendation" data-toggle="tab">Recommendation</a></li> -->
                        <li><a href="#legalAdvice" data-toggle="tab">Legal Advice</a></li>
                        <li><a href="#caseFacts" data-toggle="tab">Case Facts</a></li>
                        <li class="active"><a href="#clientInfo" data-toggle="tab">Client Information</a></li>
                    </ul>
                </div>
                <div class="box-content" id="boxcontent">
                    <div class="row">
                        <?php echo form_open(base_url() . 'director/accept', array('class' => 'form-horizontal')); ?>

                        <div class="col-lg-9"><br>
                            &nbsp; &nbsp;<label class="label label-default"> Application No.: <?php echo $case->caseNum ?></label>
                            &nbsp; <label class="label label-important"> Status: <?php echo $case->statusName ?></label>
                            &nbsp; <label class="label label-success"> Title: <?php echo $case->caseName ?></label>
                            <?php
                            $app = array(
                                'aid' => $case->caseID,
                                'title' => $case->caseName,
                                'stage' => $case->stage
                            );
                            echo form_hidden($app);
                            ?>

                        </div>

                        <?php
                        if ($case->status == '2') { //row count lawyer and intern > 0
                            echo "<div class='col-lg-3 pull-right'>
							<input type='submit' class ='hide btn btn-medium btn-success' style='margin-bottom: 10px' value='Accept'/>
							<a class ='btn btn-medium btn-warning' style='margin-bottom: 10px' href='#assignModal' data-toggle='modal' >
							&nbsp;Assign Lawyer & Interns &nbsp;</a>
							<a class ='btn btn-medium btn-danger' style='margin-bottom: 10px' href='' >
							&nbsp;Reject&nbsp;</a>
							</div>";
                        }
                        ?>
                        <?php echo form_close(); ?>

                        <div class="col-lg-9 hide"><br>
                            &nbsp; &nbsp;<label class="label label-primary"> Assigned Lawyer: Atty. Milabel Cristobel</label>
                            &nbsp; <label class="label label-info"> Assigned Interns: Mihaela Mamenta, Lewin Gaw</label>
                        </div>
                    </div>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="clientInfo">
                            <?php $this->load->view('director/viewApplication/viewclientinfo'); ?>
                        </div>
                        <div class="tab-pane" id="caseFacts">
                            <?php $this->load->view('director/viewApplication/viewcasefacts'); ?>
                        </div>
                        <div class="tab-pane" id="legalAdvice">
                            <?php $this->load->view('director/viewApplication/viewlegaladvice'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col-->
    </div>

    <!-- START OF ADD LINKED PERSON MODAL -->

    <div class="modal fade" id="assignModal">
        <div class="modal-dialog-assign">
            <div class="modal-content">
                <?php echo form_open(base_url() . "application/accept/$case->caseID", array('class' => 'form-horizontal')); ?>
                <div class="modal-header" style="background-color:#fabb3d;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Assign Lawyer and Interns</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-warning">
                        <h5><b>Title:</b> <?php echo $case->caseName ?></h5>
                        <h5><b>Current Stage:</b> <?php echo $case->stageName ?></h5>
                        <h5><b>Offense:</b>
                            <?php foreach ($caseoffense as $o) : ?>
                                <label class="label label-danger"><?php echo "$o->offenseName ($o->stage)" ?></label>
                                <?php $offenseID = $o->offenseID ?>
                            <?php endforeach; ?>
                        </h5>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-lg-5">

                            <h3> Assign Lawyer: </h3>

                            <table id='assignlawyertable' class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Specialization</th>
                                        <th>Caseload</th>
                                    </tr>
                                </thead>
                                <tbody class="openCase-table">
                                    <?php $count = 0; ?>
                                    <?php foreach ($specialize as $lawyer): ?>
                                        <?php foreach ($lawyer as $l): ?>
                                            <tr style="background-color:#e8f1da;";>
                                                <td align="center"><input type="checkbox" class="case" name="lawyer[]" value="<?php echo $l->personID ?>"/></td>
                                                <td><?php echo "$l->firstname $l->lastname" ?></td>
                                                <td><?php echo $l->offenseName ?></td>
                                                <td><?php echo $l->caseload ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    <?php foreach ($nonspecialize as $lawyer): ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="case" name="lawyer[]" value="<?php echo $lawyer->personID ?>"/></td>
                                            <td><?php echo "$lawyer->firstname $lawyer->lastname" ?></td>
                                            <td><?php echo $lawyer->offenseName ?></td>
                                            <td><?php echo $lawyer->caseload ?></td>
                                        </tr>
                                        <?php
                                        $count++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-1"></div>

                        <div class="col-lg-6">

                            <h3> Assign Intern/s: </h3>

                            <table id='assigninternstable' class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Caseload</th>
                                        <th>Similar Case</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    <?php foreach ($interns as $intern): ?>
                                        <tr <?php if ($count == 0) echo 'style="background-color:#e8f1da;"'; ?>>
                                            <td align="center"><input type="checkbox" class="case" name="intern[]" value="<?php echo $intern->personID ?>"/></td>
                                            <td><?php echo "$intern->firstname $intern->lastname" ?></td>
                                            <td><?php echo "$intern->caseload" ?></td>
                                            <td><?php echo $this->People_model->select_similar($intern->personID, $offenseID)->similar ?></td>
                                        </tr>
                                        <?php
                                        $count++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <br>

                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-warning'), 'Assign'); ?>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
    <!-- END OF ADD LINKED PERSON MODAL -->

</div>
