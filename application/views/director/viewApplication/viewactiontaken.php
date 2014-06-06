<div id='actiontaken_form' class="container">

    <div class="container">

        <?php echo form_open(base_url() . 'viewApplication/actionTaken', array('class' => 'form-horizontal')); ?>

        <br>
        <?php foreach ($oneapp as $row): ?>
            <div class="row">
                <h2> Current Stage: <?php echo $row->stageName ?> </h2>
            </div>
        <?php endforeach; ?>

        <div class="row">

            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="disabled"><a href="" data-toggle="tab"><b>STAGES:</b></a></li>
                    <li class="active"><a href="#tab1" data-toggle="tab">New</a></li>
                    <li><a href="#tab2" data-toggle="tab">Preliminary Investigation</a></li>
                    <li><a href="#tab5" data-toggle="tab">Pre-Trial</a></li>
                    <li><a href="#tab6" data-toggle="tab">Trial Court</a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <?php $newcount = 1; ?>
                                <?php foreach ($new as $row): ?>
                                    <tr>
                                        <td><?php echo $newcount ?></td>
                                        <td><?php echo $row->date ?></td>
                                        <td><?php echo $row->action ?></td>
                                        <?php $newcount++; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab2">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <?php $preinvcount = 1; ?>
                                <?php foreach ($preinv as $row): ?>
                                    <tr>
                                        <td><?php echo $preinvcount ?></td>
                                        <td><?php echo $row->date ?></td>
                                        <td><?php echo $row->action ?></td>
                                        <?php $preinvcount++; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab5">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <?php $pretricount = 1; ?>
                                <?php foreach ($pretri as $row): ?>
                                    <tr>
                                        <td><?php echo $pretricount ?></td>
                                        <td><?php echo $row->date ?></td>
                                        <td><?php echo $row->action ?></td>
                                        <?php $pretricount++; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab6">
                        <br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <?php $tricoucount = 1; ?>
                                <?php foreach ($tricou as $row): ?>
                                    <tr>
                                        <td><?php echo $tricoucount ?></td>
                                        <td><?php echo $row->date ?></td>
                                        <td><?php echo $row->action ?></td>
                                        <?php $tricoucount++; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br><br>
            </div>
        </div>

        <!-- START OF ViewActionTakenModal -->
        <div class="row">

            <a class ="btn btn-medium btn-link pull-right" style='margin-bottom: 10px' href="#viewActionTakenModal" data-toggle="modal">
                &nbsp;View Action Taken</a>

        </div>


        <div class="row">
            <div class="modal fade" id="viewActionTakenModal">
                <div class="modal-dialog-actionTaken">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Action Taken</h4>
                        </div>
                        <div class="modal-body">

                            <div id="addActionTaken">

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Stage: </h5> </center>
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
                                        <center> <h5> Action Taken </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">
                                        (actionTaken)
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Date </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">
                                        (Date)
                                    </div>
                                </div>

                                <br><br>

                                <div class="col-sm-2 control-group">
                                    <div class="controls">
                                        <center> <h5> Related: </h5> </center>
                                    </div>
                                </div>

                                <div class="col-sm-8 control-group">
                                    <div class="controls">

                                        <div id="tbl-related">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="15%"></th>
                                                        <th width="40%">Title</th>
                                                        <th width="20%">Type</th>
                                                    </tr>
                                                </thead>   
                                                <tbody>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hi</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>

                                    </div>
                                </div>

                                <br><br><br><br><br><br><br><br><br><br>

                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

        <!-- END OF ViewActionTakenModal -->

    </div>
</div>