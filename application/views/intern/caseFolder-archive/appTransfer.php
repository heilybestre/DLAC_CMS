<div class="container">
    <?php echo form_open(base_url() . 'director/appTransfer', array('class' => 'form-horizontal')); ?>

   
    <div class="row">

<div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5> Case Title: </h5> </center>
           </div>
        </div>

       <div class="col-sm-8 control-group">
            <div class="controls">
              (title)
            </div>
        </div>

        <br><br>

        <div class="col-sm-2 control-group">
        <div class="controls">
              <center> <h5> Supervising Lawyer: </h5> </center>
           </div>
       </div>
        

       <div class="col-sm-8 control-group">
            <div class="controls">
              (SL)
            </div>
        </div>

        <br><br>

        <div class="col-sm-2 control-group">
        <div class="controls">
              <center> <h5> Student Interns: </h5> </center>
           </div>
        </div>

       <div class="col-sm-8 control-group">
            <div class="controls">
              (SI)
            </div>
        </div>

        <br><br>

              <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5> Current Stage: </h5> </center>
           </div>
        </div>

       <div class="col-sm-8 control-group">
            <div class="controls">
              (Stage)
            </div>
        </div>

        <br><br>

         <div class="col-sm-2 control-group">
        <div class="controls">
        <center> <h5> Reason: </h5> </center>
        </div>
    </div>

    <div class="col-sm-6 control-group">
      <div class="controls">
        (Reason)
        </div>
    </div>
    <br><br>

        <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5> Requested by: </h5> </center>
           </div>
        </div>

       <div class="col-sm-8 control-group">
            <div class="controls">
              (Intern name)
            </div>
        </div>
    
</div>

<br>

<div class="row">
    <div class="col-sm-2 control-group">
            <div class="controls">
            
           </div>
        </div>

       <div class="col-sm-8 control-group">
            <div class="controls">
            <a class ="btn btn-medium btn-info" style='margin-bottom: 10px' href="#acceptTransferModal" data-toggle="modal">Accept</a>
            <a class ="btn btn-medium btn-danger" style='margin-bottom: 10px' href="#rejectTransfer" data-toggle="modal">Reject</a>

            </div>
        </div>
</div>

<!--SHOW IF ACCEPTED -->


<div class="modal fade" id="acceptTransferModal">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Transfer Case</h4>
  </div>
  <div class="modal-body">

    <div class="col-sm-4 control-group">
            <div class="controls">
            <h5>Current Assigned Interns:</h5>
           </div>
        </div>

       <div class="col-sm-6 control-group">
            <div class="controls">
            (Interns)
            </div>
        </div>

        <br> <br>


    <h5> Choose an intern to whom you want to transfer this: </h5>

    <table class="table table-bordered table-striped datatable">

    <thead>
    <tr>
    <td></td>
    <td>Name</td>
    <td>Caseload</td>
    </tr>
    </thead>

    <tbody class="openCase-table">
    <tr>
    <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
    <td>Laylo, Jal</td>
    <td>3</td>
    </tr>

    <tr>
    <td align="center"><input type="checkbox" class="case" name="case" value="16"/></td>
    <td>Laylo, Jal</td>
    <td>3</td>
    </tr>
    </tbody>

    </table>
    </div>

    <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Transfer</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
</div>
</div>

<!--SHOW IF ACCEPTED -->

</div>
