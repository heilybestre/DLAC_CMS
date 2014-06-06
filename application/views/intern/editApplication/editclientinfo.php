
<div id='clientinfo_form' class="container">

  <?php 
  if($this->session->userdata('image')=='' || $this->session->userdata('image')==NULL)
    echo '';
  else
    echo '<style>#searchClient{display: none;} #newClient{display: block;}</style>';
  ?>

<div id="newClient">

<div class="row">
<a class ="btn btn-medium btn-success pull-right" onclick="searchClient()">Search Client</a>
</div>

<div class="row">
  <?php echo form_open(base_url() . 'createapplication/clientinfo', array('class' => 'form-horizontal')); ?>

  <div class="col-lg-6">

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Client's Photo </h5> </center>
     </div>
  </div>
<div class="form-horizontal col-lg-4 col-sm-6">
<?php echo form_open_multipart('upload/do_upload', array('class' => 'form-control')); ?>
<div class="controls">
    <div id="dropzone">
    <form action="test.html" class="dropzone">
      <div class="fallback">
        <input name="file" type="file" multiple="" />
      </div>
    </form>
  </div>
</div>
</div>
<?php echo form_close(); ?>    


  <br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Name </h5> </center>
     </div>
  </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <?php echo form_input(array('placeholder' => 'First', 'id' => 'clientFirstName', 'name' => 'clientFirstName', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
  </div>

        <div class="col-sm-3 control-group">
    <div class="controls">
     <?php echo form_input(array('placeholder' => 'Middle Name', 'id' => 'clientMiddleName', 'name' => 'clientMiddleName', 'type' => 'text', 'class' => 'form-control' )); ?>
     </div>
   </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
          <?php echo form_input(array('placeholder' => 'Last Name', 'id' => 'clientLastName', 'name' => 'clientLastName', 'type' => 'text', 'class' => 'form-control' )); ?>
      </div>
    </div>

<br><br>
    
    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Address </h5> </center>
     </div>
  </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
  <?php echo form_input(array('placeholder' => 'House', 'id' => 'clientAddressHouseNo', 'name' => 'clientAddressHouseNo', 'type' => 'text', 'class' => 'form-control' )); ?>      </div>
    </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
      <?php echo form_input(array('placeholder' => 'Street', 'id' => 'clientAddressStreet', 'name' => 'clientAddressStreet', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
   </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
    <?php echo form_input(array('placeholder' => 'Town', 'id' => 'clientAddressTown', 'name' => 'clientAddressTown', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

<br><br>
    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5>  </h5> </center>
     </div>
  </div>
    <div class="col-sm-3 control-group">
    <div class="controls">
    <?php echo form_input(array('placeholder' => 'District', 'id' => 'clientAddressDistrict', 'name' => 'clientAddressDistrict', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
    <?php echo form_input(array('placeholder' => 'Postal Code', 'id' => 'clientAddressPostalCode', 'name' => 'clientAddressPostalCode', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

<br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Contact No. </h5> </center>
     </div>
  </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
    <?php echo form_input(array('placeholder' => 'Home', 'id' => 'clientCNHome', 'name' => 'clientCNHome', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
          <?php echo form_input(array('placeholder' => 'Office', 'id' => 'clientCNOffice', 'name' => 'clientCNOffice', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
    <?php echo form_input(array('placeholder' => 'Mobile', 'id' => 'clientCNMobile', 'name' => 'clientCNMobile', 'type' => 'text', 'class' => 'form-control' )); ?>
   </div>
    </div>

<br> <br>

      <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Email </h5> </center>
     </div>
  </div>

    <div class="col-sm-9 control-group">
    <div class="controls">
    <?php echo form_input(array('id' => 'clientEmail', 'name' => 'clientEmail', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

    <br> <br>

      <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Facebook </h5> </center>
     </div>
  </div>

    <div class="col-sm-9 control-group">
    <div class="controls">
          <?php echo form_input(array('id' => 'clientFb', 'name' => 'clientFb', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

    <br> <br>

  <div class="col-sm-2 control-group">
  <div class="controls">
    <center> <h5> Referred by </h5> </center>
 </div>
  </div>

    <div class="col-sm-9 control-group">
    <div class="controls">
          <?php echo form_input(array('id' => 'clientReferredBy', 'name' => 'clientReferredBy', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
    </div>

  </div><!--/col-->
  
  <div class="col-lg-6">

  <h3>Personal Circumstances</h3>

  <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Gender </h5> </center>
     </div>
  </div>

    <div class="col-sm-6 control-group">
    <div class="controls">
          <?php echo form_radio(array('name' => 'clientGender', 'id' => 'clientGender-0', 'value' => '1', 'checked' => TRUE)); ?>
          Male &nbsp;
          <?php echo form_radio(array('name' => 'clientGender', 'id' => 'clientGender-1', 'value' => '2', 'checked' => FALSE )); ?>
          Female &nbsp;
          <?php echo form_radio(array('name' => 'clientGender', 'id' => 'clientGender-2', 'value' => '3', 'checked' => FALSE)); ?>
          Others    </div>
    </div>

    <br> <br>

    <div class="col-sm-2 control-group">
  <div class="controls">
    <center> <h5> Civil Status </h5> </center>
 </div>
  </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
    <select id="clientCivilStatus" name="clientCivilStatus" class="form-control" >
      <option>Single</option>
      <option>Married</option>
      <option>Widowed</option>
      <option>Separated</option>
      <option>Divorced</option>
    </select>    </div>
    </div>
 
    <br><br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Birthday </h5> </center>
     </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
          <?php echo form_dropdown('clientBirthDateMonth', $months, '0', 'id="clientBirthDateMonth" class="form-control"'); ?>
    </div>
  </div>

        <div class="col-sm-2 control-group">
    <div class="controls">
          <?php echo form_dropdown('clientBirthDateDay', $days, '0', 'id="clientBirthDateDay" class="form-control"'); ?>
     </div>
   </div>

    <div class="col-sm-3 control-group">
    <div class="controls">
          <?php echo form_dropdown('clientBirthDateYear', $years, '0', 'id="clientBirthDateYear" class="form-control"'); ?>
      </div>
    </div>

<br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Birthplace </h5> </center>
     </div>
    </div>

    <div class="col-sm-8 control-group">
      <div class="controls">
          <?php echo form_input(array('id' => 'clientBirthPlace', 'name' => 'clientBirthPlace', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
  </div>

<br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Occupation </h5> </center>
     </div>
    </div>

    <div class="col-sm-8 control-group">
      <div class="controls">
      <?php echo form_input(array('id' => 'clientOccupation', 'name' => 'clientOccupation', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
  </div>

  <br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Organization </h5> </center>
     </div>
    </div>

    <div class="col-sm-8 control-group">
      <div class="controls">
          <?php echo form_input(array('id' => 'clientOrganization', 'name' => 'clientOrganization', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
  </div>

    <br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Address </h5> </center>
     </div>
    </div>

    <div class="col-sm-8 control-group">
      <div class="controls">
          <?php echo form_input(array('id' => 'clientOrganizationAddress', 'name' => 'clientOrganizationAddress', 'type' => 'text', 'class' => 'form-control' )); ?>
    </div>
  </div>

  <br><br>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <center> <h5> Description </h5> </center>
     </div>
    </div>

    <div class="col-sm-8 control-group">
      <div class="controls">
<?php echo form_textarea(array('rows' => '3', 'id' => 'clientDesc', 'name' => 'clientDesc', 'type' => 'text', 'class' => 'form-control')); ?>
    </div>
  </div>

  </div><!--/col-->
  </div><!--/row-->

  <div class="row">
  <div class="pull-right">
      <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Save'); ?>
</div>

  <?php echo form_close(); ?>
</div>


</div>
</div>




