<div id='evidence_form' class="container">

<div class="row">

<a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addEvidenceModal" data-toggle="modal">
<i class="icon-plus-sign"></i>&nbsp;Add Evidence</a>

</div>

<div class="row">

<div class="modal fade" id="addEvidenceModal">
<div class="modal-dialog-evidence">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Add Evidence</h4>
</div>
<div class="modal-body">

<div class="row">
    
    <div class="controls">
        Choose Type:
        <input type="button" class="btn btn-success btn-small" value="Documentary" onclick="location.href = 'javascript:toggleAppEvidenceDoc();';">
        <input type="button" class="btn btn-success btn-small" value="Object" onclick="location.href = 'javascript:toggleAppEvidenceObj();';">
        <input type="button" class="btn btn-success btn-small" value="Testimonial" onclick="location.href = 'javascript:toggleAppEvidenceTesti();';">
    </div><br><br>


    <?php echo form_open(base_url() . 'editApplication/evidencedoc', array('class' => 'form-horizontal')); ?> <!-- START OF DOCUMENTARY EVIDENCE -->

    <div id="toggleAppDoc" style="display: none">

    <div class="col-sm-6">

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Document Type </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <select id="documentType" name="documentType" class="form-control">
            <option></option>
            <option>Original</option>
            <option>Photocopy</option>
        </select>    
        </div>
    </div>

<br> <br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Document Name </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'documentInvolved', 'name' => 'documentInvolved', 'type' => 'text', 'class' => 'form-control')); ?>   
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Status </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <select id="documentStatus" name="documentStatus" class="form-control">
            <option></option>
            <option>Available</option>
            <option>Not Available</option>
            <option>Lost</option>
            <option>Processing</option>
            <option>To Follow</option>
        </select>
        </div>
    </div>

<br> <br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Description </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
            <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'documentDesc', 'name' => 'documentDesc', 'type' => 'text', 'class' => 'form-control')); ?>
        </div>
    </div>

    </div>

     <div class="col-sm-6">

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Purpose </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'documentPurpose', 'name' => 'documentPurpose', 'type' => 'text', 'class' => 'form-control')); ?>
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Date Issued </h5> </center>
        </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
       <?php echo form_dropdown('documentDateIssuedMonth', $months, '0', 'id="documentDateIssuedMonth" class="form-control"'); ?>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
     <?php echo form_dropdown('documentDateIssuedDay', $days, '0', 'id="documentDateIssuedDay" class="form-control"'); ?>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
       <?php echo form_dropdown('documentDateIssuedYear', $years, '0', 'id="documentDateIssuedYear" class="form-control"'); ?>
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Place Issued </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
      <?php echo form_input(array('id' => 'documentPlaceIssued', 'name' => 'documentPlaceIssued', 'type' => 'text', 'class' => 'form-control')); ?>
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Date Received </h5> </center>
        </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
            <?php echo form_dropdown('documentDateReceivedMonth', $months, $monthnow, 'id="documentDateReceivedMonth" class="form-control"'); ?>
         </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
             <?php echo form_dropdown('documentDateReceivedDay', $days, $daynow, 'id="documentDateReceivedDay" class="form-control"'); ?>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
            <?php echo form_dropdown('documentDateReceivedYear', $years, $yearnow, 'id="documentDateReceivedYear" class="form-control"'); ?>
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Person to Testify</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
       <?php echo form_input(array('id' => 'personTestifyDoc', 'name' => 'personTestifyDoc', 'type' => 'text', 'class' => 'form-control')); ?>
        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success', 'id' => 'btn-addEvidence'), 'Add Evidence'); ?>
    </div>
    </div>

<br><br>


    </div>
</div> <?php echo form_close(); ?> <!-- END OF DOCUMENTARY EVIDENCE -->

<?php echo form_open(base_url() . 'createapplication/evidenceobj', array('class' => 'form-horizontal')); ?> <!-- START OF OBJECT EVIDENCE -->

<div id="toggleAppObj" style="display: none">

<div class="col-sm-6">

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Object </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'object', 'name' => 'object', 'type' => 'text', 'class' => 'form-control')); ?>
    </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Status </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <select id="objectStatus" name="objectStatus" class="form-control">
            <option></option>
            <option>In Possession</option>
            <option>Lost</option>
            <option>To Follow</option>
            <option>In Possession of Other Person</option>
        </select>
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Person </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
       <?php echo form_input(array('placeholder' => 'appear if In Possession of Other Person^', 'id' => 'possessionName', 'name' => 'possessionName', 'type' => 'text', 'class' => 'form-control')); ?>
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Remarks </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <select id="evidenceRemarks" name="evidenceRemarks" class="form-control">
            <option></option>
            <option>Favorable</option>
            <option>Not Favorable</option>
            <option>Neutral</option>
            <option>Immaterial</option>
        </select>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Description </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
         <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'objectDesc', 'name' => 'objectDesc', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

    </div>

<div class="col-sm-6">

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Purpose </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
         <?php echo form_input(array('id' => 'objectPurpose', 'name' => 'objectPurpose', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Location </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'objectFound', 'name' => 'objectFound', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Date Received </h5> </center>
        </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <?php echo form_dropdown('objectDateReceivedMonth', $months, $monthnow, 'id="objectDateReceivedMonth" class="form-control"'); ?>
     </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <?php echo form_dropdown('objectDateReceivedDay', $days, $daynow, 'id="objectDateReceivedDay" class="form-control"'); ?>
     </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
         <?php echo form_dropdown('objectDateReceivedYear', $years, $yearnow, 'id="objectDateReceivedYear" class="form-control"'); ?>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Date Retrieved</h5> </center>
        </div>
    </div>

    <div class="col-sm-3 control-group">
      <div class="controls">
        <?php echo form_dropdown('objectDateRetrievedMonth', $months, '0', 'id="objectDateRetrievedMonth" class="form-control"'); ?>
     </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
         <?php echo form_dropdown('objectDateRetrievedDay', $days, '0', 'id="objectDateRetrievedDay" class="form-control"'); ?>
     </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <?php echo form_dropdown('objectDateRetrievedYear', $years, '0', 'id="objectDateRetrievedYear" class="form-control"'); ?>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Person to Testify </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'personTestifyObj', 'name' => 'personTestifyObj', 'type' => 'text', 'class' => 'form-control')); ?>
        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Evidence'); ?>
     </div>
    </div>

<br><br>

</div>
</div>
<?php echo form_close(); ?> <!-- END OF OBJECT EVIDENCE -->

<?php echo form_open(base_url() . 'createapplication/evidencetes', array('class' => 'form-horizontal')); ?> <!-- START OF TESTIMONIAL EVIDENCE -->

<div id="toggleAppTesti" style="display: none">

<div class="col-sm-6">

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Testified by </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'testimonialPerson', 'name' => 'testimonialPerson', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Contact Information</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'testimonialPersonCN', 'name' => 'testimonialPersonCN', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Purpose</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'testimonialPurpose', 'name' => 'testimonialPurpose', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Status</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <select id="testimonialStatus" name="testimonialStatus" class="form-control">
            <option></option>
            <option>Testified</option>
            <option>Not Testified</option>
            <option>Available</option>
            <option>Not Available</option>
        </select>
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Reason</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
         <?php echo form_input(array('placeholder' => '', 'id' => 'testimonialNAreason', 'name' => 'testimonialNAreason', 'type' => 'text', 'class' => 'form-control')); ?>
        </div>
    </div>

</div>

<div class="col-sm-6">

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Remarks</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <select id="testimonialRemarks" name="testimonialRemarks" class="form-control">
            <option></option>
            <option>Favorable</option>
            <option>Not Favorable</option>
            <option>Neutral</option>
            <option>Immaterial</option>
        </select>        
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Narrative</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_textarea(array('style' => 'height: 100px', 'id' => 'testimonialNarrative', 'name' => 'testimonialNarrative', 'type' => 'text', 'class' => 'form-control')); ?>     
        </div>
    </div>

<br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Presented to Court</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
        <div class="form-inline">
      <div class="controls">
        <?php echo form_radio(array('name' => 'testimonialPresented', 'id' => 'evidenceType-0', 'value' => '1', 'checked' => TRUE)); ?>
        Yes &nbsp;
        <?php echo form_radio(array('name' => 'testimonialPresented', 'id' => 'evidenceType-1', 'value' => '2', 'checked' => FALSE)); ?>
         No &nbsp;   
         </div>   
     </div>
    </div>

<br><br><br><br><br>

    <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>Proceeding</h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <select id="testimonialPresentedProceeding" name="testimonialPresentedProceeding" class="form-control">
            <option></option>
            <option>A</option>
            <option>B</option>
        </select>        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Evidence'); ?>
        </div>
    </div>
<br><br>
</div>
</div> <?php echo form_close(); ?> <!-- END OF TESTIMONIAL EVIDENCE -->

</div>
</div>

<div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>

<div class="row">

<div class="box">
  <div class="box-header">
    <h2><i class="icon-list"></i>Documentary Evidence</h2>
  </div>
  <div class="box-content">
<table id='evidence_table_doc' class="table table-striped table-bordered span10">
<tr>
    <th width="5%"></th>
    <th width="30%">Document Involved</th>
    <th width="10%">Status</th>
    <th width="30%">Purpose</th>
    <th width="10%">Date Received</th>
</tr>
<?php foreach ($querydoc as $row) : ?>
<tr>
    <td> <?php echo $row->evidencedocID; ?> </td>
    <td> <?php echo $row->dinvolved; ?> </td>
    <td> <?php echo $row->dstatus; ?> </td>
    <td> <?php echo $row->dpurpose; ?> </td>
    <td> <?php echo $row->ddateReceived; ?> </td>
</tr>
<?php endforeach; ?>
</table> 
  </div>
</div>

</div>

<br>
<div class="row">

<div class="box">
  <div class="box-header">
    <h2><i class="icon-list"></i>Object Evidence</h2>
  </div>
  <div class="box-content">
    <table id='evidence_table_obj' class="table table-striped table-bordered span10">
    <tr>
        <th width="5%"></th>
        <th width="30%">Object</th>
        <th width="10%">Status</th>
        <th width="30%">Purpose</th>
        <th width="10%">Date Received</th>
    </tr>
    <?php foreach ($queryobj as $row) : ?>
    <tr>
        <td> <?php echo $row->evidenceobjID; ?> </td>
        <td> <?php echo $row->oobject; ?> </td>
        <td> <?php echo $row->ostatus; ?> </td>
        <td> <?php echo $row->opurpose; ?> </td>
        <td> <?php echo $row->odateReceived; ?> </td>
    </tr>
    <?php endforeach; ?>
    </table>
  </div>
</div>

</div>

<br>

<div class="row">

<div class="box">
  <div class="box-header">
    <h2><i class="icon-list"></i>Testimonial Evidence</h2>
  </div>
  <div class="box-content">
    <table id='evidence_table_tes' class="table table-striped table-bordered span10">
    <tr>
        <th width="5%"></th>
        <th width="30%">Name</th>
        <th width="20%">Contact Information</th>
        <th width="15%">Purpose</th>
        <th width="10%">Status</th>
    </tr>
    <?php foreach ($querytes as $row) : ?>
        <tr>
            <td> <?php echo $row->evidencetesID; ?> </td>
            <td> <?php echo $row->tpersonTestified; ?> </td>
            <td> <?php echo $row->tcontactInfo; ?> </td>
            <td> <?php echo $row->tpurpose; ?> </td>
            <td> <?php echo $row->tstatus; ?> </td>
        </tr>
    <?php endforeach; ?>
    </table>
  </div>
</div>

</div>

<div class="row">
<!-- Button -->
<div class="control-group pull-right">
    <label class="control-label" for="submit"></label>
    <div class="controls">
        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Save'); ?>
</div>
</div>
</div>

</div>
