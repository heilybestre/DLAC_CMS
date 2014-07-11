<div class="container">
    <?php echo form_open(base_url() . 'caseFolder/events', array('class' => 'form-horizontal')); ?>
    <br>

    <div class="row">
        <div class="box">
            <div class="box-header">
                <h2><i class="icon-calendar"></i>Appointments</h2>
                <div class="box-icon">
                    <a href="#addAppointmentModal" data-toggle="modal"><i class="icon-plus"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th width="10%">Date</th>
                            <th width="10%">Time</th>
                            <th width="34%">Appointment</th>
                            <th width="20%"></th>
                            <th width="30%"></th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($appointments as $row) : ?>
                            <tr>
                                <td class="center"><?php echo $row->date ?></td>
                                <td class="center"><?php echo "$row->timestart - $row->timeend" ?></td>
                                <td class="center">
                                    <tabletitle><?php echo $row->title ?></tabletitle><br>
                                    <tabledesc><?php echo $row->attendee ?></tabledesc>
                                </td>
                                <td class="center"><?php echo $row->type ?></td>
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

    <div class="row">
        <div class="box span4" onTablet="span6" onDesktop="span4">
            <div class="box-header">
                <h2><i class="icon-check"></i>Things To-Do</h2>
                <div class="box-icon">
                    <a href="#addTaskModal" data-toggle="modal"><i class="icon-plus"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th width="15%">Due Date</th>
                            <th width="40%">Task</th>
                            <th width="20%">Assigned by</th>
                            <th width="15%"></th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($thingstodo as $row) : ?>
                            <tr>
                                <td class="center"><?php echo $row->dateDue . "<br>(" . $row->daysLeft . " days left)" ?></td>
                                <td class="center"><?php echo $row->task ?></td>
                                <td class="center"><?php
                                    if ($this->session->userdata('userid') != $row->assignedBy) {
                                        echo $row->firstName . " " . $row->lastName;
                                    } else {
                                        echo "You";
                                    }
                                    ?></td>
                                <td class="center">
                                    <a class="btn btn-success" title="Done" href="#doneTaskModal" data-toggle="modal">
                                        <i class="icon-ok"></i>  
                                    </a>
                                    <a class="btn btn-danger" tite="Delete" href="#deleteTaskModal" data-toggle="modal">
                                        <i class="icon-trash"></i> 
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div><!--/col-->

    <!-- -->
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

    <!-- -->

    <!-- START OF MODAL : ADD Appointment -->
    <div class="row">
        <?php echo form_open(base_url() . 'intern/addAppointment', array('class' => 'form-horizontal')); ?>

        <div class="modal fade" id="addAppointmentModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add New Appointment</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <select id='newappt_caseID' name='newappt_caseID' class='form-control'>
                                    <?php
                                    foreach ($allcases as $dd)
                                        echo "<option value='" . $dd->caseID . "'>" . $dd->DropdownCase . "</option>";
                                    ?>
                                </select>
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
                                <?php echo form_input(array('class' => 'form-control', 'name' => 'newappt_title')); ?>
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
                                    <input type="text" class="form-control date-picker" id="newappt_date" name="newappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Time </h5> </center>
                            </div>
                        </div>

                        <!--NEX-->
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <div class="input-group bootstrap-timepicker">
                                    <span class="input-group-addon"><i class="icon-time"></i></span>
                                    <input type="text" class="form-control timepicker" id="newappt_starttime" name="newappt_time" value="<?php echo $timenow; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1 control-group">
                            <div class="controls">
                                <center> <h5> to </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <div class="input-group bootstrap-timepicker">
                                    <span class="input-group-addon"><i class="icon-time"></i></span>
                                    <input type="text" class="form-control timepicker" id="newappt_endtime" name="newappt_time" value="<?php echo $timenow; ?>">
                                </div>
                            </div>
                        </div>
                        <!--NEX-->

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
                                        <input type="radio" name="newappt_type" id="appointmentLocation-0" value="Internal" checked="checked">
                                        In the Clinic
                                    </label> &nbsp;
                                    <label class="radio">
                                        <input type="radio" name="newappt_type" id="appointmentLocation-1" value="External">
                                        Outside the Clinic
                                    </label>
                                </div>
                                <br>
                                <?php echo form_input(array('class' => 'form-control', 'name' => 'newappt_place', 'placeholder' => 'Exact Location')); ?>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Attendees </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <div class="tbl-attendees">
                                    <table class="table table-striped">
                                        <?php foreach ($allinterns as $row) : ?>
                                            <tr>
                                                <td align="center">
                                                    <input name='cbattendees[]' type= 'checkbox' class= 'case' name= 'case' value= '<?php echo $row->userID ?>'/>
                                                </td>
                                                <td>
                                                    <?php echo $row->firstName . ' ' . $row->lastName; ?>
                                                </td>
                                            </tr><?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Appointment'); ?>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php echo form_close(); ?>
    </div>
    <!-- END OF MODAL : ADD Appointment -->

    <!-- -->
    <?php echo form_open(base_url() . 'calendar/editAppointment', array('class' => 'form-horizontal')); ?>

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

                    <br><br>
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
                            <!-- <div class="input-group date">
                                 <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                 <input type="text" class="form-control date-picker" id="editappt" name="editappt" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                             </div> -->
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
                            <!-- <div class="input-group bootstrap-timepicker">
                              <span class="input-group-addon"><i class="icon-time"></i></span>
                              <input type="text" class="form-control timepicker" id="editappt_time" name="editappt_time" value="<?php echo $timenow; ?>">
                            </div> -->
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
            </div>
        </div>
    </div>

    <!-- -->
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
                                <option>Lawyers</option>
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
    <!-- -->
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

    <!-- -->

    <div class="modal fade" id="addTaskModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Task</h4>
                </div>
                <div class="modal-body">

                    <div class="col-sm-4 control-group">
                        <div class="controls">
                            <center> <h5> Due Date </h5> </center>
                        </div>
                    </div>

                    <div class="col-sm-7 control-group">
                        <div class="controls">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                <input type="text" class="form-control date-picker" id="newtodoassign_date" name="newtodoassign_date" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>

                    <br><br>

                    <div class="col-sm-4 control-group">
                        <div class="controls">
                            <center> <h5> Task </h5> </center>
                        </div>
                    </div>

                    <div class="col-sm-7 control-group">
                        <div class="controls">
                            <?php echo form_input(array('class' => 'form-control')); ?>
                        </div>
                    </div>

                    <br><br>

                    <div class="col-sm-4 control-group">
                        <div class="controls">
                            <center> <h5> Assign to: </h5> </center>
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
                    <button type="button" class="btn btn-success">Confirm</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- -->

    <div class="modal fade" id="doneTaskModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Task</h4>
                </div>
                <div class="modal-body">
                    <p>To confirm this action, please briefly discuss what you did for the task:</p>
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

    <!-- -->

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
