
<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->
    <div class="row">

        <!-- Appointments -->
        <div class="col-lg-9" style="font-size:13px;">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-calendar"></i>Appointments</h2>
                </div>
                <div class="box-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">Date</th>
                                <th width="20%">Time</th>
                                <th width="10%">Case</th>
                                <th width="50%">Appointment</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($appointments as $row) : ?>
                                <tr>
                                    <td class="center"><?php echo $row->date ?></td>
                                    <td class="center"><?php echo $row->time ?></td>
                                    <td class="center"><?php echo $row->caseNum ?></td>
                                    <td>
                            <tabletitle><?php echo $row->title ?></tabletitle><br>
                            <tabledesc><?php echo $row->attendee ?></tabledesc>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>  
                </div>
            </div>

            <!-- Appointments to ReAssign -->
            <div class="box" style="font-size:13px;">
                <div class="box-header">
                    <h2><i class="icon-tasks"></i>Appointments to Re-assign</h2>
                </div>
                <div class="box-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">Date</th>
                                <th width="20%">Time</th>
                                <th width="50%">Appointment</th>
                                <th width="30%"></th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php //foreach ($reassign as $row): ?>
                            <tr>
                                <td class="center"><?php echo $row->date ?></td>
                                <td class="center"><?php echo $row->time ?></td>
                                <td class="center">
                        <tabletitle><?php echo $row->title ?></tabletitle><br>
                        <tabledesc><?php echo $row->attendee ?></tabledesc>
                        </td>
                        <td class="center"><a class="btn btn-link" href="#reassignAppointment" data-toggle="modal"> Reassign</a></td>
                        </tr>
                        <?php //endforeach; ?>
                        </tbody>
                    </table>  
                </div>
            </div>

            <!-- Task Assigned -->
            <div class="box hide" style="font-size:13px;">
                <div class="box-header">
                    <h2><i class="icon-tasks"></i>Tasks Assigned</h2>
                    <div class="box-icon">
                        <a href="#addTaskAssignedModal" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <div id="myTabContent" class="tab-content">

                        <div class="tab-pane active" id="ongoing">
                            <br/>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10%">Due Date</th>
                                        <th width="40%">Task</th>
                                        <th width="20%">Assigned To</th>
                                        <th width="10%">Status</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    <?php foreach ($tasksassigned as $row) : ?>
                                        <tr>
                                            <td class="center"><?php echo $row->dateDue ?></td>
                                            <td class="center"><?php echo $row->task ?></td>
                                            <td><?php echo $row->assignedTo ?></td>
                                            <td> </td>
                                            <td class="center">
                                                <a class="btn btn-danger" tite="Delete" href="#deleteTaskModal" data-toggle="modal" title="Delete">
                                                    <i class="icon-trash"></i> 
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar -->
        <div class="col-lg-3">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-calendar"></i>Calendar</h2>
                </div>
                <div class="box-content">
                    <center><h2>
                            <?php echo $this->calendar->generate(2013, 11); ?>
                        </h2></center>
                </div>
            </div>
        </div>

    </div>



    <!-- START OF MODAL : REASSIGN Appointment -->
    <div class="row">

        <div class="modal fade" id="reassignAppointment">
            <div class="modal-dialog-ReassignAppointment">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Reassign Appointment</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Requested by </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Reason </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Appointment </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Date </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">      
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Time </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">      
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Location </h5> </center>
                            </div>
                        </div>

                        <div class="form-inline">
                            <div class="controls">
                            </div>
                        </div>
                        <br><BR>

                        <div class="row">
                            <div class="col-sm-3 control-group">
                                <div class="controls">
                                    <center> <h5> Interviewers </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
                                <div class="controls">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-3 control-group">
                                <div class="controls">
                                    <center> <h5> Reassign to </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-8 control-group">
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
                        <button type="button" class="btn btn-success">Confirm</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : REASSIGN Appointment -->


    <!-- START OF MODAL : ADD Task Assigned -->
    <div class="row">

        <div class="modal fade" id="addTaskAssignedModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add New Task Assignment</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-4 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <!-- NOT YET FINAL -->
                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-4 control-group">
                            <div class="controls">
                                <center> <h5> Due Date </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" class="form-control date-picker" id="newtodoassign_date" name="newtodoassign_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
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
    </div>
    <!-- END OF MODAL : ADD Task Assign-->



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
<!-- END OF MODAL:  -->




