<div class="container">

    <?php echo form_open(base_url() . 'caseFolder/actionTaken', array('class' => 'form-horizontal')); ?>

    <!-- <div class="row pull-right">
    
    <a class ="btn btn-medium btn-success" style='margin-bottom: 10px' href="#addActionTakenModal" data-toggle="modal">
    <i class="icon-plus-sign"></i>&nbsp;Add Action Taken</a>
    
    </div> -->

    <div class="row">
        <h2> Current Stage: <?php echo $case->stageName ?> </h2>
    </div>

    <div class="row">

        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="disabled"><a href="" data-toggle="tab"><b>STAGES:</b></a></li>
                <li class="active"><a href="#tab1" data-toggle="tab">New</a></li>
                <li><a href="#tab2" data-toggle="tab">Preliminary Investigation</a></li>
                <li><a href="#tab3" data-toggle="tab">Pre-Trial</a></li>
                <li><a href="#tab4" data-toggle="tab">Trial Court</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <br>
                    <div class="col-lg-3">
                        <h3 style='color: #67c2ef; margin-bottom: 2px;'>Action Plan</h3>
                        <table class="table table-striped tbl-attendees">
                            <?php
                            $docx1 = 0;
                            foreach ($docurequired1 as $row) :
                                ?>
                                <tr>
                                    <td width="10%" align="center">
                                        <input type='checkbox' class='disablethis' name='case' value='<?php echo $row->requiredDocID ?>'
                                        <?php
                                        foreach ($docu as $row2) {
                                            if ($row2->required == $row->requiredDocID) {
                                                echo 'checked';
                                                $docx1 = $docx1 + 1;
                                            }
                                        }
                                        ?>
                                               />
                                    </td>
                                <script>
                                    var docx1 = <?php echo $docx1 ?>;
                                    var cid = <?php echo $_GET['cid'] ?>;
                                </script>
                                <td width='90%'>
                                    <?php echo $row->name; ?>
                                </td>
                                </tr><?php endforeach; ?>
                        </table>
                    </div>

                    <div class='col-lg-1'></div>

                    <div class="col-lg-8">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="tab2">

                    <br>
                    <div class="col-lg-3">
                        <h3 style='color: #67c2ef; margin-bottom: 2px;'>Action Plan</h3>
                        <table class="table table-striped tbl-attendees">
                            <?php
                            $docx1 = 0;
                            foreach ($docurequired1 as $row) :
                                ?>
                                <tr>
                                    <td width="10%" align="center">
                                        <input type='checkbox' class='disablethis' name='case' value='<?php echo $row->requiredDocID ?>'
                                        <?php
                                        foreach ($docu as $row2) {
                                            if ($row2->required == $row->requiredDocID) {
                                                echo 'checked';
                                                $docx1 = $docx1 + 1;
                                            }
                                        }
                                        ?>
                                               />
                                    </td>
                                <script>
                                    var docx1 = <?php echo $docx1 ?>;
                                    var cid = <?php echo $_GET['cid'] ?>;
                                </script>
                                <td width='90%'>
                                    <?php echo $row->name; ?>
                                </td>
                                </tr><?php endforeach; ?>
                        </table>
                    </div>

                    <div class='col-lg-1'></div>

                    <div class="col-lg-8">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="tab-pane" id="tab3">

                    <br>
                    <div class="col-lg-3">
                        <h3 style='color: #67c2ef; margin-bottom: 2px;'>Action Plan</h3>
                        <table class="table table-striped tbl-attendees">
                            <?php
                            $docx1 = 0;
                            foreach ($docurequired1 as $row) :
                                ?>
                                <tr>
                                    <td width="10%" align="center">
                                        <input type='checkbox' class='disablethis' name='case' value='<?php echo $row->requiredDocID ?>'
                                        <?php
                                        foreach ($docu as $row2) {
                                            if ($row2->required == $row->requiredDocID) {
                                                echo 'checked';
                                                $docx1 = $docx1 + 1;
                                            }
                                        }
                                        ?>
                                               />
                                    </td>
                                <script>
                                    var docx1 = <?php echo $docx1 ?>;
                                    var cid = <?php echo $_GET['cid'] ?>;
                                </script>
                                <td width='90%'>
                                    <?php echo $row->name; ?>
                                </td>
                                </tr><?php endforeach; ?>
                        </table>
                    </div>

                    <div class='col-lg-1'></div>

                    <div class="col-lg-8">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="tab-pane" id="tab4">
                    <br>
                    <div class="col-lg-3">
                        <h3 style='color: #67c2ef; margin-bottom: 2px;'>Action Plan</h3>
                        <table class="table table-striped tbl-attendees">
                            <?php
                            $docx1 = 0;
                            foreach ($docurequired1 as $row) :
                                ?>
                                <tr>
                                    <td width="10%" align="center">
                                        <input type='checkbox' class='disablethis' name='case' value='<?php echo $row->requiredDocID ?>'
                                        <?php
                                        foreach ($docu as $row2) {
                                            if ($row2->required == $row->requiredDocID) {
                                                echo 'checked';
                                                $docx1 = $docx1 + 1;
                                            }
                                        }
                                        ?>
                                               />
                                    </td>
                                <script>
                                    var docx1 = <?php echo $docx1 ?>;
                                    var cid = <?php echo $_GET['cid'] ?>;
                                </script>
                                <td width='90%'>
                                    <?php echo $row->name; ?>
                                </td>
                                </tr><?php endforeach; ?>
                        </table>
                    </div>

                    <div class='col-lg-1'></div>

                    <div class="col-lg-8">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="30%">Date</th>
                                    <th width="60%">Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">

                <a class ="btn btn-medium btn-link pull-right" style='margin-bottom: 10px' href="#viewActionTakenModal" data-toggle="modal">
                    &nbsp;View Action Taken</a>

            </div>

            <!-- START OF ViewActionTakenModal -->
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

            <!-- START OF AddActionTakenModal -->

            <div class="row">
                <div class="modal fade" id="addActionTakenModal">
                    <div class="modal-dialog-actionTaken">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Add Action Taken</h4>
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
                                            <select class="form-control">
                                                <option></option>
                                                <option>New</option>
                                                <option>Preliminary Investigation</option>
                                                <option>Pre-Trial</option>
                                                <option>Trial Court</option>
                                            </select>
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
                                            <?php echo form_input(array('id' => 'actionTaken', 'name' => 'actionTaken', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <center> <h5> Date </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Month</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Day</option>
                                            </select>        
                                        </div>
                                    </div>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls">
                                            <select class="form-control">
                                                <option></option>
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br><br>

                                    <div class="col-sm-2 control-group">
                                        <div class="controls"></div>
                                    </div>

                                    <div class="col-sm-8 control-group">
                                        <div class="controls">

                                            <div class="row pull-right">
                                                <a class ="btn btn-medium btn-success" style='margin-bottom: 10px' href="#addRelDocumentModal" data-toggle="modal">
                                                    <i class="icon-plus-sign"></i>&nbsp;Add Related Document</a> &nbsp;
                                                <a class ="btn btn-medium btn-success" style='margin-bottom: 10px' href="#addRelEvidenceModal" data-toggle="modal">
                                                    <i class="icon-plus-sign"></i>&nbsp;Add Related Evidence</a>
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br>

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
                                <button type="button" class="btn btn-success" data-dismiss="modal">Add Action</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>

            <!-- END OF AddActionTakenModal -->


        </div>
    </div></div>
