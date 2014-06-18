<div class="container">

    <br>
    
    <div class="row" style="margin-top:10px;">
        
        <div class="col-sm-6">
            
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Client/s <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
        <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addclientbutton" href="#addClientModal" style="margin-top:0px;"> <i id="addclientbutton" class="icon-plus"></i> </a>
            </div>
        </div>
            
           <br><br><br><br>
           
           <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Lawyer </b> </h5> 
            </div>
        </div>
              
         <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
        <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addclientlawyerbutton" href="#addPersonModal" style="margin-top:0px;"> <i id="addclientlawyerbutton" class="icon-plus"></i> </a>
            </div>
        </div>
    
           
           <br><br><br><br>
            
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Witness </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
        <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addclientwitnessbutton" href="#addPersonModal" style="margin-top:0px;"> <i id="addclientwitnessbutton" class="icon-plus"></i> </a>
            </div>
        </div>
         
               
        </div>
        
        <div class="col-sm-6">
            
        <div class="col-sm-3 control-group">
            <div class="controls">
                <h5> <b> Opposing Party <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
            <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="sampleBtn2" href="#addPersonModal" style="margin-top:0px;"> <i id="sampleBtn2" class="icon-plus"></i> </a>
            </div>
        </div>
            
            <br><br><br><br>
               
            
        <div class="col-sm-3 control-group">
            <div class="controls">
                <h5> <b> Lawyer </b> </h5> 
            </div>
        </div>
              
               <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
        <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addopposinglawyerbutton" href="#addPersonModal" style="margin-top:0px;"> <i id="addopposinglawyerbutton" class="icon-plus"></i> </a>
            </div>
        </div>
           
              <br><br><br><br>
            
        <div class="col-sm-3 control-group">
            <div class="controls">
                <h5> <b> Witness </b> </h5> 
            </div>
        </div>
              
               <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
            </div>

               <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addopposingwitnessbutton" href="#addPersonModal" style="margin-top:0px;"> <i id="addopposingwitnessbutton" class="icon-plus"></i> </a>
            </div>
        </div>
            
    </div>
       
    </div>
    
    <br><br>
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Judge <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-9 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
            <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addjudgebutton" href="#addPersonModal" style="margin-top:0px;"> <i id="addjudgebutton" class="icon-plus"></i> </a>
            </div>
        </div>
    
    <br><br><br><br>
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Clerk of Court <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-9 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
            <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addjudgebutton" href="#addPersonModal" style="margin-top:0px;"> <i id="addjudgebutton" class="icon-plus"></i> </a>
            </div>
        </div>
    
     <br><br><br><br>
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Sheriff <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-9 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="">
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
            <div class="col-sm-1 control-group">
            <div class="controls">
                <a class="btn btn-success addpersonbtn" data-toggle="modal" id="addjudgebutton" href="#addPersonModal" style="margin-top:0px;"> <i id="addjudgebutton" class="icon-plus"></i> </a>
            </div>
        </div>

    <!-- Button -->
    <div class="row">
        <div class="control-group pull-right">
            <label class="control-label" for="submit"></label>
            <div class="controls">
                <input type='button' id='btnpeoplenext' value='Next' class='btn btn-success'>
            </div>
        </div>
    </div>
    
    
     <div class="row">

        <!-- START OF ADD CLIENT MODAL -->
        <div class="modal fade" id="addClientModal">
            <div class="modal-dialog-addClient">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add client Person</h4>
                    </div>
                    <div class="modal-body">
                        <?php $this->load->view('intern/addnewclient'); ?>
                    </div>

                    <div class="modal-footer">
                        <input type="button" value="Add Person" class='btn btn-success'/>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF ADD CLIENT MODAL -->

    </div>
    

    <div class="row">

        <!-- START OF ADD LINKED PERSON MODAL -->
        <div class="modal fade" id="addPersonModal">
            <div class="modal-dialog-evidence">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Linked Person</h4>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Name<span class="glyphicon glyphicon-asterisk"></span></b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'First', 'id' => 'personFirstName', 'name' => 'personFirstName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div> 
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Middle', 'id' => 'personMiddleName', 'name' => 'personMiddleName', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>   
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Last', 'id' => 'personLastName', 'name' => 'personLastName', 'type' => 'text', 'class' => 'form-control')); ?>   
                            </div>   
                        </div>
                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Address</b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'House', 'id' => 'personAddressHouseNo', 'name' => 'personAddressHouseNo', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Street', 'id' => 'personAddressStreet', 'name' => 'personAddressStreet', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Area', 'id' => 'personAddressDistrict', 'name' => 'personAddressDistrict', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Town', 'id' => 'personAddressTown', 'name' => 'personAddressTown', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Postal Code', 'id' => 'personAddressPostalCode', 'name' => 'personAddressPostalCode', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5><b>Contact Number</b></h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Home', 'id' => 'personCNHome', 'name' => 'personCNHome', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Office', 'id' => 'personCNOffice', 'name' => 'personCNOffice', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <?php echo form_input(array('placeholder' => 'Mobile', 'id' => 'personCNMobile', 'name' => 'personCNMobile', 'type' => 'text', 'class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center><b><h5><b>Participation<span class="glyphicon glyphicon-asterisk"></span></b></h5></b></center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <h5>Participation</h5>
                            </div>   
                        </div>

                        <br><br>
                    </div>

                    <div class="modal-footer">
                        <input type="button" value="Add Person" class='btn btn-success'/>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF ADD LINKED PERSON MODAL -->

    </div>

</div>
