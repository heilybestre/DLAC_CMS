<div id="content" class="col-lg-10 col-sm-11 bodycontent">

    <?php
    $residencyword = '';
    $remainderword = '';
    if (empty($person->residency)) {
        $residency = explode(":", '00:00:00');
        $remainder = explode(":", '150:00:00');
    } else {
        $residency = explode(":", $person->residency);
        $remainder = explode(":", $person->remainder);
    }

    if ($residency[0] != 00) {
        $residencyword .= $residency[0];
        if ($residency[0] > 1) {
            $residencyword .= ' hours';
        } else {
            $residencyword .= ' hour';
        }
    }

    if ($residency[1] != 00) {
        $residencyword .= ' and ' . $residency[1];
        if ($residency[1] > 1) {
            $residencyword .= ' minutes';
        } else {
            $residencyword .= ' minute';
        }
    }

    if ($residency[2] != 00) {
        $residencyword .= ' and ' . $residency[2];
        if ($residency[2] > 1) {
            $residencyword .= ' seconds';
        } else {
            $residencyword .= ' second';
        }
    }

    if ($remainder[0] != 00) {
        $remainderword .= $remainder[0];
        if ($remainder[0] > 1) {
            $remainderword .= ' hours';
        } else {
            $remainderword .= ' hour';
        }
    }

    if ($remainder[1] != 00) {
        $remainderword .= ' and ' . $remainder[1];
        if ($remainder[1] > 1) {
            $remainderword .= ' minutes';
        } else {
            $remainderword .= ' minute';
        }
    }

    if ($remainder[2] != 00) {
        $remainderword .= ' and ' . $remainder[2];
        if ($remainder[2] > 1) {
            $remainderword .= ' seconds';
        } else {
            $remainderword .= ' second';
        }
    }

    $percentage = ($residency[0]) / (150) * 100;
    if ($percentage > 100) {
        $percentage = 100;
        $remainderword = '0 hour';
        $residencyword = '150 hours';
    }
    if ($percentage <= 0) {
        $percentage = 0;
        $remainderword = '150 hour';
        $residencyword = '0 hours';
    }
    ?>

    <?php if ($remainder[0] <= 0 && $remainder[1] <= 0 && $remainder[2] <= 0) { ?>
        <div class="alert alert-success" style="padding:2px; margin-bottom:1px;" id="completeResidencyHours">
            <h5 style = "margin-left:15px;"> Congratulations!You have completed the required residency hours. To apply ALL of your cases for transfer, click<a href="<?= base_url() ?>cases/caseApplytotransfer_auto/<?= $this->session->userdata('userid') ?>" class = "btn btn-link" style = 'margin-top:0px; margin-bottom:2px;'>here</a>. </h5>
        </div>
    <?php } ?>

    <br>
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
                                <th id="hi" width="25%">Time</th>
                                <th width="50%">Appointment</th>
                                <th width="25%"></th>
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
                        <?php endforeach; ?>
                        </tr>
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
                                <th>Assigned by</th>
                                <th></th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($thingstodo as $row): ?>
                                <tr>
                                    <td class="center"><?php echo $row->task ?></td>
                                    <td class="center"><?php echo $this->Case_model->select_case($row->caseID)->caseNum ?></td>
                                    <td class="center"><?php echo $row->notes ?></td>
                                    <td class="center"><?php echo $row->bfirstname . ' ' . $row->blastname ?></td>
                                    <td class="center">
                                        <?php if ($row->summary == NULL) { ?>
                                            <a class="btn btn-success" title="Done" href="#doneTaskModal" data-toggle="modal" onclick="doneclick(<?php echo $row->taskID ?>)">
                                                <i class="icon-ok"></i>  
                                            </a>
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
        <div class="col-lg-12">
            <div class="box span4" onTablet="span6" onDesktop="span4">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Cases</h2>
                </div>
                <div class="box-content box-dashboard">
                    <br>
                    <table class="table table-striped table-bordered datatable" id="dashboard-cases" data-provides="rowlink">
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
                                    <td><?php echo $row->dateReceived ?></td>
                                    <td>
                                        <?php
                                        $offenses = explode(",", $row->offense);
                                        if ($offenses != NULL) {
                                            $offensename = '';
                                            for ($index = 0; $index < count($offenses); $index++) {
                                                if ($index > 0) {
                                                    echo $offensename . ', ' . $this->Case_model->select_stroffense($offenses[$index])->offenseName;
                                                } else {
                                                    echo $offensename . $this->Case_model->select_stroffense($offenses[$index])->offenseName;
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo "$row->firstname $row->lastname" ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div><!--/col-->

    </div><!--/row--> 

    <div class="row">
        <div class="box span4" onTablet="span6" onDesktop="span4">
            <div class="box-header">
                <h2><i class="icon-list"></i>Residency Hours</h2>
            </div>
            <div class="box-content">
                <br>
                <div class="progress progress-striped progress-bar-info" data-toggle="tooltip" title="Rendered Hours: <?php echo substr($percentage, 0, 2) ?>%">
                    <div class="progress-bar"  role="progressbar" aria-valuemin="0" aria-valuemax="150" aria-valuenow="0"  style="width: <?php echo $percentage; ?>%">
                        <span class="sr-only">20% Complete</span>
                    </div>
                </div>

                <span> Hours to go: <?php echo $remainderword ?> </span>
            </div>
        </div>
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
                        <p>To confirm this action, please briefly discuss what happened in this appointment:</p>
                        <div class="controls">
                            <textarea id="limit" rows="6" style="width:100%"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Confirm</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : DONE Appointment -->


    <!-- START OF MODAL : EDIT Appointment -->
    <div class="row">

        <div class="modal fade" id="editAppointmentModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Appointment</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Appointment </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Date </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option></option>
                                    <option>Month</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option></option>
                                    <option>Day</option>
                                </select>        
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option></option>
                                    <option>Year</option>
                                </select>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Time </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option></option>
                                    <option>Hour</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option></option>
                                    <option>Minute</option>
                                </select>        
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Location </h5> </center>
                            </div>
                        </div>

                        <div class="form-inline">
                            <div class="controls">
                                <label class="radio" for="appointmentLocation-0">
                                    <input type="radio" name="appointmentLocation" id="appointmentLocation-0" value="In the Clinic" checked="checked">
                                    In the Clinic
                                </label> &nbsp;
                                <label class="radio">
                                    <input type="radio" name="appointmentLocation" id="appointmentLocation-1" value="Outside the Clinic">
                                    Outside the Clinic
                                </label>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Other Interviewers </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-9 control-group">
                                <div class="controls">
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
                        <p>The legal secretary will re-assign this appointment to another intern.</p>
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
                <?php echo form_open(base_url() . 'cases/doneTask/'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Task</h4>
                    </div>
                    <div class="modal-body">
                        <p>To confirm this action, please briefly discuss what you did for the task:</p>
                        <div class="controls">
                            <textarea id="limit" name="summary" rows="6" style="width:100%"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="hidden" id="taskID" name="taskID" value="">
                        <input type="submit" name="submit" value="Confirm" class="btn btn-success">
                    </div>
                </div><!-- /.modal-content -->
                <?php echo form_close(); ?>
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

</div>
