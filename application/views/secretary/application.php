<div id="content" class="col-lg-10 col-sm-11">

  <!-- start: Content -->

    <div class="row">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header">
            <h2><i class="icon-list"></i>Applications</h2>
          </div>
          <div class="box-content">
            <br/>
            <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0">
              <thead>
                <tr>
                  <th>Application Title</th>
                  <th>Date Submitted</th>
                  <th>Status</th>
                </tr>
              </thead>   
              <tbody>
                <?php foreach ($apps as $row) : ?>
                <tr>
                  <td><?php echo $row->title ?></td>
                  <td class="center"><?php echo $row->dateTimeSubmitted ?></td>
                  <td class="center"><?php echo $row->statusName ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>
