<div class="container" style='margin-left:25px;'>

	<?php echo form_open(base_url() . 'director/actionPlan', array('class' => 'form-horizontal')); ?>


	<!-- before anything else; hide tasks-->
	<?php if($actionplanstatus==null){ ?>
	<div class="row">
		<h5>No Action Plan created yet.</h5>
	</div>
	<?php } ?>

	<?php if($actionplanstatus == 'pending'){ ?>
	<!-- upon submission of intern -->
	<div class="row">
		<div class="col-lg-2">
			<h5>Action Plan Status:<label class="label label-warning">Pending</label></h5>
		</div>

		<div class='pull-right' style='margin-right:20px;'>
			<div id='btnapproveactionplan' class='btn btn-success'>Approve</div>
			<div id='btnrejectactionplan' class='btn btn-danger' href="#rejectAPmodal" data-toggle="modal">Reject</div>
		</div>

		<br>

	</div>
	<?php } ?>

	<?php if($actionplanstatus == 'approved'){ ?>
	<!-- upon approval -->
	<div class="row">
		<div class="col-lg-2">
			<h5>Action Plan Status:<label class="label label-success">Approved</label></h5>
			<br>
		</div>
	</div>
	<?php } ?>

	<?php if($actionplanstatus == 'rejected'){ ?>
	<!-- upon rejection -->
	<div class="row hide">
		<div class="col-lg-7">
			<h5>Action Plan Status:<label class="label label-danger">Rejected</label> -
				<a class ="btn btn-warning" href="#reasonActionPlanModal" data-toggle="modal" style="font-size:13px; height:20px; padding-top:0px; margin-top:0px;">Reasons</a></h5>
				<h5>Date Evaluated:<label class="label label-info">(date)</label></h5>
				<br>
			</div>
		</div>
		<?php } ?>

		<?php if($actionplanstatus == 'pending' || $actionplanstatus == 'approved'){ ?>
		<div class="row <?php if($actionplanstatus=='pending') echo 'disable fadedopp'; ?>" >

        <!-- 1 NEW -->
        <div class="well todo col-lg-2" style="padding:10px; margin-left:2px;">
            <h3> New 
            </h3> 
            <ul class="todo-list">
                <table id='action1table' class="table table-condensed" style="background-color:white;">
                    <?php foreach($actionplan_stage1 as $action) : ?>
                    <tr>
                        <td><input class='cbactionstage1' type='checkbox' value="<?= $action->actionplanID ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 1, <?= $case->stage ?>)" <?php if($action->status==1) echo 'checked'; ?> /></td>
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> </td>
                    </tr><?php endforeach; ?>
                </table>
            </ul>
        </div>

        <!-- 2 PRELIMINARY INVESTIGATION -->
        <div class="well todo col-lg-3" style="padding:10px;">
            <h3> Preliminary Investigation
            </h3>
            <ul class="todo-list">
                <table id='action2table' class='table table-condensed' style='background-color:white;'>
                    <?php foreach($actionplan_stage2 as $action) : ?>
                    <tr>
                        <td><input class='cbactionstage2' type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 2, <?= $case->stage ?>)" <?php if($action->status==1) echo 'checked'; ?>/></td>
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> </td>
                    </tr><?php endforeach; ?>
                </table>
            </ul>
        </div>  

        <!-- 3 PRE-TRIAL -->
        <div class="well todo col-lg-2" style="padding:10px;">
            <h3> Pre-trial
            </h3>
            <ul class="todo-list">
                <table id='action3table' class='table table-condensed' style='background-color:white;'>
                    <?php foreach($actionplan_stage3 as $action) : ?>
                    <tr>
                        <td><input class='cbactionstage3' type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 3, <?= $case->stage ?>)" <?php if($action->status==1) echo 'checked'; ?> /></td>
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> </td>
                    </tr><?php endforeach; ?>
                </table>
            </ul>
        </div>

        <!-- 4 TRIAL COURT -->
        <div class="clearfix well todo col-lg-2" style="padding:10px;">
            <h3> Trial Court
            </h3>
            <ul class="todo-list">
                <table id='action4table' class='table table-condensed' style='background-color:white;'>
                    <?php foreach($actionplan_stage4 as $action) : ?>
                    <tr>
                        <td><input class='cbactionstage4' type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 4, <?= $case->stage ?>)" <?php if($action->status==1) echo 'checked'; ?> /></td>
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?></td>
                    </tr><?php endforeach; ?>
                </table>
            </ul>
        </div>

<!--         5 APPEAL 
        <div class="clearfix well todo col-lg-2" style="padding:10px;">
            <h3> Appeal
            </h3>
            <ul class="todo-list">
                <table id='action5table' class='table table-condensed' style='background-color:white;'>
                    <?php foreach($actionplan_stage5 as $action) : ?>
                    <tr>
                        <td><input class='cbactionstage5' type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 5, <?= $case->stage ?>)" <?php if($action->status==1) echo 'checked'; ?> /></td>
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> </td>
                    </tr><?php endforeach; ?>
                </table>
            </ul>
        </div>-->
    </div>
		<?php } ?>

		<!-- START OF MODAL : EDITACTIONPLANMODAL -->
		<div class="row col-lg-10 col-sm-11">
			<div class="modal fade" id="editActionPlanModal">
				<div class="modal-dialog-editCaseSummary">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 id="myModalLabel"> Edit Action Plan </h3>
						</div>
						<div class="modal-body">

							<div class="col-sm-2 control-group">
								<div class="controls">
									<center> <h5> Stage: <label class="label label-warning">New</label> </h5> </center>
								</div>
							</div>

							<div class="col-sm-7 control-group">
								<div class="controls">
								</div>
							</div>

							<br><br>

							<div class="col-sm-2 control-group">
								<div class="controls">
									<center> <h5> New Task </h5> </center>
								</div>
							</div>

							<div class="col-sm-7 control-group">
								<div class="controls">
									<?php echo form_input(array('id' => 'newTaskActionPlan', 'name' => 'newTaskActionPlan', 'type' => 'text', 'class' => 'form-control','style'=>'margin-top:8px;')); ?>
								</div>
							</div>

							<div class="col-sm-2 control-group">
								<div class="controls">
									<button class="btn btn-primary btn-small">Add</button>
								</div>
							</div>

							<br><br> 
							<hr/><br>
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th></th>
										<th>Task</th>
										<th></th>
									</tr>
								</thead>   
								<tbody>
									<tr>
										<td></td>
										<td class="center"></td>
										<td class="center">
											<a class="btn btn-info" href="#editAppointmentModal" data-toggle="modal">
												<i class="icon-edit" title="Edit"></i>  
											</a>
											<a class="btn btn-danger" href="#deleteAppointment" data-toggle="modal">
												<i class="icon-trash" title="Delete"></i> 
											</a>
										</td>
									</tr>
								</tbody>
							</table>  
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END OF MODAL : EDITACTIONPLANMODAL -->

		<!-- START OF MODAL : REASONACTIONPLANMODAL -->
		<div class="row">

			<div class="modal fade" id="reasonActionPlanModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 id="myModalLabel"> Reason/s for Rejection  </h3>
						</div>
						<div class="modal-body">
							Things to be done by the interns to improve this action plan:

							<h5></h5>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

		</div>
		<!-- END OF MODAL : REASONACTIONPLANMODAL -->

		<!-- START OF MODAL : REJECTAPMODAL -->
		<div class="row">

			<div class="modal fade" id="rejectAPmodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 id="myModalLabel"> Reason/s for Rejection  </h3>
						</div>
						<div class="modal-body">
							<h5>Things to be done by the interns to improve this action plan: </h5>
							<textarea style="overflow: hidden; word-wrap: break-word; resize: none; margin-left: 0px; margin-right: 0px; width: 530px; height: 150px; font-family: 'Helvetica Neue', sans-serif, 'Segoe UI Emoji', 'Segoe UI Symbol', Symbola, EmojiSymbols !important;" data-emoji_font="true"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

		</div>
		<!-- END OF MODAL : REJECTAPMODAL --> 


	</div>