<div id='recommendation_form' class="container">
    <br>
    <div class="row">
    <?php echo form_open(base_url() . 'editApplication/recommendation', array('class' => 'form-horizontal')); ?>

    <!-- Form Name -->
    <h4>Intern's Recommendation for the Director</h4>
    <hr width='1150px'>

    <br>

         <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Recommended for </h5> </center>
     </div>
    </div>

    <!-- Multiple Radios -->
    <div class="control-group">
        <div class="controls">
            <?php echo form_radio(array('name' => 'recommendedFor', 'id' => 'recommendedFor-0', 'value' => 'Approval', 'checked' => TRUE)); ?>
            Approval
            <?php echo form_radio(array('name' => 'recommendedFor', 'id' => 'recommendedFor-1', 'value' => 'Rejection', 'checked' => FALSE)); ?>
            Rejection
        </div>
    </div>

    <br>

         <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Rationale </h5> </center>
     </div>
    </div>

        <div class="col-sm-9 control-group">                  
            <?php echo form_textarea(array('id' => 'recommendation', 'name' => 'recommendation', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 280px' )); ?>
        </div>
        </div>
        <br><br>

    <div class="row">
        <div class="span8"></div>
        <div class="span3">
            <!-- Button -->
            <div class="control-group pull-right">
                <label class="control-label" for="submit"></label>
                <div class="controls">
                    <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Save'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>

</div>

