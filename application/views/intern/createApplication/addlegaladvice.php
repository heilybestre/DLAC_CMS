<div id='legaladvice_form' class="container">

	<div class="row">

		<div class="col-sm-2 control-group">
			<div class="controls">
				<center> <h5> <b> Application Form No. </b></h5> </center>
			</div>
		</div>

		<div class="col-sm-1 control-group">
			<div class="controls" style='margin-top:2px;'>
				<h5><?= $appnumber ?></h5>
			</div>
		</div>

		<div class="col-sm-5 control-group"></div>

		<div class="col-sm-3 control-group">
            <div class="controls">
                <center> <h5> <b>
                    <div class="clientnamediv">
                        <?php
                        $newclientid = $this->session->userdata('newclientid');
                        if(isset($newclientid))
                            echo $this->People_model->getuserfield('lastname', $newclientid) . ', ' . $this->People_model->getuserfield('firstname', $newclientid) . ' ' . substr($this->People_model->getuserfield('middlename', $newclientid), 0, 1) . '.';
                        else{
                            $first = 0;
                            foreach ($clientlist as $row) {
                                if ($first == 0)
                                    echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
                                $first++;
                            }
                        }
                        ?>
                    </div>
                </b></h5> </center>
            </div>
        </div>

	<div class="col-sm-1 control-group">
		<div class="controls">

		</div>
	</div>
</div><br>


<div class="row" style='padding-left:20px; padding-right:25px;'>


	<div class="col-sm-2 control-group">
		<div class="controls">
			<center> <h5> <b>Supervising Lawyer </b></h5> </center>
		</div>
	</div>

	<div class="col-sm-3 control-group">
		<div class="controls">
			<select id="applawyer" name="applawyer" class="form-control">
				<option></option>
				<?php foreach ($lawyerlist as $row) : ?>
				<option value="<?= $row->personID ?>">
					<?= $row->lastname ?>, <?= $row->firstname ?> <?= substr($row->middlename, 0, 1) ?>.
				</option><?php endforeach; ?>
			</select>
		</div>
	</div>

	<br><br><br>

	<div class="col-sm-2 control-group">
		<div class="controls">
			<center> <h5> <b>Other Interviewers</b> </h5> </center>
		</div>
	</div>

	<div class="col-sm-3 control-group">
		<div class="controls interviewees-table">
			<div class="tbl-attendees">
				<table class="table table-striped">
					<?php foreach ($internlist as $row) : if ($row->personID != $this->session->userdata('userid')) { ?>
					<tr>
						<td align="center">
							<input type= 'checkbox' name='otherinterviewers[]' class= 'case' name= 'case' value= '<?php echo $row->personID ?>'/>
						</td>
						<td>
							<?php echo $row->firstname . ' ' . $row->lastname; ?>
						</td>
					</tr>
					<?php } endforeach; ?>
				</table>
			</div>
		</div>
	</div>

	<br><br><br><br><br><br><br><br><br>

	<div class="col-sm-2 control-group">
		<div class="controls">
			<center> <h5> <b>Advice Given by the Intern</b> </h5> </center>
		</div>
	</div>

	<div class="col-sm-9 control-group">
		<div class="controls">
			<?php echo form_textarea(array('id' => 'appadvicegiven', 'name' => 'appadvicegiven', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 150px')); ?>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br>

	<div class="col-sm-2 control-group">
		<div class="controls">
			<center> <h5> <b>Notes </b></h5> </center>
		</div>
	</div>

	<div class="col-sm-9 control-group">
		<div class="controls">
			<?php echo form_textarea(array('id' => 'appnotes', 'name' => 'appnotes', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 100px')); ?>
		</div>
	</div>

</div>
<br>

</div>


<div class="row" id='recommendation_form'>

<h5><b>Intern's Recommendation for the Director</b></h5>
<hr width='950px'>

<div class="col-sm-2 control-group">
	<div class="controls">
		<center> <h5> <b>Recommended for</b> </h5> </center>
	</div>
</div>

<!-- Multiple Radios -->
<div class="control-group">
	<div class="controls">
		<?php echo form_radio(array('name' => 'apprecommendedfor', 'id' => 'recommendedFor-0', 'value' => 'Approval', 'checked' => TRUE)); ?>
		Approval
		<?php echo form_radio(array('name' => 'apprecommendedfor', 'id' => 'recommendedFor-1', 'value' => 'Rejection', 'checked' => FALSE)); ?>
		Rejection
	</div>
</div>

<br>

<div class="col-sm-2 control-group">
	<div class="controls">
		<center> <h5> <b>Rationale</b> </h5> </center>
	</div>
</div>

<div class="col-sm-9 control-group">                  
	<?php echo form_textarea(array('id' => 'apprecommendation', 'name' => 'apprecommendation', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 280px' )); ?>
</div>

</div>

<!-- Button -->
	<!-- Button -->
	<div class="row">
		<div class="control-group pull-right pull-down">
			<label class="control-label" for="submit"></label>
			<div class="controls"><?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success pull-right'), 'Submit'); ?>
			</div>
		</div>
	</div>

