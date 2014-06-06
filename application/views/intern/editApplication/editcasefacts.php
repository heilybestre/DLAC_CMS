<div id='casefacts_form' class="container">
    <br>

    <?php echo form_open(base_url() . 'editApplication/casefacts', array('class' => 'form-horizontal', 'name' => 'casefactsform')); ?>

    <div class="row">

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Application Form No. </h5> </center>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <?php echo form_input(array('id' => 'appFormNum', 'name' => 'appFormNum', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
        </div>

        <div class="col-sm-5 control-group"></div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <center> <h5> Interview Date </h5> </center>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <?php echo form_dropdown('interviewDateMonth', $months, $monthnow, 'id="interviewDateMonth" class="form-control"'); ?>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <?php echo form_dropdown('interviewDateDay', $days, $daynow, 'id="interviewDateDay" class="form-control"'); ?>    
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <?php echo form_dropdown('interviewDateYear', $years, $yearnow, 'id="interviewDateYear" class="form-control"'); ?>
            </div>
        </div>

        <br><br>

        <!--
          <div class="col-sm-2 control-group">
              <div class="controls">
                <center> <h5> Nature of Case </h5> </center>
             </div>
          </div>
        
            <div class="form-inline col-sm-2 control-group">
              <div class="controls">
            <select id="clientType" name="clientType" class="form-control">
              <option value=' '></option>
              <option value='Civil'>Civil</option>
              <option value='Criminal'>Criminal</option>
              <option value='Other'>Other</option>
            </select> 
             </div>
          </div>
        
              <div class="col-sm-2 control-group">
              <div class="controls">
        <?php echo form_input(array('disabled' => '', 'placeholder' => 'If other:', 'id' => '', 'name' => '', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>
        NEW!! No php-->

        <br><br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Client Type </h5> </center>
            </div>
        </div>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <select id="clientType" name="clientType" class="form-control">
                    <option value=' '></option>
                    <option value='Complainant'>Complainant</option>
                    <option value='Respondent'>Respondent</option>
                    <option value='Private Offended Party'>Private Offended Party</option>
                    <option value='Defendant'>Defendant</option>
                    <option value='Appellant'>Appellant</option>
                    <option value='Appellee'>Appellee</option>
                    <option value='Petitioner'>Petitioner</option>
                </select> 
            </div>
        </div>

        <br> <br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Current Stage </h5> </center>
            </div>
        </div>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <select id="currentStage" name="currentStage" class="form-control">
                    <option value=' '></option>
                    <option value='1'>New</option>
                    <option value='2'>Preliminary Investigation</option>
                    <option value='5'>Pre-Trial</option>
                    <option value='6'>Trial Court</option>
                </select>
            </div>
        </div>

        <div class="col-sm-1 control-group">
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <center> <h5> Court Status </h5> </center>
            </div>
        </div>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <select id="currentStage" name="currentStage" disabled="" class="form-control disabled">
                    <option value=' '></option>
                    <option value='1'>Active</option>
                    <option value='2'>Inactive</option>
                    <option value='3'>Dismissed</option>
                    <option value='4'>Suspended</option>
                    <option value='5'>Archive</option>
                </select>
            </div>
        </div>

        <br> <br> <br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Title </h5> </center>
            </div>
        </div>

        <div class="col-sm-9 control-group">
            <div class="controls">
                <?php echo form_input(array('id' => 'caseTitle', 'name' => 'caseTitle', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
        </div>

        <br> <br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Narrative </h5> </center>
            </div>
        </div>

        <div class="col-sm-9 control-group">
            <div class="controls">
                <?php echo form_textarea(array('id' => 'caseNarrative', 'name' => 'caseNarrative', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
        </div>

        <br> <br><br><br><br> <br><br><br><br> <br><br><br><br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Tags </h5> </center>
            </div>
        </div>

        <div class="col-sm-9 control-group">
            <div class="controls">
                <?php echo form_input(array('placeholder' => 'Separate Tags with Comma', 'id' => 'caseTags', 'name' => 'caseTags', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
        </div>

    </div>
    <br>

    <div class="row">

        <h4>Incident Details</h4>
        <hr width='1150px'>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Place of Incident </h5> </center>
            </div>
        </div>

        <div class="col-sm-5 control-group">
            <div class="controls">
                <?php echo form_input(array('id' => 'casePlace2', 'name' => 'casePlace2', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
        </div>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <?php echo form_dropdown('casePlace', $cities, 'Manila', 'id="casePlace" class="form-control"'); ?>
            </div>
        </div>

        <br> <br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Date of Incident </h5> </center>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <?php echo form_dropdown('incidentDateMonth', $months, '0', 'id="incidentDateMonth" class="form-control"'); ?>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <?php echo form_dropdown('incidentDateDay', $days, '0', 'id="incidentDateDay" class="form-control"'); ?>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">
                <?php echo form_dropdown('incidentDateYear', $years, '0', 'id="incidentDateYear" class="form-control"'); ?>
            </div>
        </div>

        <br> <br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> or </h5> </center>
            </div>
        </div>

        <div class="col-sm-3 control-group">
            <div class="controls">
                <?php echo form_input(array('placeholder' => 'Estimated Date', 'id' => 'caseEstimatedDate', 'name' => 'caseEstimatedDate', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
        </div>

        <br> <br>

        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> Time of Incident </h5> </center>
            </div>
        </div>

        <div class="col-sm-7 control-group">
            <div class="controls">
                <?php echo form_input(array('id' => 'caseTime', 'name' => 'caseTime', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span8"></div>
            <div class="span3">
                <!-- Button -->
                <div class="control-group nextbtnbottom">
                    <label class="control-label" for="submit"></label>
                    <div class="controls">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success pull-right'), 'Save'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <br>

    <?php echo form_open(base_url() . 'createapplication/offense', array('class' => 'form-horizontal', 'name' => 'offenseform')); ?>
    <div class="row">

        <h4> &nbsp; Offense</h4>
        <hr width='1150px'>

        <div class="col-lg-5">

            <div class="col-sm-2 control-group">
                <div class="controls">
                </div>
            </div>

            <div class="form-inline">
                <div class="controls">
                    <label class="radio" for="offenseSource-0">
                        <input type="radio" name="offenseSource" id="offenseSource-0" value="Special Penal Law" checked="checked">
                        Special Penal Law
                    </label> &nbsp;
                    <label class="radio" for="offenseSource-1">
                        <input type="radio" name="offenseSource" id="offenseSource-1" value="Revised Penal Code">
                        Revised Penal Code
                    </label>
                </div>
            </div>

            <br>
            <div class="col-sm-2 control-group">
                <div class="controls">
                </div>
            </div>

            <div class="col-sm-5 control-group">
                <div class="controls">
                    <select id="caseOffenseSpecific" name="caseOffenseSpecific" class="form-control">
                        <option>Child Protection Act</option>
                        <option>Violence Against Women and Children</option>
                    </select>
                    <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-link'), 'Add Offense'); ?>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <table class="table table-striped table-bordered">
                <tr>
                    <th></th>
                    <th>Offense</th>
                    <th>"specific"</th>
                    <th>Source</th>
                </tr>
                <?php foreach ($queryoff as $row) { ?>
                    <tr>
                        <td> <?php echo $row->offenseID; ?> </td>
                        <td> <?php echo $row->offenseTitle; ?> </td>
                        <td> <?php echo $row->specific; ?> </td>
                        <td> <?php echo $row->source; ?> </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>
    <?php echo form_close(); ?>


</div>
