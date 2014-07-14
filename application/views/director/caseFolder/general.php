<div class="container">

    <div class="row">
        <br>

        <div class="col-lg-5">

            <!-- Case Summary -->
            <div class="box">
                <div class="box-header"><h2><i class="icon-reorder"></i>Case Summary</h2>
                    <div class="box-icon">
                        <a href="#editCaseSummaryModal" data-toggle="modal"><i class="icon-edit"></i></a>
                    </div>
                </div>
                <div class="box-content" id="boxcontent">

                    <table class="table table-striped">
                        <tr>
                            <th>File No. : </th>
                            <td><?php echo $case->caseNum ?></td>
                        </tr>
                        <tr>
                            <th> Case Status:</th>
                            <td><?php echo $case->statusName; ?></td>
                        </tr>
                        <tr>
                            <th>Client Name:</th>
                            <td>
                                <?php $index = 0; ?>
                                <?php foreach ($caseclient as $client) { ?>
                                    <?php if ($index > 0) { ?>
                                        <?php echo ", $client->firstname $client->lastname" ?>
                                    <?php } else { ?>
                                        <?php echo "$client->firstname $client->lastname" ?>
                                    <?php } ?>
                                    <?php $index++; ?>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Offense:</th>
                            <td>
                                <?php foreach ($caseoffense as $off) : ?>
                                    <label class="label label-danger">
                                        <?php echo "$off->offenseName ($off->stage)" ?>
                                    </label>
                                <?php endforeach; ?>

                                <a href="#addOffenseModal" data-toggle="modal"><i class="icon-edit"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th>Present Stage:</th>
                            <td><?php echo $case->stageName ?></td>
                        </tr>
                        <tr>
                            <th>Client's Stand:</th>
                            <td><?php
                                if ($case->status == 5) {
                                    echo $casecloseclient[0]->typeName; 
                                } else {
                                    echo $caseclient[0]->typeName;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <th>Supervising Lawyer:</th>
                            <?php $count = 1 ?>
                            <td>
                                <?php if ($case->status == 5) { ?>
                                    <?php foreach ($casecloselawyers as $row): ?>
                                        <?php
                                        if ($count > 1) {
                                            echo ' ,';
                                        }
                                        ?>
                                        <img style="height: 20px" src="<?php echo base_url() . $row->image ?>">
                                        <?php echo "$row->firstname $row->lastname"; ?>
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <?php foreach ($caselawyers as $row): ?>
                                        <?php
                                        if ($count > 1) {
                                            echo ' ,';
                                        }
                                        ?>
                                        <img style="height: 20px" src="<?php echo base_url() . $row->image ?>">
                                        <?php echo "$row->firstname $row->lastname"; ?>
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Date Opened:</th>
                            <td><?= date("F j, Y  h:i a", strtotime($case->dateReceived)) ?></td>
                        </tr>
                        <tr>
                            <th> Case Description:</th>
                            <td><?php echo $case->caseDesc ?></td>
                        </tr>
                        <tr>
                            <th><a class ="btn btn-link" style='margin-bottom: 10px' href="#viewNarrativeModal" data-toggle="modal">
                                    View Narrative</a>
                            </th>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Case Numbers -->
            <div class="box">
                <div class="box-header"><h2><i><b>#</b></i>Case Numbers</h2>
                    <div class="box-icon">
                        <a href="#addCaseNumberModal" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content" id="boxcontent">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Forum</th>
                                <th>Case Number</th>
                                <th>Case Status</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($casecourt as $row): ?>
                                <tr>
                                    <td><?php echo $row->court ?></td>
                                    <td><?php echo $row->casenumber ?></td>
                                    <td><?php echo $row->statusName ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Interns -->
            <div class="box">
                <div class="box-header"><h2><i class="icon-user"></i>Interns</h2></div>
                <div class="box-content" id="boxcontent">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php if ($case->status == 5) { ?>
                                <?php foreach ($casecloseinterns as $row) : ?>
                                    <tr>
                                        <td><img style="height: 20px" src="<?php echo base_url() . $row->image ?>"> </td>
                                        <td><?php echo $row->firstname . " " . $row->lastname ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php foreach ($caseinterns as $row) : ?>
                                    <tr>
                                        <td><img style="height: 20px" src="<?php echo base_url() . $row->image ?>"></td>
                                        <td><?php echo $row->firstname . " " . $row->lastname ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tags -->
            <div class="box">
                <div class="box-header"><h2><i class="icon-tags"></i>Tags</h2>
                    <div class="box-icon">
                        <a href="#addTagsModal" data-toggle="modal"><i class="icon-edit"></i></a>
                    </div>
                </div>
                <div class="box-content" id="boxcontent">
                    <?php $tags = explode(' #', $case->tags); ?>
                    <?php foreach ($tags as $tag): ?>
                        <label class="label label-primary">
                            <i class="icon-tag">&nbsp; <?php echo $tag ?></i>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <div class="col-lg-1"></div>

        <!-- start: Timeline -->
        <div class="col-md-6">
            <div class="box">
                <div class="box-header"><h2><i class="icon-time"></i>Timeline</h2>
                    <div class="col-lg-6 pull-right" style='margin: 4px 10px 0 0'>
                        <?php echo form_input(array('id' => 'searchtimeline', 'name' => 'searchtimeline', 'placeholder' => 'Search Timeline', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="box-content timelineboxcontent" id="boxcontent">

                    <!-- START - 4: TRIAL COURT (TC)-->
                    <?php if ($caselog_stage4 != null) { ?>
                        <div class="box" style="margin-bottom:2px;" id="timeline-tc"> <!--box 1-->

                            <div class="box-header" style="background-color: #E3ECD4; color:gray;">
                                <h2><i class="icon-" style="background-color: #B5DB7D; color:gray;">4</i>Trial Court</h2>
                                <div class="box-icon" style="background-color: #B5DB7D; color:gray; border-width:0px;">
                                    <a href="widgets.html#" class="btn-minimize"><i class="icon-chevron-up" style="color:gray;"></i></a>
                                </div>
                            </div>

                            <div id='timelinetcdiv' class="box-content">
                                <div class="graph">

                                    <div class="timeline" id="timeline-div">

                                        <?php foreach ($caselog_stage4 as $log) : ?>
                                            <div class="timeslot">

                                                <div class="task">
                                                    <span>
                                                        <span class="type">
                                                            <?= $log->category ?>
                                                        </span>
                                                        <span class="details">
                                                            <?= $log->action ?>
                                                        </span> 
                                                    </span>
                                                    <div class="arrow"></div>
                                                </div>    

                                                <div class="icon">
                                                    <?php
                                                    if ($log->category == 'EVIDENCE')
                                                        echo '<i class="icon-inbox"></i>';
                                                    else if ($log->category == 'CASE')
                                                        echo '<i class="icon-folder-open"></i>';
                                                    else if ($log->category == 'CALENDAR')
                                                        echo '<i class="icon-calendar"></i>';
                                                    else if ($log->category == 'DOCUMENT')
                                                        echo '<i class="icon-file"></i>';
                                                    else if ($log->category == 'PEOPLE')
                                                        echo '<i class="icon-group"></i>';
                                                    else if ($log->category == 'ACTIONPLAN')
                                                        echo '<i class="icon-legal"></i>';
                                                    ?>
                                                </div>

                                                <div class="time">
                                                    <?= date("F j, Y  h:i a", strtotime($log->dateTime)) ?>
                                                </div>  
                                            </div><?php endforeach ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- END - 4: TRIAL COURT (TC) -->

                    <!-- START - 3: PRE-TRIAL (PT) -->
                    <?php if ($caselog_stage3 != null) { ?>
                        <div class="box" style="margin-bottom:2px;" id="timeline-pt"> <!--box 1-->

                            <div class="box-header" style="background-color: #E3ECD4; color:gray;">
                                <h2><i class="icon-" style="background-color: #B5DB7D; color:gray;">3</i>Pre-Trial</h2>
                                <div class="box-icon" style="background-color: #B5DB7D; color:gray; border-width:0px;">
                                    <a href="widgets.html#" class="btn-minimize"><i class="icon-chevron-up" style="color:gray;"></i></a>
                                </div>
                            </div>

                            <div id='timelineptdiv' class="box-content">
                                <div class="graph">

                                    <div class="timeline" id="timeline-div">

                                        <?php foreach ($caselog_stage3 as $log) : ?>
                                            <div class="timeslot">

                                                <div class="task">
                                                    <span>
                                                        <span class="type">
                                                            <?= $log->category ?>
                                                        </span>
                                                        <span class="details">
                                                            <?= $log->action ?>
                                                        </span> 
                                                    </span>
                                                    <div class="arrow"></div>
                                                </div>    

                                                <div class="icon">
                                                    <?php
                                                    if ($log->category == 'EVIDENCE')
                                                        echo '<i class="icon-inbox"></i>';
                                                    else if ($log->category == 'CASE')
                                                        echo '<i class="icon-folder-open"></i>';
                                                    else if ($log->category == 'CALENDAR')
                                                        echo '<i class="icon-calendar"></i>';
                                                    else if ($log->category == 'DOCUMENT')
                                                        echo '<i class="icon-file"></i>';
                                                    else if ($log->category == 'PEOPLE')
                                                        echo '<i class="icon-group"></i>';
                                                    else if ($log->category == 'ACTIONPLAN')
                                                        echo '<i class="icon-legal"></i>';
                                                    ?>
                                                </div>

                                                <div class="time">
                                                    <?= date("F j, Y  h:i a", strtotime($log->dateTime)) ?>
                                                </div>  
                                            </div><?php endforeach ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- END - 3: PRE-TRIAL (PT) -->

                    <!-- START - 2: PI -->
                    <?php if ($caselog_stage2 != null) { ?>
                        <div class="box" style="margin-bottom:2px;" id="timeline-pi"> <!--box 1-->

                            <div class="box-header" style="background-color: #E3ECD4; color:gray;">
                                <h2><i class="icon-" style="background-color: #B5DB7D; color:gray;">2</i>Preliminary Investigation</h2>
                                <div class="box-icon" style="background-color: #B5DB7D; color:gray; border-width:0px;">
                                    <a href="widgets.html#" class="btn-minimize"><i class="icon-chevron-up" style="color:gray;"></i></a>
                                </div>
                            </div>

                            <div id='timelinepidiv' class="box-content">
                                <div class="graph">

                                    <div class="timeline" id="timeline-div">

                                        <?php foreach ($caselog_stage2 as $log) : ?>
                                            <div class="timeslot">

                                                <div class="task">
                                                    <span>
                                                        <span class="type">
                                                            <?= $log->category ?>
                                                        </span>
                                                        <span class="details">
                                                            <?= $log->action ?>
                                                        </span> 
                                                    </span>
                                                    <div class="arrow"></div>
                                                </div>    

                                                <div class="icon">
                                                    <?php
                                                    if ($log->category == 'EVIDENCE')
                                                        echo '<i class="icon-inbox"></i>';
                                                    else if ($log->category == 'CASE')
                                                        echo '<i class="icon-folder-open"></i>';
                                                    else if ($log->category == 'CALENDAR')
                                                        echo '<i class="icon-calendar"></i>';
                                                    else if ($log->category == 'DOCUMENT')
                                                        echo '<i class="icon-file"></i>';
                                                    else if ($log->category == 'PEOPLE')
                                                        echo '<i class="icon-group"></i>';
                                                    else if ($log->category == 'ACTIONPLAN')
                                                        echo '<i class="icon-legal"></i>';
                                                    ?>
                                                </div>

                                                <div class="time">
                                                    <?= date("F j, Y  h:i a", strtotime($log->dateTime)) ?>
                                                </div>  
                                            </div><?php endforeach ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- END - 2: PI -->

                    <!-- START - 1: NEW -->
                    <div class="box" style="margin-bottom:2px;" id="timeline-new"> <!--box 1-->

                        <div class="box-header" style="background-color: #E3ECD4; color:gray;">
                            <h2><i class="icon-" style="background-color: #B5DB7D; color:gray;">1</i>New</h2>
                            <div class="box-icon" style="background-color: #B5DB7D; color:gray; border-width:0px;">
                                <a href="widgets.html#" class="btn-minimize"><i class="icon-chevron-up" style="color:gray;"></i></a>
                            </div>
                        </div>

                        <div id='timelinenewdiv' class="box-content">
                            <div class="graph">

                                <div class="timeline" id="timeline-div">

                                    <?php foreach ($caselog_stage1 as $log) : ?>
                                        <div class="timeslot">

                                            <div class="task">
                                                <span>
                                                    <span class="type">
                                                        <?= $log->category ?>
                                                    </span>
                                                    <span class="details">
                                                        <?= $log->action ?>
                                                    </span> 
                                                </span>
                                                <div class="arrow"></div>
                                            </div>    

                                            <div class="icon">
                                                <?php
                                                if ($log->category == 'EVIDENCE')
                                                    echo '<i class="icon-inbox"></i>';
                                                else if ($log->category == 'CASE')
                                                    echo '<i class="icon-folder-open"></i>';
                                                else if ($log->category == 'EVENT')
                                                    echo '<i class="icon-calendar"></i>';
                                                else if ($log->category == 'DOCUMENT')
                                                    echo '<i class="icon-file"></i>';
                                                else if ($log->category == 'PEOPLE')
                                                    echo '<i class="icon-group"></i>';
                                                else if ($log->category == 'ACTIONPLAN')
                                                    echo '<i class="icon-legal"></i>';
                                                ?>
                                            </div>

                                            <div class="time">
                                                <?= date("F j, Y  h:i a", strtotime($log->dateTime)) ?>
                                            </div>  
                                        </div><?php endforeach ?>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END - 1: NEW -->

                </div>
            </div>
        </div>
        <!-- end: Timeline -->

    </div>

    <!-- START OF MODAL : VIEWNARRATIVEMODAL -->
    <div class="row">

        <div class="modal fade" id="viewNarrativeModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel"> Narrative : </h3>
                    </div>
                    <div class="modal-body">
                        <?php echo $case->appNarrative ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : VIEWNARRATIVEMODAL --> 

    <!-- START OF MODAL : EDITCASESUMMARYMODAL -->
    <div class="row col-lg-10 col-sm-11">
        <?php echo form_open(base_url() . "cases/editCase/$case->caseID/$case->caseName/$case->caseDesc", array('class' => 'form-horizontal')); ?>
        <div class="modal fade" id="editCaseSummaryModal">
            <div class="modal-dialog-editCaseSummary">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel"> Edit Case Summary </h3>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Case Title: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-9 control-group">
                                <div class="controls">
                                    <?php echo form_input(array('id' => 'edit_caseTitle', 'name' => 'edit_caseTitle', 'type' => 'text', 'class' => 'form-control', 'value' => "$case->caseName")); ?>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Description: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-9 control-group">
                                <div class="controls">
                                    <?php echo form_textarea(array('style' => 'height:70px', 'id' => 'edit_caseDescription', 'name' => 'edit_caseDescription', 'type' => 'text', 'class' => 'form-control', 'value' => "$case->caseDesc")); ?> 
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Save Changes'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
                <?php echo form_close(); ?>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : EDITCASESUMMARYMODAL --> 


    <!-- START OF MODAL : addOffenseModal -->
    <div class="row">

        <div class="modal fade" id="addOffenseModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php echo form_open('cases/addOffense', array('class' => 'form-horizontal')); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel">Edit Offense </h3>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center>     <h5> <b>Offense</b></h5></center>
                            </div>
                        </div>


                        <div class="col-sm-6 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <?php foreach ($offenses as $off): ?>
                                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                                    <?php endforeach; ?></select>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center>      <h5> <b>Offense Stage</b></h5></center>
                            </div>
                        </div>

                        <div class="col-sm-6 control-group">
                            <div class="controls">
                                <select id="caseoffensestagepenal" name="caseoffensestagepenal" class="form-control">
                                    <option>Attempted</option>
                                    <option>Frustrated</option>
                                    <option>Consumated</option>
                                    <option>N/A</option>
                                </select>
                            </div>
                        </div>

                        &nbsp; <button id='btneditoffensepenal' class="btn btn-success" type='button' style="margin-top:0px;"> Add</button>



                        <br>
                        <hr>

                        <table id='offensetable' class="table table-striped table-bordered">

                            <tr>
                                <th>Offense</th>
                                <th>Offense Stage</th>
                                <th></th>
                            </tr>


                            <?php foreach ($caseoffense as $row): ?>
                                <tr>
                                    <td><?php echo $row->offenseName ?></td>
                                    <td><?php echo $row->stage ?></td>
                                    <td><button class='btn btn-danger' type='button' id='remove_row'> <i class='icon-trash'></i> </button> </td>
                                </tr>
                            <?php endforeach; ?>

                        </table>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name='cid' value='<?php echo $case->caseID ?>'>
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Save'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : addOffenseModal --> 

    <!-- START OF MODAL : addCaseNumberModal -->
    <div class="row">

        <div class="modal fade" id="addCaseNumberModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php echo form_open('cases/caseNumber', array('class' => 'form-horizontal')); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel">Add Case Number </h3>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-4 control-group">
                            <div class="controls">
                                <center> <h5> Case Number </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'caseNumber', 'name' => 'caseNumber', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-4 control-group">
                            <div class="controls">
                                <center> <h5> Court </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <select id="caseforum" name="caseForum" class="form-control">
                                    <option value='-'>-</option>
                                    <option value='Barangay'>Barangay</option>
                                    <option value='Department of Justice'>Department of Justice</option>
                                    <option value='Regional Trial Court'>Regional Trial Court</option>
                                    <option value='Metropolitan Trial Court'>Metropolitan Trial Court</option> 
                                    <option value='Court of Appeals'>Court of Appeals</option> 
                                    <option value='Court of Tax'>Court of Tax</option>
                                    <option value='Ombudsman'>Ombudsman</option>
                                    <option value='Sandiganbayan'>Sandiganbayan</option>
                                </select>
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
                                <select id="appforum" name="caseStatus" class="form-control">
                                    <option value='3'>Active</option>
                                    <option value='8'>Inactive</option>
                                    <option value='9'>Dismissed</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <input type="hidden" name="caseID" value="<?php echo $case->caseID ?>">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Case Number'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : addCaseNumberModal --> 

    <!-- START OF MODAL : addTagsModal -->
    <div class="row">

        <div class="modal fade" id="addTagsModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php echo form_open(base_url() . "cases/EditCaseTags/", array('class' => 'form-horizontal')); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel">Edit Tags</h3>
                    </div>
                    <div class="modal-body">
                        <select  multiple class="chosen-select" tabindex="8">

                            <?php $tags = explode(' #', $case->tags); ?>
                            <?php foreach ($tags as $tag): ?>
                                <option selected><?php echo $tag ?></option>
                            <?php endforeach; ?>

                            <?php foreach ($offenses as $off): ?>
                                <option  value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                            <?php endforeach; ?>
                        </select>             
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="caseID" value="<?php echo $case->caseID ?>">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Save'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : addTagsModal --> 


    <!-- START OF MODAL : DELETE offense -->
    <div class="row">

        <div class="modal fade" id="deleteOffenseModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Offense</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Offense?</p>
                        Offense: (Offense/Specific)
                        <center>
                            <button type="button" class="btn btn-success">Yes</button> &nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </center>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : DELETE Appointment --> 

    <?php echo form_close(); ?>
</div>
