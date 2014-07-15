<div class="container">
    <?php echo form_open(base_url() . 'director/parties', array('class' => 'form-horizontal')); ?>

    <!-- Button to trigger modal -->
    <div class="row-fluid">
        <div class="span10">
            <a class ="btn btn-medium btn-success pull-left" style='margin-bottom: 10px' href="#addPartiesModal" data-toggle="modal">
                <i class="icon-plus-sign"></i>&nbsp;Add Person</a>
        </div>

    </div>

    <!-- Modal -->
    <div id="addPartiesModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="addPartiesModal-header">  <div class="span1"> </div>
            <h3 id="myModalLabel">Add Person</h3>
        </div>
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="partyName">Name</label>
                <div class="controls">
                    <?php echo form_input(array('placeholder' => 'First', 'id' => 'partyfirstName', 'name' => 'partyfirstName', 'type' => 'text', 'class' => 'input-xlarge span4')); ?>
                    <?php echo form_input(array('placeholder' => 'Middle', 'id' => 'partymiddleName', 'name' => 'partymiddleName', 'type' => 'text', 'class' => 'input-xlarge span3')); ?>
                    <?php echo form_input(array('placeholder' => 'Last', 'id' => 'partLastName', 'name' => 'partLastName', 'type' => 'text', 'class' => 'input-xlarge span3')); ?>
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="partyContact">Contact No.</label>
                <div class="controls">
                    <?php echo form_input(array('id' => 'partyCN', 'name' => 'partyCN', 'type' => 'text', 'class' => 'input-xlarge span3')); ?>
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="partyLocation">Possible Location</label>
                <div class="controls">
                    <?php echo form_input(array('id' => 'partyLocation', 'name' => 'partyLocation', 'type' => 'text', 'class' => 'input-xlarge span10')); ?>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label" for="partyParticipation">Participation</label>
                <div class="controls">
                    <select id="partyParticipation" name="partyParticipation" class="input-xlarge span3">
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

        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Person'); ?>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span2"> </div>
        <div class="span4">
            <table class="table table-striped table-bordered">
                <tr>
                <h2> JUDGE </h2>
                <td> Name </td>
                <td>  </td>
                </tr>
            </table>
        </div>
        <div class="span4"> </div>
    </div>

    <div class="row-fluid"> 
        <div class="span10"> 
            <div class="row-fluid">
                <div class="span4" style="border-width:2px; border-color:green">
                    <table class="table table-striped table-bordered">
                        <tr>
                        <h2> PLAINTIFF </h2>
                        <td> Name </td>
                        <td>  </td>
                        </tr>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tr>
                        <h2> WITNESS </h2>
                        <td> Name </td>
                        <td>  </td>
                        </tr>
                    </table>
                </div>
                <div class="span1"> </div>
                <div class="span4">
                    <table class="table table-striped table-bordered">
                        <tr>
                        <h2> DEFENDANT </h2>
                        <td> Name </td>
                        <td>  </td>
                        </tr>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tr>
                        <h2> WITNESS </h2>
                        <td> Name </td>
                        <td>  </td>
                        </tr>
                    </table>
                </div>
                <div class="span5"> </div>
            </div>
        </div>
        <div class="span1"> </div>
    </div>

    <?php echo form_close(); ?>

</div>