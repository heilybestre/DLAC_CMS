<div id='legaladvice_form' class="container">

    <?php echo form_open(base_url() . 'editApplication/legaladvice', array('class' => 'form-horizontal')); ?>

    <div class="row">
        <br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Advice Given by the Intern </h5> </center>
     </div>
  </div>

    <div class="col-sm-9 control-group">
      <div class="controls">
    <?php echo form_textarea(array('id' => 'adviceGiven', 'name' => 'adviceGiven', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 150px' )); ?>
    </div>
  </div>
</div>


  <br>
<div class="row">
    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Notes </h5> </center>
     </div>
  </div>

    <div class="col-sm-9 control-group">
      <div class="controls">
     <?php echo form_textarea(array('id' => 'notes', 'name' => 'notes', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 100px' )); ?>
    </div>
  </div>
</div>
 <br>

<div class="row">
     <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Other Interviewers </h5> </center>
     </div>
    </div>

        <div class="col-sm-9 control-group">
        <div class="controls interviewees-table">
        <table class="table table-bordered table-striped">
            <tr>
                <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                <td>HauLo, Osh</td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                <td>Laylo, Jal</td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                <td>Pilapil, Chip</td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                <td>Sy, Diana</td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                <td>van Opstal, Arnold</td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
                <td>Ganda, Vice</td>
            </tr>
        </table>
                </div>
        </div>
</div>

    <div class="row-fluid">
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