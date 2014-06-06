<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-calendar"></i>Attendance</h2>
                    <div class="box-icon">
                    </div>
                </div>
                <div class="box-content">
                    <div>Today is <?= $datenow ?>
                        <br><br>
                        <a class="btn btn-default pull-right" style="background-color:#CBF7D7; margin-top:0px; margin-right:10px;" href="<?= base_url() ?>people/internAttendance"> Create New Attendance Log</a>
                    </div>

                    <br><br><br>

                    <div class="col-sm-1 control-group" style="margin-left:40px;">
                        <div class="controls">
                            <h5> <b> Choose Date </b></h5>
                        </div>
                    </div>

                    <div class="col-sm-3 control-group">
                        <div class="controls">
                            <select class="form-control">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>        
                    </div>

                    <div class="col-sm-3 control-group">
                        <div class="controls">
                            <button class="btn btn-success btn-small" style="margin-top:0px;">View</button>
                        </div>        
                    </div>

                    <br><br>

                    <hr>

                    <div style="background-color:#ECF8F0; padding:15px;">

                        <center>


                            <h1>Attendance Log</h1>

                            <div class="row">

                                <div class="col-sm-1 control-group" style="margin-left:80px;">
                                    <div class="controls">
                                        <h5> <b> Date </b></h5>
                                    </div>
                                </div>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <h5> <?php echo $residency[0]->date ?></h5>
                                    </div>        
                                </div>

                                <br><br>

                                <div class="col-sm-10">

                                    <table class="table table-bordered" style="background-color:white; margin-left:100px;">
                                        <thead>
                                            <tr>
                                                <th><center>INTERN NAME</center></th>
                                        <th><center>TIME IN</center></th>
                                        <th><center>TIME OUT</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($residency as $row) : ?>
                                                <tr>
                                                    <td><?php echo "$row->firstname $row->lastname" ?></td>
                                                    <td><?php echo $row->timeStarted ?></td>
                                                    <td><?php echo $row->timeEnded ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </center>

                    </div>
                    <hr>
                </div>
            </div>
        </div><!--/col-->

    </div><!--/row--> 

    <br>



</div><!-- end: Content -->
