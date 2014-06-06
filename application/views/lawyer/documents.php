
<div id="content" class="col-lg-10">
    <?php echo form_open(base_url() . 'lawyer/documents', array('class' => 'form-horizontal')); ?>


    <div class="row">

        <div class="row">
            <div class="modal fade" id="addDraftModal">
                <div class="modal-dialog-documents">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add New Draft</h4>
                        </div>
                        <div class="modal-body">

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Case Title </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-7 control-group">
                                <div class="controls">
                                    <select id="documentForWhatCase" name="documentForWhatCase" class="form-control">
                                        <option></option>
                                        <option>Case 1</option>
                                        <option>Case 2</option>
                                    </select>   
                                </div>
                            </div>

                            <br><br>

                            <div class="col-sm-2 control-group">
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

                            <div class="col-sm-2 control-group">
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

                            <div class="col-sm-2 control-group">
                                <div class="controls">
                                    <center> <h5> Upload </h5> </center>
                                </div>
                            </div>

                            <div class="col-sm-7 control-group">
                                <div class="controls">
                                </div>
                            </div>

                            <br><br>

                        </div>
                        <div class="modal-footer">
                            <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Submit Draft'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2><i class="icon-edit"></i>Pending Drafts</h2>
            </div>
            <div class="box-content">
                <br><br>
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th width="20%"></th>
                            <th width="55%">Title</th>
                            <th width="25%">Status</th>
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

    </div><!--/row--> 

    <br>

    <a class="btn btn-link" href="#viewDraftModal" data-toggle="modal">View Legal Document Draft</a> 
    <!-- START OF MODAL : VIEW DRAFT MODAL-->
    <div class="row">

        <div class="modal fade" id="viewDraftModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Legal Document Draft</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Document Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Document Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Purpose </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <h5> (Purpose) </h5>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Draft by </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <h5> (Intern) </h5>
                            </div>
                        </div>

                        <br><br>

                        <br><br><br>

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">Version</th>
                                    <th width="20%">Date Uploaded</th>
                                    <th width="20%">Lawyer's Comments</th>
                                    <th width="20%">Status</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>  

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Approve</button>
                        <a class="btn btn-danger" href="#rejectDraftModal" data-toggle="modal">Reject</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- START OF MODAL : VIEW STATUS CHANGE REQUEST --> 

    <!-- START OF MODAL : REJECT DRAFT-->
    <div class="row">

        <div class="modal fade" id="rejectDraftModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Draft Rejected</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Case Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Document Title </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                (Document Title)
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Version </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <h5> (Version) </h5>
                            </div>
                        </div>

                        <br><br><br><br>

                        <div class="col-sm-3 control-group">
                            <div class="controls">
                                <center> <h5> Comment </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <textarea id="text" height="150px" style="width:100%"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Confirm</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- START OF MODAL : VIEW STATUS CHANGE REQUEST --> 

</div>