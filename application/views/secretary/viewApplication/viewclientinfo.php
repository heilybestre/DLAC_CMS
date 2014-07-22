
<div id='clientinfo_form' class="container">

  <div style="overflow: scroll; height: 600px;">

    <?php foreach ($clientlist as $client) { ?>
      <div class="row well" style="margin: 5px;">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-sm-2 control-group">
              <div class="controls">
                <center> <h5><b> Client's Photo</b> </h5> </center>
              </div>
            </div>
            <div class="form-horizontal col-lg-4 col-sm-6">
              <div class="controls">
                <?php
                if ($client->image == null)
                  echo '<img src="' . base_url() . '/assets/img/initialphoto.jpg"></img>';
                else
                  echo '<img src="' . base_url() . $client->image . '" height="100px;""></img>';
                ?>
              </div>
            </div>
          </div>

          <br>

          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5> <b>Name </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-8 control-group">
            <div class="controls">
              <h5><?php echo $client->firstname . ' ' . $client->middlename . ' ' . $client->lastname ?></h5>
            </div>
          </div>

          <br><br>

          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5><b> Address </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-8 control-group" style="max-height: 40px;">
            <div class="controls">
              <h5>
                <?php echo $client->addrhouse . ' ' . $client->addrstreet . ' St., ' . $client->addrtown ?>
                <?php
                if ($client->addrdistrict != '')
                  echo ' | District ' . $client->addrdistrict;

                if ($client->addrpostalcode != '')
                  echo ' (' . $client->addrpostalcode . ')';
                ?>
              </h5>
            </div>
          </div>

          <br><br><br>

          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5><b> Contact #</b></h5> </center>
            </div>
          </div>

          <div class="col-sm-8 control-group">
            <div class="controls">
              <h5>
                <?php
                if ($client->contacthome != null) {
                  echo $client->contacthome . ' (Home) | ';
                }
                ?>
                <?php
                if ($client->contactoffice != null) {
                  echo $client->contactoffice . ' (Office) | ';
                }
                ?>
                <?php
                if ($client->contactmobile != null) {
                  echo $client->contactmobile;
                }
                ?>
              </h5>
            </div>
          </div>

          <br> <br> <br>

          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5> <b>Email </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5><?php
                if ($client->emailaddr == '' || $client->emailaddr == NULL)
                  echo '-';
                else
                  echo $client->emailaddr;
                ?></h5>
            </div>
          </div>

          <br> <br>

          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5> <b>Facebook Email</b> </h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5><?php
                if ($client->fbemailaddr == '' || $client->fbemailaddr == NULL)
                  echo '-';
                else
                  echo $client->fbemailaddr;
                ?></h5>
            </div>
          </div>

          <br> <br> <br>

          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5><b> Referred by</b> </h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5><?php
                if ($client->referredby == '' || $client->referredby == NULL)
                  echo '-';
                else
                  echo $client->referredby;
                ?></h5>
            </div>
          </div>

          <br> <br> <br>

          <div class="col-sm-2 control-group">
            <div class="controls">
              <center> <h5> <b>Contact No.</b> </h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5><?php
                if ($client->rbcontact == '' || $client->rbcontact == NULL)
                  echo '-';
                else
                  echo $client->rbcontact;
                ?></h5>
            </div>
          </div>

        </div><!--/col-->

        <div class="col-lg-6">

          <h3>Personal Circumstances</h3>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5><b> Sex </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-6 control-group">
            <div class="controls">
              <h5><?php echo $client->sex ?></h5>   
            </div>
          </div>

          <br> <br>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5> <b>Civil Status</b> </h5> </center>
            </div>
          </div>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <h5><?php echo $client->civilstatus ?></h5> 
            </div>
          </div>

          <br><br><br>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5> <b>Birthday </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-8 control-group">
            <div class="controls">
              <h5><?php echo date("F j, Y", strtotime($client->birthdate)) ?></h5>
            </div>
          </div>

          <br><br>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5> <b>Birthplace </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-8 control-group">
            <div class="controls">
              <h5><?php
                if ($client->birthplace == '' || $client->birthplace == NULL)
                  echo '-';
                else
                  echo $client->birthplace;
                ?></h5>
            </div>
          </div>

          <br><br>
          <hr>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5> <b>Salary </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5><?php echo $client->salary ?> (per month)</h5>
            </div>
          </div>

          <br><br>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5><b> Occupation</b> </h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5><?php
                if ($client->occupation == '' || $client->occupation == NULL)
                  echo '-';
                else
                  echo $client->occupation;
                ?></h5>
            </div>
          </div>

          <br><br>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5> <b>Organization </b></h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5>&nbsp;<?php
                if ($client->organization == '' || $client->organization == NULL)
                  echo '-';
                else
                  echo $client->organization;
                ?></h5>
            </div>
          </div>

          <br><br>

          <div class="col-sm-3 control-group">
            <div class="controls">
              <center> <h5> <b>Address</b> </h5> </center>
            </div>
          </div>

          <div class="col-sm-9 control-group">
            <div class="controls">
              <h5><?php
                if ($client->organizationaddr == '' || $client->organizationaddr == NULL)
                  echo '-';
                else
                  echo $client->organizationaddr;
                ?></h5>
            </div>
          </div>

          <br><br>


        </div><!--/col-->
      </div><!--/row-->
    <?php } ?>

  </div>

</div>
