
<link href='<?= base_url() ?>assets/css/fullcalendar.css' rel='stylesheet' />
<link href='<?= base_url() ?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?= base_url() ?>assets/js/jquery.min.js'></script>
<script src='<?= base_url() ?>assets/js/jquery-ui.custom.min.js'></script>
<script src='<?= base_url() ?>assets/js/fullcalendar.min.js'></script>



<div class="">
  <br>
  <div class="row">

    <div class="col-lg-6">

      <!-- Upload -->
      <div class="row" style="margin-left:10px;">
        <?php echo form_open_multipart('upload/do_upload', array('class' => 'form-horizontal')); ?>
        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Client's Photo </h5> </center>
          </div>
        </div>


        <div class="form-horizontal col-lg-9">
          <div id='clientphotodiv'>
            <?php
            if ($this->session->userdata('image') == '' || $this->session->userdata('image') == NULL)
              echo '<img id="clientphoto" src="' . base_url() . 'assets/img/clientphoto.jpg" height="100" width="100">';
            else
              echo '<img id="clientphoto" src="../uploads/' . $this->session->userdata('image') . '"  height="100" width="100">';
            ?>
          </div>
          <input type="file" name="userfile" size="20" />
          <input type="submit" value="Upload" class='btn btn-info'/> &nbsp; or &nbsp;
          <a href="#photoBoothModal" data-toggle="modal" class="btn btn-success"> Take Photo</a>
        </div>
        <?php echo form_close(); ?>

      </div>


      <br>

      <form id="formaddnewclient">
        
        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Name <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'First', 'id' => 'clientFirstName', 'name' => 'clientFirstName', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Middle Name', 'id' => 'clientMiddleName', 'name' => 'clientMiddleName', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Last Name', 'id' => 'clientLastName', 'name' => 'clientLastName', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <br><br>

        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Address <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'House', 'id' => 'clientAddressHouseNo', 'name' => 'clientAddressHouseNo', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>      </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Street', 'id' => 'clientAddressStreet', 'name' => 'clientAddressStreet', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Area', 'id' => 'clientAddressDistrict', 'name' => 'clientAddressDistrict', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
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
            <?php echo form_input(array('placeholder' => 'Town', 'id' => 'clientAddressTown', 'name' => 'clientAddressTown', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Postal Code', 'id' => 'clientAddressPostalCode', 'name' => 'clientAddressPostalCode', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <br><br>

        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Contact # <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Home', 'id' => 'clientCNHome', 'name' => 'clientCNHome', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Office', 'id' => 'clientCNOffice', 'name' => 'clientCNOffice', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <?php echo form_input(array('placeholder' => 'Mobile', 'id' => 'clientCNMobile', 'name' => 'clientCNMobile', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
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
            <?php echo form_input(array('id' => 'clientEmail', 'name' => 'clientEmail', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
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
            <?php echo form_input(array('id' => 'clientFb', 'name' => 'clientFb', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <br> <br> <br>

        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Referred by </h5> </center>
          </div>
        </div>

        <div class="col-sm-9 control-group">
          <div class="controls">
            <?php echo form_input(array('id' => 'clientReferredBy', 'name' => 'clientReferredBy', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

        <br> <br>

        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Contact No. </h5> </center>
          </div>
        </div>

        <div class="col-sm-9 control-group">
          <div class="controls">
            <?php echo form_input(array('id' => 'rbContact', 'name' => 'rbContact', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

    </div><!--/col-->

    <div class="col-lg-6">

      <h3>Personal Circumstances</h3>

      <div class="col-sm-2 control-group">
        <div class="controls">
          <center> <h5> Sex <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
        </div>
      </div>

      <div class="col-sm-6 control-group">
        <div class="controls">
          <?php echo form_radio(array('name' => 'clientSex', 'id' => 'clientSex-0', 'value' => 'Male', 'checked' => TRUE)); ?>
          Male &nbsp;
          <?php echo form_radio(array('name' => 'clientSex', 'id' => 'clientSex-1', 'value' => 'Female', 'checked' => FALSE)); ?>
          Female &nbsp;   </div>
      </div>

      <br> <br>

      <div class="col-sm-2 control-group">
        <div class="controls">
          <center> <h5> Civil Status <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
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
          </select>    
        </div>
      </div>

      <br><br>

      <div class="col-sm-2 control-group">
        <div class="controls">
          <center> <h5> Birthday <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
        </div>
      </div>

      <div class="col-sm-4 control-group">
        <div class="controls">
          <div class="input-group date">
            <span class="input-group-addon"><i class="icon-calendar"></i></span>
            <input type="text" class="form-control date-picker" id="clientBirthday" name="clientBirthday" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
          </div>
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
          <?php echo form_input(array('id' => 'clientBirthPlace', 'name' => 'clientBirthPlace', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
        </div>
      </div>

      <br><br>
      <hr>

      <div class="col-sm-1 control-group">
        <div class="controls">

        </div>
      </div>

      <div class="col-sm-9 control-group">
        <div class="controls">
          <div class="controls">
            <?php echo form_radio(array('name' => 'clientJobless', 'id' => 'clientJobless-0', 'value' => '1', 'checked' => TRUE)); ?>
            Employed &nbsp;
            <?php echo form_radio(array('name' => 'clientJobless', 'id' => 'clientJobless-1', 'value' => '2', 'checked' => FALSE)); ?>
            Unemployed &nbsp;   </div>
        </div>
      </div>


      <br><br>

      <div id='hideifunemployed'>

        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Salary <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
          </div>
        </div>

        <div class="col-sm-4 control-group">
          <div class="controls">
            <select id="clientSalary" name="clientSalary" class="form-control" >
              <option>P 10,000 and below</option>
              <option>P 10,001 - P 25,000</option>
              <option>P 25,001 - P 40,000</option>
              <option>P 40,001 - P 55,000</option>
              <option>P 55,001 - P 70,000</option>
              <option>P 70,001 and above </option>
            </select>   
          </div>
        </div>

        <div class="col-sm-3 control-group">
          <div class="controls">
            <h5> Annually* </h5>
          </div>
        </div>

        <br><br>


        <div class="col-sm-2 control-group">
          <div class="controls">
            <center> <h5> Occupation <span class="glyphicon glyphicon-asterisk"></span> </h5> </center>
          </div>
        </div>

        <div class="col-sm-8 control-group">
          <div class="controls">
            <?php echo form_input(array('id' => 'clientOccupation', 'name' => 'clientOccupation', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
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
            <?php echo form_input(array('id' => 'clientOrganization', 'name' => 'clientOrganization', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
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
            <?php echo form_input(array('id' => 'clientOrganizationAddress', 'name' => 'clientOrganizationAddress', 'type' => 'text', 'class' => 'form-control newclientfield')); ?>
          </div>
        </div>

      </div>
      <br><br>


    </div><!--/col-->
  </div><!--/row-->


  <!-- START OF MODAL :  photoBoothModal -->
  <div class="row">

    <div class="modal fade" id="photoBoothModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Take a Picture</h4>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success">Upload</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  </div>
  <!-- END OF MODAL : photoBoothModal -->


</div>
