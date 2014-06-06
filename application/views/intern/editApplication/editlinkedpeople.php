<div id='linkedpeople_form' class="container">

<?php echo form_open(base_url() . 'editApplication/linkedPeople', array('class' => 'form-horizontal')); ?>

<br>

<div class="row">

<a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addPersonModal" data-toggle="modal">
<i class="icon-plus-sign"></i>&nbsp;Add Linked Person</a>

</div>

<div class="row">

 <table class="table table-striped table-bordered">
    <tr>
        <th width="5%"></th>
        <th width="30%">Name</th>
        <th width="20%">Type</th>
        <th width="30%">Description</th>
        <th width="15%"></th>
    </tr>
        <tr>
        	<td></td>
        	<td></td>
        	<td></td>
        	<td></td>
        	<td></td>
        </tr>
    </table>
</div>
<br><br>

<div class="row">
    <!-- Button -->
    <div class="control-group nextbtnbottom">
      <label class="control-label" for="submit"></label>
      <div class="controls">
        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success pull-right'), 'Save'); ?>
      </div>
  </div>
</div>

<div class="row">

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
        <center> <h5>Name</h5> </center>
        </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <?php echo form_input(array('placeholder' => 'First', 'id' => 'partyfirstName', 'name' => 'partyfirstName', 'type' => 'text', 'class' => 'form-control')); ?>
         </div>   
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <?php echo form_input(array('placeholder' => 'Middle', 'id' => 'partymiddleName', 'name' => 'partymiddleName', 'type' => 'text', 'class' => 'form-control')); ?>
         </div>   
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <?php echo form_input(array('placeholder' => 'Last', 'id' => 'partLastName', 'name' => 'partLastName', 'type' => 'text', 'class' => 'form-control')); ?>   
         </div>   
    </div>
    <br><br>

        <div class="col-sm-2 control-group">
        <div class="controls">
        <center> <h5>Contact Number</h5> </center>
        </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
     <?php echo form_input(array('id' => 'partyCN', 'name' => 'partyCN', 'type' => 'text', 'class' => 'form-control')); ?>
             </div>   
    </div>
<br><br>

    <div class="col-sm-2 control-group">
        <div class="controls">
        <center> <h5>Description</h5> </center>
        </div>
    </div>

    <div class="col-sm-9 control-group">
      <div class="controls">
    <textarea class="form-control" id="limit" rows="3" style="width:100%"></textarea>        
    </div>   
    </div>
    <br><br><br>

    <div class="col-sm-2 control-group">
        <div class="controls">
        <center> <h5>Participation</h5> </center>
        </div>
    </div>

    <div class="col-sm-4 control-group">
      <div class="controls">
        <select id="partyParticipation" name="partyParticipation" class="form-control">
            <option></option>
            <option>Complainant</option>
            <option>Defendant</option>
            <option>Possible Witness (Complainant)</option>
            <option>Possible Witness (Defendant)</option>
            <option>PAO</option>
            <option>Public Prosecutor</option>
            <option>Private Prosecutor</option>
            <option>Opposing Counsel Lawyer</option>
            <option>Judge</option>
        </select>        
        </div>   
    </div>
    <br><br>

    </div>
    <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Add Person</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
    </div>
</div>
</div>

</div>

<?php echo form_close(); ?>

</div>