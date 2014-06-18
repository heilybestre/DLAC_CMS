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
                            <th>Name</th>
                            <th>Date filed</th>
                            <th></th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($byclient as $row): ?>
                        <tr>
                            <td><?php echo $row->file_name ?></td>
                            <td><?php echo date('Y-m-d', strtotime($row->datefiled)) ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'cases/downloadNow/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info" title="Download" data-rel="tooltip"><i class="icon-download"></i></a>  <a href="" class="btn btn-danger" title="Delete" data-rel="tooltip"> <i class="icon-trash"></i> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>  

        </div>
    </div>

</div><!--/row-->

<div class="row">

    <div class="modal fade" id="addClientDocumentModal">
        <div class="modal-dialog-addDocument">
            <div class="modal-content">
                <?php echo form_open_multipart("cases/attachByClient/$case->caseID/$case->stage", array('class' => 'form-horizontal')); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Document by the Client</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="controls">
                            <div id="dropzone">
                                <div class="dropzone" style='margin:0px 20px 0px 20px'>
                                    <div class="fallback">
                                        <input id="inputFileByClient" name="myfileCourt[]" type="file" multiple=''/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row" style="max-height:400px; overflow:scroll">
                        <div id="tableFileClientID" style="border-width:5px; font-size:13px; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:50px; padding-top:10px; padding-bottom:10px; width:758px;">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="submit" name="submit" value="Upload" class="btn btn-success">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

</div> 

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
                            <th>Name</th>
                            <th>Date Issued</th>
                            <th></th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($byopposing as $row): ?>
                        <tr>
                            <td><?php echo $row->file_name ?></td>
                            <td><?php echo date('Y-m-d', strtotime($row->datereceived)) ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'cases/downloadNow/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info" title="Download" data-rel="tooltip"><i class="icon-download"></i></a>  <a href="" class="btn btn-danger" title="Delete" data-rel="tooltip"> <i class="icon-trash"></i> </a>
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
            <?php echo form_open_multipart("cases/attachByOpposing/$case->caseID/$case->stage", array('class' => 'form-horizontal')); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Document by the Opposing Party</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="controls">
                        <div id="dropzone">
                            <div class="dropzone" style='margin:0px 20px 0px 20px'>
                                <div class="fallback">
                                    <input id="inputFileByOpposingParty" name="myfile[]" type="file" multiple=''/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="row" style="max-height:400px; overflow:scroll">

                    <div id="tableFileOpposingParty" style="border-width:5px; font:8px; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <input type="submit" name="submit" value="Upload" class="btn btn-success">
            </div>
            <?php echo form_close(); ?> 
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
                        <th>Name</th>
                        <th>Date Issued</th>
                        <th></th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($bycourt as $row) : ?>
                    <tr>
                        <td><?php echo $row->file_name ?></td>
                        <td><?php echo date('Y-m-d', strtotime($row->dateissued)) ?></td>
                        <td>
                            <a href="<?php echo base_url() . 'cases/downloadNow/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info" title="Download" data-rel="tooltip"><i class="icon-download"></i></a> 
                            <a href="" class="btn btn-danger" title="Delete" data-rel="tooltip"> <i class="icon-trash"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>
</div>
</div><!--/row-->

<br>


<div class="modal fade" id="addCourtDocModal">
    <div class="modal-dialog-addDocument">
        <div class="modal-content">
            <?php echo form_open_multipart("cases/attachByCourt/$case->caseID/$case->stage", array('class' => 'form-horizontal')); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Document Issued by the Court</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="controls">
                        <div id="dropzone">
                            <div class="dropzone" style='margin:0px 20px 0px 20px'>
                                <div class="fallback">
                                    <input id="inputFileByCourt" name="myfileCourt[]" type="file" multiple=''/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="row" style="max-height:400px; overflow:scroll">

                    <div id='tableFileCourt' style="border-width:5px; font:8px; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <input type="submit" name="submit" value="Upload" class="btn btn-success">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- END OF DocByTheCourt TABLE & MODAL -->

</div>