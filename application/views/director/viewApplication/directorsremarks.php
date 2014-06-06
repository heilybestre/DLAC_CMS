<div id='director_remarks' class="container">
    <br>
    <?php echo form_open(base_url() . 'viewapplication/director_remarks', array('class' => 'form-horizontal')); ?>

<!-- INCOMPLETE -->
    
    <div id="incompleteApplication">
    <div class="row">
        <div class="col-sm-1 control-group">
            <div class="controls">
              <center> <h5> Task </h5> </center>
            </div>
        </div>

          <div class="col-sm-7 control-group">
            <div class="controls">
              <?php echo form_input(array('class'=>'form-control col-sm-3')); ?>
              <?php echo form_submit(array('name' => 'submit', 'class' => 'col-sm-2 btn btn-success pull-right'), 'Add Task'); ?>
            </div>
          </div>
      </div>
      <br><br>

    <div class="row">
      <div class="col-sm-1 control-group"></div>
      <div class="col-sm-7 control-group">
        <h4> For further evaluation, please accomplish the following: </h4>
        <br>
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
  </div>

<!-- INCOMPLETE -->

<!-- REJECT -->

  <div class="hide" id="rejectApplication">
    <div class="row">
        <div class="col-sm-1 control-group">
            <div class="controls">
              <center> <h5> Reason for Rejection </h5> </center>
            </div>
        </div>

          <div class="col-sm-7 control-group">
            <div class="controls">
              <?php echo form_textarea(array('class'=>'form-control col-sm-3')); ?>
              <?php echo form_submit(array('name' => 'submit', 'class' => 'col-sm-2 btn btn-success pull-right'), 'Add Task'); ?>
            </div>
          </div>
      </div>
      <br><br>

    <div class="row">
      <div class="col-sm-1 control-group"></div>
      <div class="col-sm-7 control-group">
        <h4> For further evaluation, please accomplish the following: </h4>
        <br>
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
  </div>

<!-- REJECT -->

    <?php echo form_close(); ?>

</div>