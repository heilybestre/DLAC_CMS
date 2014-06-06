<div class="container" style="margin-top:10px;">

    <?php echo form_open(base_url() . 'caseFolder/documents', array('class' => 'form-horizontal')); ?>

    <div class="row">

        <div class="modal fade" id="addDocumentModal">
            <div class="modal-dialog-documents">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Document</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-sm-1 control-group">
                                <div class="controls">
                                    <center> <h5> Choose Type: </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-14 control-group">
                                <div class="controls">
                                    <input type="button" class="btn btn-success btn-small" value="Documents by the Client" onclick="location.href = 'javascript:toggleDocClient();';">
                                    <input type="button" class="btn btn-success btn-small" value="Documents by the Opposing Party" onclick="location.href = 'javascript:toggleDocOpposing();';">
                                    <input type="button" class="btn btn-success btn-small" value="Documens Issued by the Court" onclick="location.href = 'javascript:toggleDocCourt();';"> 
                                </div>
                            </div>

                            <br><br>

                            <?php echo form_open(base_url() . 'caseFolder/docClient', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC BY CLIENT -->

                            <div id="toggleDocClient" style="display: none">
                                <div class="col-sm-7">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Title </h5> </center>
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
                                            <center> <h5> Date Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
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

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
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

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Filed by </h5> </center>
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
                                            <center> <h5> Reason </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Remarks </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="caseDocRemarks" name="caseDocRemarks" class="form-control">
                                                <option></option>
                                                <option>Granted by the Court</option>
                                                <option>Denied by the Court</option>
                                                <option>Pending</option>
                                            </select>     
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Upload </h5> </center>
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
                            </div><?php echo form_close(); ?> <!-- END OF DOC BY CLIENT -->

                            <?php echo form_open(base_url() . 'caseFolder/docOpposing', array('class' => 'form-horizontal')); ?> <!-- START OF DOC BY OPPOSING -->
                            <div id="toggleDocOpposing" style="display: none">

                                <div class="col-sm-7">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Title </h5> </center>
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
                                            <center> <h5> Date Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
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

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
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

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Filed by </h5> </center>
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
                                            <center> <h5> Reason </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Remarks </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <select id="caseDocRemarks" name="caseDocRemarks" class="form-control">
                                                <option></option>
                                                <option>Granted by the Court</option>
                                                <option>Denied by the Court</option>
                                                <option>Pending</option>
                                            </select>     
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Upload </h5> </center>
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
                            </div><?php echo form_close(); ?> <!-- END OF DOC BY OPPOSING -->

                            <?php echo form_open(base_url() . 'caseFolder/docCourt', array('class' => 'form-horizontal')); ?>  <!-- START OF DOC FROM THE COURT -->
                            <div id="toggleDocCourt" style="display: none">
                                <div class="col-sm-7">

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Title </h5> </center>
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
                                            <center> <h5> Date Issued </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
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

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Date Received </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 control-group">
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

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Order </h5> </center>
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
                                            <center> <h5> Reason </h5> </center>
                                        </div>
                                    </div>

                                    <div class="col-sm-7 control-group">
                                        <div class="controls">
                                            <?php echo form_input(array('id' => 'caseDocReason', 'name' => 'caseDocReason', 'type' => 'text', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-sm-4 control-group">
                                        <div class="controls">
                                            <center> <h5> Action Needed </h5> </center>
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
                                            <center> <h5> Upload </h5> </center>
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
                            </div>
                            <?php echo form_close(); ?><!-- END OF DOC FROM THE COURT -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!-- START OF DRAFTS TABLE & MODAL -->

    <div class="row">

        <div class="box span4" onTablet="span6" onDesktop="span4">
            <div class="box-header">
                <h2><i class="icon-file"></i>Drafts</h2>
            </div>
            <div class="box-content">
                <table class="table table-condensed datatable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($drafts as $row): ?>
                            <tr>
                                <td><?php echo $row->file_name ?></td>
                                <td>
                                    <?php if ($row->status == 'pending') { ?> 
                                        <label class="label label-warning">pending</label>
                                    <?php } ?>

                                    <?php if ($row->status == 'editing') { ?> 
                                        <label class="label label-primary">editing</label>
                                    <?php } ?>

                                    <?php if ($row->status == 'checking') { ?> 
                                        <label class="label label-info">checking</label>
                                    <?php } ?>

                                    <?php if ($row->status == 'approved') { ?> 
                                        <label class="label label-success">approved</label>
                                    <?php } ?>

                                    <?php if ($row->status == 'revision') { ?> 
                                        <label class="label label-primary">revision</label>
                                    <?php } ?>
                                </td>
                                <td><?php echo $row->dateprepared ?></td>
                                <td>
                                    <?php if ($row->status == 'pending') { ?>
                                        <a href="<?php echo base_url() . 'cases/download/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info" title="Download" data-rel="tooltip"><i class="icon-download"></i></a>
                                    <?php } ?>

                                    <?php if ($row->status == 'checking') { ?> 
                                        <a href="<?php echo base_url() . 'cases/approvedocument/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-success" title="Approve" data-rel="tooltip"><i class="icon-ok"></i></a>  <a href="#uploadRevision" data-toggle="modal" title="Upload" data-rel="tooltip" class="btn btn-warning" onclick="uploadclick(<?= $row->documentID ?>)"><i class="icon-upload"></i></a>
                                    <?php } ?>

                                    <?php if ($row->status == 'approved') { ?> 
                                        <a href="<?php echo base_url() . 'cases/download/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info" title="Download" data-rel="tooltip"><i class="icon-download"></i></a>  <a href="<?php echo base_url() . 'cases/deletedocument/' . $row->documentID ?>" class="btn btn-danger" title="Delete" data-rel="tooltip"><i class="icon-trash"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>  
            </div>
        </div>

    </div><!--/row--> 

    <div class="row">

        <div class="modal fade" id="addDraftModal">
            <div class="modal-dialog-documents">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Draft</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="controls">
                                <div id="dropzone">
                                    <form class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  

                        <br><br><br><br>

                        <table class="table table-condensed table-striped">
                            <tr>
                                <td> DocuName </td>
                                <td> <input type="text"> </td>
                                <td>size</td>
                                <td> <button class="btn btn-primary"> <i class="icon-download"></i> </button>
                                    <button class="btn btn-warning"> <i class="icon-ban-circle"></i> </button>
                                </td>
                            </tr>
                        </table> 

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    </div> 

    <!-- END OF DRAFTS TABLE & MODAL -->

    <!-- START OF DocByTheClient TABLE & MODAL -->

    <div class="row">

        <div class="box span4" onTablet="span6" onDesktop="span4">
            <div class="box-header">
                <h2><i class="icon-file"></i>Documents by the Client</h2>
                <div class="box-icon">
                    <a href="#addClientDocumentModal" data-toggle="modal"><i class="icon-plus"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-condensed datatable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($byclient as $row): ?>
                            <tr>
                                <td><?php echo $row->file_name ?></td>
                                <td><?php echo $row->datefiled ?></td>
                                <td>
                                    <a href="#addClientDocumentsModal" class="btn btn-info"><i class="icon-download"></i></a>  <a href="" class="btn btn-danger"> <i class="icon-trash"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>  
            </div>
        </div>

    </div><!--/row-->

    <br>

    <div class="row">

        <div class="modal fade" id="addClientDocumentModal">
            <div class="modal-dialog-addDocument">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Document by the Client</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="controls">
                                <div id="dropzone">
                                    <form class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  

                        <div class="row" style="max-height:400px; overflow:scroll">

                            <div style="border-width:5px; font:8px; background-color:#E6E6E6; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
                                <table class="table-condensed" style="font-size:11px;">
                                    <tr>
                                        <td colspan="2">File Name:</td>
                                        <td></td>
                                        <td></td>
                                        <td> <button type="button" class="close" aria-hidden="true">×</button> </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4"> <img shape="rect" style="height:150px; width: 120px;"/> </td>
                                        <th>Title:</th>
                                        <td class="col-sm-3"> <input class="text" id="tb_title"/> </td>
                                        <th rowspan="2">Purpose:</th>
                                        <td class="col-sm-3" rowspan="2"> <textarea id="textarea_purpose"></textarea> </td>
                                    </tr>
                                    <tr>
                                        <th>Date Issued:</th>
                                        <td class="col-sm-3">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="date-picker" id="docUpload_dateIssued" name="newappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date Received:</th>
                                        <td class="col-sm-3">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="date-picker" id="docUpload_dateReceived" name="newappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </td>
                                        <th> Remarks:</th>
                                        <td>            
                                            <select class="form-control">
                                                <option></option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Upload</button>
                    </div>
                </div>
            </div>
        </div>

    </div> 

    <!-- END OF DocByTheClient TABLE & MODAL -->

    <div class="row">
        <!-- START OF DocByTheOpposing TABLE & MODAL -->

        <div class="col-lg-6">

            <div class="box span4" onTablet="span6" onDesktop="span4">
                <div class="box-header">
                    <h2><i class="icon-file"></i>Documents by the Opposing</h2>
                    <div class="box-icon">
                        <a href="#addOpposingDocumentModal" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-condensed datatable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($byopposing as $row): ?>
                                <tr>
                                    <td><?php echo $row->file_name ?></td>
                                    <td><?php echo $row->datereceived ?></td>
                                    <td>
                                        <a href="#addOpposingDocumentModal" class="btn btn-info"><i class="icon-download"></i></a>  <a href="" class="btn btn-danger"> <i class="icon-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>  
                </div>
            </div>

        </div><!--/row-->

        <div class="modal fade" id="addOpposingDocumentModal">
            <div class="modal-dialog-addDocument">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Document by the Opposing Party</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="controls">
                                <div id="dropzone">
                                    <form class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  

                        <div class="row" style="max-height:400px; overflow:scroll">

                            <div style="border-width:5px; font:8px; background-color:#E6E6E6; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
                                <table class="table-condensed" style="font-size:11px;">
                                    <tr>
                                        <td colspan="2">File Name:</td>
                                        <td></td>
                                        <td></td>
                                        <td> <button type="button" class="close" aria-hidden="true">×</button> </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4"> <img shape="rect" style="height:150px; width: 120px;"/> </td>
                                        <th>Title:</th>
                                        <td class="col-sm-3"> <input class="text" id="tb_title"/> </td>
                                        <th rowspan="2">Purpose:</th>
                                        <td class="col-sm-3" rowspan="2"> <textarea id="textarea_purpose"></textarea> </td>
                                    </tr>
                                    <tr>
                                        <th>Date Issued:</th>
                                        <td class="col-sm-3">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="date-picker" id="docUpload_dateIssued" name="newappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date Received:</th>
                                        <td class="col-sm-3">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="date-picker" id="docUpload_dateReceived" name="newappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </td>
                                        <th> Remarks:</th>
                                        <td>            
                                            <select class="form-control">
                                                <option></option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Upload</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- END OF DocByTheOpposing TABLE & MODAL -->

        <!-- START OF DocByTheCourt TABLE & MODAL -->

        <div class="col-lg-6">

            <div class="box span4" onTablet="span6" onDesktop="span4">
                <div class="box-header">
                    <h2><i class="icon-file"></i>Documents Issued by the Court</h2>
                    <div class="box-icon">
                        <a href="#addCourtDocModal" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-condensed datatable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($bycourt as $row) : ?>
                                <tr>
                                    <td><?php echo $row->file_name ?></td>
                                    <td><?php echo $row->dateissued ?></td>
                                    <td>
                                        <a href="" class="btn btn-info"><i class="icon-download"></i></a> 
                                        <a href="" class="btn btn-danger"> <i class="icon-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>  
                </div>
            </div>

        </div><!--/row-->

        <br>

        <div class="modal fade" id="addCourtDocModal">
            <div class="modal-dialog-addDocument">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Document Issued by the Court</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="controls">
                                <div id="dropzone">
                                    <form class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  

                        <div class="row" style="max-height:400px; overflow:scroll">

                            <div style="border-width:5px; font:8px; background-color:#E6E6E6; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
                                <table class="table-condensed" style="font-size:11px;">
                                    <tr>
                                        <td colspan="2">File Name:</td>
                                        <td></td>
                                        <td></td>
                                        <td> <button type="button" class="close" aria-hidden="true">×</button> </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4"> <img shape="rect" style="height:150px; width: 120px;"/> </td>
                                        <th>Title:</th>
                                        <td class="col-sm-3"> <input class="text" id="tb_title"/> </td>
                                        <th rowspan="2">Order:</th>
                                        <td class="col-sm-3" rowspan="2"> <textarea id="textarea_purpose"></textarea> </td>
                                    </tr>
                                    <tr>
                                        <th>Date Issued:</th>
                                        <td class="col-sm-3">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="date-picker" id="docUpload_dateIssued" name="newappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date Received:</th>
                                        <td class="col-sm-3">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="date-picker" id="docUpload_dateReceived" name="newappt_date" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                                            </div>
                                        </td>
                                        <th> Needed Action:</th>
                                        <td>            
                                            <input class="text" id="tb_title"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Upload</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END OF DocByTheCourt TABLE & MODAL -->
    </div>


    <?php echo form_close(); ?>

    <!-- <div class="row">                                                          NOT YET WORKING

        <a class ="btn btn-medium btn-link" style='margin-bottom: 10px' href="#viewDocClient" data-toggle="modal">View Doc Client</a>
        <a class ="btn btn-medium btn-link" style='margin-bottom: 10px' href="#viewDocOpposing" data-toggle="modal">View Doc Opposing</a>
        <a class ="btn btn-medium btn-link" style='margin-bottom: 10px' href="#viewDocCourt" data-toggle="modal">View Doc Court</a>

    </div> -->

    <!--START OF VIEW DOC CLIENT modal -->

    <div class="row">

        <div class="modal fade" id="viewDocClient">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Documents by the Client</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Title:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Issued:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Received:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Filed by:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Reason:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Remarks:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><a>View Document</a></td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!--END OF VIEW DOC CLIENT modal -->

    <!--START OF VIEW DOC OPPOSING modal -->

    <div class="row">

        <div class="modal fade" id="viewDocOpposing">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Documents by the Opposing Party</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Title:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Issued:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Received:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Filed by:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Reason:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Remarks:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><a>View Document</a></td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!--END OF VIEW DOC OPPOSING modal -->

    <!--START OF VIEW DOC COURT modal -->

    <div class="row">

        <div class="modal fade" id="viewDocCourt">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Document Issued by the Court</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Title:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Issued:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Date Received:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Order:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Reason:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th>Action Needed:</th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><a>View Document</a></td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    <!--END OF VIEW DOC CLIENT modal -->


    <div class="row">
        <div class="modal fade" id="uploadRevision">
            <div class="modal-dialog-documents">
                <div class="modal-content">
                    <?php echo form_open_multipart(base_url() . 'cases/uploadreplace', array('class' => 'form-horizontal')); ?> 
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Upload Revision</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="controls">
                                <div id="dropzone">
                                    <div class="dropzone" style='margin:0px 20px 0px 20px'>
                                        <div class="fallback">
                                            <input type="hidden" name="caseid" value="<?php echo $case->caseID ?>">
                                        <input id='documentid' type="hidden" name='documentid' value=0 />
                                        <input name="revisionfile" type="file"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Upload">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div> 


</div>