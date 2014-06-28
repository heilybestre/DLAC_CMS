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
        events: "<?php echo base_url() ?>calendar/userschedules/"+ <?php echo $this->session->userdata('userid') ?>,
        selectable: true,
        selectHelper: true,

        //Shows Add Appointment modal
        select: function(start, end, allDay) {
        	var dateChosen = $.fullCalendar.formatDate( start, "yyyy-MM-dd" );
        	var timeStart = $.fullCalendar.formatDate( start, "hh:mm TT" );
        	var timeEnd = $.fullCalendar.formatDate( end, "hh:mm TT" );
        	document.getElementById("newappt_date").value = dateChosen;
        	document.getElementById('newappt_starttime').value = timeStart;
        	document.getElementById('newappt_endtime').value = timeEnd;
        	$('#addAppointmentModal').modal('show');
        	calendar.fullCalendar('unselect');

            //Add Appointment function
            $('#btnaddappointment').click(function(){
            	var caseid = $('select[name="newappt_case"]').val();
            	var title = $('#newappt_title').val();
            	var dateSelected = $('#newappt_date').val();
            	var startSelected = $('#newappt_starttime').val();
            	var endSelected = $('#newappt_endtime').val();
            	var type = $('input[name="newappt_type"]:checked').val();
            	var place = $('#newappt_place').val();

            	var fullCalendarStart_FC = $.fullCalendar.parseDate(dateSelected+' '+startSelected);
            	var fullCalendarEnd_FC = $.fullCalendar.parseDate(dateSelected+' '+endSelected);

            	var fullCalendarStart = $.fullCalendar.formatDate( fullCalendarStart_FC, "yyyy-MM-dd HH:mm" );
            	var fullCalendarEnd = $.fullCalendar.formatDate( fullCalendarEnd_FC, "yyyy-MM-dd HH:mm" );

            });
            //
          },
          editable: true,

          eventClick: function(calEvent, jsEvent, view) {
          	$('#viewAppointmentModal').modal('show');

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
	width: 900px;
	margin: 0 auto;
}
</style>

<div id="content" class="col-lg-10 col-sm-12">
	<div id="content-calendar">

		<!-- start: CALENDAR DIV -->
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

            <div class="box">
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
                                            echo $row->bfirstName . " " . $row->blastName;
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
		</div>
		<!-- end: CALENDAR DIV -->

		<!-- START OF MODAL : ADD Appointment -->
		<?php echo form_open(base_url() . 'calendar/add/calendar'); ?>
		<div class="row">
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
									<select id='newappt_case' name='newappt_case' class='form-control'>
										<?php
										foreach ($allcases as $dd)
											echo "<option value='" . $dd->caseID . "'>" . $dd->caseName . ' (' . $dd->caseNum . ") </option>";
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
									<?php echo form_input(array('class' => 'form-control', 'name' => 'newappt_title', 'id' => 'newappt_title')); ?>
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
										<input type="text" class="form-control timepicker" id="newappt_starttime" name="newappt_starttime" value="<?php echo $timenow; ?>">
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
										<input type="text" class="form-control timepicker" id="newappt_endtime" name="newappt_endtime" value="<?php echo $timenow; ?>">
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
									<?php echo form_input(array('class' => 'form-control', 'id' => 'newappt_place', 'name' => 'newappt_place', 'placeholder' => 'Exact Location')); ?>
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
									<div id='internsdiv' class="tbl-attendees">
										<?php
										$count=0;
										foreach ($allcases as $dd){
											if($count==0){
												$interns = $this->Case_model->select_caseinterns($dd->caseID);
												$lawyers = $this->Case_model->select_caselawyers($dd->caseID);
											}
											$count++;
										}
										?>
										<table class='table table-striped'>
											<?php foreach ($interns as $row){ ?>
											<tr>
												<td align='center'>
													<input name='apptattendees[]' type='checkbox' class='case' name='case' value="<?php echo $row->personID ?>";
													<?php if($this->session->userdata('userid')==$row->personID) echo 'checked'; ?>
													/>
												</td>
												<td><?php echo "$row->firstname $row->lastname" ?></td>
											</tr>
											<?php } ?>
											<?php foreach ($lawyers as $row){ ?>
											<tr>
												<td align='center'>
													<input name='apptattendees[]' type='checkbox' class='case' name='case' value="<?php echo $row->personID ?>";
													<?php if($this->session->userdata('userid')==$row->personID) echo 'checked'; ?>
													/>
												</td>
												<td><?php echo "$row->firstname $row->lastname" ?></td>
											</tr>
											<?php } ?>
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
		</div>
		<?php echo form_close(); ?>
		<!-- END OF MODAL : ADD Appointment -->

		<!-- START OF MODAL : VIEW Appointment -->
		<div class="row">
			<div class="modal fade" id="viewAppointmentModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close btnapptclose" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Appointment</h4>
						</div>

						<div class="modal-body">
							<!-- VIEW START -->
							<div id='viewapptdiv'>
								<!-- controller calendar/view($sid) -->
							</div>
							<!-- VIEW END -->

							<!-- EDIT START -->
							<div id='editapptdiv' class='hide'>
								<!-- controller calendar/view_edit($sid) -->
							</div>
							<!-- EDIT END -->

							<!-- DONE START -->
							<div id='doneapptdiv' class='hide'>
								<!-- controller calendar/view_done($sid) -->
							</div>
							<!-- DONE END -->

							<!-- CANT ATTEND START -->
							<div id='cantattendapptdiv' class='hide'>
								<!-- controller calendar/view_cantattend($sid) -->
							</div>
							<!-- CANT ATTEND END -->

							<!-- DELETE START -->
							<div id='deleteapptdiv' class='hide'>
								<!-- controller calendar/view_delete($sid) -->
							</div>
							<!-- DELETE END -->
						</div>

						<div id="modalfooterdiv" class="modal-footer">
							<!-- controller calendar/view_modalfooter($sid) -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END OF MODAL : VIEW Appointment -->

	<!-- START OF MODAL : ADD Task -->
    <div class="row">

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
                                <center> <h5> Due Date </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <div class="input-group date">
									<span class="input-group-addon"><i class="icon-calendar"></i></span>
									<input type="text" class="form-control date-picker" id="taskduedate" name="taskduedate" data-date-format="yyyy-mm-dd" value="<?php echo $datenow;?>">
								</div>
                            </div>
                        </div>

                        <br><br>

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
    <!-- END OF MODAL : ADD Task -->

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

    </div>
    <!-- END OF MODAL : DONE Task -->

	</div>
</div>