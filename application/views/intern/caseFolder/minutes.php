<div class="container" style="margin-top:-50px;">

	<br><br>
    <div class="box">
        <div class="box-header">
            <h2><i class="icon-time"></i>Minutes</h2>
            <div class="box-icon">
                <a href="#addMinutesModal" data-toggle="modal"><i class="icon-plus"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Appointment</th>
                        <th>Date</th>
                    </tr>
                </thead>   
                <tbody>
          <?php foreach ($minutes as $minute) { ?>
                        <tr>
              <td><?= $minute->title ?></td>
              <td><?= $minute->date ?></td> <!-- //HERE -->
                        </tr>
          <?php } ?>
                </tbody>
            </table> 
        </div>
    </div>

    <!-- START OF MODAL : ADD Minutes -->
    <div class="row">

        <div class="modal fade" id="addMinutesModal">
            <div class="modal-dialog-minutes">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add New Minutes</h4>
                    </div>
                    <div class="modal-body" style="height:300px; overflow-y: scroll;">
                        
                      <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Related Action Plan Item: </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <select class="form-control">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                            
                            <br><br><br>

                  	<div class="col-lg-6">

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Appointment </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Date </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" class="form-control date-picker" id="minutesdate" name="minutesdate" data-date-format="yyyy-mm-dd" value="<?php echo $datenow;?>">
                            </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Time </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-4 control-group">
                                <div class="controls">
                                    <div class="input-group bootstrap-timepicker">
                                        <span class="input-group-addon"><i class="icon-time"></i></span>
                                        <input type="text" class="form-control timepicker" id="minutes_starttime" name="minutes_starttime" value="<?php echo $timenow; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1 control-group">
                                <div class="controls">
                                    <center> <h5> to </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-4 control-group">
                                <div class="controls">
                                    <div class="input-group bootstrap-timepicker">
                                        <span class="input-group-addon"><i class="icon-time"></i></span>
                                        <input type="text" class="form-control timepicker" id="minutes_endtime" name="minutes_endtime" value="<?php echo $timenow; ?>">
                                    </div>
                                </div>
                            </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Location </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Attendees </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>
                    </div>

                    <div class="col-lg-6">

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Report </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-8 control-group">
                            <div class="controls">
                                <?php echo form_textarea(array('id' => 'minutesReport', 'name' => 'minutesReport', 'type' => 'text', 'class' => 'form-control' )); ?>
                            </div>
                        </div>

                        <br><br>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Confirm</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : ADD Minutes -->

</div>