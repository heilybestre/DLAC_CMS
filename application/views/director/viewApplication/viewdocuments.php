<div id='documents_form' class="container">

<?php echo form_open(base_url() . 'viewApplication/documents', array('class' => 'form-horizontal')); ?>
<br>

<div class="row">

<div class="box span4" onTablet="span6" onDesktop="span4">
  <div class="box-header">
    <h2><i class="icon-file"></i>Documents by the Client</h2>
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

</div><!--/row--> 

<br>

<div class="row">

<div class="col-lg-6">
<div class="box">
  <div class="box-header">
    <h2><i class="icon-file"></i>Documents by the Opposing Party</h2>
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

</div>