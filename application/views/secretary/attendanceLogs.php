
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
            <a class="btn btn-default pull-right" style="background-color:#CBF7D7; margin-top:0px; margin-right:10px;" href="<?= base_url() ?>people/internmgt"> Create New Attendance Log</a>
          </div>

          <br><br><br>
          <?php echo form_open(base_url() . "people/attendanceLogs/", array('class' => 'form-horizontal')); ?>
          <div class="col-sm-1 control-group" style="margin-left:40px;">
            <div class="controls">
              <h5> <b> Choose Date </b></h5>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <div class="input-group date">
                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                <input type="text" class="form-control date-picker" id="attendancelogdate" name="attendancelogdate" data-date-format="yyyy-mm-dd" value=""/>
              </div>
            </div>        
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <button class="btn btn-success btn-small" style="margin-top:0px;">View</button>
            </div>        
          </div>
          <?php echo form_close(); ?>

          <br><br>

          <hr>

          <div id="attendanceLogAllInterns">
            <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0">
              <thead>
                <tr>
                  <th>Intern</th>
                  <th>Residency Hours</th>
                </tr>
              </thead>   
              <tbody>
                <?php foreach ($residency as $row) : ?>
                  <tr>
                    <td><?php echo $row->firstname . ' ' . $row->lastname ?></td>
                    <?php
                    $reside = $this->People_model->select_person($row->personID)->residency;
                    $remain = $this->People_model->select_person($row->personID)->remainder;

                    $residencyword = '';
                    $residency = explode(":", $reside);
                    if ($residency[0] != 00) {
                      $residencyword .= $residency[0];
                      if ($residency[0] > 1) {
                        $residencyword .= ' hours';
                      } else {
                        $residencyword .= ' hour';
                      }
                    }

                    if ($residency[1] != 00) {
                      $residencyword .= ' and ' . $residency[1];
                      if ($residency[1] > 1) {
                        $residencyword .= ' minutes';
                      } else {
                        $residencyword .= ' minute';
                      }
                    }

                    if ($residency[2] != 00) {
                      $residencyword .= ' and ' . $residency[2];
                      if ($residency[2] > 1) {
                        $residencyword .= ' seconds';
                      } else {
                        $residencyword .= ' second';
                      }
                    }

                    $percentage = ($residency[0]) / (150) * 100;
                    if ($percentage >= 100) {
                      $percentage = 100;
                      $residencyword = '150 hours';
                    }
                    if ($percentage <= 0) {
                      $percentage = 0;
                      $residencyword = '0 hours';
                    }
                    $percentage = substr($percentage, 0, 2)
                    ?>
                    <td><?php echo "$residencyword ($percentage %)" ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="hide" id="attendanceLogByDate">

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
      </div>
    </div><!--/col-->

  </div><!--/row--> 

  <br>



</div><!-- end: Content -->
