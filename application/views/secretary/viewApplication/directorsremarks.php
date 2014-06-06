<div id='director_remarks' class="container">
    <br>
    <?php echo form_open(base_url() . 'viewapplication/irector_remarks', array('class' => 'form-horizontal')); ?>

    <div class="row-fluid">

        <h4> For further evaluation, please accomplish this: </h4>
        <br>
        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="appTask">Task</label>
            <div class="controls">
                <?php echo form_input(array('id' => 'appTask', 'name' => 'appTask', 'type' => 'text', 'class' => 'input-xlarge')); ?>
                <button class="btn btn-link"> Add Task</button>
            </div>
        </div>

        <div class="span1"></div>

        <div class="span5">
            <table class="table table-striped table-bordered">
                <tr>
                    <th></th>
                    <th>Task</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td>Get more evidence</td>
                </tr>
            </table>
        </div>

    </div>

    <div class="span9"></div>

    <div class="row-fluid">
        <button class="btn btn-success">Submit</button>
    </div>

    <?php echo form_close(); ?>

</div>