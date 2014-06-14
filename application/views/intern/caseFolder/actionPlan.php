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

        <div id='saveactionplan' class="col-lg-2 pull-right hide">
            <?php echo form_submit(array('name' => 'save', 'class' => 'btn btn-medium btn-info', 'style' => 'margin-bottom:10px'), 'Save Action Plan'); ?>
        </div>

        <div id='submitactionplanbtndiv' class="col-lg-2 pull-right hide">
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
                    <tr>
                        <td><input class="disable" type='checkbox' name='action1[]' value='Set Client Meeting' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Set Client Meeting' class='hide'> Set Client Meeting </td>
                        <td><a href="" class="btn"> x </a> </td>
                    </tr>
                    <tr>
                        <td><input class="disable"  type='checkbox' name='action1[]' value='Inform Client' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Inform Client' class='hide'> Inform Client </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action1[]' value='Meet Client' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Meet Client' class='hide'> Meet Client </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action1[]' value='Gather Case Information' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Gather Case Information' class='hide'> Gather Case Information </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action1[]' value='Gather Evidence' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Gather Evidence' class='hide'> Gather Evidence </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action1[]' value='Gather Witnesses with Affidavits' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Gather Witnesses with Affidavits' class='hide'> Gather Witnesses with Affidavits </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action1[]' value='Prepare Affidavits' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Prepare Affidavits' class='hide'> Prepare Affidavits </td>
                    </tr>
                    <tr>
                        <td><input type='checkbox' name='action1[]' value='Notice of Preliminary Investigation' style='margin: 0px 5px 0px 10px;' /></td>
                        <td><input name='actionname1[]' value='Notice of Preliminary Investigation' class='hide'> Notice of Preliminary Investigation </td>
                    </tr>
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
            <h3> New 
            </h3> 
            <ul class="todo-list">
                <table id='action1table' class="table table-condensed" style="background-color:white;">
                    <?php foreach($actionplan_stage1 as $action) : ?>
                    <tr>
                        <td><input class='cbactionstage1' type='checkbox' value="<?= $action->actionplanID ?>" style='margin: 0px 5px 0px 10px;' onclick="actionclick(<?= $action->actionplanID ?>, 1, <?= $case->stage ?>)" <?php if($action->status==1) echo 'checked'; ?> /></td>
                        <td><input value="<?= $action->action ?>" class='hide'> <?= $action->action ?> 
                            
                            <a href="#" id="popover" data-placement="bottom" class="btn btn-success"> <i class="icon-caret-down"></i> </a>
                            <div id="popover-head" class="hide"></div>
                            <div id="popover-content" class="hide">
                              <form>
                                <?php $this->load->view('intern/actionPlanOptions'); ?>
                              </form>
                            </div>

                        </td>
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
