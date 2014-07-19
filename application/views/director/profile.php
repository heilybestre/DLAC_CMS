<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->
    <div class="row">
        <div class="box">

            <div class="box-header"><h2> Director Profile</h2>
            </div>
            <div class="box-content">

                <div class="row">
                    <br>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-10 well" style="background-color:rgb(221, 255, 221);padding:0px;">

                        <h5><a class="btn btn-info pull-right" href="#editDirectorProfileModal" data-toggle="modal" style="margin-top:0px; margin-right:2px; margin-bottom: 2px;"><i class="icon-edit"></i> Edit Profile</a></h5>

                        <table class="table table-bordered">
                            <tr>
                                <td rowspan="4"> <center><img border="0" style="width:30%; height:30%;" src="<?php echo base_url() . $person->image ?>" alt="<?php echo "$person->firstname $person->lastname" ?>" ></center></td>   
                            </tr>
                            <tr>
                                <th colspan="4" style="height:20px;"><center> <b>PERSONAL INFORMATION</b></center> </th>
                            </tr>
                            <tr style="height:20px;">
                                <th>Name</th>
                                <td><?php echo "$person->firstname $person->middlename $person->lastname" ?></td>
                                <th>Birthday</th>
                                <td>
                                    <?php
                                    $date = DateTime::createFromFormat("Y-m-d", $person->birthdate);
                                    echo $date->format("F d, Y");
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Specialization</th>
                                <td><?php echo $person->specialization; ?></td>
                                <th>Roll Number</th>
                                <td><?php echo $person->rollnum; ?></td>
                            </tr>
                            <tr>
                                <th colspan="5"><center> <b>CONTACT INFORMATION</b></center> </th>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td colspan="4">
                                    <?php echo $person->contactmobile; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>E-mail Address</th>
                                <td colspan="4"><?php echo $person->emailaddr; ?></td>
                            </tr>
                            <tr>
                                <th colspan="5"> <center> PERFORMANCE IN DLAC </center> </th>
                            </tr>
                            <tr>
                                <th>Current Cases Handled</th>
                                <td colspan="4"><?php echo $currentcasehandled->currentcaseload ?></td>
                            </tr>
                            <tr>
                                <th>Cases Handled</th>
                                <td colspan="4"><?php echo $person->caseload ?></td>
                            </tr>
                            <tr>
                                <th>Cases Won</th>
                                <td colspan="4"><?php echo $currentcasehandled->currentcaseload ?></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div><br>
                <div class="row">
                    <div style="border-width:5px;">
                        <table class="table table-condensed">
                            <tr style="background-color:#ddd;">
                                <th>Case No.</th>
                                <th>Case Title</th>
                                <th>Client</th>
                                <th>Status</th>
                            </tr>
                            <?php foreach ($cases as $row): ?>
                                <tr>
                                    <td><?php echo $row->caseNum ?></td>
                                    <td><?php echo $row->caseName ?></td>
                                    <td>
                                        <?php
                                        if ($row->status == 5 || $row->status == 6) {
                                            $caseclient = $this->Case_model->select_closeclient($row->caseID);
                                        } else if ($row->status != 5 || $row->status != 6) {
                                            $caseclient = $this->Case_model->select_caseclient($row->caseID);
                                        }

                                        $index = 0;
                                        foreach ($caseclient as $client) {
                                            if ($index > 0) {
                                                echo ", $client->firstname $client->lastname";
                                            } else {
                                                echo "$client->firstname $client->lastname";
                                            }
                                            $index++;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $row->statusName ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- START OF MODAL : EDITLAWYERPROFILEMODAL -->
    <div class="row">

        <div class="modal fade" id="editDirectorProfileModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel"> Edit Director Profile </h3>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> <b> Name </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'directorFirstName', 'placeholder' => 'First Name', 'name' => 'lawyerFirstName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'directorMiddleName', 'name' => 'directorMiddleName', 'placeholder' => 'Middle Name', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'directorLastName', 'name' => 'directorLastName', 'placeholder' => 'Last Name', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> <b> Birthday </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-4 control-group">
                            <div class="controls">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" class="form-control date-picker" id="directorBirthday" name="directorBirthday" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> <b> Specialization </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-5 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'directorSpecialization', 'name' => 'directorSpecialization', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> <b> Roll Number </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-5 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'directorRollNumber', 'name' => 'directorRollNumber', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-12 control-group">
                            <div class="controls">
                                <center> <h5> <b> Contact Information </b> </h5> </center>
                            </div>
                        </div>

                        <br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> <b> Mobile Number </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-5 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'directorMobile', 'name' => 'directorMobile', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> <b> E-mail Address </b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-5 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'directorEmail', 'name' => 'directorEmail', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : EDITLAWYERPROFILEMODAL -->

</div><!-- end: Content -->
