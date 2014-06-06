<div id="content" class="col-lg-10 col-sm-11">
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header">
					<h2><i class="icon-calendar"></i>Attendance</h2>
					<div class="box-icon">
					</div>
				</div>
				<div class="box-content" style='padding:40px;'>

					<div>Today is <?= $datenow ?>
						<br>
						<a class="btn btn-default pull-right" style="margin-top:0px; margin-left:10px;" href="<?= base_url() ?>people/attendancelogs"> View Attendance Logs</a>
					</div>

					<br>

					<?php if (isset($_GET['recorded'])) { ?>
					<center>
						<br><br>
						<div class="row" style="background-color:#FFE0E0;">
							<h5><b>Attendance Log for <?= $datenow ?> has been saved.</b></h5>
						</div>
					</center>
					<?php } ?>

					<hr>

					<div style="background-color:#ECF8F0; padding:15px;">
						<form action='<?php echo base_url() ?>people/insertResidency' method='post'>
							<center>
								<h1>Attendance Log</h1>

								<div class="row">

									<div class="col-sm-1 control-group" style="margin-left:80px;">
										<div class="controls">
											<h5> <b> Date </b></h5>
										</div>
									</div>

									<div class="col-sm-3 control-group">
										<div class="controls">
											<div class="input-group date">
												<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control date-picker" id="attendancedate" name="residencydate" data-date-format="yyyy-mm-dd" value="<?= $datenowdd ?>">
											</div>
										</div>
									</div>

									<br><br>

									<div id='recordsQuestion'>
										<div class="col-sm-4 control-group" style="margin-left:100px;">
											<div class="controls">
												<h5> <b> How many records would you like to add? </b></h5>
											</div>
										</div>

										<div class="col-sm-1 control-group" style="margin-left:5px;">
											<div class="controls">
												<?php echo form_input(array('id' => 'recordsAttendance', 'name' => 'recordsAttendance', 'type' => 'text', 'class' => 'form-control')); ?>
											</div>
										</div>

										<div class="col-sm-1 control-group">
											<div class="controls">
												<button id='btnaddrecords' type='button' class="btn btn-success" style="margin-left:-50px; margin-top:0px;"> ok</button>
											</div>
										</div>
									</div>


									<br><br>

									<div class="col-sm-10">



										<table id="attendanceLogTable" class="table table-bordered" style="background-color:#B7D5B2; margin-left:100px;">
											<thead>
												<tr>
													<th style='width:40%'><center>INTERN NAME</center></th>
													<th><center>TIME IN</center></th>
													<th><center>TIME OUT</center></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</center>

							<br><br>
							<input type='submit' name='submit' value='Save Attendance' class='btn btn-success pull-right' style='margin-left:10px; margin-bottom:10px;'>
							<br><br>
						</form>
					</div>
					<br><br>
					<hr>
				</div>
			</div>
		</div><!--end :col-->

	</div><!--end :ow-->

	<br>
</div><!-- end: Content -->