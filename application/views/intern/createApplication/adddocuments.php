<div id='documents_form' class="container">

    <div class="row">
        <div class="col-sm-2 control-group">
            <div class="controls">
                <center> <h5> <b> Application Form No. </b></h5> </center>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls" style='margin-top:2px;'>
                <h5><?= $appnumber ?></h5>
            </div>
        </div>

        <div class="col-sm-5 control-group"></div>

        <div class="col-sm-3 control-group">
            <div class="controls">
                <center> <h5> <b>
                    <div class="clientnamediv">
                        <?php
                        $newclientid = $this->session->userdata('newclientid');
                        if(isset($newclientid))
                            echo $this->People_model->getuserfield('lastname', $newclientid) . ', ' . $this->People_model->getuserfield('firstname', $newclientid) . ' ' . substr($this->People_model->getuserfield('middlename', $newclientid), 0, 1) . '.';
                        else{
                            $first = 0;
                            foreach ($clientlist as $row) {
                                if ($first == 0)
                                    echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
                                $first++;
                            }
                        }
                        ?>
                    </div>
                </b></h5> </center>
            </div>
        </div>

        <div class="col-sm-1 control-group">
            <div class="controls">

            </div>
        </div>
    </div><br>


    <div class="row" style='padding-left:40px; padding-right:45px;'>
        <!-- Button to trigger modal -->
        <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="#addDocumentModal" data-toggle="modal">
            <i class="icon-plus-sign"></i>&nbsp;Add Legal Document
        </a>

        <br><br><br>

        <div class="modal fade" id="addDocumentModal">
            <div class="modal-dialog-assign">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Legal Document</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">   

                            <div class="form-inline"> 
                                <div class="controls">
                                    <b>Choose Type:</b>
                                    <label class="radio" for="type-0"> 
                                        <input type="radio" name="type" id="type-0" value="Documentary" onclick="location.href = 'javascript:toggleAppDocClient();';"> Legal Documents by the Client
                                    </label> &nbsp;
                                    <label class="radio"> 
                                        <input type="radio" name="type" id="type-1" value="Object" onclick="location.href = 'javascript:toggleAppDocOpposing();';"> Legal Documents by the Opposing Party 
                                    </label> &nbsp;
                                    <label class="radio"> 
                                        <input type="radio" name="type" id="type-2" value="Testimonial" onclick="location.href = 'javascript:toggleAppDocCourt();';"> Legal Documents from the Court 
                                    </label>
                                </div>
                            </div>

                            <br>

                            <!-- START OF DOC BY CLIENT -->
                            <div id="toggleAppDocClient" style="display: none">
                                <div class="col-sm-1"></div><div class="col-sm-5"><input name="file[]" type="file" multiple=""/></div>
                                <input type="button" value="Add doc by the client" class='btn btn-success'/>

                            </div>
                            <br>
                            <div id="toggleAppDocClientFields" style="display: none">
                                <div class="col-sm-4">
                                    <div class="col-sm-1"></div><span class="label label-warning">Document by the Client</span><br><br>
                                </div>

                                <div class="col-sm-6">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Title</b> </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5><b> Date Issued</b> </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control date-picker" id="clidateissued" name="clidateissued" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Date Received</b> </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control date-picker" id="clidatereceived" name="clidatereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Filed by</b> </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocFiledBy', 'name' => 'caseDocFiledBy', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Upload </b></h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END OF DOC BY CLIENT -->


                            <!-- START OF DOC BY OPPOSING -->
                            <div id="toggleAppDocOpposing" style="display: none">
                                <div class="col-sm-1"></div><div class="col-sm-5"><input name="file" type="file" multiple=""/></div>
                            </div>
                            <div id="toggleAppDocOpposingFields" style="display: none">
                                <div class="col-sm-4">
                                    <div class="col-sm-1"></div><span class="label label-info">Document by the Opposing Party</span><br><br>
                                </div>

                                <div class="col-sm-7">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Title</b> </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Date Issued</b> </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control date-picker" id="oppdateissued" name="oppdateissued" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5><b> Date Received </b></h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control date-picker" id="oppdatereceived" name="oppdatereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5><b> Filed by </b></h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocFiledBy', 'name' => 'caseDocFiledBy', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> <b>Upload </b></h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5>  </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
                                        </div>
                                    </div>

                                </div>
                                <!-- END OF DOC BY OPPOSING -->

                                <!-- START OF DOC FROM THE COURT -->
                                <div id="toggleAppDocCourt" style="display: none">
                                    <div class="col-sm-1"></div><div class="col-sm-5"><input name="file" type="file" multiple=""/></div>
                                </div>

                                <div id="toggleAppDocCourtFields" style="display:none">
                                    <div class="col-sm-1"></div><span class="label label-danger">Document from the Court</span><br><br>

                                    <div class="col-sm-7">

                                        <div class="col-sm-4 control-group">
                                            <div class="controls">
                                                <center> <h5> <b>Title </b></h5> </center>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 control-group">
                                            <div class="controls">
                                                <?php echo form_input(array('id' => 'caseDocTitle', 'name' => 'caseDocTitle', 'type' => 'text', 'class' => 'form-control')); ?>
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="col-sm-4 control-group">
                                            <div class="controls">
                                                <center> <h5> <b>Date Issued</b> </h5> </center>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 control-group">
                                            <div class="controls">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                    <input type="text" class="form-control date-picker" id="coudateissued" name="coudateissued" data-date-format="yyyy-mm-dd" value="yyyy-mm-dd">
                                                </div>
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="col-sm-4 control-group">
                                            <div class="controls">
                                                <center> <h5> <b>Date Received</b> </h5> </center>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 control-group">
                                            <div class="controls">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                    <input type="text" class="form-control date-picker" id="coudatereceived" name="coudatereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="col-sm-4 control-group">
                                            <div class="controls">
                                                <center> <h5><b> Order</b> </h5> </center>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 control-group">
                                            <div class="controls">
                                                <?php echo form_input(array('id' => 'caseDocOrder', 'name' => 'caseDocOrder', 'type' => 'text', 'class' => 'form-control')); ?>
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="col-sm-4 control-group">
                                            <div class="controls">
                                                <center> <h5><b> Action Needed </b></h5> </center>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 control-group">
                                            <div class="controls">
                                                <?php echo form_input(array('id' => 'caseDocNeededAction', 'name' => 'caseDocNeededAction', 'type' => 'text', 'class' => 'form-control')); ?>
                                            </div>
                                        </div>

                                        <br><br>


                                        <div class="col-sm-4 control-group">
                                            <div class="controls">
                                                <center> <h5><b> Upload </b></h5> </center>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 control-group">
                                            <div class="controls">
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="col-sm-4 control-group">
                                            <div class="controls">
                                                <center> <h5>  </h5> </center>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 control-group">
                                            <div class="controls">
                                                <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Legal Document'); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- END OF DOC FROM THE COURT -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Add Document'); ?>
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="box span4" onTablet="span6" onDesktop="span4">
                    <div class="box-header">
                        <h2><i class="icon-file"></i>Documents by the Client</h2>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="20%"></th>
                                    <th width="80%">Title</th>
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
            </div><!--/col-->
        </div>

        <br>

        <div class="row">

            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h2><i class="icon-file"></i>Documents by the Opposing Party</h2>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="20%"></th>
                                    <th width="80%">Title</th>
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
            </div><!--/col-->

            <div class="col-lg-6">
                <div class="box span4" onTablet="span6" onDesktop="span4">
                    <div class="box-header">
                        <h2><i class="icon-file"></i>Documents Issued by the Court</h2>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th width="20%"></th>
                                    <th width="80%">Title</th>
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
            </div><!--/col-->
        </div>

        <div class="row">
            <!-- Button -->
            <div class="control-group pull-right">
                <label class="control-label" for="submit"></label>
                <div class="controls">
                    <input id='btndocumentsnext' type="button" value="Next" class='btn btn-success col-sm-12'/>
                </div>
            </div>
        </div>
    </div>

</div>