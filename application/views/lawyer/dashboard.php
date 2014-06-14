<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->

    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-calendar"></i>Today's Appointments</h2>
                    <div class="box-icon">
                        <a href="<?= base_url() ?>calendar" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content box-dashboard">

                    <br>
                    <table class="table table-striped table-bordered datatable" id="dashboard-appo">
                        <thead>
                            <tr>
                                <th width="20%">Time</th>
                                <th width="50%">Appointment</th>
                                <th width="30%"></th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($appointments as $row): ?>
                                <tr>
                                    <td class="center"><?php echo date('h:i a', strtotime($row->start)) . '-' . date('h:i a', strtotime($row->end)) ?></td>
                                    <td class="center">
                            <tabletitle><?php echo $row->title ?></tabletitle><br>
                            <tabledesc>
                                <?php
                                $attendees = $this->Calendar_model->select_attendees($row->scheduleID);
                                $count = 0;
                                foreach ($attendees as $attendee) {
                                    if ($count != 0)
                                        echo ', ' . $this->People_model->getuserfield('firstname', $attendee->userID) . ' ' . $this->People_model->getuserfield('lastname', $attendee->userID);
                                    else
                                        echo $this->People_model->getuserfield('firstname', $attendee->userID) . ' ' . $this->People_model->getuserfield('lastname', $attendee->userID);
                                    $count++;
                                }
                                ?>
                            </tabledesc>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#doneAppointmentModal" data-toggle="modal">
                                    <i class="icon-ok" title="Done"></i>  
                                </a>
                                <a class="btn btn-info" href="#editAppointmentModal" data-toggle="modal">
                                    <i class="icon-edit" title="Edit"></i>  
                                </a>
                                <a class="btn btn-warning" href="#cannotGoAppointmentModal" data-toggle="modal">
                                    <i class="icon-ban-circle" title="Cannot Attend"></i>  
                                </a>
                                <a class="btn btn-danger" href="#deleteAppointment" data-toggle="modal">
                                    <i class="icon-trash" title="Delete"></i> 
                                </a>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div><!--/col-->

        <div class="col-lg-6">
            <div class="box span4" onTablet="span6" onDesktop="span4">
                <div class="box-header">
                    <h2><i class="icon-check"></i>Things To-Do</h2>
                    <div class="box-icon">
                        <a href="<?= base_url() ?>calendar" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content box-dashboard">

                    <br>
                    <table class="table table-striped table-bordered datatable" id="dashboard-tasks">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Case Number</th>
                                <th>Notes</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($thingstodo as $row) : ?>
                                <tr>
                                    <td class="center"><?php echo $row->task ?></td>
                                    <td class="center"><?php echo $this->Case_model->select_case($row->caseID)->caseNum ?></td>
                                    <td class="center"><?php echo $row->notes ?></td>
                                    <td class="center"><?php echo "$row->firstname $row->lastname" ?></td>
                                    <td class="center">
                                        <?php if ($row->summary == NULL) { ?>
                                            <label class='label label-warning'>In Progress</label>
                                        <?php } else { ?>
                                            <label class='label label-default'>Completed</label>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div><!--/col-->

    </div><!--/row--> 

    <br>

    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2><i class="icon-list"></i>Legal Document Drafts</h2>
            </div>
            <div class="box-content box-dashboard">

                <br>
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="25%">No.</th>
                            <th width="50%">Title</th>
                            <th width="25%">Status</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($drafts as $row): ?>
                            <tr>
                                <td class="center"><?php echo $row->caseNum ?></td>
                                <td class="center"><?php echo $row->file_name ?></td>
                                <td class="center"><?php echo $row->status ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>   
                <a class="btn btn-link" href="#viewDraftModal" data-toggle="modal">View Legal Document Draft</a> 
            </div>
        </div>

    </div><!--/row--> 

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Cases</h2>
                </div>
                <div class="box-content box-dashboard">

                    <br>
                    <table class="table table-striped table-bordered datatable" id="dashboard-drafts" data-provides="rowlink">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Date Accepted</th>
                                <th>Offense</th>
                                <th>Supervising Lawyer</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($cases as $row) : ?>
                                <tr>
                                    <td class="center"><a href="cases/caseFolder/<?php echo $row->caseID ?>"><?php echo $row->caseNum ?></a></td>
                                    <td class="center"><?php echo $row->caseName ?></td>
                                    <td class="center"><?php echo $row->dateReceived ?></td>
                                    <td class="center"><?php echo $row->offense ?></td>
                                    <td class="center"><?php echo "$row->firstname $row->lastname" ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div><!--/col-->
    </div>


    <!-- START OF MODAL : DONE Appointment -->
    <div class="row">

        <div class="modal fade" id="doneAppointmentModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Appointment</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you have attended this appointment?</p>
                        <center><button type="button" class="btn btn-success">Yes</button> &nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : DONE Appointment -->


    <!-- START OF MODAL : EDIT Appointment -->
    <div class="row">
        <?php echo form_open(base_url() . 'lawyer/editAppointment', array('class' => 'form-horizontal')); ?>

        <div class="modal fade" id="editAppointmentModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Appointment</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Appointment </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control', 'name' => 'editappt_title')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Date </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" class="form-control date-picker" id="editappt_date" name="editappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                </div>
                            </div>
                        </div>


                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Time </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <div class="input-group bootstrap-timepicker">
                                    <span class="input-group-addon"><i class="icon-time"></i></span>
                                    <input type="text" class="form-control timepicker" id="editappt_time" name="editappt_time" value="<?php echo $timenow; ?>">
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Location </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group form-inline">
                            <div class="controls">
                                <div style='margin-bottom: -10px;'>
                                    <label class="radio" for="appointmentLocation-0">
                                        <input type="radio" name="editappt_type" id="appointmentLocation-0" value="In the Clinic" checked="checked">
                                        In the Clinic
                                    </label> &nbsp;
                                    <label class="radio">
                                        <input type="radio" name="editappt_type" id="appointmentLocation-1" value="Outside the Clinic">
                                        Outside the Clinic
                                    </label>
                                </div>
                                <br>
                                <?php echo form_input(array('class' => 'form-control', 'name' => 'editappt_place', 'placeholder' => 'Exact Location')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Attendees </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <div class="tbl-attendees">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                                            <td>HauLo, Osh</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                                            <td>Laylo, Jal</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                                            <td>Pilapil, Chip</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                                            <td>Sy, Diana</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                                            <td>van Opstal, Arnold</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                                            <td>Ganda, Vice</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br><br><br><br><br>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Save Changes'); ?>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php echo form_close(); ?>
    </div>
    <!-- END OF MODAL : EDIT Appointment -->

    <!-- START OF MODAL : CANNOT ATTEND Appointment -->
    <div class="row">

        <div class="modal fade" id="cannotGoAppointmentModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Request to Re-assign Appointment</h4>
                    </div>
                    <div class="modal-body">
                        <p>Why can't you attend?</p>
                        <div class="controls">
                            <textarea id="limit" rows="4" style="width:100%"></textarea>
                        </div>
                        <br>
                        <p>The legal secretary will re-assign this appointment.</p>
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Possible Substitute </h5> </center>
                            </div>
                        </div>
                        <div class="col-sm-4 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option></option>
                                    <option>Interns</option>
                                </select>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Confirm</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : CANNOT ATTEND Appointment -->          

    <!-- START OF MODAL : DELETE Appointment -->
    <div class="row">

        <div class="modal fade" id="deleteAppointment">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Appointment</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Appointment?</p>
                        <center><button type="button" class="btn btn-success">Yes</button> &nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : DELETE Appointment --> 

    <!-- START OF MODAL : DONE Task -->
    <div class="row">

        <div class="modal fade" id="doneTaskModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Task</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you are done with this task?</p>
                        <center><button type="button" class="btn btn-success">Yes</button> &nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : DONE Task -->

    <!-- START OF MODAL : DELETE Task -->
    <div class="row">

        <div class="modal fade" id="deleteTaskModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Task</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this task?</p>
                        <center><button type="button" class="btn btn-success">Yes</button> &nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : DELETE Task --> 


    <!-- START OF MODAL : VIEW STATUS CHANGE REQUEST -->
    <div class="row">

        <div class="modal fade" id="statusChangeModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Status Change Request</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Current Stage </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Current Stage)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Move to Stage </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Move to Stage)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Document Needed </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Doc Needed)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">

                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                File
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Approve</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- START OF MODAL : VIEW STATUS CHANGE REQUEST --> 

    <!-- START OF MODAL : VIEW DRAFT MODAL-->
    <div class="row">

        <div class="modal fade" id="viewDraftModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Legal Document Draft</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Document Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Document Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Document Type </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Entry of...)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Draft by </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <h5> (Intern) </h5>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">

                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <a class="btn btn-link">View Draft</a>
                            </div>
                        </div>


                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">Version</th>
                                    <th width="20%">Date Uploaded</th>
                                    <th width="20%">Lawyer's Comments</th>
                                    <th width="20%">Status</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>  

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Approve</button>
                        <a class="btn btn-danger" href="#rejectDraftModal" data-toggle="modal">Reject</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- START OF MODAL : VIEW STATUS CHANGE REQUEST --> 

    <!-- START OF MODAL : REJECT DRAFT-->
    <div class="row">

        <div class="modal fade" id="rejectDraftModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Draft Rejected</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Document Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Document Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Version </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <h5> (Version) </h5>
                            </div>
                        </div>

                        <br><br><br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Comment </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <textarea id="text" style="width:100%; height:50px;"></textarea>
                            </div>
                        </div>
                        <br><br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Confirm</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- START OF MODAL : VIEW STATUS CHANGE REQUEST --> 

</div><!-- end: Content -->
