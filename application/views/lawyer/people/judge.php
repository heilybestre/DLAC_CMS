<div class="container">
  <div class="row">

    <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addJudge" data-toggle="modal">
    <i class="icon-plus-sign"></i>&nbsp;Add Judge</a>&nbsp;

  </div>

<div class="row">
<br>
<div class="col-lg-12">

<table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
    <tr>
    <th width="30%">Name</th>
    <th width="10%">Case Related</th>
    </tr>
  </thead>   
  <tbody>
    <tr>
    <td></td>
    <td></td>
    </tr>
  </tbody>
</table>

</div>
</div>

  <div class="row">

    <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#viewJudge" data-toggle="modal">
    <i class="icon-plus-sign"></i>&nbsp;View Judge</a>&nbsp;

  </div>

    <!-- START OF MODAL : DONE Task -->
    <div class="row">

        <div class="modal fade" id="addJudge">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Judge</h4>
                    </div>
                    <div class="modal-body">
                         <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Name </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Place of Jurisdiction </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-9 control-group">
                            <div class="controls">
                                <?php echo form_input(array('class' => 'form-control')); ?>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Add Judge</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : ADD JUDGE -->

    <!-- START OF MODAL : VIEW JUDGE Task -->
    <div class="row">
        <div class="modal fade" id="viewJudge">
            <div class="modal-dialog-viewJudge">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Judge Name: </h4>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-10">
                          <div class="col-sm-2"></div>

                          <div class="box noOverflow chat alt">
            <div class="conversation">

              <ul class="talk">
                <li>
                  <img class="avatar" src="assets/img/avatar3.jpg" alt="avatar">
                  <span class="name">INTERN NAME</span><br>
                  <span class="time">DATE TIME</span>
                  <div class="message">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                </li>
              </ul>
              <div class="form">
                <div class="col-sm-10">
                <input type="textarea" id="write-message" placeholder="Comment">
                </div><div class="col-sm-1"></div>
                  <div class="col-sm-2">
                <?php echo form_submit(array('id' => 'send','name' => 'submit', 'class' => 'btn btn-success', 'style'=> 'margin-top:0px;'), 'Add Comment'); ?>
              </div>
              </div><br><br>  
            </div>

          </div>
          
          
                        </div><!--/col-->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- END OF MODAL : DONE Task -->    

</div>