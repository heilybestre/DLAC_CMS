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
                            <td><?php echo "$client->firstname $client->middlename $client->lastname" ?></td>
                        </tr>
                        <tr>
                            <th>Offense:</th>
                            <td>
                                <?php foreach ($caseoffense as $off) : ?>
                                <label class="label label-danger">
                                    <?php echo "$off->offense ($off->stage)" ?>
                                </label><?php endforeach; ?>

                                <a href="#addOffenseModal" data-toggle="modal"><i class="icon-edit"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th>Present Stage:</th>
                            <td><?php echo $case->stageName ?></td>
                        </tr>
                        <tr>
                            <th>Client's Stand:</th>
                            <td><?php echo $client->typeName ?></td>
                        </tr>
                        <tr>
                            <th>Supervising Lawyer:</th>
                            <?php $count = 1 ?>
                            <td>
                                <?php foreach ($caselawyers as $row): ?>
                                <?php
                                if ($count > 1) {
                                    echo ' ,';
                                }
                                ?>
                                <img style="height: 20px" src="<?php echo base_url() . $row->image ?>">
                                <?php echo "$row->firstname $row->lastname"; ?>
                                <?php $count++ ?><?php endforeach; ?>
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
                            </tr><?php endforeach; ?>
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
                            <?php foreach ($caseinterns as $row) : ?>
                            <tr>
                                <td><center><img style="height: 20px" src="<?php echo base_url() . $row->image ?>"></center></td>
                                <td><?php echo $row->firstname . " " . $row->lastname ?></td>
                            </tr><?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tags -->
            <div class="box">
                <div class="box-header"><h2><i class="icon-tags"></i>Tags</h2>
                    <div class="box-icon">
                        <a href="#addTagsModal" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content" id="boxcontent">
                    <?php $tags = explode(' #', $case->tags); ?>
                    <?php foreach ($tags as $tag): ?>
                    <label class="label label-primary">
                        <i class="icon-tag">&nbsp; <?php echo $tag ?></i>
                    </label><?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-1"></div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-header"><h2><i class="icon-time"></i>Timeline</h2>
                </div>
                <div class="box-content" id="boxcontent" style="min-height:1000px; max-height:1000px; overflow:scroll;">

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

                                    <?php foreach($caselog_stage1 as $log) : ?>
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
                                            else if($log->category == 'CASE')
                                                echo '<i class="icon-folder-open"></i>';
                                            else if($log->category == 'CALENDAR')
                                                echo '<i class="icon-calendar"></i>';
                                            else if($log->category == 'DOCUMENT')
                                                echo '<i class="icon-file"></i>';
                                            else if($log->category == 'PEOPLE')
                                                echo '<i class="icon-group"></i>';
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
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : EDITCASESUMMARYMODAL --> 


    <!-- START OF MODAL : addOffenseModal -->
    <div class="row">

        <div class="modal fade" id="addOffenseModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel">Add Offense </h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <h5> <center><b>Source</b></center></h5>
                            </div>
                        </div>

                        <div class="form-inline">
                            <div class="controls">
                                <center>
                                    <label class="radio" for="offenseSource-1">
                                        <input type="radio" name="offenseSource" value="Revised Penal Code" onclick="location.href = 'javascript:toggleRPC();';">
                                        Revised Penal Code
                                    </label>
                                    <label class="radio" for="offenseSource-0">
                                        <input type="radio" name="offenseSource" value="Special Penal Law"  onclick="location.href = 'javascript:toggleSpecial();';">
                                        Special Penal Law
                                    </label> &nbsp;
                                </center>
                            </div>
                        </div>
                        <br>
                        <div id="caseOffensePenal" style="display: none">

                            <div class="col-sm-3 control-group">
                                <div class="controls">
                                    <h5> <center><b>Offense</b></center></h5>
                                </div>
                            </div>

                            <div class="col-sm-6 control-group">
                                <div class="controls">
                                    <select id="caseOffensePenal" name="caseOffensePenal" class="form-control"> 
                                        <optgroup label="Penal Code">
                                            <optgroup label="&nbsp;&nbsp;&nbsp;Crimes Against Public Order"> 
                                                <option>Illegal Possession of Firearms</option>
                                                <option>Inciting to rebellion or insurrection</option>
                                                <option>Sedition</option>                    
                                            </optgroup>
                                        </optgroup> 
                                    </select>
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-3 control-group">
                                <div class="controls">
                                    <h5> <center><b>Offense Stage</b></center></h5>
                                </div>
                            </div>

                            <div class="col-sm-6 control-group">
                                <div class="controls">
                                    <select id="appoffensestage" name="appoffensestage" class="form-control">
                                        <option>Attempted</option>
                                        <option>Frustrated</option>
                                        <option>Consumated</option>
                                        <option>N/A</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div id="caseOffenseSpecial" style="display: none">

                            <div class="col-sm-3 control-group">
                                <div class="controls">
                                    <h5> <center><b>Offense</b></center></h5>
                                </div>
                            </div>

                            <div class="col-sm-6 control-group">
                                <div class="controls">
                                    <select name="caseOffenseSpecial" class="form-control">
                                        <optgroup label="Special Laws">
                                            <option>Anti-Carnapping Act of 1972</option>
                                            <option>Anti-Child Pornography Act of 2009</option>
                                            <option>Anti-Hazing Law</option>
                                            <option>Anti-Photo and Video Voyeurism Act of 2009</option>
                                            <option>Anti-Sexual Harrassment Act of 1995</option> 
                                            <option>Anti-Violence Against Women and Their Children Act of 2004</option>
                                            <option>Anti-Violence Against Women and their Children Act of 2004</option>
                                            <option>Anti-Wire Tapping Act</option>
                                            <option>Bouncing Checks Law</option>
                                            <option>Human Security Act of 2007</option>
                                            <option>Juvenile Justice and Welfare Act of 2006</option>
                                            <option>Special Protection of Children Against Child Abuse, Exploitation and Discrimination Act</option>
                                            <option>The Comprehensive Dangerous Drugs Act of 2002</option>
                                        </optgroup>  
                                    </select>
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-3 control-group">
                                <div class="controls">
                                    <h5> <center><b>Offense Stage</b></center></h5>
                                </div>
                            </div>

                            <div class="col-sm-6 control-group">
                                <div class="controls">
                                    <select id="appoffensestage" name="appoffensestage" class="form-control">
                                        <option>N/A</option>
                                        <option>Attempted</option>
                                        <option>Frustrated</option>
                                        <option>Consumated</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Offense'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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
                                <select id="caseforum" name="caseforum" class="form-control">
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
                                <select id="appforum" name="appforum" class="form-control">
                                    <option value='Active'>Active</option>
                                    <option value='Inactive'>Inactive</option>
                                    <option value='Dismissed'>Dismissed</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Offense'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel">Add Tags</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 control-group">
                            <div class="controls">
                                <?php echo form_textarea(array('id' => 'caseTags', 'placeholder' => 'Separate tags with comma', 'name' => 'caseTags', 'type' => 'text', 'class' => 'form-control', 'style' => 'height:200px;')); ?>
                            </div>
                        </div>
                        <br>                    
                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Tags'); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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
