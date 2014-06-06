<div id='documents_form' class="container">

<?php echo form_open(base_url() . 'editApplication/documents', array('class' => 'form-horizontal')); ?>

<div class="row">
    <!-- Button to trigger modal -->
        <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addDocumentModal" data-toggle="modal">
            <i class="icon-plus-sign"></i>&nbsp;Add Document</a>

<div class="modal fade" id="addDocumentModal">
<div class="modal-dialog-documents">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Add Document</h4>
  </div>
  <div class="modal-body">

  <div class="row">
    
    <div class="col-sm-1 control-group">
        <div class="controls">
        <center> <h5> Choose Type: </h5> </center>
        </div>
    </div>

    <div class="col-sm-14 control-group">
      <div class="controls">
        <input type="button" class="btn btn-success btn-small" value="Pleadings/Motions by the Client" onclick="location.href = 'javascript:toggleAppDocClient();';">
        <input type="button" class="btn btn-success btn-small" value="Pleadings/Motions by the Opposing Party" onclick="location.href = 'javascript:toggleAppDocOpposing();';">
        <input type="button" class="btn btn-success btn-small" value="Document Issued by the Court" onclick="location.href = 'javascript:toggleAppDocCourt();';"> 
        </div>
    </div>

<br><br>

<?php echo form_open(base_url() . 'intern/docClient', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC BY CLIENT -->

<div id="toggleAppDocClient" style="display: none">
<div class="col-sm-7">

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Title </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
         <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
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
        <select class="form-control">
            <option></option>
            <option>Month</option>
        </select>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Day</option>
        </select>        
    </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Year</option>
        </select>
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
        <select class="form-control">
            <option></option>
            <option>Month</option>
        </select>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Day</option>
        </select>        
    </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Year</option>
        </select>
        </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Filed by </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
       <?php echo form_input(array('id' => 'caseDocFiledBy', 'name' => 'caseDocFiledBy', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Reason </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
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
        <select id="caseDocRemarks" name="caseDocRemarks" class="form-control">
            <option></option>
            <option>Granted by the Court</option>
            <option>Denied by the Court</option>
            <option>Pending</option>
        </select>     
        </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Upload </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
    </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>  </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
      <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
    </div>
    </div>


</div>
</div><?php echo form_close(); ?> <!-- END OF DOC BY CLIENT -->

<?php echo form_open(base_url() . 'intern/docOpposing', array('class' => 'form-horizontal')); ?> <!-- START OF DOC BY OPPOSING -->
<div id="toggleAppDocOpposing" style="display: none">

<div class="col-sm-7">

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Title </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
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
        <select class="form-control">
            <option></option>
            <option>Month</option>
        </select>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Day</option>
        </select>        
    </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Year</option>
        </select>
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
        <select class="form-control">
            <option></option>
            <option>Month</option>
        </select>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Day</option>
        </select>        
    </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Year</option>
        </select>
        </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Filed by </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'caseDocFiledBy', 'name' => 'caseDocFiledBy', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Reason </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
      <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
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
        <select id="caseDocRemarks" name="caseDocRemarks" class="form-control">
            <option></option>
            <option>Granted by the Court</option>
            <option>Denied by the Court</option>
            <option>Pending</option>
        </select>     
        </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Upload </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
    </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>  </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
      <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
    </div>
    </div>

</div>
</div><?php echo form_close(); ?> <!-- END OF DOC BY OPPOSING -->

<?php echo form_open(base_url() . 'intern/docCourt', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC FROM THE COURT -->
<div id="toggleAppDocCourt" style="display: none">
<div class="col-sm-7">

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Title </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
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
        <select class="form-control">
            <option></option>
            <option>Month</option>
        </select>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Day</option>
        </select>        
    </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Year</option>
        </select>
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
        <select class="form-control">
            <option></option>
            <option>Month</option>
        </select>
        </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Day</option>
        </select>        
    </div>
    </div>

    <div class="col-sm-2 control-group">
      <div class="controls">
        <select class="form-control">
            <option></option>
            <option>Year</option>
        </select>
        </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Order </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'caseDocOrder', 'name' => 'caseDocOrder', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Reason </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Action Needed </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_input(array('id' => 'caseDocNeededAction', 'name' => 'caseDocNeededAction', 'type' => 'text', 'class' => 'form-control')); ?>
     </div>
    </div>

<br><br>


     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5> Upload </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
    </div>
    </div>

<br><br>

     <div class="col-sm-4 control-group">
        <div class="controls">
        <center> <h5>  </h5> </center>
        </div>
    </div>

    <div class="col-sm-7 control-group">
      <div class="controls">
        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
    </div>
    </div>

</div>
</div>
<?php echo form_close(); ?><!-- END OF DOC FROM THE COURT -->
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
            
<div class="col-lg-6">
<div class="box">
  <div class="box-header">
    <h2><i class="icon-edit"></i>Pending Drafts</h2>
  </div>
  <div class="box-content">
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
    <tr>
      <th width="20%"></th>
      <th width="55%">Title</th>
      <th width="25%"></th>
    </tr>
  </thead>   
  <tbody>
  <tr>
   <td></td>
   <td></td>
   <td></td>
  </tr>
  </tbody>
</table>    
  </div>
</div>
</div><!--/col-->

<div class="col-lg-6">
<div class="box span4" onTablet="span6" onDesktop="span4">
  <div class="box-header">
    <h2><i class="icon-file"></i>Pleadings/Motions by the Client</h2>
  </div>
  <div class="box-content">
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
    <tr>
      <th width="20%"></th>
      <th width="80%">Title</th>
    </tr>
  </thead>   
  <tbody>
  <tr>
  <td></td>
   <td></td>
  </tr>
  </tbody>
</table>  
  </div>
</div>
</div><!--/col-->

</div><!--/row--> 

<br>

<div class="row">

<div class="col-lg-6">
<div class="box">
  <div class="box-header">
    <h2><i class="icon-file"></i>Pleadings/Motions by the Opposing Party</h2>
  </div>
  <div class="box-content">
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
    <tr>
      <th width="20%"></th>
      <th width="80%">Title</th>
    </tr>
  </thead>   
  <tbody>
  <tr>
    <td></td>
    <td></td>
  </tr>
  </tbody>
</table>    
  </div>
</div>
</div><!--/col-->

<div class="col-lg-6">
<div class="box span4" onTablet="span6" onDesktop="span4">
  <div class="box-header">
    <h2><i class="icon-file"></i>Documents Issued by the Court</h2>
  </div>
  <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
    <tr>
      <th width="20%"></th>
      <th width="80%">Title</th>
    </tr>
  </thead>   
  <tbody>
  <tr>
    <td></td>
    <td></td>
  </tr>
  </tbody>
</table>
  </div>
</div>
</div><!--/col-->

</div><!--/row--> 

<?php echo form_close(); ?>

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