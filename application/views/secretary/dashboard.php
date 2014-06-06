<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->

    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-calendar"></i>Appointments to Re-assign</h2>
                    <div class="box-icon">
                        <a href="<?= base_url() ?>sec/calendar" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content sec-div">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width='10%'>Date</th>
                                <th width='30%'>Time</th>
                                <th width='50%'>Appointment</th>
                                <th width='10%'></th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach($reassignappointments as $row) : ?>
                            <tr>
                                <td><?= date('m/d/y', strtotime($row->date)) ?></td>
                                <td class="center"><?= date('g:ia', strtotime($row->start)) ?>-<?= date('g:ia', strtotime($row->end)) ?></td>
                                <td class="center">
                                    <tabletitle><?= $row->title ?> (<?= $this->Case_model->select_case($row->caseID)->caseNum ?>)</tabletitle><br>
                                    <tabledesc>
                                        <?php
                                            $attendees = $this->Calendar_model->select_attendees($row->scheduleID);
                                            $count = 0;
                                            foreach($attendees as $attendee){
                                                if($count!=0)
                                                    echo ', ' . $this->People_model->getuserfield('firstname', $attendee->userID) . ' ' . $this->People_model->getuserfield('lastname', $attendee->userID);
                                                else
                                                    echo $this->People_model->getuserfield('firstname', $attendee->userID) . ' ' . $this->People_model->getuserfield('lastname', $attendee->userID);
                                                $count++;
                                            }
                                        ?>
                                    </tabledesc>
                                </td>
                                <td class="center">
                                    <a class="btn btn-link" href="#reassignAppointmentModal" data-toggle="modal" onclick="reassignclick(<?= $row->attendeeID ?>)"> Reassign </a>
                                </td>
                            </tr><?php endforeach; ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div><!--/col-->

        <div class="col-lg-6">
            <div class="box span4" onTablet="span6" onDesktop="span4">
                <div class="box-header">
                    <h2><i class="icon-check"></i>Tasks Assigned</h2>
                    <div class="box-icon">
                        <a href="<?= base_url() ?>secretary/calendar" data-toggle="modal"><i class="icon-plus"></i></a>
                    </div>
                </div>
                <div class="box-content sec-div">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">Due Date</th>
                                <th width="40%">Task</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <tr>
                                <td class="center">10/20/2013</td>
                                <td class="center">
                                    Finish document ABC
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div><!--/col-->

    </div><!--/row--> 


    <!-- START OF MODAL : REASSIGN Appointment -->
    <div class="row">

        <div class="modal fade" id="reassignAppointmentModal">
            <div class="modal-dialog-reassignAppointment">
                <div id='reassignmodaldiv' class="modal-content">
                    <!-- calendar/view_reassignmodal($sid) -->
                </div>
            </div>
        </div>

    </div>
    <!-- END OF MODAL : REASSIGN Appointment -->






</div><!-- end: Content -->
