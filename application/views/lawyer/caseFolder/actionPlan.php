<div class="container" style="margin-top:-50px;">
  <br>
  <!--  -->
  <label id="usernameforaction" class="hide"><?= $name; ?></label>
  <label id="useridforaction" class="hide"><?= $this->session->userdata('userid') ?></label>
  <label id='currentstage' class='hide'><?= $case->stage ?></label>

  <div class="col-lg-9"> </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a class ="btn-small btn-primary" style='padding:5px;' href="#viewNarrativeInActionPlanModal" data-toggle="modal">
    <i class="icon-book"></i> View Narrative
  </a> &nbsp;
  <a class ="btn-small btn-primary" style='padding:5px;' href="#viewAllNotesModal" data-toggle="modal">
    <i class="icon-comments"></i>  View All Notes
  </a>

  <!-- Action plan is PENDING | Waiting for lawyer's response -->
  <?php if ($actionplanstatus == 'pending') { ?>
    <!-- upon submission of intern -->
    <div id='pendingdiv' class="row">
      <div class="col-lg-7">
        <h5>Action Plan Status: <label class="label label-warning">Pending</label></h5>
      </div>
    </div>
  <?php } ?>

  <!-- Action plan is REJECTED | Must do lawyer's revisions -->
  <?php if ($actionplanstatus == 'rejected') { ?>
    <div class="row hide">
      <div class="col-lg-7">
        <h5>Action Plan Status:<label class="label label-danger">Rejected</label> -
          <a class ="btn btn-warning" href="#reasonActionPlanModal" data-toggle="modal" style="font-size:13px; height:20px; padding-top:0px; margin-top:0px;">Reasons
          </a>
        </h5>
        <h5>Date Evaluated: <label class="label label-info">(date)</label></h5>
        <br>
      </div>
    </div>
  <?php } ?>

  <!-- Action plan is APPROVED  -->
  <?php if ($actionplanstatus == 'approved') { ?>
    <!--if approved-->
    <div class="row">
      <div class="col-lg-4">
        <h5>Action Plan Status: <label class="label label-success">Approved</label></h5>
        <br>
      </div>
      <br>
    </div>
  <?php } ?>

  <!-- No action plan yet -->
  <?php if ($actionplanstatus == null) { ?>
    <div class="row">
      There is no Action Plan yet.
    </div>
    <br>
  <?php } ?>

  <!-- ACTION PLAN : APPROVED / PENDING -->
  <?php if ($actionplanstatus == 'approved' || $actionplanstatus == 'pending') { ?>
    <div id='actionplandiv' class="row" >
      <?php echo form_open(base_url() . "cases/approveactionplan/$case->caseID"); ?>

      <?php if ($actionplanstatus == 'pending') { ?>
        <div id='actionplanbuttonsdiv' class='pull-right' style='margin-right: 50px;'>
          <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-medium btn-success', 'style' => 'margin-bottom:10px'), 'Accept'); ?>
          <a href="" class="btn btn-medium btn-danger" style="margin-bottom:10px">Reject</a>
        </div>
      <?php } ?>

      <div id='actionplanbuttonsbrdiv' class=''>
        <div>
          <div class='col-sm-4'>
            <h3>ACTION PLAN FOR EACH STAGE</h3>
          </div>
        </div>
        <br><br><br>
      </div>

      <!-- PER STAGE -->
      <?php for ($x = 1; $x <= 4; $x++) { ?>
        <div class="well todo col-lg-1 actionplanwidth" style="padding:10px; margin-left:2px;">
          <h3>
            <?php if ($x == 1) { ?> New <?php } ?>
            <?php if ($x == 2) { ?> Preliminary Investigation <?php } ?>
            <?php if ($x == 3) { ?> Pre-Trial <?php } ?>
            <?php if ($x == 4) { ?> Trial Court <?php } ?>
          </h3>

          <ul class="todo-list">
            <table id="action<?= $x ?>table" class="table table-condensed" style="background-color:white;">

              <?php foreach (${'actionplan_s' . $x} as $action) : ?>
                <tr id="actionTableRow_<?= $action->actionplanID ?>">
                  <td>
                    <?php if ($actionplanstatus == 'approved') { ?>
                      <input name='action1[]' class='cbactionstage<?= $x ?> <?php if ($actionplanstatus == null || $action->category == 2 || $action->category == 3 || $action->category == 5 || $action->category == 6) { ?> disable <?php } ?>' type='checkbox' value="<?= $action->actionplanID ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 1, <?= $case->stage ?>)" <?php if ($action->status == 1) { ?> checked <?php } ?> />
                    <?php } ?>
                  </td>
                  <td>
                    <input name="actiontype<?= $x ?>[]" value="<?= $action->category ?>" class='hide' id="arrayActionType_<?= $action->actionplanID ?>">
                    <label class="removeBold" id="actionNameLabel_<?= $action->actionplanID ?>"> <?= $action->action ?> </label>
                  </td>
                  <td>
                    <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig btn 
                    <?php
                    if ($this->Case_model->select_action_notes_count($action->actionplanID)->count > 0) {
                      echo 'btn-info';
                    } else if ($this->Case_model->select_action_notes_count($action->actionplanID)->count == 0) {
                      echo 'btn-default';
                    }
                    ?> pull-right"> <i class="icon-comment"></i> </a>
                    <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                    <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                      <!-- Action plan POPOVER -->
                      <div id="actionPlan_stage<?= $x ?>" class="actionPlan_stage<?= $x ?>">

                        <div id="actionPlanOption-top">

                          <?php if ($action->category == 5) { ?>
                            <div id="actionPlanActionButtons_<?= $action->actionplanID ?>" class="pull-right">
                              <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-user"></i> </a>
                              <a class="btn btn-primary backActionButton hide" id="backActionButton_<?= $action->actionplanID ?>"> <i class="icon-arrow-left"></i> </a>
                            </div>

                            <h5>
                              <b>Assigned to </b>
                              <label id="labelAssignPerson_<?= $action->actionplanID ?>" class="label label-default">
                                <?php if ($action->assignedTo != null) echo $this->People_model->getuserfield('firstname', $action->assignedTo) . ' ' . $this->People_model->getuserfield('lastname', $action->assignedTo); ?>
                                <?php if ($action->assignedTo == null) echo 'None'; ?>
                              </label>
                            </h5>
                          <?php } ?>

                          <h5><b>Type: </b>
                            <label class="removeBold" id="actionTypeLabel_<?= $action->actionplanID ?>">
                              <?php echo $this->Case_model->getactioncategoryname($action->category)->category; ?>
                            </label>
                          </h5>
                        </div>

                        <!--Assign-->
                        <div id="actionPlanOption-center-assign_<?= $action->actionplanID ?>" class="hide">
                          <hr>
                          <div id="assignAction">

                            <h5><b>Assign to: </b></h5>
                            <table class="table table-striped">
                              <tr>
                                <th>Intern</th>
                                <th>Experience</th>
                                <th></th>
                              </tr>
                              <?php foreach ($caseinterns as $intern) { ?>
                                <tr>
                                  <td><?= "$intern->firstname $intern->lastname" ?></td>
                                  <td>(##)</td>
                                  <td><button type="button" class="btn btn-success btnAssignPerson" id="btnAssignPerson_<?= $action->actionplanID ?>" value="<?= $intern->personID ?>"> <i class="icon-ok"></i> </button>
                                    <button type="button" class="btn btn-danger hide btnUnassignPerson btnUnassignPerson_<?= $intern->personID ?>" id="btnUnassignPerson_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </button>                                                                    
                                    <input type="hidden" value="<?= "$intern->firstname $intern->lastname" ?>" id="task_<?= $action->actionplanID ?>_intern_<?= $intern->personID ?>">
                                  </td>
                                </tr>
                              <?php } ?>
                            </table>
                          </div>
                        </div>

                        <!-- Add notes -->
                        <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                          <h5>Notes</b></h5>
                          <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                          <a class="btn btn-success pull-right sendActionNotes" id="sendActionNotes_<?= $action->actionplanID ?>" style="margin: 5px 15px -10px 0">Send</a>
                        </div>
                        <br><br>

                        <!-- Notes -->
                        <div id="actionPlan-bottom-notes_<?= $action->actionplanID ?>" class="actionPlan-bottom-notes <?php if ($this->Case_model->select_action_notes_count($action->actionplanID)->count == 0) echo 'hide'; ?> ">
                          <div class="discussions" id="notesThread_<?= $action->actionplanID ?>">
                            <ul>
                              <?php foreach ($allcaseactionnotes as $notes) { ?>
                                <?php if ($action->actionplanID == $notes->actionplanID) { ?>
                                  <li id = "actionPlanNote" class = "actionPlanNote">
                                    <div class = "name"> <?= $this->People_model->getuserfield('firstname', $notes->by) . ' ' . $this->People_model->getuserfield('lastname', $notes->by) ?> </div>
                                    <div class = "date"> <?= $notes->dateTime ?> </div>
                                    <div class = "message">
                                      <?= $notes->note ?>
                                    </div>	
                                  </li>
                                <?php } ?>
                              <?php } ?>
                            </ul>   
                          </div>
                          <br>
                        </div>
                      </div> 
                      <!-- Action plan POPOVER -->
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>

            </table>
          </ul>
        </div>
      <?php } ?>
      <?php echo form_close(); ?>
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
                <center> <h5> Stage: <label id='labelstage' class="label label-warning">New</label> </h5> </center>
              </div>
            </div>

            <br><br><br>

            <div class="col-sm-2 control-group">
              <div class="controls">
                <center> <h5> New Task </h5> </center>
              </div>
            </div>

            <div class="col-sm-7 control-group">
              <div class="controls">
                <input type="text" name="newTaskActionPlan" value="" id="newTaskActionPlan" class="form-control" style="margin-top:8px;"  />
              </div>
            </div>

            <div class="col-sm-3 control-group">
              <div class="controls">
                <button class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>

          <br><br><br>

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
            <table class="table table-bordered">
              <tr>
                <td>01</td>
                <td>Hello</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  </div>
  <!-- END OF MODAL : REASONACTIONPLANMODAL --> 

  <!-- START OF MODAL : VIEWNARRATIVEINACTIONPLANMODAL -->
  <div class="row">
    <div class="modal fade" id="viewNarrativeInActionPlanModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel"> Narrative</h3>
          </div>
          <div class="modal-body">
            <?php echo $case->appNarrative ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
  <!-- END OF MODAL : VIEWNARRATIVEINACTIONPLANMODAL --> 

  <!-- START OF MODAL : VIEWALLNOTESMODAL -->
  <div class="row">
    <div class="modal fade" id="viewAllNotesModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel"> All Case Notes </h3>
          </div>
          <div class="modal-body">
            <?php foreach ($allcaseactions as $action) { ?>
              <?php $actionnotes = $this->Case_model->select_action_notes($action->actionplanID); ?>
              <?php if ($this->Case_model->select_action_notes_count($action->actionplanID)->count > 0) { ?>
                <h5><b><?= $action->action ?></b></h5>
                <div class="actionPlan-bottom-notes" style='width: 100% !important; max-height: none !important'>
                  <div class="discussions">
                    <ul>
                      <?php foreach ($actionnotes as $notes) { ?>
                        <li style='margin: 0 10px 5px 10px'>
                          <div class = "name"> <?= $this->People_model->getuserfield('firstname', $notes->by) . ' ' . $this->People_model->getuserfield('lastname', $notes->by) ?> </div>
                          <div class = "date"> <?= $notes->dateTime ?> </div>
                          <div class = "message">
                            <?= $notes->note ?>
                          </div>	
                        </li>
                      <?php } ?>
                    </ul>   
                  </div>
                  <br>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
  <!-- END OF MODAL : VIEWALLNOTESMODAL -->
</div> 
