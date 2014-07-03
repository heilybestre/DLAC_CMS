<div class="container" style="margin-top:-50px;">

  <!--  -->
  <label id="usernameforaction" class="hide"><?= $name; ?></label>
  <label id="useridforaction" class="hide"><?= $this->session->userdata('userid') ?></label>

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
      <h5>Action Plan Status: <label class="label label-danger">Rejected</label> -
        <a class ="btn btn-warning" href="#reasonActionPlanModal" data-toggle="modal" style="font-size:13px; height:20px; padding-top:0px; margin-top:0px;">Reasons
        </a>
      </h5>
      <h5>Date Evaluated:<label class="label label-info">(date)</label></h5>
      <br>
    </div>
  </div>
  <?php } ?>

  <!-- Action plan is APPROVED  -->
  <?php if ($actionplanstatus == 'approved') { ?>
  <!--if approved-->
  <div class="row" id="actionplanapproveddiv">
    <div class="col-lg-4">
      <h5>Action Plan Status: <label class="label label-success">Approved</label></h5>
      <br>
    </div>

    <br>
    <div class="col-lg-5 pull-right">
      <div class='pull-right'>
        <a id='btneditactionplan' class="btn btn-success btn-primary" style="margin-top:0px;">Edit Action Plan</a>
        <a href="" class="btn btn-warning btn-small" style="margin-top:0px;">Appeal</a>
      </div>
    </div>
  </div>
  <?php } ?>

  <!-- No action plan yet -->
  <?php if ($actionplanstatus == null) { ?>
  <div class="row">
    <button id='btncreateactionplan' class='col-lg-2 btn btn-success'><i class="icon-file" style='margin-right:5px; margin-left:5px;'></i> Create Action Plan</button>
  </div>
  <br>
  <?php } ?>

  <!-- While EDITING Action plan | Collaboration of interns -->
  <div id='editingdiv' class="row hide">
    <div class="col-lg-4">
      <h5>Action Plan Status: <label class="label label-primary">Editing</label></h5>
    </div>

    <br><br><br>

    <div class="row" style="background-color:#F3F3F3; padding:10px;">
      <div class="col-lg-1" style='margin-right:-30px'><h5>Stage:</h5></div>
      <div class="col-lg-2">
        <select id='newactionstage' name='newactionstage' class='form-control'>
          <?php foreach ($stages as $stage) : ?>
          <option value='<?= $stage->stageID ?>'><?= $stage->stageName ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-lg-1" style='margin-left:20px; margin-right:-30px'><h5>Action:</h5></div>
      <div class="col-lg-3">
        <?php echo form_input(array('id' => 'newaction', 'name' => 'newaction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
      </div>

      <div class="col-lg-1" style='margin-left:20px; margin-right:-30px'><h5>Type:</h5></div>
      <div class="col-lg-2">
        <select id='newactiontype' name='newactiontype' class='form-control'>
          <?php foreach ($actioncategory as $category) : ?>
          <option value='<?= $category->racID ?>'><?= $category->category ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-lg-2" style='margin-left:20px'>
        <div id='btnaddaction' class='btn btn-info' style="margin-top:0px;">Add Action</div>
      </div>
    </div>
  </div>

  
  <!-- ACTION PLAN : CREATE ACTION PLAN -->
  <?php if ($actionplanstatus == null) { ?>
  <div id='actionplandiv' class="row disable fadedopp" >
    <?php echo form_open(base_url() . "cases/createactionplan/$case->caseID"); ?>

    <div id='actionplanbuttonsdiv' class='hide pull-right' style='margin-right: 50px;'>
      <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-medium btn-success', 'style' => 'margin-bottom:10px'), 'Submit'); ?>
      <a href="<?= base_url() ?>cases/caseFolder/<?= $case->caseID ?>?tid=actionplan" class="btn btn-medium btn-default" style="margin-bottom:10px">Cancel</a>
    </div>

    <div id='actionplanbuttonsbrdiv' class='hide'>
      <br><br><br>
    </div>

    <?php for ($x = 1; $x <= 4; $x++) { ?>
    <div class="well todo col-lg-1 actionplanwidth" style="padding:10px; margin-left:2px;">
      <h3>
        <?php
        if($x==1) echo 'New';
        else if($x==2) echo 'Preliminary Investigation';
        else if($x==3) echo 'Pre-Trial';
        else if($x==4) echo 'Trial Court';
        
        ?>
      </h3>

      <ul class="todo-list">
        <table id="action<?= $x ?>table" class="table table-condensed" style="background-color:white;">

<?php foreach (${'refactionplan_s' . $x} as $action) : ?>
          <tr id="actionTableRow_<?= $action->rapID ?>">
            <td><input id="arrayActionName_<?= $action->rapID ?>" name="action<?= $x ?>[]" class="cbactionstage<?= $x ?>" type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' checked="checked"/></td>
            <td>
              <input name="actiontype<?= $x ?>[]" value="<?= $action->category ?>" class='hide' id="arrayActionType_<?= $action->rapID ?>">
              <label class="removeBold" id="actionNameLabel_<?= $action->rapID ?>"> <?= $action->action ?> </label>
            </td>
            <td>
              <a href="#" id="popover-orig_<?= $action->rapID ?>" data-placement="bottom" class="popover-orig btn btn-info pull-right"> <i class="icon-edit"></i> </a>
              <div id="popover-orig-head_<?= $action->rapID ?>" class="hide"></div>
              <div id="popover-orig-content_<?= $action->rapID ?>" class="hide">
                <!-- Action plan POPOVER -->
                <div id="actionPlan_stage<?= $x ?>" class="actionPlan_stage<?= $x ?>">
                  <br>
                  <!--Edit-->
                  <div id="actionPlanOption-center-edit_<?= $action->rapID ?>">
                    <div class="col-lg-3"><h5>Action:</h5></div>
                    <div class="col-lg-9"><?php echo form_input(array('id' => "editAction_$action->rapID", 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control', 'value' => "$action->action")); ?></div>

                    <br><br>

                    <div class="col-lg-3"><h5>Type:</h5></div>
                    <div class="col-lg-7">
                      <select id='editactiontype_<?= $action->rapID ?>' name='newactiontype' class='form-control'>
<?php foreach ($actioncategory as $category) : ?>
                        <option value='<?= $category->racID ?>' <?php if ($category->racID == $action->category) echo 'selected'; ?>><?= $category->category ?></option>
<?php endforeach; ?>
                      </select>
                    </div>

                    <div class="col-lg-1">
                      <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->rapID ?>"> <i class="icon-save"></i> </a>
                    </div>

                    <br><br><br>
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

</div> 
