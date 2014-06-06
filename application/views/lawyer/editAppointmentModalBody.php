<?php foreach ($editapptdetails as $row): ?>
    <div class="col-sm-3 control-group">
        <div class="controls">
            <center> <h5> Case Title </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
        <div class="controls">
            <select id='editappt_caseID' name='editappt_caseID' class='form-control'>
                <?php
                foreach ($allcases as $dd) {
                    if ($row->caseID == $dd->caseID) {
                        echo "<option value='$dd->caseID' selected> $dd->DropdownCase </option>";
                    } else {
                        echo "<option value='$dd->caseID'> $dd->DropdownCase </option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <br><br><br>

    <div class="col-sm-3 control-group">
        <div class="controls">
            <center> <h5> Appointment </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
        <div class="controls">
            <?php echo form_input(array('class' => 'form-control', 'name' => 'editappt_title', 'value' => $row->title)); ?>
        </div>
    </div>

    <br><br>

    <div class="col-sm-3 control-group">
        <div class="controls">
            <center> <h5> Date </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
        <div class="controls">
            <div class="input-group date">
                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                <input type="text" class="form-control date-picker" id="editappt_date" name="editappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $row->date;
            ?>">
            </div>
        </div>
    </div>


    <br><br>

    <div class="col-sm-3 control-group">
        <div class="controls">
            <center> <h5> Time </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
        <div class="controls">
            <div class="input-group bootstrap-timepicker">
                <span class="input-group-addon"><i class="icon-time"></i></span>
                <input type="text" class="form-control timepicker" id="editappt_time" name="editappt_time" value="<?php echo $row->time; ?>">
            </div>
        </div>
    </div>

    <br><br>

    <div class="col-sm-3 control-group">
        <div class="controls">
            <center> <h5> Location </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group form-inline">
        <div class="controls">
            <div style='margin-bottom: -10px;'>
                <?php if ($row->type == 'Internal') { ?>
                    <label class="radio" for="appointmentLocation-0">
                        <input type="radio" name="editappt_type" id="appointmentLocation-0" value="In the Clinic" checked="checked">
                        In the Clinic
                    </label> &nbsp;
                    <label class="radio">
                        <input type="radio" name="editappt_type" id="appointmentLocation-1" value="Outside the Clinic">
                        Outside the Clinic
                    </label>
                <?php } ?>

                <?php if ($row->type == 'External') { ?>
                    <label class="radio" for="appointmentLocation-0">
                        <input type="radio" name="editappt_type" id="appointmentLocation-0" value="In the Clinic">
                        In the Clinic
                    </label> &nbsp;
                    <label class="radio">
                        <input type="radio" name="editappt_type" id="appointmentLocation-1" value="Outside the Clinic" checked="checked">
                        Outside the Clinic
                    </label>
                <?php } ?>
            </div>
            <br>
            <?php echo form_input(array('class' => 'form-control', 'name' => 'editappt_place', 'placeholder' => 'Exact Location')); ?>
        </div>
    </div>

    <br><br>

    <div class="col-sm-3 control-group">
        <div class="controls">
            <center> <h5> Attendees </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
        <div class="controls">
            <div class="tbl-attendees">
                <table class="table table-striped">
                    <?php foreach ($allinterns as $row) : ?>
                        <tr>
                            <td align="center">
                                <?php
                                echo "<input name='cbattendeeseditlawyer[]' type= 'checkbox' class= 'case' name= 'case' value= '$row->userID'";
                                foreach ($attendees as $row2) {

                                    if ($row->userID == $row2->userID) {
                                        echo "checked";
                                    }
                                }
                                echo "/>";
                                ?>
                            </td>
                            <td>
                                <?php echo $row->firstName . ' ' . $row->lastName; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
<?php endforeach; ?>