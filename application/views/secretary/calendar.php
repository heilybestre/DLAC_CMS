<link href='<?= base_url() ?>assets/css/fullcalendar.css' rel='stylesheet' />
<link href='<?= base_url() ?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?= base_url() ?>assets/js/jquery.min.js'></script>
<script src='<?= base_url() ?>assets/js/jquery-ui.custom.min.js'></script>
<script src='<?= base_url() ?>assets/js/fullcalendar.min.js'></script>

<script>

    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#calendar').fullCalendar({
            editable: false,
            disableDragging: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            //Shows appoinments
            events: "<?php echo base_url() ?>calendar/userschedules/" + <?php echo $this->session->userdata('userid') ?>,
            selectable: true,
            selectHelper: true,
            //Shows Add Appointment modal
            select: function(start, end, allDay) {
                var dateChosen = $.fullCalendar.formatDate(start, "yyyy-MM-dd");
                var timeStart = $.fullCalendar.formatDate(start, "hh:mm TT");
                var timeEnd = $.fullCalendar.formatDate(end, "hh:mm TT");
                document.getElementById("newappt_date").value = dateChosen;
                document.getElementById('newappt_starttime').value = timeStart;
                document.getElementById('newappt_endtime').value = timeEnd;
                $('#addAppointmentModal').modal('show');
                calendar.fullCalendar('unselect');

                //Add Appointment function
                $('#btnaddappointment').click(function() {
                    var caseid = $('select[name="newappt_case"]').val();
                    var title = $('#newappt_title').val();
                    var dateSelected = $('#newappt_date').val();
                    var startSelected = $('#newappt_starttime').val();
                    var endSelected = $('#newappt_endtime').val();
                    var type = $('input[name="newappt_type"]:checked').val();
                    var place = $('#newappt_place').val();

                    var fullCalendarStart_FC = $.fullCalendar.parseDate(dateSelected + ' ' + startSelected);
                    var fullCalendarEnd_FC = $.fullCalendar.parseDate(dateSelected + ' ' + endSelected);

                    var fullCalendarStart = $.fullCalendar.formatDate(fullCalendarStart_FC, "yyyy-MM-dd HH:mm");
                    var fullCalendarEnd = $.fullCalendar.formatDate(fullCalendarEnd_FC, "yyyy-MM-dd HH:mm");

                });
                //
            },
            editable: true,
                    eventClick: function(calEvent, jsEvent, view) {
                        $('#viewAppointmentModal').modal('show');
                        $('#editapptdiv').addClass('hide');
                        $('#deleteapptdiv').addClass('hide');
                        $('#cantattendapptdiv').addClass('hide');
                        $('#doneapptdiv').addClass('hide');

                        $('#actionEventsDiv').removeClass('hide');
                        $('#actionEventTopDiv').removeClass('hide');
                        $('#viewapptdiv').removeClass('hide');


                        //For view div
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>calendar/view/" + calEvent.id,
                            success: function(result) {
                                $('#viewapptdiv').html(result);
                            }
                        });

                        //For done div
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>calendar/view_done/" + calEvent.id + '/calendar',
                            success: function(result) {
                                $('#doneapptdiv').html(result);
                            }
                        });

                        //For edit div
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>calendar/view_edit/" + calEvent.id,
                            success: function(result) {
                                $('#editapptdiv').html(result);
                            }
                        });

                        //For cant attend div
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>calendar/view_cantattend/" + calEvent.id + '/calendar',
                            success: function(result) {
                                $('#cantattendapptdiv').html(result);
                            }
                        });

                        //For delete attend div
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>calendar/view_delete/" + calEvent.id,
                            success: function(result) {
                                $('#deleteapptdiv').html(result);
                            }
                        });

                        //For footer div
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>calendar/view_modalfooter/" + calEvent.id,
                            success: function(result) {
                                $('#modalfooterdiv').html(result);
                            }
                        });
                    }
        });
    });
</script>

<style>
    #calendar {
        width: 800px;
        margin: 0 auto;
    }
</style>
<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->
    <div class="row">

            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h2><i class="icon-calendar"></i>Calendar</h2>
                    </div>              
                    <div class="box-content">
                        <br/>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
    </div>

              <div class="row">

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




