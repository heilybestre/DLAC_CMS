<div id='legaladvice_form' class="container">
	<div class="row">
		<br>
		<div class="col-sm-2 control-group">
			<div class="controls">
				<center> <h5> <b>Supervising Lawyer</b> </h5> </center>
			</div>
		</div>

		<div class="col-sm-9 control-group">
			<div class="controls">
				<h5> <?php if(isset($supervising->firstname)) echo "$supervising->firstname $supervising->lastname"; else echo "None."; ?> </h5>
			</div>
		</div>
	</div>

	<div class="row">
		<br>
		<div class="col-sm-2 control-group">
			<div class="controls">
				<center> <h5> <b>Advice Given by the Intern</b> </h5> </center>
			</div>
		</div>

		<div class="col-sm-9 control-group">
			<div class="controls">
				<h5 style="line-height:20px;"><?php echo $case->appAdviceGiven ?></h5>
			</div>
		</div>
	</div>


	<br>
	<div class="row">
		<div class="col-sm-2 control-group">
			<div class="controls">
				<center> <h5> <b>Notes</b> </h5> </center>
			</div>
		</div>

		<div class="col-sm-9 control-group">
			<div class="controls">
				<h5 style="line-height:20px;"><?php echo $case->appNotes ?></h5>
			</div>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-sm-2 control-group">
			<div class="controls">
				<center> <h5> <b>Interviewers</b> </h5> </center>
			</div>
		</div>

		<div class="col-sm-9 control-group">
			<div class="controls">
				<?php foreach ($interviewee as $i) : ?>
				<h5>
					<?php echo "$i->firstname $i->lastname" ?>
				</h5><?php endforeach; ?>
			</div>
		</div>
	</div>
</div>