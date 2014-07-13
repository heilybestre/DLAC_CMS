<?php

//schedule controller

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calendar extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->spark('markdown-extra/0.0.0');
    }

    function index() {
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $utype = $this->People_model->getuserfield('type', $uid);

        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['allinterns'] = $this->People_model->select_interns();
        $data['thingstodo'] = $this->Task_model->select_mytask($uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $datestring = "%Y-%m-%d"; //"%m/%d/%Y";
        $timestring = "%h:%i %a";
        $time = now();
        $datenow = mdate($datestring, $time);
        $timenow = mdate($timestring, $time);
        $data['datenow'] = $datenow;
        $data['timenow'] = $timenow;

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $data['allcases'] = $this->Case_model->select_caseaccepted();
                $this->load->view('director/menubar', $data);
                $this->load->view('director/calendar', $data);
                break;
            case 2 :
                $data['allcases'] = $this->Case_model->select_caseaccepted();
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/calendar', $data);
                break;
            case 3 :
                $data['allcases'] = $this->Case_model->select_caseaccepted();
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/calendar', $data);
                break;
            case 4 :
                $data['allcases'] = $this->Case_model->select_usercases($uid);
                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/calendar', $data);
                break;
            case 5 :
                $data['allcases'] = $this->Case_model->select_usercases($uid);
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/calendar', $data);
                break;
        }
        $this->load->view('footer');
    }

    function profile() {

        $uid = $this->session->userdata('userid');
        $utype = $this->People_model->getuserfield('type', $uid);

        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $this->load->view('director/menubar', $data);
                $this->load->view('director/profile', $data);
                break;
            case 2 :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/profile', $data);
                break;
            case 3 :
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/profile', $data);
                break;
            case 4 :
                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/profile', $data);
                break;
            case 5 :
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/profile', $data);
                break;
        }
        $this->load->view('footer');
    }

    function schedules() {
        $schedules = $this->Calendar_model->select_schedules();

        $events = array();

        foreach ($schedules as $row) {
            if ($row->summary != null) {
                $events[] = array(
                    'id' => "$row->scheduleID",
                    'title' => "$row->title",
                    'start' => "$row->start",
                    'end' => "$row->end",
                    'allDay' => false
                );
            }
            $events[] = array(
                'id' => "$row->scheduleID",
                'title' => "$row->title",
                'start' => "$row->start",
                'end' => "$row->end",
                'allDay' => false
            );
        }
        echo json_encode($events);
    }

    function userschedules($uid) {
        $type = $this->People_model->getuserfield('type', $uid);

        if ($type == 5 || $type == 4)
            $schedules = $this->Calendar_model->select_userschedule($uid);
        else
            $schedules = $this->Calendar_model->select_schedules();

        $events = array();

        foreach ($schedules as $row) {
            $case = $this->Case_model->select_case($row->caseID);

            $events[] = array(
                'id' => "$row->scheduleID",
                'title' => "$row->title ($case->caseNum)",
                'start' => "$row->start",
                'end' => "$row->end",
                'allDay' => false
            );
        }
        echo json_encode($events);
    }

    function caseevents($cid) {
        $schedules = $this->Calendar_model->select_caseschedule($cid);
        $case = $this->Case_model->select_case($cid);
        $caseinternsandlawyers = $this->Case_model->select_caseinternsandlawyers($cid);

        $events = array();
        $eventsID = array();

        foreach ($caseinternsandlawyers as $row) {
            $userevents = $this->Calendar_model->select_userschedule($row->personID);
            $bgcolor = '';
            $bordercolor = '';

            foreach ($userevents as $event) {

                if (!in_array($event->scheduleID, $eventsID)) {

                    if ($event->caseID == $cid) {
                        $bgcolor = '#B4D880 !important';
                        $bordercolor = '#B4D880 !important';
                    } else {
                        $bgcolor = '#D3D3D3 !important';
                        $bordercolor = '#D3D3D3 !important';
                    }

                    $events[] = array(
                        'id' => "$event->scheduleID",
                        'title' => "$event->title ($case->caseNum)",
                        'backgroundColor' => $bgcolor,
                        'borderColor' => $bordercolor,
                        'start' => "$event->start",
                        'end' => "$event->end",
                        'allDay' => false
                    );

                    array_push($eventsID, $event->scheduleID);
                }
            }
        }

        foreach ($schedules as $row) {
            if (!in_array($row->scheduleID, $eventsID)) {
                $events[] = array(
                    'id' => "$row->scheduleID",
                    'title' => "$row->title ($case->caseNum)",
                    'backgroundColor' => $bgcolor,
                    'borderColor' => $bordercolor,
                    'start' => "$row->start",
                    'end' => "$row->end",
                    'allDay' => false
                );
                array_push($eventsID, $row->scheduleID);
            }
        }

        echo json_encode($events);
    }

    function add($desti) {
        extract($_POST);
        $uid = $this->session->userdata('userid');

        /* SCHEDULE TABLE */
        $data = array(
            'caseID' => $newappt_case,
            'title' => $newappt_title,
            'date' => $newappt_date,
            'start' => $newappt_date . ' ' . date('H:i:s', strtotime($newappt_starttime)),
            'end' => $newappt_date . ' ' . date('H:i:s', strtotime($newappt_endtime)),
            'type' => $newappt_type,
            'place' => $newappt_place,
            'createdBy' => $uid,
            'actionplanID' => $actionplanforevent
        );
        $this->Calendar_model->insert_schedule($data);

        /* SEND SMS */

        $sender = ''; // Name of the sender (DLAC?)
        $numbers = ''; // Number of the client
        $message = ''; // What is the message?
        //$this->send_sms($sender, $numbers, $message);
        //last id inserted
        $scheduleID = $this->db->insert_id();

        /* SCHEDULE_ATTENDEE TABLE */
        foreach ($apptattendees as $attendee) {
            $forattendee = array(
                'scheduleID' => $scheduleID,
                'userID' => $attendee
            );
            $this->Calendar_model->insert_attendee($forattendee);

            /* NOTIFICATION TABLE */
            if ($attendee != $uid)
                $this->Notification_model->event_new($uid, $attendee, $newappt_case, $newappt_title);
        }

        /* ACTION PLAN TABLE */
        $doneaction = array(
            'status' => 1
        );
        $this->Case_model->update_action($actionplanforevent, $doneaction);

        if ($desti == 'calendar')
            redirect('calendar');
        else if ($desti == 'cases')
            redirect("cases/caseFolder/$newappt_case?tid=events");
    }

    function edit($sid) {
        
    }

    function delete($sid) {
        
    }

    function view($sid) {
        $schedule = $this->Calendar_model->select_appointment($sid);
        $allcases = $this->Case_model->select_caseaccepted(); //All accepted cases (for view only)
        $interns = $this->Case_model->select_caseinterns($schedule->caseID);
        $lawyers = $this->Case_model->select_caselawyers($schedule->caseID);
        $attendees = $this->Calendar_model->select_attendees($sid);

        echo "
        <div class='col-sm-3 control-group'>
            <div class='controls pull-right'>
                 <h5><b> Case Title :</h5>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'>";

        foreach ($allcases as $dd)
            if ($dd->caseID == $schedule->caseID)
                echo "<h5>" . $dd->caseName . ' (' . $dd->caseNum . ")</h5>";

        echo "
            </div>
        </div>
        <br>

        <div class='col-sm-3 control-group'>
            <div class='controls pull-right'>
              <h5><b> Appointment :</h5> 
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'><h5>";

        echo "$schedule->title";

        echo "</h5></div>
        </div>

        <br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls pull-right'>
                 <h5><b> Date :</h5>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'>      
                <h5>
                 $schedule->date           
                </h5>
            </div>
        </div>

        <br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls pull-right'>
              <h5><b> Time :</h5>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'>
            <h5>";
        echo date('h:i a', strtotime($schedule->start)) . " to ";
        echo date('h:i a', strtotime($schedule->end)) . "";
        echo "</h5></div>
        </div>
        <br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls pull-right'>
                 <h5><b> Location :</h5>
            </div>
        </div>

        <div class='col-sm-7 control-group form-inline'>
            <div class='controls'><h5>";
        if ($schedule->type == 'Internal') {
            echo "In the Clinic";
        } else if ($schedule->type == 'External') {
            echo "Outside the Clinic";
        }
        echo " - " . $schedule->place;
        echo "</h5></div>
        </div>

        <br><br>
        
        <div class='col-sm-3 control-group'>
            <div class='controls pull-right'>
                 <h5><b> Attendees :</h5>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'><h5 style='line-height:18px !important'>";

        foreach ($interns as $row) {
            foreach ($attendees as $attendee) {
                if ($attendee->userID == $row->personID) {

                    if ($attendee->userID == $row->personID)
                        echo "$row->firstname $row->lastname <br/>";
                }
            }
        }
        foreach ($lawyers as $row) {
            foreach ($attendees as $attendee) {
                if ($attendee->userID == $row->personID) {
                    if ($attendee->userID == $row->personID)
                        echo "$row->firstname $row->lastname<br/>";
                }
            }
        }
        echo "</h5></div>
        </div>";


        if ($schedule->summary != null) {
            echo "<br>
            <div style='background-color:#428bca; margin-top:140px; height:70px; padding-top:10px;'>
                <div class='col-sm-3 control-group'>
                    <div class='controls'>
                        <center><label class='label-primary'>Appoinment Summary</label></center>
                    </div>
                </div>

                <div class='col-sm-7 control-group'>
                    <div class='controls'>";
            echo form_textarea(array('class' => 'form-control disable', 'name' => 'viewappt_summary', 'style' => 'height:50px;', 'value' => "$schedule->summary"));
            echo "</div>
                </div>
                <br><br>
            </div>";
        }

        $attendee = $this->Calendar_model->select_attendee($sid, $this->session->userdata('userid'));
        if ($attendee != null && $attendee->attended != null && $attendee->attended == 0) {
            echo "<br>
            <div style='background-color:#428bca; margin-top:140px; height:85px; padding-top:10px;'>
                <div class='col-sm-3 control-group'>
                    <div class='controls'>
                        <center><label class='label-primary'>Can't Attend Reason</label></center>
                    </div>
                </div>

                <div class='col-sm-7 control-group'>
                    <div class='controls'>";
            echo form_textarea(array('class' => 'form-control disable', 'name' => 'viewappt_summary', 'style' => 'height:50px;', 'value' => "$attendee->cantattendreason"));
            echo "</div>
                </div>
                <br><br>";

            echo "
                <div class='col-sm-3 control-group'>
                    <div class='controls'>
                        <center><label class='label-primary'>Possible Sub</label></center>
                    </div>
                </div>

                <div class='col-sm-7 control-group'>
                    <div class='controls'>";
            echo $this->People_model->getuserfield('firstname', $attendee->cantattendsub) . ' ' . $this->People_model->getuserfield('lastname', $attendee->cantattendsub);
            echo "</div>
                </div>
                <br><br>
            </div>";
        }

        if (!($schedule->summary != null || $attendee != null && $attendee->attended != null && $attendee->attended == 0))
            echo '<br><br><br><br><br><br><br>';
    }

    function view_done($sid, $desti) {
        echo form_open(base_url() . 'calendar/done/' . $sid . '/' . $desti);
        echo "<p>To confirm this action, please briefly discuss what happened in this appointment:</p>";
        echo "<div class='controls'>";
        echo form_textarea(array('class' => 'form-control', 'name' => 'summary', 'style' => 'height:100px;'));
        echo "</div>";

        $cid = $this->Calendar_model->select_appointment($sid)->caseID;
        $currentstage = $this->Case_model->select_case($cid)->stage;
        $actionplanforminutes = $this->Case_model->select_action_percategory($cid, $currentstage, 3);

        echo "<br>"
        . "<div class='col-sm-2'>Action plan: </div>"
        . "<div class='col-sm-5'>"
        . "<select id='actionplanforminutes' name='actionplanforminutes' class='form-control'>";
        foreach ($actionplanforminutes as $action) {
            echo "<option value='$action->actionplanID'>$action->action</option>";
        }
        echo "</select>"
        . "</div>";

        echo "<div class='pull-right'>";
        echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Confirm');
        echo "&nbsp;
            <button type='button' class='btn btn-danger' id='canceldoneattend'> Back </button>";
        echo "</div>";
        echo "<br>";
        echo form_close();
    }

    function view_edit($sid) {
        $schedule = $this->Calendar_model->select_appointment($sid);
        $case = $this->Case_model->select_case($schedule->caseID);
        $interns = $this->Case_model->select_caseinterns($schedule->caseID);
        $attendees = $this->Calendar_model->select_attendees($sid);

        echo "
        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <center> <h5> Case Title </h5> </center>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'>
                <select id='viewappt_case' name='viewappt_case' class='form-control'>";

        echo "<option value='" . $case->caseID . "'>" . $case->caseName . ' (' . $case->caseNum . ") </option>";

        echo "</select>
            </div>
        </div>

        <br><br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <center> <h5> Appointment </h5> </center>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'>";

        echo form_input(array('class' => 'form-control', 'name' => 'viewappt_title', 'id' => 'viewappt_title', 'value' => "$schedule->title"));

        echo "</div>
        </div>

        <br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <center> <h5> Date </h5> </center>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'>
                <div class='input-group date'>
                    <span class='input-group-addon'><i class='icon-calendar'></i></span>
                    <input type='text' class='form-control date-picker' id='viewappt_date' name='viewappt_date' data-date-format='yyyy-mm-dd' value='$schedule->date'>
                </div>
            </div>
        </div>

        <br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <center> <h5> Time </h5> </center>
            </div>
        </div>

        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <div class='input-group bootstrap-timepicker'>
                    <span class='input-group-addon'><i class='icon-time'></i></span>
                    <input type='text' class='form-control timepicker' id='viewappt_starttime' name='viewappt_starttime' value='";

        echo date('h:i a', strtotime($schedule->start)) . "'>";

        echo "</div>
            </div>
        </div>

        <div class='col-sm-1 control-group'>
            <div class='controls'>
                <center> <h5> to </h5> </center>
            </div>
        </div>

        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <div class='input-group bootstrap-timepicker'>
                    <span class='input-group-addon'><i class='icon-time'></i></span>
                    <input type='text' class='form-control timepicker' id='viewappt_endtime' name='viewappt_endtime' value='";

        echo date('h:i a', strtotime($schedule->end)) . "'>";

        echo "</div>
            </div>
        </div>

        <br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <center> <h5> Location </h5> </center>
            </div>
        </div>

        <div class='col-sm-7 control-group form-inline'>
            <div class='controls'>
                <div style='margin-bottom: -10px;'>
                    <label class='radio' for='appointmentLocation-0'>
                        <input type='radio' name='viewappt_type' id='appointmentLocation-0' value='Internal'";

        if ($schedule->type == 'Internal')
            echo "checked='checked'";
        echo "> In the Clinic
                    
                    </label> &nbsp;

                    <label class='radio'>
                        <input type='radio' name='viewappt_type' id='appointmentLocation-1' value='External'";

        if ($schedule->type == 'External')
            echo "checked='checked'";
        echo "> Outside the Clinic
                    
                    </label>
                </div>
                <br>";

        echo form_input(array('class' => 'form-control', 'id' => 'viewappt_place', 'name' => 'viewappt_place', 'placeholder' => 'Exact Location', 'value' => "$schedule->place"));

        echo "</div>
        </div>

        <br><br><br>

        <div class='col-sm-3 control-group'>
            <div class='controls'>
                <center> <h5> Attendees </h5> </center>
            </div>
        </div>

        <div class='col-sm-7 control-group'>
            <div class='controls'>
                <div id='internsdiv' class='tbl-attendees'>";

        echo "<table class='table table-striped'>";
        foreach ($interns as $row) {
            foreach ($attendees as $attendee) {
                if ($attendee->userID == $row->personID) {
                    echo "<tr>
                                        <td align='center'>
                                            <input name='apptattendees[]' type='checkbox' class='case' name='case' value='$row->personID'";

                    if ($attendee->userID == $row->personID)
                        echo 'checked';
                    echo "/>
                                        </td>
                                        <td>$row->firstname $row->lastname</td>
                                    </tr>";
                }
            }
        }
        echo "</table>
                </div>
            </div>
        </div>";

        if ($schedule->summary != null) {
            echo "<div>

                <div class='col-sm-3 control-group'>
                    <div class='controls'>
                        <center><label class='label-primary'>Appoinment Done Summary</label></center>
                    </div>
                </div>

                <div class='col-sm-7 control-group'>
                    <div class='controls'>";
            echo form_textarea(array('class' => 'form-control', 'name' => 'viewappt_summary', 'style' => 'height:50px;', 'value' => "$schedule->summary"));
            echo "</div>
                </div>

            </div>
            
            <br><br>";
        }
        echo "<br><br><br><br><br><br><br><br>";
        echo "<div class='pull-right'>";
        echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success '), ' Save ');
        echo "&nbsp; &nbsp;<button type='button' class='btn btn-danger' id='btncanceleditshow'>Cancel</button> ";
        echo "</div><br>";
    }

    function view_cantattend($sid, $desti) {
        $allinterns = $this->People_model->select_interns();

        echo form_open(base_url() . 'calendar/cantattend/' . $sid . '/' . $desti);
        echo "
            <p>Why cant you attend?</p>
            <div class='controls'>";
        echo form_textarea(array('class' => 'form-control', 'name' => 'cantattendreason', 'style' => 'height:100px;'));
        echo "</div>

            <br>
            <p>The legal secretary will re-assign this appointment to another intern.</p>
            
            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center> <h5> Possible Substitute </h5> </center>
                </div>
            </div>

            <div class='col-sm-9 control-group'>
                <div class='controls'>
                    <select id='sub' name='sub' class='form-control'>";
        foreach ($allinterns as $dd) {
            $schedule = $this->Calendar_model->select_appointment($sid);
            $available = $this->Calendar_model->check_availability($dd->personID, $schedule->date, $schedule->start, $schedule->end)->Available;
            echo "<option value='$dd->personID'>$dd->firstname $dd->lastname ";
            if ($available == 0)
                echo "(Not Available)";
            echo"</option>";
        }
        echo "</select>
                </div>
            </div>

            <br>";
        echo "<div class='pull-right'>";
        echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Confirm');
        echo "&nbsp;
            <button type='button' class='btn btn-danger' id='cancelcantattendreason'> Back </button>";
        echo "</div>";
        echo "<br><br>";
        echo form_close();
    }

    function view_delete($sid) {
        echo "
        <p><h2 style='display:inline; font-size:29px'><i class='icon-trash large'></i></h2> Are you sure you want to delete this Appointment?</p>
        <center>";
        echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Yes');
        echo "&nbsp
            <button type='button' class='btn btn-danger' id='btnnodeleteshow'>&nbsp;No&nbsp;</button>
        </center>";
    }

    function view_modalfooter($sid) {
        $schedule = $this->Calendar_model->select_appointment($sid);

        if ($schedule->summary == null) {
            echo "<div id='actionEventsDiv'>
                <button id='btndoneapptshow' type='button' class='btn btn-success'>Done</button>
                <button id='btncantattendapptshow' type='button' class='btn btn-danger'>Cant Attend</button>
            </div>";
//      if ($this->session->userdata('userid') == $schedule->createdBy)
//        echo "<button id='btndeleteapptshow' type='button' class='btn alert-danger'>Delete</button>";
        }

        echo "<script>
        //Show view appointment div
        $('#btnviewapptshow').live('click', function() {
            $('#viewapptdiv').removeClass('hide');

            $('#editapptdiv').addClass('hide');
            $('#doneapptdiv').addClass('hide');
            $('#cantattendapptdiv').addClass('hide');
            $('#deleteapptdiv').addClass('hide');
        });

        //Show done appointment div
        $('#btndoneapptshow').live('click', function() {
            $('#doneapptdiv').removeClass('hide');

            $('#actionEventsDiv').addClass('hide');
            $('#actionEventTopDiv').addClass('hide');
            $('#viewapptdiv').addClass('hide');
        });
        
        $('#canceldoneattend').live('click', function() {
            $('#doneapptdiv').addClass('hide');

            $('#actionEventsDiv').removeClass('hide');
            $('#actionEventTopDiv').removeClass('hide');
            $('#viewapptdiv').removeClass('hide');
        });


        //Show cant attend appointment div
        $('#btncantattendapptshow').live('click', function() {
            $('#cantattendapptdiv').removeClass('hide');

            $('#actionEventsDiv').addClass('hide');
            $('#actionEventTopDiv').addClass('hide');
            $('#viewapptdiv').addClass('hide');
        });

        $('#cancelcantattendreason').live('click', function() {
            $('#cantattendapptdiv').addClass('hide');

            $('#actionEventsDiv').removeClass('hide');
            $('#actionEventTopDiv').removeClass('hide');
            $('#viewapptdiv').removeClass('hide');
        });

        //Show delete appointment div
        $('#btndeleteapptshow').live('click', function() {
            $('#deleteapptdiv').removeClass('hide');
            
            $('#actionEventsDiv').addClass('hide');
            $('#actionEventTopDiv').addClass('hide');
            $('#viewapptdiv').addClass('hide');
        });
        
        $('#btnnodeleteshow').live('click', function() {
            $('#deleteapptdiv').addClass('hide');

            $('#actionEventsDiv').removeClass('hide');
            $('#actionEventTopDiv').removeClass('hide');
            $('#viewapptdiv').removeClass('hide');
        });

        //Show edit appointment div
        $('#btneditapptshow').live('click', function() {
            $('#editapptdiv').removeClass('hide');

            $('#actionEventsDiv').addClass('hide');
            $('#actionEventTopDiv').addClass('hide');
            $('#viewapptdiv').addClass('hide');
        });
        
        $('#btncanceleditshow').live('click', function() {
            $('#editapptdiv').addClass('hide');

            $('#actionEventsDiv').removeClass('hide');
            $('#actionEventTopDiv').removeClass('hide');
            $('#viewapptdiv').removeClass('hide');
        });



        </script>";
    }

    function view_reassignmodal($aid) {
        $appointment = $this->Calendar_model->select_reassign_appointment($aid);
        $allinterns = $this->People_model->select_interns();

        echo form_open(base_url() . 'calendar/reassign/' . $aid);
        echo "
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                <h4 class='modal-title'>Reassign Appointment</h4>
        </div>
        
        <div class='modal-body'>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Appointment </b></h5></center>
                </div>
            </div>

            <div class='col-sm-8 control-group'>
                <div class='controls-view'>";

        echo $appointment->title;

        echo "</div>
            </div>

            <br><br>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Date </b></h5></center>
                </div>
            </div>

            <div class='col-sm-8 control-group'>
                <div class='controls-view'>";

        echo date('F j, Y', strtotime($appointment->date));

        echo "</div>
            </div>

            <br><br>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Time </b></h5></center>
                </div>
            </div>

            <div class='col-sm-8 control-group'>
                <div class='controls-view'>";

        echo date('h:i a', strtotime($appointment->start)) . ' - ' . date('h:i a', strtotime($appointment->end));

        echo "</div>
            </div>

            <br><br>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Location </b></h5></center>
                </div>
            </div>

            <div class='col-sm-8 control-group'>
                <div class='controls-view'>";

        echo $appointment->type;
        if ($appointment->place != null)
            echo ': ' . $appointment->place;

        echo "</div>
            </div>
            
            <br><br>

            <div class='row'>
                <div class='col-sm-3 control-group'>
                    <div class='controls'>
                        <center><h5><b> Attendees </b></h5></center>
                    </div>
                </div>

                <div class='col-sm-8 control-group'>
                    <div class='controls-view'>";

        $attendees = $this->Calendar_model->select_attendees($appointment->scheduleID);
        $count = 0;
        foreach ($attendees as $attendee) {
            if ($count != 0)
                echo ', ' . $this->People_model->getuserfield('firstname', $attendee->userID) . ' ' . $this->People_model->getuserfield('lastname', $attendee->userID);
            else
                echo $this->People_model->getuserfield('firstname', $attendee->userID) . ' ' . $this->People_model->getuserfield('lastname', $attendee->userID);
            $count++;
        }

        echo "</div>
                </div>
            </div>

            <hr>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Requested by </b></h5></center>
                </div>
            </div>

            <div class='col-sm-8 control-group'>
                <div class='controls-view'>";

        echo $this->People_model->getuserfield('firstname', $appointment->userID) . ' ' . $this->People_model->getuserfield('lastname', $appointment->userID);

        echo "</div>
            </div>

            <br><br>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Reason </b></h5></center>
                </div>
            </div>

            <div class='col-sm-8 control-group'>
                <div class='controls-view'>";

        echo $appointment->cantattendreason;

        echo "</div>
            </div>

            <br><br>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Possible Sub </b></h5></center>
                </div>
            </div>

            <div class='col-sm-8 control-group'>
                <div class='controls-view'>";

        echo $this->People_model->getuserfield('firstname', $appointment->cantattendsub) . ' ' . $this->People_model->getuserfield('lastname', $appointment->cantattendsub);

        echo "</div>
            </div>

            <br><br>

            <div class='col-sm-3 control-group'>
                <div class='controls'>
                    <center><h5><b> Reassign to </b></h5></center>
                </div>
            </div>

            <div class='col-sm-7 control-group'>
                <div class='controls'>
                    <select name='newattendee' class='form-control'>";
        foreach ($allinterns as $dd) {
            $available = $this->Calendar_model->check_availability($dd->personID, $appointment->date, $appointment->start, $appointment->end)->Available;
            echo "<option value='$dd->personID'>$dd->firstname $dd->lastname ";
            if ($available == 0)
                echo "(Not Available)";
            echo"</option>";
        }
        echo "</select>
                </div>
            </div>
            <br>
        </div>

        <div class='modal-footer'>";
        echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Confirm');
        echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>";
        echo form_close();
    }

    function done($sid, $desti) {
        extract($_POST);

        /* SCHEDULE TABLE */
        $summary = array(
            'summary' => $summary
        );
        $this->Calendar_model->update_schedule($sid, $summary);

        /* SCHEDULE_ATTENDEE TABLE */
        echo $uid = $this->session->userdata('userid');
        echo $aid = $this->Calendar_model->select_attendee($sid, $uid)->attendeeID;
        $attendedinattendee = array(
            'attended' => 1
        );
        $this->Calendar_model->update_attendee($aid, $attendedinattendee);

        /* LOG TABLE */
        $schedule = $this->Calendar_model->select_appointment($sid);
        $attendees = $this->Calendar_model->select_attendees($sid);

        $count = 0;
        foreach ($attendees as $row) {
            $strname = $this->People_model->getuserfield('firstname', $row->userID);
            if ($count != 0)
                $strattendees = $strattendees . ', ' . $strname;
            else
                $strattendees = $strname;
            $count++;
        }

        $cid = $schedule->caseID;
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $log = array(
            'caseID' => $cid,
            'action' => "Done event. <br><i>Title:</i> $schedule->title <br><i>Attendees:</i> $strattendees <br><i>Summary:</i> $schedule->summary",
            'dateTime' => $datetimenow,
            'stage' => $this->Case_model->select_case($cid)->stage,
            'category' => 'CALENDAR'
        );
        $this->Case_model->insert_log($log);

        if ($desti == 'calendar')
            redirect('calendar');
        else if ($desti == 'cases')
            redirect("cases/caseFolder/$cid?tid=events");
    }

    function cantattend($sid, $desti) {
        extract($_POST);
        $uid = $this->session->userdata('userid');
        $aid = $this->Calendar_model->select_attendee($sid, $uid)->attendeeID;

        /* SCHEDULE TABLE */
        $cantattenddata = array(
            'attended' => 0,
            'cantattendreason' => $cantattendreason,
            'cantattendsub' => $sub
        );
        $this->Calendar_model->update_attendee($aid, $cantattenddata);

        /* NOTIFICATION TABLE */
        $this->Notification_model->event_reassign($uid, 3);

        $cid = $this->Calendar_model->select_appointment($sid)->caseID;
        if ($desti == 'calendar')
            redirect('calendar');
        else if ($desti == 'cases')
            redirect("cases/caseFolder/$cid?tid=events");
    }

    function reassign($aid) {
        /* NOTIFICATION TABLE */
        $uid = $this->session->userdata('userid');
        $appointment = $this->Calendar_model->select_reassign_appointment($aid);
        // For the old attendee
        $this->Notification_model->event_reassigned($uid, $appointment->userID);


        $newattendee = array(
            'userID' => $this->input->post('newattendee'),
            'attended' => NULL,
            'cantattendreason' => NULL,
            'cantattendsub' => NULL
        );
        $this->Calendar_model->update_attendee($aid, $newattendee);

        /* NOTIFICATION TABLE */
        // For the new attendee
        $this->Notification_model->event_new($uid, $this->input->post('newattendee'), $appointment->caseID, $appointment->title);

        redirect('dashboard');
    }

    function change_attendees($cid, $uid) {
        $interns = $this->Case_model->select_caseinterns($cid);
        $lawyers = $this->Case_model->select_caselawyers($cid);

        echo "<table class='table table-striped'>";
        foreach ($interns as $row) {
            echo "<tr>
            <td align='center'>
            <input name='apptattendees[]' type='checkbox' class='case' name='case' value='$row->personID'";

            if ($uid == $row->personID)
                echo 'checked';

            echo "/>
            </td>
            <td>$row->firstname $row->lastname</td>
            </tr>";
        }
        foreach ($lawyers as $row) {
            echo "<tr>
            <td align='center'>
            <input name='apptattendees[]' type='checkbox' class='case' name='case' value='$row->personID'";

            if ($uid == $row->personID)
                echo 'checked';

            echo "/>
            </td>
            <td>$row->firstname $row->lastname</td>
            </tr>";
        }
        echo '</table>';
    }

    function send_sms($sender, $numbers, $message) {
        // Authorisation details.
        $username = "lewin_gaw@yahoo.com";
        $hash = "b225afa6f9a205775a0f4794603544163b20107c";

        // Configuration variables. Consult http://api.txtlocal.com/docs for more info.
        $test = "0";

        $message = urlencode($message);
        $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
        $ch = curl_init('http://api.txtlocal.com/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
    }

}

?>
