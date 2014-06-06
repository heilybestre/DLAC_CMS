<div class="container">
    <?php echo form_open(base_url() . 'director/appClosing', array('class' => 'form-horizontal')); ?>

   
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

<div class="row">
	<div class="col-sm-2 control-group">
            <div class="controls">
            
           </div>
        </div>

       <div class="col-sm-8 control-group">
            <div class="controls">
              <button type="button" class="btn btn-success">Accept Application to Close</button>
			  <button type="button" class="btn btn-danger">Reject Application to Close</button>
            </div>
        </div>
	
</div>

</div>
