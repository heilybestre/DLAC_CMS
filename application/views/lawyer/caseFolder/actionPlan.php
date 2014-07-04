<div class="container" style="margin-top:-50px;">
  <br>
  <!--  -->
  <label id="usernameforaction" class="hide"><?= $name; ?></label>
  <label id="useridforaction" class="hide"><?= $this->session->userdata('userid') ?></label>

  <a class ="btn btn-link pull-right" style='' href="#viewNarrativeInActionPlanModal" data-toggle="modal">
    View Narrative
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
                      <input name='action1[]' class='cbactionstage1 <?php if ($actionplanstatus == null) { ?> disable <?php } ?>' type='checkbox' value="<?= $action->actionplanID ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 1, <?= $case->stage ?>)" <?php if ($action->status == 1) { ?> checked <?php } ?> />
                    <?php } ?>
                  </td>
                  <td>
                    <input name="actiontype<?= $x ?>[]" value="<?= $action->category ?>" class='hide' id="arrayActionType_<?= $action->actionplanID ?>">
                    <label class="removeBold" id="actionNameLabel_<?= $action->actionplanID ?>"> <?= $action->action ?> </label>
                  </td>
                  <td>
                    <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig btn btn-info pull-right"> <i class="icon-edit"></i> </a>
                    <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                    <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                      <!-- Action plan POPOVER -->
                      <div id="actionPlan_stage<?= $x ?>" class="actionPlan_stage<?= $x ?>">

                        <!-- Add notes -->
                        <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                          <h5>Notes</b></h5>
                          <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                          <a class="btn btn-success pull-right sendActionNotes" id="sendActionNotes_<?= $action->actionplanID ?>" style="margin: 5px 15px -10px 0">Send</a>
                        </div>
                        <br><br>

                        <!-- Notes -->
                        <div id="actionPlan-bottom-notes_<?= $action->actionplanID ?>" class="actionPlan-bottom-notes">
                          <div class="discussions" id="notesThread_<?= $action->actionplanID ?>">
                            <ul></ul>   
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

  <!-- START OF MODAL : VIEWNARRATIVEMODAL -->
  <div class="row">
    <div class="modal fade" id="viewNarrativeInActionPlanModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel"> Narrative : </h3>
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
  <!-- END OF MODAL : VIEWNARRATIVEMODAL --> 

</div> 
