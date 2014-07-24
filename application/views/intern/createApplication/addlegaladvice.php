<div id='legaladvice_form' class="container">

  <div class="row">

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Application Form No. </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-1 control-group">
      <div class="controls" style='margin-top:2px;'>
        <h5><?= $appnumber ?></h5>
      </div>
    </div>

    <div class="col-sm-5 control-group"></div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <h5> 
          <b>
            <div class="clientnamediv" sytle="text-align:left" id="addlegaladviceDiv">                                
            </div>
          </b>
        </h5>                
      </div>
    </div>

    <div class="col-sm-1 control-group">
      <div class="controls">

      </div>
    </div>
  </div><br>


  <div class="row" style='padding-left:20px; padding-right:25px;'>


    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b>Supervising Lawyer </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <select id="applawyer" name="applawyer" class="form-control">
          <option></option>
          <?php foreach ($lawyerlist as $row) : ?>
            <option value="<?= $row->personID ?>">
              <?= $row->lastname ?>, <?= $row->firstname ?> <?= substr($row->middlename, 0, 1) ?>.
            </option><?php endforeach; ?>
        </select>
      </div>
    </div>

    <br><br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b>Other Interviewers</b> </h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls interviewees-table">
        <div class="tbl-attendees">
          <table class="table table-striped">
            <?php foreach ($internlist as $row) : if ($row->personID != $this->session->userdata('userid')) { ?>
                <tr>
                  <td align="center">
                    <input type= 'checkbox' name='otherinterviewers[]' class= 'case' name= 'case' value= '<?php echo $row->personID ?>'/>
                  </td>
                  <td>
                    <?php echo $row->firstname . ' ' . $row->lastname; ?>
                  </td>
                </tr>
              <?php } endforeach; ?>
          </table>
        </div>
      </div>
    </div>

    <br><br><br><br><br><br><br><br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b>Advice Given by the Intern</b> </h5> </center>
      </div>
    </div>

    <div class="col-sm-9 control-group">
      <div class="controls">
        <?php echo form_textarea(array('id' => 'appadvicegiven', 'name' => 'appadvicegiven', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 150px')); ?>
      </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b>Notes </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-9 control-group">
      <div class="controls">
        <?php echo form_textarea(array('id' => 'appnotes', 'name' => 'appnotes', 'type' => 'text', 'class' => 'form-control', 'style' => 'height: 100px')); ?>
      </div>
    </div>

  </div>
  <br>

</div>

<!-- Button -->
<!-- Button -->
<div class="row">
  <div class="control-group pull-right pull-down" style="margin-right:40px;">
    <label class="control-label" for="submit"></label>
    <div class="controls"><?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success pull-right'), 'Submit'); ?>
    </div>
  </div>
</div>

