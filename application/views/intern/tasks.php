<!-- Director Dashboard -->
<link href="<?= base_url() ?>assets/css/jquery.dataTables.css" rel="stylesheet">
<div class="container-fluid">
  <div class="marketing">
    <br>

    <div class="row-fluid">
      <div class="span1"></div>
      <div class="span10">
        <div class="row-fluid">

          <div class="row-fluid">
            <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addEventModalDir" data-toggle="modal">
              <i class="icon-plus-sign"></i>&nbsp;Add Event
            </a>
            <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px; margin-right: 10px;' href="#addTaskModalDir" data-toggle="modal">
              <i class="icon-plus-sign"></i>&nbsp;Add Task
            </a>

          </div>

          <div class="span4">

            <h2>TASKS</h2>
            <br>
            <table id='table_app' class="table table-striped table-bordered" data-provides="rowlink">
              <tr>
                <td> Priority </td>
                <td> Task </td>
                <td> Case Title </td>
                <td> Status </td>
              </tr>
              <?php //foreach ($querynotif as $row) : ?>
              <tr onclick="">
                <td><?php //echo $row->dateTime ?></td>
                <td><?php //echo $row->title;  ?></td>
                <td> </td>
                <td> <button class="btn btn-success btn-small">Done</button> &nbsp; <button class="btn btn-small btn-danger">Delete</button> </td>
              </tr><?php //endforeach;  ?>
            </table>
          </div>


          <div class="span7">
            <h2>SCHEDULE</h2>

            <br>
            <table id='table_app' class="table table-striped table-bordered" data-provides="rowlink">
              <tr>
                <td> Date </td>
                <td> Time </td>
                <td> Event </td>
                <td> Attendees </td>
                <td> </td>
              </tr>
              <?php //foreach ($querysched as $row) : ?>
              <tr onclick="">
                <td><?php //echo $row->dateTime;  ?></a></td>
                <td><?php //echo $row->title;  ?></td>
                <td> </td>
                <td>  </td>
                <td> <button class="btn btn-success btn-small">Done</button> &nbsp; <button class="btn btn-small btn-danger">Delete</button>  </td>
              </tr><?php //endforeach;  ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br><br>
