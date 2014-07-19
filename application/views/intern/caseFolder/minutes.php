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
              <td><a href='#minutesModal_<?= $minute->scheduleID ?>' data-toggle="modal"> <?= $minute->title ?> </a></td>
              <td><?= $minute->date ?></td> <!-- //HERE -->
            </tr>
          <?php } ?>
        </tbody>
      </table> 
    </div>
  </div>

  <!-- START OF MODAL : VIEW Minutes Details -->
  <?php foreach ($minutes as $m) { ?>
    <div class="row">
      <div class="modal fade" id="minutesModal_<?= $m->scheduleID ?>">
        <div class="modal-dialog-minutes">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?= $m->title ?></h4>
            </div>
            <div class="modal-body" style="height:300px; overflow-y: scroll; margin-left: 25px;">

              <br><br>
              
              <div class="form-group" style='margin-left:20px;'>
                <label class="col-sm-1 control-label">Date</label>
                <div class="col-sm-2">
                  <?= date('F j, Y', strtotime($m->date)) ?>
                </div>
              </div>
              
              <br>
              
              <div class='col-sm-11'>
                <div class='well'>
                  <?= $m->summary ?>
                </div>
              </div>

            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  <?php } ?>
  <!-- END OF MODAL : ADD Minutes -->

</div>