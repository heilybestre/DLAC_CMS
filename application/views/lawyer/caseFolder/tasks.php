
<div class="container">

    <?php echo form_open(base_url() . 'caseFolder/tasks', array('class' => 'form-horizontal')); ?>

    <div class="row-fluid">
        <!-- Button to trigger modal -->
        <div class="row-fluid">
            <a class ="btn btn-medium btn-success pull-left" style='margin-bottom: 10px' href="#addTaskModalDir" data-toggle="modal">
                <i class="icon-plus-sign"></i>&nbsp;Add Task</a>
        </div>
        <!-- Modal -->
        <div id="addTaskModalDir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="addTaskModalDir-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="span1"></div><h3 id="myModalLabel">Add Task</h3>
            </div>
            <div class="modal-body">


                <div class="row-fluid">
                    <div class="span1"> </div>
                    <div class="controls">
                        Choose Type:
                        <input type="button" class="btn btn-success btn-small" value="Personal" onclick="location.href = 'javascript:toggleTaskPersonal();';">
                        <input type="button" class="btn btn-success btn-small" value="Required" onclick="location.href = 'javascript:toggleTaskRequired();';">
                    </div><br>

                    <!-- START OF PERSONAL TASK-->
                    <div id="toggleTaskPersonal" style="display: none">
                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label">Task</label>
                            <div class="controls">
                                <?php echo form_input(array('id' => 'caseTask', 'name' => 'caseTask', 'type' => 'text', 'class' => 'input-xlarge span12')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Due Date</label>
                            <div class="controls">
                                <div class="input-append date datepicker7 span12" data-date="2013-08-01" data-date-format="yyyy-mm-dd">
                                    <input class="span3" size="1" type="text" value="2013-08-01">
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="control-group pull-right">
                            <label class="control-label" for="submit"></label>
                            <div class="controls">
                                <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Task'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END OF PERSONAL TASK -->

                    <!-- START OF REQUIRED TASK -->
                    <div id="toggleTaskRequired" style="display: none">

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label">Task</label>
                            <div class="controls">
                                <?php echo form_input(array('id' => 'caseTask', 'name' => 'caseTask', 'type' => 'text', 'class' => 'input-xlarge span12')); ?>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="control-group">
                            <label class="control-label">Assign To</label>
                            <div class="controls">
                                <select id="taskAssignTo" name="taskAssignTo" class="input-xlarge span6">
                                    <option></option>
                                    <option>Intern 1</option>
                                    <option>Supervising Lawyer 1</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Due Date</label>
                            <div class="controls">
                                <div class="input-append date datepicker7 span12" data-date="2013-08-01" data-date-format="yyyy-mm-dd">
                                    <input class="span3" size="1" type="text" value="2013-08-01">
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="control-group pull-right">
                            <label class="control-label" for="submit"></label>
                            <div class="controls">
                                <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Task'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- END OF GENERAL TASK -->

                </div>

            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span7">
            <h2>TASKS</h2>
            <br>
            <table id='table_app' class="table table-striped table-bordered" data-provides="rowlink">
                <thead>
                    <tr>
                        <td> Priority </td>
                        <td> Task </td>
                        <td> Case Number </td>
                        <td> Status </td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($querytask as $row) : ?>
                        <tr>
                            <td><?php echo $row->priority; ?></td>
                            <td><?php echo $row->task; ?></td>
                            <td><?php echo $row->caseNum; ?></td>
                            <td><button class="btn btn-success btn-small">Done</button> &nbsp; <button class="btn btn-small btn-danger">Delete</button> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php echo form_close(); ?>

</div>