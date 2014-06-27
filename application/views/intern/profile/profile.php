<div class="container">

    <div class="row">
        <br>

        <div class="col-lg-1"></div>
        
        <div class="col-lg-10 well" style="background-color:rgb(221, 255, 221);padding:0px;">
            
            <h5><a class="btn btn-info pull-right" href="#editInternProfileModal" data-toggle="modal" style="margin-top:0px; margin-right:2px; margin-bottom: 2px;"><i class="icon-edit"></i> Edit Profile</a></h5>

            <table class="table table-bordered">
                <tr>
                <td rowspan="4"> <center><img border="0" style="width:50%; height:50%;" src="<?php echo base_url() . $person->image ?>" alt="<?php echo "$person->firstname $person->lastname" ?>" ></center></td>   
                </tr>
                <tr>
                    <th colspan="4"><center> <b>PERSONAL INFORMATION</b></center> </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo "$person->firstname $person->middlename $person->lastname" ?></td>
                    <th>Birthday</th>
                    <td>01/24/1996</td>
                </tr>
                <tr>
                    <th>Year Level</th>
                    <td></td>
                    <th>Residency Hours</th>
                    <td><?php echo $person->residency ?></td>
                </tr>
                <tr>
                    <th colspan="5"><center> <b>CONTACT INFORMATION</b></center> </th>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <th>E-mail Address</th>
                    <td colspan="4"></td>
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
    </div>


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
                        <td><?php echo $row->client ?></td>
                        <td><?php echo $row->statusName ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    
    <!-- START OF MODAL : EDITINTERNPROFILEMODAL -->
    <div class="row">

        <div class="modal fade" id="editInternProfileModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel"> Edit Intern Profile </h3>
                    </div>
                    <div class="modal-body">
                        
                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <center> <h5> <b> Name </b> </h5> </center>
                        </div>
                    </div>

                    <div class="col-sm-3 control-group">
                        <div class="controls">
                            <?php echo form_input(array('id' => 'internFirstName', 'placeholder'=>'First Name',  'name' => 'internFirstName', 'type' => 'text', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                        
                   <div class="col-sm-3 control-group">
                        <div class="controls">
                            <?php echo form_input(array('id' => 'internMiddleName', 'name' => 'internMiddleName', 'placeholder'=>'Middle Name', 'type' => 'text', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                   <div class="col-sm-3 control-group">
                        <div class="controls">
                            <?php echo form_input(array('id' => 'internLastName', 'name' => 'internLastName', 'placeholder'=>'Last Name', 'type' => 'text', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                        
                        <br><br>
                        
                    <div class="col-sm-2 control-group">
                    <div class="controls">
                        <center> <h5> <b> Birthday </b> </h5> </center>
                    </div>
                    </div>

                    <div class="col-sm-4 control-group">
                            <div class="controls">
                                    <div class="input-group date">
                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            <input type="text" class="form-control date-picker" id="internBirthday" name="internBirthday" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
                                    </div>
                            </div>
                    </div>
                        
                        <br><br>
                        
                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <center> <h5> <b> Year Level </b> </h5> </center>
                        </div>
                    </div>

                    <div class="col-sm-3 control-group">
                        <div class="controls">
                            <select class="form-control">
                                <option>First Year</option>
                                <option>Second Year</option>
                                <option>Third Year</option>
                                <option>Fourth Year</option>
                                <option>Terminal</option>
                            </select>
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
                            <?php echo form_input(array('id' => 'internMobile',   'name' => 'internMobile', 'type' => 'text', 'class' => 'form-control')); ?>
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
                            <?php echo form_input(array('id' => 'internEmail',   'name' => 'internEmail', 'type' => 'text', 'class' => 'form-control')); ?>
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
    <!-- END OF MODAL : EDITINTERNPROFILEMODAL --> 

</div>
