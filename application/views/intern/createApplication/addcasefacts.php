<div id='casefacts_form' class="container">

  <div class="row">
    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Application Form No. </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-1 control-group">
      <div class="controls" style='margin-top:2px;'>
        <h5>
          <input type="text" class="form-control date-picker" id="appnumber" name="appnumber" value="<?= $appnumber ?>" style='display:none;'> <?= $appnumber ?>
        </h5>
      </div>
    </div>

    <div class="col-sm-1 control-group">
      <div class="controls" style='margin-top:2px; font-size: 20px;'>
      </div>
    </div>
  </div><br>

  <div class="row">

    <div class="col-sm-7 control-group"></div>

    <div class="col-sm-2 control-group">
      <div class="controls" style='text-align:right;'>
        <h5> <b>Interview Date &nbsp;&nbsp;&nbsp; </b></h5>
      </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <div class="input-group date">
          <span class="input-group-addon"><i class="icon-calendar"></i></span>
          <input type="text" class="form-control date-picker" id="appinterviewdate" name="appinterviewdate" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
        </div>
      </div>
    </div>

    <br><br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Client/s <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> </center>
      </div>
    </div>
    <div id="clientdiv" class="col-sm-8 control-group">
      <div class="controls">
        <select multiple class="chosen-select" tabindex="8" style="" id="createAppClientList" name="appclient[]">
          <?php foreach ($clientlist as $client): ?>
            <option value="<?php echo $client->personID ?>"><?php echo "$client->lastname, $client->firstname $client->middlename" ?></option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" id="createAppClientListHidden" name="clientarray" value="">
      </div>
    </div>
    <div class="col-sm-1 control-group">
      <div class="controls">
        <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addclientbutton" href="#addClientModal1" style="margin-top:0px;"> <i id="addclientbutton" class="icon-plus"></i> </a>
      </div>
    </div>

    <br> <br> <br> <br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Stage <span class="glyphicon glyphicon-asterisk"></span></b></h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <select id="appstage" name="appstage" class="form-control">
          <option value='1'>New</option>
          <option value='2'>Preliminary Investigation</option><!-- complainant respondent  -->
          <option value='3'>Pre-Trial</option>
          <option value='4'>Trial Court</option> <!-- plaintiff accused -->
        </select>
      </div>
    </div>    

    <div class='col-sm-1'></div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Client Type <span class="glyphicon glyphicon-asterisk"></span> </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <select id="appclienttype" name="appclienttype" class="form-control">
          <option value='8'>Complainant</option>
          <option value='9'>Respondent</option>
        </select> 
      </div>
    </div>


    <br><br>


    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Forum </b> </h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <select id="appforum" name="appforum" class="form-control">
          <option value='-'>-</option>
          <option value='Barangay'>Barangay</option>
          <option value='Department of Justice'>Department of Justice</option>
          <option value='Regional Trial Court'>Regional Trial Court</option>
          <option value='Metropolitan Trial Court'>Metropolitan Trial Court</option> 
          <option value='Court of Appeals'>Court of Appeals</option> 
          <option value='Court of Tax'>Court of Tax</option>
          <option value='Ombudsman'>Ombudsman</option>
          <option value='Sandiganbayan'>Sandiganbayan</option>
        </select>
      </div>
    </div>


    <div class='col-sm-1'></div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Case No. </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'appcaseno', 'name' => 'appcaseno', 'type' => 'text', 'class' => 'form-control')); ?>
      </div>
    </div>

    <br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Opposing Party </b> </h5> </center>
      </div>
    </div>

    <div class="col-sm-8 control-group">
      <div id='opposingpartydiv' class="controls">
        <select  multiple class="chosen-select" tabindex="8" style="" id="createAppOpposingPartyList" name="appopposing[]">
          <?php foreach ($opposingpartylist as $opposing): ?>
            <option value="<?php echo $opposing->personID ?>"><?php echo "$opposing->lastname, $opposing->firstname $opposing->middlename" ?></option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" value="" id="createAppOpposingPartyListHidden" name="opposingarray">
      </div>
    </div>


    <div class="col-sm-1 control-group">
      <div class="controls">
        <sup><a class ="btn btn-success pull-left" href="#addOpposingModal1" data-toggle="modal" style="margin-top:0px;"> <i class="icon-plus"></i> </a></sup>
      </div>
    </div>
    <br> <br><br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Title <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> </center>
      </div>
    </div>

    <div class="col-sm-9 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'apptitle', 'name' => 'apptitle', 'type' => 'text', 'class' => 'form-control')); ?>
      </div>
    </div>

    <br> <br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Narrative <span class="glyphicon glyphicon-asterisk"></span> </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-9 control-group">
      <div class="controls">
        <?php echo form_textarea(array('id' => 'appnarrative', 'name' => 'appnarrative', 'type' => 'text', 'class' => 'form-control')); ?>
      </div>
    </div>

    <br> <br><br><br><br> <br><br><br><br> <br><br><br><br><br>
  </div>
  <br>

  <div class="row">

    <h4>Incident Details</h4>
    <hr>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Place of Incident <span class="glyphicon glyphicon-asterisk"></span></b> </h5> </center>
      </div>
    </div>

    <div class="col-sm-6 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'appplace', 'name' => 'appplace', 'type' => 'text', 'class' => 'form-control')); ?>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <select id="appplacecity" name="appplacecity" class="form-control">
          <option>Caloocan</option>
          <option>Las Pinas</option>
          <option>Makati</option>
          <option>Malabon</option>
          <option>Mandaluyong</option>
          <option selected>Manila</option>
          <option>Marikina</option>
          <option>Muntinlupa</option>
          <option>Navotas</option>
          <option>Paranaque</option>
          <option>Pasay</option>
          <option>Pasig</option>
          <option>Quezon City</option>
          <option>San Juan</option>
          <option>Taguig</option>
          <option>Valenzuela</option>
        </select>
      </div>
    </div>

    <br> <br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Date of Incident </b></h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <div class="input-group date">
          <span class="input-group-addon"><i class="icon-calendar"></i></span>
          <input type="text" class="form-control date-picker" id="appincidentdate" name="appincidentdate" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
        </div>
      </div>
    </div>

    <div class="col-sm-1 control-group">
      <div class="controls">
        <center> <h5> or </h5> </center>
      </div>
    </div>

    <div class="col-sm-5 control-group">
      <div class="controls">
        <?php echo form_input(array('placeholder' => 'Estimated Month - Year', 'id' => 'appincidentdateest', 'name' => 'appincidentdateest', 'type' => 'text', 'class' => 'form-control')); ?>
      </div>
    </div>

    <br> <br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> <b> Time of Incident </b> </h5> </center>
      </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <div class="input-group bootstrap-timepicker">
          <span class="input-group-addon"><i class="icon-time"></i></span>
          <input type="text" class="form-control timepicker" id="appincidenttime" name="appincidenttime" value="<?php echo $timenow; ?>">
        </div>
      </div>
    </div>

    <div class="col-sm-1 control-group">
      <div class="controls">
        <center> <h5> or </h5> </center>
      </div>
    </div>

    <div class="col-sm-5 control-group">
      <div class="controls">
        <?php echo form_input(array('placeholder' => 'Estimated Time', 'id' => 'appincidenttimeest', 'name' => 'appincidenttimeest', 'type' => 'text', 'class' => 'form-control')); ?>
      </div>
    </div>
  </div>

  <br><br><br>

  <div class="row">

    <h4> &nbsp; Offense</h4>
    <div class="hide"> <h4> Possible Offense</h4> </div>
    <hr>

    <div id='offensetablediv' class="col-lg-12">
      <table id='offensetable' class="table table-striped table-bordered">
        <tr>
          <th style='width:65%'>Offense</th>
          <th style='width:29%'>Offense Stage</th>
          <th><a class="btn btn-success" id="createApplicationAddOffense" style="margin-top:0px;"> <i class="icon-plus"></i> </a></th>
        </tr>
      </table>

    </div>
  </div>

  <br><br>

  <!-- Button-->
  <div class="row">
    <div class="control-group pull-right">
      <label class="control-label" for="submit"></label>
      <div class="controls">
        <a id='btncasefactsnext' class='btn btn-success' href="#liLegalAdvice">Next</a>
      </div>
    </div>
  </div>

</div>
