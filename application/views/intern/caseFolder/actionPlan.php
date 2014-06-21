<div class="container" style="margin-top:-50px;">

    <!-- while editing -->
    <div id='editingdiv' class="row hide">

        <div class="col-lg-4">
            <h5>Action Plan Status:<label class="label label-primary">Editing</label></h5>
        </div>

        <br><br><br>

        <div class="row" style="background-color:#F3F3F3; padding:10px;">

            <div class="col-lg-1">
                <h5>Stage:</h5>
            </div>

            <div class="col-lg-2">
                <select id='newactionstage' name='newactionstage' class='form-control'>
                    <option value='1'>New</option>
                    <option value='2'>Preliminary Investigation</option>
                    <option value='3'>Pre-Trial</option>
                    <option value='4'>Trial Court</option>
                    <option value='5'>Appeal</option>
                </select>
            </div>

            <br><br>

            <div class="col-lg-1">
                <h5>Action:</h5>
            </div>

            <div class="col-lg-3">
                <?php echo form_input(array('id' => 'newaction', 'name' => 'newaction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
            </div>

            <br><br>

            <div class="col-lg-1">
                <h5>Type:</h5>
            </div>

            <div class="col-lg-2">
                <select id='newactiontype' name='newactiontype' class='form-control'>
                    <option value='1'>Evidence</option>
                    <option value='2'>Legal Document</option>
                    <option value='3'>People</option>
                    <option value='4'>Events</option>
                </select>
            </div>

            <div class="col-lg-2">
                <div id='btnaddaction' class='btn btn-info' style="margin-top:0px;">Add Action</div>
            </div>

        </div>

    </div>

    <!-- before anything else; hide tasks-->
    <?php if ($actionplanstatus == null) { ?>
    <div class="row">
        <div id='btncreateactionplan' class="col-lg-2">
            <a class ="btn btn-medium btn-success" style='margin-bottom: 10px' href="" data-toggle="modal">
                <i class="icon-file" style='margin-right:5px; margin-left:5px;'></i> Create Action Plan
            </a>
        </div>
    </div>

    <div id='actionplandiv' class="row disable fadedopp">

        <?php echo form_open(base_url() . "cases/createactionplan/$case->caseID"); ?>
        
        <div class="col-sm-8"></div>
        
        <div id='saveactionplanbtndiv' class="col-lg-1 hide">
            <?php echo form_submit(array('name' => 'save', 'class' => 'btn btn-medium btn-info', 'style' => 'margin-bottom:10px'), 'Save Action Plan'); ?>
        </div>
        
       <div class="col-sm-1"></div>

        <div id='submitactionplanbtndiv' class="col-lg-1 hide">
            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-medium btn-success', 'style' => 'margin-bottom:10px'), 'Submit Action Plan'); ?>
        </div>
            
        <br><br><br>
        
        <!-- 1 NEW || MAKE ALL CHECKBOX DISABLED-->
        <div class="well todo col-lg-2" style="padding:10px; margin-left:2px;">
            <h3> New 
                <!-- <a href='#editActionPlanModal' data-toggle='modal' class="pull-right" style="margin-top:-5px; border-radius: 8px;">
                    <i class="icon-plus-sign"></i>
                </a> -->
            </h3> 
            <ul class="todo-list">
        <table id='action1table' class="table table-condensed" style="background-color:white;">
        <?php $stage1count = 1; ?>
        <?php foreach($actionplan_stage1 as $action) : ?>
        <tr>
        <td><input class='cbactionstage1' type='checkbox' value="<?= $action->actionplanID ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 1, <?= $case->stage ?>)" <?php if($action->status==1) {
            echo 'checked';} ?> /></td>
        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> 
            <a href="#" id="popover-editing<?= $action->actionplanID ?>" data-placement="bottom" class="popover-editing btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
            <div id="popover-editing-head_<?= $action->actionplanID ?>" class="hide"></div>
            <div id="popover-editing-content_<?= $action->actionplanID ?>" class="hide">
            <form>
                
            <!--ACTION PLAN STAGE 1-->
            <div id="actionPlan_stage1" class="actionPlan_stage1">

            <div id="actionPlanOption-top">
            <h5>
                <b>Assigned to </b><label class="label label-default">None</label>
                <div id="actionPlanActionButtons" class="pull-right">
                    <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                    <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                    <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                </div>
           </h5>
           <h5><b>Type:</b> (Document)</h5>
                                   
           </div>

           <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                <h5>Notes</b></h5>
                <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                <a href="" class="btn btn-success pull-right" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                <br><br>
           </div>

           <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                <div class="col-lg-3"> <h5>Action:</h5></div>
                
                <div class="col-lg-9">
                     <?php echo form_input(array('id' => 'editAction_<?= $action->actionplanID ?>', 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
                </div>
                <br><br>

                <div class="col-lg-3"><h5>Type:</h5></div>

                <div class="col-lg-5">
                    <select id='editactiontype_<?= $action->actionplanID ?>' name='editactiontype' class='form-control'>
                        <option value='1'>Evidence</option>
                        <option value='2'>Legal Document</option>
                        <option value='3'>People</option>
                        <option value='4'>Events</option>
                    </select>
                </div>

                <div class="col-lg-3">
                       <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                       <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                </div>
            <br>
            </div>

            <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">

                <h4>Are you sure you want to delete this item?</h4> 
                <a class="btn btn-success deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>      
                <br>
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
        <!--ACTION PLAN STAGE 1-->
          </form>
         </div>
         </td>
                <?php $stage1count++; ?>
            </tr><?php endforeach; ?>
        </table>
    </ul>
        </div>

        <!-- 2 PRELIMINARY INVESTIGATION -->
        <div class="well todo col-lg-3" style="padding:10px;">
            <h3> Preliminary Investigation 
                <!-- <a href='#editActionPlanModal' data-toggle='modal' class="pull-right" style="margin-top:-5px;">
                    <i class="icon-plus-sign"></i>
                </a> -->
            </h3>
            <ul class="todo-list">
                <table id='action2table' class='table table-condensed disable' style='background-color:white;'>
                    <tr>
                        <td><input type='checkbox' name='action2[]' value='Preliminary Investigation Hearing' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname2[]' value='Preliminary Investigation' class='hide'> Preliminary Investigation Hearing </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action2[]' value='Resolution' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname2[]' value='Resolution' class='hide'> Resolution </td>
                    </tr>

                    <tr>
                        <td><input type='checkbox' name='action2[]' value='Information' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname2[]' value='Information' class='hide'> Information </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action2[]' value='Certificate of Preliminary Investigation' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname2[]' value='Certificate of Preliminary Investigation' class='hide'> Certificate of Preliminary Investigation </td>
                    </tr>
                </table>
            </ul>
        </div>  

        <!-- 3 PRE-TRIAL -->
        <div class="well todo col-lg-2" style="padding:10px;">
            <h3> Pre-trial
                <!-- <a href='#editActionPlanModal' data-toggle='modal' class="pull-right" style="margin-top:-5px;">
                    <i class="icon-plus-sign"></i>
                </a> -->
            </h3>
            <ul class="todo-list">
                <table id='action3table' class='table table-condensed disable' style='background-color:white;'>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='Order of Arraignment' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='Order of Arraignment' class='hide'> Order of Arraignment </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='Arraignment' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='Arraignment' class='hide'> Arraignment </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='Schedule of Pre-Trial' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='Schedule of Pre-Trial' class='hide'> Schedule of Pre-Trial </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='Prepare Pre-Trial Brief' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='Prepare of Pre-Trial Brief' class='hide'> Prepare Pre-Trial Brief </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='Pre-Trial Conference' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='Pre-Trial Conference' class='hide'> Pre-Trial Conference </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='Pre-Trial Order' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='Pre-Trial Order' class='hide'> Pre-Trial Order </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='File Judicial Affidavit' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='File Judicial Affidavit' class='hide'> File Judicial Affidavit </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='File Formal Entry of Appearance' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='File Formal Entry of Appearance' class='hide'> File Formal Entry of Appearance </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action3[]' value='Schedule of Hearing' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname3[]' value='Schedule of Hearing' class='hide'> Schedule of Hearing </td>
                    </tr>
                </table>
            </ul>
        </div>

        <!-- 4 TRIAL COURT -->
        <div class="clearfix well todo col-lg-2" style="padding:10px;">
            <h3> Trial Court 
                <!-- <a href='#editActionPlanModal' data-toggle='modal' class="pull-right" style="margin-top:-5px;">
                    <i class="icon-plus-sign"></i>
                </a> -->
            </h3>
            <ul class="todo-list">
                <table id='action4table' class='table table-condensed disable' style='background-color:white;'>
                    <tr>
                        <td><input type='checkbox' name='action4[]' value='Pre-Trial Meeting with Client' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname4[]' value='Pre-Trial Meeting with Client' class='hide'> Pre-Trial Meeting with Client </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action4[]' value='Pre-Trial Meeting with Witness' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname4[]' value='Pre-Trial Meeting with Witness' class='hide'> Pre-Trial Meeting with Witness </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action4[]' value='Trial' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname4[]' value='Trial' class='hide'> Trial </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action4[]' value='Decision' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname4[]' value='Decision' class='hide'> Decision </td>
                    </tr>
                </table>
            </ul>
        </div>

        <!-- 5 APPEAL -->
        <div class="hide clearfix well todo col-lg-2" style="padding:10px;">
            <h3> Appeal 
                <!-- <a href='#editActionPlanModal' data-toggle='modal' class="pull-right" style="margin-top:-5px;">
                    <i class="icon-plus-sign"></i>
                </a> -->
            </h3>
            <ul class="todo-list">
                <table id='action5table' class='table table-condensed disable' style='background-color:white;'>
                    <tr>
                        <td><input type='checkbox' name='action5' value='File Notice of Appeal' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname5[]' value='File Notice of Appeal' class='hide'> File Notice of Appeal </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action5' value='Submit Trial Records' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname5[]' value='Submit Trial Records' class='hide'> Submit Trial Records </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action5' value='File Trial Memorandum' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname5[]' value='File Trial Memorandum' class='hide'> File Trial Memorandum </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action5' value='Trial' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname5[]' value='Trial' class='hide'> Trial </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action5' value='Decision' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname5[]' value='Decision' class='hide'> Decision </td>
                    </tr>
                </table>
            </ul>
        </div>
        <?php echo form_close(); ?>
    </div>
    <?php } ?>

    <?php if($actionplanstatus == 'pending'){ ?>
    <!-- upon submission of intern -->
    <div id='pendingdiv' class="row">
        <div class="col-lg-2">
            <h5>Action Plan Status:<label class="label label-warning">Pending</label></h5>
        </div>
    </div>
    <?php } ?>
    
    <!-- upon rejection -->
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

    <?php if($actionplanstatus == 'approved'){ ?>
    <!--if approved-->
    <div class="row">
        <div class="col-lg-4">
            <h5>Action Plan Status:<label class="label label-success">Approved</label></h5>
            <br>
        </div>

        <div class="col-lg-6"></div>
        <div class="col-lg-2">
            <br>
            <a href="" class="pull-right btn btn-warning btn-small" style="margin-top:0px;">Appeal</a>
        </div>
    </div>

    <?php } ?>

    <?php if($actionplanstatus == 'approved' || $actionplanstatus == 'pending'){ ?>
    <div class="row <?php if($actionplanstatus=='pending') echo 'disable fadedopp'; ?>" >

    <!-- 1 NEW -->
    <div class="well todo col-lg-2" style="padding:10px; margin-left:2px;">
    <h3> New </h3> 
    <ul class="todo-list">
        <table id='action1table' class="table table-condensed" style="background-color:white;">
        <?php $stage1count = 1; ?>
        <?php foreach($actionplan_stage1 as $action) : ?>
        <tr>
        <td><input class='cbactionstage1' type='checkbox' value="<?= $action->actionplanID ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 1, <?= $case->stage ?>)" <?php if($action->status==1) {
            echo 'checked';} ?> /></td>
        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> 
            <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig vianica btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
            <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
            <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
            <form>
                
            <!--ACTION PLAN STAGE 1-->
            <div id="actionPlan_stage1" class="actionPlan_stage1">

            <div id="actionPlanOption-top">
            <h5>
                <b>Assigned to </b><label class="label label-default">None</label>
                <div id="actionPlanActionButtons" class="pull-right">
                    <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                    <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                    <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                </div>
           </h5>
           <h5><b>Type:</b> (Document)</h5>
                                   
           </div>

           <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">
                <h5>Notes</b></h5>
                <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                <a href="" class="btn btn-success pull-right" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                <br><br>
           </div>

           <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                <div class="col-lg-3"> <h5>Action:</h5></div>
                
                <div class="col-lg-9">
                     <?php echo form_input(array('id' => 'editAction_<?= $action->actionplanID ?>', 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
                </div>
                <br><br>

                <div class="col-lg-3"><h5>Type:</h5></div>

                <div class="col-lg-5">
                    <select id='editactiontype_<?= $action->actionplanID ?>' name='editactiontype' class='form-control'>
                        <option value='1'>Evidence</option>
                        <option value='2'>Legal Document</option>
                        <option value='3'>People</option>
                        <option value='4'>Events</option>
                    </select>
                </div>

                <div class="col-lg-3">
                       <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                       <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                </div>
            <br>
            </div>

            <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">

                <h4>Are you sure you want to delete this item?</h4> 
                <a class="btn btn-success deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>      
                <br>
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
        <!--ACTION PLAN STAGE 1-->
          </form>
         </div>
         </td>
                <?php $stage1count++; ?>
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
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> 
                            
                        <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
                            <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                            <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                              <form>
                              <!--ACTION PLAN-->
                                <div id="actionPlan_stage2" class="actionPlan_stage2">

                                <div id="actionPlanOption-top">
                                <h5>
                                    <b>Assigned to </b><label class="label label-default">None</label>
                                    <div id="actionPlanActionButtons" class="pull-right">
                                        <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                        <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                                        <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                                    </div>
                                </h5>
                                    <h5><b>Type:</b> (Document)</h5>
                                    
                                </div>

                                <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">

                                    <h5>Notes</b></h5>
                                    <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                                    <a href="" class="btn btn-success pull-right" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                                    <br>
                                </div>

                                <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                                    <div class="col-lg-3">
                                           <h5>Action:</h5>
                                       </div>

                                       <div class="col-lg-9">
                                           <?php echo form_input(array('id' => 'editAction_<?= $action->actionplanID ?>', 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
                                       </div>

                                       <br><br>

                                       <div class="col-lg-3">
                                           <h5>Type:</h5>
                                       </div>

                                       <div class="col-lg-5">
                                           <select id='editactiontype_<?= $action->actionplanID ?>' name='editactiontype' class='form-control'>
                                               <option value='1'>Evidence</option>
                                               <option value='2'>Legal Document</option>
                                               <option value='3'>People</option>
                                               <option value='4'>Events</option>
                                           </select>
                                       </div>

                                       <div class="col-lg-3">
                                           <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                                           <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                                       </div>
                                       <br>
                                </div>

                                <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">

                                    <h4>Are you sure you want to delete this item?</h4> 
                                    <a class="btn btn-success deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>      
                                    <br>
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
                                <!--ACTION PLAN-->
                              </form>
                            </div>
                            
                        </td>
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
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> 
                        
                            <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
                            <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                            <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                              <form>
                                <!--ACTION PLAN-->
                                <div id="actionPlan_stage3" class="actionPlan_stage3">

                                <div id="actionPlanOption-top">
                                <h5>
                                    <b>Assigned to </b><label class="label label-default">None</label>
                                    <div id="actionPlanActionButtons" class="pull-right">
                                        <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                        <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                                        <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                                    </div>
                                </h5>
                                    <h5><b>Type:</b> (Document)</h5>
                                    
                                </div>

                                <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">

                                    <h5>Notes</b></h5>
                                    <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                                    <a href="" class="btn btn-success pull-right" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                                    <br>
                                </div>

                                <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                                    <div class="col-lg-3">
                                           <h5>Action:</h5>
                                       </div>

                                       <div class="col-lg-9">
                                           <?php echo form_input(array('id' => 'editAction_<?= $action->actionplanID ?>', 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
                                       </div>

                                       <br><br>

                                       <div class="col-lg-3">
                                           <h5>Type:</h5>
                                       </div>

                                       <div class="col-lg-5">
                                           <select id='editactiontype_<?= $action->actionplanID ?>' name='editactiontype' class='form-control'>
                                               <option value='1'>Evidence</option>
                                               <option value='2'>Legal Document</option>
                                               <option value='3'>People</option>
                                               <option value='4'>Events</option>
                                           </select>
                                       </div>

                                       <div class="col-lg-3">
                                           <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                                           <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                                       </div>
                                       <br>
                                </div>

                                <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">

                                    <h4>Are you sure you want to delete this item?</h4> 
                                    <a class="btn btn-success deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>      
                                    <br>
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
                                <!--ACTION PLAN-->
                              </form>
                            </div>
                        </td>
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
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?>
                        <a href="#" id="popover-orig_<?= $action->actionplanID ?>" data-placement="bottom" class="popover-orig btn btn-success pull-right"> <i class="icon-caret-down"></i> </a>
                            <div id="popover-orig-head_<?= $action->actionplanID ?>" class="hide"></div>
                            <div id="popover-orig-content_<?= $action->actionplanID ?>" class="hide">
                              <form>
                             <!--ACTION PLAN-->
                                <div id="actionPlan_stage4" class="actionPlan_stage4">

                                <div id="actionPlanOption-top">
                                <h5>
                                    <b>Assigned to </b><label class="label label-default">None</label>
                                    <div id="actionPlanActionButtons" class="pull-right">
                                        <a class="btn btn-success getActionButton" id="getActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                        <a class="btn btn-info editActionButton" id="editActionButton_<?= $action->actionplanID ?>"><i class="icon-edit"></i> </a>
                                        <a class="btn btn-danger deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"><i class="icon-trash"></i> </a>
                                    </div>
                                </h5>
                                    <h5><b>Type:</b> (Document)</h5>
                                    
                                </div>

                                <div id="actionPlanOption-center-writeNotes_<?= $action->actionplanID ?>">

                                    <h5>Notes</b></h5>
                                    <textarea class="diss-form" id="actionWriteNotes_<?= $action->actionplanID ?>" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
                                    <a href="" class="btn btn-success pull-right" id="sendActionNotes_<?= $action->actionplanID ?>">Send</a>
                                    <br>
                                </div>

                                <div id="actionPlanOption-center-edit_<?= $action->actionplanID ?>" class="hide">
                                    <div class="col-lg-3">
                                           <h5>Action:</h5>
                                       </div>

                                       <div class="col-lg-9">
                                           <?php echo form_input(array('id' => 'editAction_<?= $action->actionplanID ?>', 'name' => 'editAction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
                                       </div>

                                       <br><br>

                                       <div class="col-lg-3">
                                           <h5>Type:</h5>
                                       </div>

                                       <div class="col-lg-5">
                                           <select id='editactiontype_<?= $action->actionplanID ?>' name='editactiontype' class='form-control'>
                                               <option value='1'>Evidence</option>
                                               <option value='2'>Legal Document</option>
                                               <option value='3'>People</option>
                                               <option value='4'>Events</option>
                                           </select>
                                       </div>

                                       <div class="col-lg-3">
                                           <a class="btn btn-success saveActionButton" id="saveActionButton_<?= $action->actionplanID ?>"> <i class="icon-save"></i> </a>
                                           <a class="btn btn-danger cancelEditButton" id="cancelEditButton_<?= $action->actionplanID ?>"> <i class="icon-ban-circle"></i> </a>
                                       </div>
                                       <br>
                                </div>

                                <div id="actionPlanOption-center-delete_<?= $action->actionplanID ?>" class="hide">

                                    <h4>Are you sure you want to delete this item?</h4> 
                                    <a class="btn btn-success deleteActionButton" id="deleteActionButton_<?= $action->actionplanID ?>"> <i class="icon-ok"></i> </a>
                                    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton_<?= $action->actionplanID ?>"> <i class="icon-remove"></i> </a>      
                                    <br>
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
                                <!--ACTION PLAN-->
                              </form>
                            </div>
                        </td>
                    </tr><?php endforeach; ?>
                </table>
            </ul>
        </div>

        <!-- 5 APPEAL -->
<!--        <div class="clearfix well todo col-lg-2" style="padding:10px;">
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
