<div id="content" class="col-lg-10 col-sm-12">

  <!-- start: Content -->
  <div class="hide"><h1>Application for Reopening</h1></div>

  <div class="row">
    <div class="col-md-12">
      <div class="box">

        <?php echo form_open(base_url() . 'application/create', array('class' => 'form-horizontal')); ?> 

        <div class="box-header"><br><br>
          <ul class="nav tab-menu nav-tabs pull-left">
            <!-- <li id='liRecommendation'><a href="#recommendation" data-toggle="tab">Recommendation</a></li> -->

            <li id='liLegalAdvice'><a href="#legalAdvice" data-toggle="tab">Legal Advice</a></li>

            <li id='liCaseFacts' class='active'><a href="#caseFacts" data-toggle="tab">Case Facts</a></li>   
          </ul>
        </div>
        <div class="box-content" id="boxcontent">

          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active" id="caseFacts" style='padding:10px;'>
              <?php $this->load->view('intern/createApplication/addcasefacts'); ?>
            </div>
            <div class="tab-pane" id="legalAdvice" style='padding:10px;'>
              <?php $this->load->view('intern/createApplication/addlegaladvice'); ?>
            </div>
            <!-- <div class="tab-pane" id="recommendation" style='padding:10px;'>
            <?php //$this->load->view; ?>
            </div> -->
          </div>
        </div>

        <?php echo form_close(); ?>
      </div>
    </div><!--/col-->
    <table class="hide" id="offensetableTD">
      <tbody>
        <tr>
          <td>
            <select class="form-control" name="appoffensename[]">
              <?php foreach ($offenses as $off): ?>
                <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
              <?php endforeach; ?>
            </select> 
          </td>
          <td>
            <select id="appoffensestagepenal" name="appoffensestage[]" class="form-control">
              <option value="Attempted">Attempted</option>
              <option value="Frustrated">Frustrated</option>
              <option value="Consummated">Consummated</option>
              <option value="N/A">N/A</option>
            </select>
          </td>
          <td><button type='button' class="btn btn-danger removerowcreateAppOffense" style="margin-top:0px;"> <i class="icon-minus"></i> </button></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- START OF ADD LINKED PERSON MODAL -->
<form id='formaddnewopposingparty'>
  <div class="modal fade" id="addOpposingModal1">
    <div class="modal-dialog-evidence">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Opposing Party</h4>
        </div>
        <div class="modal-body">
          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5><b>Name<span class="glyphicon glyphicon-asterisk"></span></b></h5></center>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'First', 'id' => 'partyFirstName', 'name' => 'partyFirstName', 'type' => 'text', 'class' => 'form-control')); ?>
            </div> 
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Middle', 'id' => 'partyMiddleName', 'name' => 'partyMiddleName', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>   
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Last', 'id' => 'partyLastName', 'name' => 'partyLastName', 'type' => 'text', 'class' => 'form-control')); ?>   
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
              <?php echo form_input(array('placeholder' => 'House', 'id' => 'partyAddressHouseNo', 'name' => 'partyAddressHouseNo', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Street', 'id' => 'partyAddressStreet', 'name' => 'partyAddressStreet', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Area', 'id' => 'partyAddressDistrict', 'name' => 'partyAddressDistrict', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>

          <br><br>
          <div class="col-sm-2 control-group">
            <div class="controls">
            </div>
          </div>
          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Town', 'id' => 'partyAddressTown', 'name' => 'partyAddressTown', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Postal Code', 'id' => 'partyAddressPostalCode', 'name' => 'partyAddressPostalCode', 'type' => 'text', 'class' => 'form-control')); ?>
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
              <?php echo form_input(array('placeholder' => 'Home', 'id' => 'partyCNHome', 'name' => 'partyCNHome', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Office', 'id' => 'partyCNOffice', 'name' => 'partyCNOffice', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <?php echo form_input(array('placeholder' => 'Mobile', 'id' => 'partyCNMobile', 'name' => 'partyCNMobile', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
          </div>

          <br><br>
          <br>
        </div>

        <div class="modal-footer">
          <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Opposing Party'); ?>
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- END OF ADD LINKED PERSON MODAL -->

<!-- START OF ADD CLIENT MODAL -->
<div class="modal fade" id="addClientModal1">
  <div class="modal-dialog-addClient">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add New Client Information </h4>
      </div>
      <div class="modal-body">
        <?php $this->load->view('intern/addnewclient'); ?>
      </div>

      <div class="modal-footer">
        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Client'); ?>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END OF ADD CLIENT MODAL -->
