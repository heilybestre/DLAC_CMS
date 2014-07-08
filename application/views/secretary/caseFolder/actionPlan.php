
<div class="container">
    <?php echo form_open(base_url() . 'director/actionPlan', array('class' => 'form-horizontal')); ?>

  <br>
  <div class="col-lg-9"></div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a class ="btn-small btn-warning" style='padding:5px;' href="#viewNarrativeInActionPlanModal" data-toggle="modal">
    <i class="icon-book"></i> View Narrative
  </a> &nbsp;
  <a class ="btn-small btn-warning" style='padding:5px;' href="#viewAllNotesModal" data-toggle="modal">
      <i class="icon-comments"></i>  View All Notes
  </a>
  
    <!-- before anything else; hide tasks-->
    <div class="row hide">
        <h5>No Action Plan created yet.</h5>
    </div>

    <!-- upon submission of intern -->
    <div class="row">
        <div class="col-lg-2">
            <h5>Action Plan Status:<label class="label label-warning">Pending</label></h5>
            <h5>Date Submitted:<label class="label label-info">(date)</label></h5>
        </div>
    </div>

    <!-- upon approval -->
    <div class="row hide">
        <div class="col-lg-2">
            <h5>Action Plan Status:<label class="label label-success">Approved</label></h5>
            <br>
        </div>
    </div>

    <!-- upon rejection -->
    <div class="row hide">
        <div class="col-lg-7">
            <h5>Action Plan Status:<label class="label label-danger">Rejected</label> -
                <a class ="btn btn-warning" href="#reasonActionPlanModal" data-toggle="modal" style="font-size:13px; height:20px; padding-top:0px; margin-top:0px;">Reasons</a></h5>
            <h5>Date Evaluated:<label class="label label-info">(date)</label></h5>
            <br>
        </div>
    </div>


    <div class="row">
        <div class="well todo col-lg-2" style="padding:10px;">
            <h3> New </h3> 
            <ul class="todo-list">
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Set client meeting</span> 					
                </li>
                <li> 
                    <span class="todo-actions">
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">&nbsp;&nbsp;&nbsp;Inform client</span>
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Meet client</span>
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Gather case information</span>
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Prepare Affidavit</span>
                </li>
                <li> 
                    <span class="todo-actions">
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">&nbsp;&nbsp;Assign Complaint Affidavit Draft</span>
                </li>
                <li> 
                    <span class="todo-actions">
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">&nbsp;&nbsp;Approve Complaint Affidavit Draft</span>
                </li>
            </ul>
        </div>	


        <div class="well todo col-lg-3" style="padding:10px;">
            <h3> Preliminary Investigation </h3>
            <ul class="todo-list">
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Gather Evidence</span> 					
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Gather Witnesses</span> 					
                </li>
                <li> 
                    <span class="todo-actions">
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">&nbsp;&nbsp;&nbsp;Create Affidavits</span>
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Information</span> 					
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Resolution</span> 					
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Certificate of Preliminary Investigation</span> 					
                </li>
            </ul>
        </div>	

        <div class="well todo col-lg-3" style="padding:10px;">
            <h3> Pre-trial </h3>
            <ul class="todo-list">
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Warrant of Arrest</span> 					
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Order of Arraignment</span>
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Schedule of Pre-trail</span>
                </li>
            </ul>
        </div>

        <div class="well todo col-lg-3" style="padding:10px;">
            <h3> Trial Court </h3>
            <ul class="todo-list">
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Windows Phone 8 App</span> 
                    <span class="label label-important">today</span>					
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">New frontend layout</span>
                    <span class="label label-important">today</span>
                </li>
                <li>
                    <span class="todo-actions">
                        <a href="widgets.html#"><i class="icon-check-empty"></i></a>
                    </span>
                    <span class="desc">Hire developers</span>
                    <span class="label label-warning">tommorow</span>
                </li>
            </ul>
        </div>

        <div class="col-lg-1"></div>

        
    </div>

    <!-- START OF MODAL : EDITACTIONPLANMODAL -->
    <div class="row col-lg-10 col-sm-11">
        <div class="modal fade" id="editActionPlanModal">
            <div class="modal-dialog-editCaseSummary">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel"> Edit Action Plan </h3>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> Stage: <label class="label label-warning">New</label> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                            </div>
                        </div>

                        <br><br>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> New Task </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-7 control-group">
                            <div class="controls">
                                <?php echo form_input(array('id' => 'newTaskActionPlan', 'name' => 'newTaskActionPlan', 'type' => 'text', 'class' => 'form-control', 'style' => 'margin-top:8px;')); ?>
                            </div>
                        </div>

                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <button class="btn btn-primary btn-small">Add</button>
                            </div>
                        </div>

                        <br><br> 
                        <hr/><br>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Task</th>
                                    <th></th>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="center"></td>
                                    <td class="center">
                                        <a class="btn btn-info" href="#editAppointmentModal" data-toggle="modal">
                                            <i class="icon-edit" title="Edit"></i>  
                                        </a>
                                        <a class="btn btn-danger" href="#deleteAppointment" data-toggle="modal">
                                            <i class="icon-trash" title="Delete"></i> 
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>  
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MODAL : EDITACTIONPLANMODAL -->

    <!-- START OF MODAL : REASONACTIONPLANMODAL -->
    <div class="row">

        <div class="modal fade" id="reasonActionPlanModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 id="myModalLabel"> Reason/s for Rejection  </h3>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>01</td>
                                <td>Hello</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
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
    <!-- END OF MODAL : REASONACTIONPLANMODAL --> 


</div>