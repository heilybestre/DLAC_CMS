<div class="container" style="margin-top:-50px;">

    <!-- Action plan is PENDING | Waiting for lawyer's response -->
    <?php if ($actionplanstatus == 'pending') { ?>
        <!-- upon submission of intern -->
        <div id='pendingdiv' class="row">
            <div class="col-lg-2">
                <h5>Action Plan Status:<label class="label label-warning">Pending</label></h5>
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
                <h5>Date Evaluated:<label class="label label-info">(date)</label></h5>
                <br>
            </div>
        </div>
    <?php } ?>

    <!-- Action plan is APPROVED  -->
    <?php if ($actionplanstatus == 'approved') { ?>
        <!--if approved-->
        <div class="row">
            <div class="col-lg-4">
                <h5>Action Plan Status:<label class="label label-success">Approved</label></h5>
                <br>
            </div>

            <br>
            <div class="col-lg-5 pull-right">
                <div class='pull-right'>
                    <a href="" id='btnaddactionplan' class="btn btn-success btn-primary" style="margin-top:0px;">Add</a>
                    <a href="" id='btneditactionplan' class="btn btn-success btn-primary" style="margin-top:0px;">Edit</a>
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
            <h5>Action Plan Status:<label class="label label-primary">Editing</label></h5>
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

    <!-- ACTION PLAN  -->
    <div id='actionplandiv' class="row <?php if ($actionplanstatus == 'pending' || $actionplanstatus == null) echo 'disable fadedopp'; ?>" >
        <?php echo form_open(base_url() . "cases/createactionplan/$case->caseID"); ?>

        <div id='actionplanbuttonsdiv' class='hide pull-right' style='margin-right: 50px;'>
            <?php echo form_submit(array('id' => 'saveactionplanbtn', 'name' => 'submit', 'class' => 'btn btn-medium btn-success', 'style' => 'margin-bottom:10px'), 'Save'); ?>
            <div id='cancelactionplanbtn' class="btn btn-medium btn-default" style="margin-bottom:10px">Cancel</div>
        </div>

        <div id='actionplanbuttonsbrdiv' class='hide'>
            <br><br><br>
        </div>
        
        <!-- 1 NEW -->
        <div class="well todo col-lg-1 actionplanwidth" style="padding:10px; margin-left:2px;">
            <h3> New 
            </h3> 
            <ul class="todo-list">
                <table id='action1table' class="table table-condensed" style="background-color:white;">
                    <?php $stage1count = 1; ?>
                    <?php foreach ($actionplan_stage1 as $action) : ?>
                        <tr>
                            <td><input name='action1[]' class='cbactionstage1 <?php if ($actionplanstatus == null) { ?> disable <?php } ?>' type='checkbox' value="<?= $action->actionplanID ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 1, <?= $case->stage ?>)" <?php
                                if ($action->status == 1) {
                                    echo 'checked';
                                }
                                ?> /></td>
                            <td>
                                <input name='actionname1[]' value="<?= $action->action ?>" class='hide'>
                                <input name='actiontype1[]' value="<?= $action->category ?>" class='hide'>
                                <?= $action->action ?>
                            </td>
                            <td>
                                <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig vianica btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
                                <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                                <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                                    <form>
                                        <!-- Action plan POPOVER -->
                                        <div id="actionPlan_stage1" class="actionPlan_stage1">

                                            <div id="actionPlanOption-top">
                                                <h5>
                                                    <b>Assigned to </b>
                                                    <label class="label label-default">
                                                        <?php
                                                        if ($action->assignedTo != null) {
                                                            echo $this->People_model->getuserfield('firstname', $action->assignedTo);
                                                        } else {
                                                            echo 'None';
                                                        }
                                                        ?>
                                                    </label>
                                                    <div id="actionPlanActionButtons_<?= $action->actionplanID ?>" class="pull-right">
                                                        <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                        <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                                                        <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                                                    </div>
                                                </h5>
                                                <h5><b>Type:</b> <?php echo $this->Case_model->getactioncategoryname($action->category)->category; ?> </h5>
                                            </div>

                                            <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                                                <h5>Notes</b></h5>
                                                <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                                                <a class="btn btn-success pull-right sendActionNotes" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                                                <br><br>
                                            </div>

                                            <!--Edit-->
                                            <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                                                <div class="col-lg-3">
                                                    <h5>Action:</h5>
                                                </div>

                                                <div class="col-lg-9">
                                                    <?php echo form_input(array('id' => "editAction_$action->actionplanID", 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control', 'value' => "$action->action")); ?>
                                                </div>

                                                <br><br>

                                                <div class="col-lg-3">
                                                    <h5>Type:</h5>
                                                </div>

                                                <div class="col-lg-5">
                                                    <select id='editactiontype_<?= $action->actionplanID ?>' name='newactiontype' class='form-control'>
                                                        <?php foreach ($actioncategory as $category) : ?>
                                                            <option value='<?= $category->racID ?>' <?php if ($category->racID == $action->category) echo 'selected'; ?>><?= $category->category ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                                                    <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                                                </div>

                                                <br><br><br>
                                            </div>

                                            <!--Delete-->
                                            <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">
                                                <h4><center>Are you sure you want to delete this item?</center></h4> 
                                                <div class='centerdiv' style='width:20%'>
                                                    <a class="btn btn-success okayDeleteButton" id="okayDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>
                                                </div>
                                                <br><br>
                                            </div>

                                            <div id="actionPlan-bottom-notes_<?= $action->actionplanID ?>" class="actionPlan-bottom-notes">
                                                <hr>
                                                <div class="discussions" id="notesThread_<?= $action->actionplanID ?>">
                                                    <ul>
                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>

                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>
                                                    </ul>		
                                                </div>
                                                <br>
                                            </div>
                                        </div> 
                                        <!-- Action plan POPOVER -->
                                    </form>
                                </div>
                            </td>
                            <?php $stage1count++; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </ul>
        </div>

        <!-- 2 PRELIMINARY INVESTIGATION -->
        <div class="well todo col-lg-1 actionplanwidth" style="padding:10px;">
            <h3> Preliminary Investigation
            </h3>
            <ul class="todo-list">
                <table id='action2table' class='table table-condensed' style='background-color:white;'>
                    <?php foreach ($actionplan_stage2 as $action) : ?>
                        <tr>
                            <td><input name='action2[]' class='cbactionstage2 <?php if ($actionplanstatus == null) { ?> disable <?php } ?>' type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 2, <?= $case->stage ?>)" <?php if ($action->status == 1) echo 'checked'; ?>/></td>
                            <td>
                                <input name='actionname2[]' value="<?= $action->action ?>" class='hide'>
                                <input name='actiontype2[]' value="<?= $action->category ?>" class='hide'>
                                <?= $action->action ?>
                            </td>
                            <td>
                                <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig vianica btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
                                <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                                <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                                    <form>
                                        <!-- Action plan POPOVER -->
                                        <div id="actionPlan_stage1" class="actionPlan_stage1">

                                            <div id="actionPlanOption-top">
                                                <h5>
                                                    <b>Assigned to </b><label class="label label-default">None</label>
                                                    <div id="actionPlanActionButtons_<?= $action->actionplanID ?>" class="pull-right">
                                                        <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                        <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                                                        <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                                                    </div>
                                                </h5>
                                                <h5><b>Type:</b> <?php echo $this->Case_model->getactioncategoryname($action->category)->category; ?> </h5>
                                            </div>

                                            <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                                                <h5>Notes</b></h5>
                                                <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                                                <a class="btn btn-success pull-right sendActionNotes" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                                                <br><br>
                                            </div>

                                            <!--Edit-->
                                            <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                                                <div class="col-lg-3">
                                                    <h5>Action:</h5>
                                                </div>

                                                <div class="col-lg-9">
                                                    <?php echo form_input(array('id' => "editAction_$action->actionplanID", 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control', 'value' => "$action->action")); ?>
                                                </div>

                                                <br><br>

                                                <div class="col-lg-3">
                                                    <h5>Type:</h5>
                                                </div>

                                                <div class="col-lg-5">
                                                    <select id='editactiontype_<?= $action->actionplanID ?>' name='newactiontype' class='form-control'>
                                                        <?php foreach ($actioncategory as $category) : ?>
                                                            <option value='<?= $category->racID ?>' <?php if ($category->racID == $action->category) echo 'selected'; ?>><?= $category->category ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                                                    <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                                                </div>

                                                <br><br><br>
                                            </div>

                                            <!--Delete-->
                                            <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">
                                                <h4><center>Are you sure you want to delete this item?</center></h4> 
                                                <div class='centerdiv' style='width:20%'>
                                                    <a class="btn btn-success okayDeleteButton" id="okayDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>
                                                </div>
                                                <br><br>
                                            </div>

                                            <div id="actionPlan-bottom-notes_<?= $action->actionplanID ?>" class="actionPlan-bottom-notes">
                                                <hr>
                                                <div class="discussions" id="notesThread_<?= $action->actionplanID ?>">
                                                    <ul>
                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>

                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>
                                                    </ul>		
                                                </div>
                                                <br>
                                            </div>
                                        </div> 
                                        <!-- Action plan POPOVER -->
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </ul>
        </div>  

        <!-- 3 PRE-TRIAL -->
        <div class="well todo col-lg-1 actionplanwidth" style="padding:10px;">
            <h3> Pre-trial
            </h3>
            <ul class="todo-list">
                <table id='action3table' class='table table-condensed' style='background-color:white;'>
                    <?php foreach ($actionplan_stage3 as $action) : ?>
                        <tr>
                            <td><input name='action3[]' class='cbactionstage3 <?php if ($actionplanstatus == null) { ?> disable <?php } ?>' type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 3, <?= $case->stage ?>)" <?php if ($action->status == 1) echo 'checked'; ?> /></td>
                            <td>
                                <input name='actionname3[]' value="<?= $action->action ?>" class='hide'>
                                <input name='actiontype3[]' value="<?= $action->category ?>" class='hide'>
                                <?= $action->action ?>
                            </td>
                            <td>
                                <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig vianica btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
                                <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                                <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                                    <form>
                                        <!-- Action plan POPOVER -->
                                        <div id="actionPlan_stage1" class="actionPlan_stage1">

                                            <div id="actionPlanOption-top">
                                                <h5>
                                                    <b>Assigned to </b><label class="label label-default">None</label>
                                                    <div id="actionPlanActionButtons_<?= $action->actionplanID ?>" class="pull-right">
                                                        <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                        <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                                                        <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                                                    </div>
                                                </h5>
                                                <h5><b>Type:</b> <?php echo $this->Case_model->getactioncategoryname($action->category)->category; ?> </h5>
                                            </div>

                                            <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                                                <h5>Notes</b></h5>
                                                <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                                                <a class="btn btn-success pull-right sendActionNotes" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                                                <br><br>
                                            </div>

                                            <!--Edit-->
                                            <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                                                <div class="col-lg-3">
                                                    <h5>Action:</h5>
                                                </div>

                                                <div class="col-lg-9">
                                                    <?php echo form_input(array('id' => "editAction_$action->actionplanID", 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control', 'value' => "$action->action")); ?>
                                                </div>

                                                <br><br>

                                                <div class="col-lg-3">
                                                    <h5>Type:</h5>
                                                </div>

                                                <div class="col-lg-5">
                                                    <select id='editactiontype_<?= $action->actionplanID ?>' name='newactiontype' class='form-control'>
                                                        <?php foreach ($actioncategory as $category) : ?>
                                                            <option value='<?= $category->racID ?>' <?php if ($category->racID == $action->category) echo 'selected'; ?>><?= $category->category ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                                                    <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                                                </div>

                                                <br><br><br>
                                            </div>

                                            <!--Delete-->
                                            <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">
                                                <h4><center>Are you sure you want to delete this item?</center></h4> 
                                                <div class='centerdiv' style='width:20%'>
                                                    <a class="btn btn-success okayDeleteButton" id="okayDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>
                                                </div>
                                                <br><br>
                                            </div>

                                            <div id="actionPlan-bottom-notes_<?= $action->actionplanID ?>" class="actionPlan-bottom-notes">
                                                <hr>
                                                <div class="discussions" id="notesThread_<?= $action->actionplanID ?>">
                                                    <ul>
                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>

                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>
                                                    </ul>		
                                                </div>
                                                <br>
                                            </div>
                                        </div> 
                                        <!-- Action plan POPOVER -->
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </ul>
        </div>

        <!-- 4 TRIAL COURT -->
        <div class="clearfix well todo col-lg-1 actionplanwidth" style="padding:10px;">
            <h3> Trial Court
            </h3>
            <ul class="todo-list">
                <table id='action4table' class='table table-condensed' style='background-color:white;'>
                    <?php foreach ($actionplan_stage4 as $action) : ?>
                        <tr>
                            <td><input name='action4[]' class='cbactionstage4 <?php if ($actionplanstatus == null) { ?> disable <?php } ?>' type='checkbox' value="<?= $action->action ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 4, <?= $case->stage ?>)" <?php if ($action->status == 1) echo 'checked'; ?> /></td>
                            <td>
                                <input name='actionname4[]' value="<?= $action->action ?>" class='hide'>
                                <input name='actiontype4[]' value="<?= $action->category ?>" class='hide'>
                                <?= $action->action ?>
                            </td>
                            <td>
                                <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig vianica btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
                                <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                                <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                                    <form>
                                        <!-- Action plan POPOVER -->
                                        <div id="actionPlan_stage1" class="actionPlan_stage1">

                                            <div id="actionPlanOption-top">
                                                <h5>
                                                    <b>Assigned to </b><label class="label label-default">None</label>
                                                    <div id="actionPlanActionButtons_<?= $action->actionplanID ?>" class="pull-right">
                                                        <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                        <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                                                        <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                                                    </div>
                                                </h5>
                                                <h5><b>Type:</b> <?php echo $this->Case_model->getactioncategoryname($action->category)->category; ?> </h5>
                                            </div>

                                            <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                                                <h5>Notes</b></h5>
                                                <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                                                <a class="btn btn-success pull-right sendActionNotes" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                                                <br><br>
                                            </div>

                                            <!--Edit-->
                                            <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                                                <div class="col-lg-3">
                                                    <h5>Action:</h5>
                                                </div>

                                                <div class="col-lg-9">
                                                    <?php echo form_input(array('id' => "editAction_$action->actionplanID", 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control', 'value' => "$action->action")); ?>
                                                </div>

                                                <br><br>

                                                <div class="col-lg-3">
                                                    <h5>Type:</h5>
                                                </div>

                                                <div class="col-lg-5">
                                                    <select id='editactiontype_<?= $action->actionplanID ?>' name='newactiontype' class='form-control'>
                                                        <?php foreach ($actioncategory as $category) : ?>
                                                            <option value='<?= $category->racID ?>' <?php if ($category->racID == $action->category) echo 'selected'; ?>><?= $category->category ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                                                    <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                                                </div>

                                                <br><br><br>
                                            </div>

                                            <!--Delete-->
                                            <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">
                                                <h4><center>Are you sure you want to delete this item?</center></h4> 
                                                <div class='centerdiv' style='width:20%'>
                                                    <a class="btn btn-success okayDeleteButton" id="okayDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                                    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>
                                                </div>
                                                <br><br>
                                            </div>

                                            <div id="actionPlan-bottom-notes_<?= $action->actionplanID ?>" class="actionPlan-bottom-notes">
                                                <hr>
                                                <div class="discussions" id="notesThread_<?= $action->actionplanID ?>">
                                                    <ul>
                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>

                                                        <li id="actionPlanNote" class="actionPlanNote">
                                                            <div class="name">Megan Abbott</div>
                                                            <div class="date">Today, 1:08 PM</div>
                                                            <div class="delete"><i class="icon-remove"></i></div>
                                                            <div class="message">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                            </div>	
                                                        </li>
                                                    </ul>		
                                                </div>
                                                <br>
                                            </div>
                                        </div> 
                                        <!-- Action plan POPOVER -->
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </ul>
        </div>

        <?php echo form_close(); ?>
    </div>

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
