
<div class="container">

  <?php echo form_open(base_url().'intern/account',array('class'=>'form-horizontal')); ?>

  <div class="row-fluid">

  <div class="span5">

   <h3> INTERN PROFILE </h3>
    <table class="table table-striped table-bordered">
      <tr>
        <td>Last Name</td>
        <td>Mamenta</td>
      </tr>
      <tr>
        <td>First Name</td>
        <td>Mihaela</td>
      </tr>
        <tr>
        <td>Middle Name</td>
        <td></td>
      </tr>
        <tr>
        <td>Current Caseload</td>
        <td></td>
      </tr>
       <tr>
        <td>Residency Hours Left</td>
        <td></td>
      </tr>
    </table>

  </div>

  <div class="span1"></div>

  <div class="span5">

       <h3> INTERN ACTIVITY </h3>
    <table class="table table-striped table-bordered">
      <tr>
        <th>Activity</th>
        <th>Date</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>

  </div>

</div>

 <?php echo form_close(); ?>

</div>