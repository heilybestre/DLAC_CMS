<div class="container">
  <div class="row">
    <!-- Button to trigger modal -->
    <a class ="btn btn-medium btn-info" style='margin-bottom: 10px' href="#chooseDocTemplateModal" data-toggle="modal">
      <i class="icon-download"></i>&nbsp;Document Template</a>


      <!--START OF chooseDocTemplate modal -->

      <div class="row">

        <div class="modal fade" id="chooseDocTemplateModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Legal Document Templates</h4>
              </div>
              <div class="modal-body" style="height:300px; overflow:scroll;">

                <h5></h5>

                <table class="table table-condensed">
                  <tr>
                    <th>Name</th>
                    <th>Size</th>
                    <th>  </th>
                  </tr>
                  <tr>
                    <td> <h5> Complaint Affidavit</h5></td>
                    <td> 8.9KB</td>
                    <td><a href="<?php echo base_url() . 'cases/ComplaintAffidavit/' . $case->caseID ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Motion to Bail</h5></td>
                    <td> 9.1KB</td>
                    <td><a href="<?php echo base_url() . 'cases/MotionToBail' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Petition for Bail</h5></td>
                    <td>8.9KB</td>
                    <td><a href="<?php echo base_url() . 'cases/PetitionForBail' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Pre-Trial Brief</h5></td>
                    <td>8.6KB</td>
                    <td><a href="<?php echo base_url() . 'cases/PreTrialBrief' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Manifestation</h5></td>
                    <td>8.8KB</td>
                    <td><a href="<?php echo base_url() . 'cases/Manifestation' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Formal Entry of Appearance</h5></td>
                    <td>8.6KB</td>
                    <td><a href="<?php echo base_url() . 'cases/FormalEntryOfAppearance' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Judicial Affidavit</h5></td>
                    <td>9.0KB</td>
                    <td><a href="<?php echo base_url() . 'cases/JudicialAffidavit' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Offer of Evidence</h5></td>
                    <td>8.6KB</td>
                    <td><a href="<?php echo base_url() . 'cases/OfferOfEvidence' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Notice of Appeal</h5></td>
                    <td>8.8KB</td>
                    <td><a href="<?php echo base_url() . 'cases/NoticeOfAppeal' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Trial Memorandum</h5></td>
                    <td>8.7KB</td>
                    <td><a href="<?php echo base_url() . 'cases/TrialMemorandum' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
                  </tr>
                  <tr>
                    <td><h5>Motion to Quash</h5></td>
                    <td>8.8KB</td>
                    <td><a href="<?php echo base_url() . 'cases/MotionToQuash' ?>" class="btn btn-success"><i class="icon-download"></i> </a></td>
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

      <!--END OF chooseDocTemplate modal -->

    </div>

    <!-- START OF DRAFTS TABLE & MODAL -->

    <div class="row">

      <div class="box span4" onTablet="span6" onDesktop="span4">
        <div class="box-header">
          <h2><i class="icon-file"></i>Drafts</h2>
          <div class="box-icon">
            <a href="#addDraftModal" data-toggle="modal"><i class="icon-plus"></i></a>
          </div>
        </div>
        <div class="box-content">
          <table class="table table-condensed datatable">
            <thead>
              <tr>
                <th>Name</th>
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
                  <a href="" class="btn btn-danger"><i class="icon-trash"></i></a>
                  <?php } ?>

                  <?php if ($row->status == 'editing') { ?> 
                  <a href="#uploadEditedModal" data-toggle="modal" class="btn btn-warning" onclick="uploadclick(<?= $row->documentID ?>)"><i class="icon-upload"></i></a>
                  <?php } ?>

                  <?php if ($row->status == 'approved') { ?> 
                  <a href="#addDraftAsDocumentModal" data-toggle="modal" class="btn btn-success" onclick="fileclick(<?= $row->documentID ?>, '<?= $row->file_name ?>', '<?= $row->file_path ?>')"><i class="icon-ok"></i></a>
                  <?php } ?>

                  <?php if ($row->status == 'revision') { ?> 
                  <a href="<?php echo base_url() . 'cases/download/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info"><i class="icon-download"></i></a>
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
          <?php echo form_open_multipart("cases/attachDraft/$case->caseID/$case->stage", array('class' => 'form-horizontal')); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add Draft</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="controls">
                <div id="dropzone">
                  <div class="fallback">
                    <input id="inputFileDraft" name="myfile[]" type="file" multiple=''/>
                  </div>
                </div>
              </div>
            </div>  
            <br/>
            <table id='adddrafttable' class="table table-condensed table-striped">
            </table> 

          </div>
          <div class="modal-footer">
            <input type="submit" name="submit" value="Upload" class="btn btn-success">
          </div>
          <?php echo form_close(); ?>
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
              <th>Name</th>
              <th>Date filed</th>
              <th></th>
            </tr>
          </thead>   
          <tbody>
            <?php foreach ($byclient as $row): ?>
            <tr>
              <td><?php echo $row->file_name ?></td>
              <td><?php echo $row->datefiled ?></td>
              <td>
                <a href="<?php echo base_url() . 'cases/downloadNow/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info"><i class="icon-download"></i></a>  <a href="" class="btn btn-danger"> <i class="icon-trash"></i> </a>
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

  <div class="modal fade" id="addDraftAsDocumentModal">
    <div class="modal-dialog-addDocument">
      <div class="modal-content">
        <?php echo form_open("cases/filedocument", array('class' => 'form-horizontal')); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Document by the Client</h4>
        </div>
        <div class="modal-body">

          <div class="row" style="max-height:400px; overflow:scroll">

            <div style="border-width:5px; font:8px; background-color:#E6E6E6; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
              
              <input class="hidden" id="documentID" name="documentID"/> <!-- H's -->
              <table class="table-condensed" style="font-size:11px;">
                <tr>
                  <td rowspan="4"> <img shape="rect" style="height:150px; width: 120px;"/> </td>
                  <th>Name:</th>
                  <td class="col-sm-3"> <input class="text" id="tb_title_draftasdoc" name="documentname"/> </td>
                  <th rowspan="2">Purpose:</th>
                  <td class="col-sm-3" rowspan="2"> <textarea id="textarea_purpose" name="purpose"></textarea> </td>
                </tr>
                <tr>
                  <th>Date Filed:</th>
                  <td class="col-sm-3">
                    <div class="input-group date">
                      <span class="input-group-addon"><i class="icon-calendar"></i></span>
                      <input type="text" class="date-picker form-control" id="docUpload_dateIssued" name="datefiled" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Date Received:</th>
                  <td class="col-sm-3">
                    <div class="input-group date">
                      <span class="input-group-addon"><i class="icon-calendar"></i></span>
                      <input style="height:20px;" type="text" class="date-picker form-control" id="docUpload_dateReceived" name="datereceived" data-date-format="yyyy-mm-dd" value="<?php echo $datenow; ?>">
                    </div>
                  </td>
                </tr>
              </table>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <input type="hidden" name="caseID" value="<?php echo $case->caseID ?>">
          <input type="submit" name="submit" value="File" class="btn btn-success">

        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

</div> 

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
                <div class="fallback">
                  <input id="inputFileByClient" name="myfile[]" type="file" multiple=''/>
                </div>
              </div>
            </div>
          </div>  

          <div class="row" style="max-height:400px; overflow:scroll">

            <div id="tableFileClientID" style="border-width:5px; font-size:11px; background-color:#E6E6E6; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
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
              <th>Name</th>
              <th>Date Issued</th>
              <th></th>
            </tr>
          </thead>   
          <tbody>
            <?php foreach ($byopposing as $row): ?>
            <tr>
              <td><?php echo $row->file_name ?></td>
              <td><?php echo $row->datereceived ?></td>
              <td>
                <a href="<?php echo base_url() . 'cases/downloadNow/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info"><i class="icon-download"></i></a>  <a href="" class="btn btn-danger"> <i class="icon-trash"></i> </a>
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
              <div class="dropzone">
                <div class="fallback">
                  <input id="inputFileByOpposingParty" name="myfile[]" type="file" multiple=''/>
                </div>
              </div>
            </div>
          </div>
        </div>  

        <div class="row" style="max-height:400px; overflow:scroll">

          <div id="tableFileOpposingParty" style="border-width:5px; font:8px; background-color:#E6E6E6; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
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
            <td><?php echo $row->dateissued ?></td>
            <td>
              <a href="<?php echo base_url() . 'cases/downloadNow/' . $case->caseID . '/' . $row->documentID ?>" class="btn btn-info"><i class="icon-download"></i></a> 
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
      <?php echo form_open_multipart("cases/attachByCourt/$case->caseID/$case->stage", array('class' => 'form-horizontal')); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Document Issued by the Court</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <div class="controls">
            <div id="dropzone">
              <div class="dropzone">
                <div class="fallback">
                  <input id="inputFileByCourt" name="myfileCourt[]" type="file" multiple=''/>
                </div>
              </div>
            </div>
          </div>
        </div>  

        <div class="row" style="max-height:400px; overflow:scroll">

          <div id='tableFileCourt' style="border-width:5px; font:8px; background-color:#E6E6E6; margin-right:5px; margin-left:15px; margin-bottom:5px; padding-left:5px; padding-top:10px; padding-bottom:10px; width:758px;">
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


<!-- <div class="row">                                                                    NOT YET WORKING

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
              <th>Name:</th>
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
              <th>Name:</th>
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
              <th>Name:</th>
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
  <div class="modal fade" id="uploadEditedModal">
    <div class="modal-dialog-documents">
      <div class="modal-content">
        <?php echo form_open_multipart(base_url() . 'cases/uploadreplace', array('class' => 'form-horizontal')); ?> 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Upload Edited</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <div class="controls">
              <div id="dropzone">
                <div class="fallback">
                  <input type="hidden" name="caseid" value="<?php echo $case->caseID ?>">
                  <input type="hidden" id='documentid' name='documentid' value=0 />
                  <input name="revisionfile" type="file"/>
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