<?php

//Notification Model

class Notification_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //Submitted a new application (to director)
    function app_new($sender, $director, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $sendername = $this->People_model->getuserfield('firstname', $sender);

        $data = array(
            'sender' => $sender,
            'receiver' => $director,
            'message' => "$sendername submitted a new application.",
            'status' => 0, //unread
            'dateTime' => $datetimenow,
            'category' => 'application',
            'destination' => 'application/view/' . $caseid
        );

        $this->db->insert('notification', $data);
    }

    //You have been assigned to case (to lawyer & intern/s)
    function app_assigned($receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $casetitle = $this->Case_model->select_case($caseid)->caseName;

        $data = array(
            'sender' => 1,
            'receiver' => $receiver,
            'message' => "You have been assigned to $casetitle ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => 'cases/caseFolder/' . $caseid
        );

        $this->db->insert('notification', $data);
    }

    //Application has been accepted (to interview interns)
    function app_accepted($receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $casetitle = $this->Case_model->select_case($caseid)->caseName;

        $data = array(
            'sender' => 1,
            'receiver' => $receiver,
            'message' => "$casetitle ($casenum) has been accepted.",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => 'application/view/' . $caseid
        );

        $this->db->insert('notification', $data);
    }

    //Intern has submitted an Action Plan
    function actionplan_new($sender, $receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $casetitle = $this->Case_model->select_case($caseid)->caseName;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$sendername has submitted an Action Plan for $casetitle ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => 'cases/caseFolder/' . $caseid . '?tid=actionplan'
        );  

        $this->db->insert('notification', $data);
    }

    //Lawyer approved the Action Plan
    function actionplan_approved($sender, $receiver, $caseid, $withnotes) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $casetitle = $this->Case_model->select_case($caseid)->caseName;
        $message = "$sendername approved the Action Plan for $casetitle ($casenum).";

        if ($withnotes == true) {
            $message = "$sendername approved the Action Plan for $casetitle ($casenum). View the action plan to see notes.";
        }

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => $message,
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => 'cases/caseFolder/' . $caseid . '?tid=actionplan'
        );
        $this->db->insert('notification', $data);
    }

    //New document deadline has been added
    function documentdeadline_new($sender, $receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $casetitle = $this->Case_model->select_case($caseid)->caseName;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "New document deadline has been added for $casetitle ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'calendar',
            'destination' => 'calendar'
        );
        $this->db->insert('notification', $data);
    }

    //You have a new appointment
    function event_new($sender, $receiver, $caseid, $title) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $casetitle = $this->Case_model->select_case($caseid)->caseName;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "You have a new appointment '$title' for $casetitle ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'calendar',
            'destination' => 'calendar'
        );
        $this->db->insert('notification', $data);
    }

    //You have an appointment to re-assign
    function event_reassign($sender, $receiver) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => 'You have an appointment to re-assign.',
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'calendar',
            'destination' => 'dashboard'
        );
        $this->db->insert('notification', $data);
    }

    //Your appointment has been re-assigned
    function event_reassigned($sender, $receiver, $title) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "Your appointment $title has been re-assigned.",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'calendar',
            'destination' => 'dashboard'
        );
        $this->db->insert('notification', $data);
    }

    //Intern has applied to close Case
    function applytoclose($sender, $receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$sendername has applied to close $casename ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => "cases/caseFolder/$caseid"
        );

        $this->db->insert('notification', $data);
    }

    //Intern has applied to transfer Case
    function applytotransfer($sender, $receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$sendername has applied to transfer $casename ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => "cases/caseFolder/$caseid"
        );

        $this->db->insert('notification', $data);
    }

    // Intern has applied to Re-open Case
    function applytoreopen($sender, $receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$sendername has applied to re-open $casename ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => "archive/view/$caseid"
        );

        $this->db->insert('notification', $data);
    }

    //Intern has drafted a Draft for Case
    function draft_new($sender, $receiver, $caseid, $documentid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow
        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $document = $this->Case_model->select_legaldocument($documentid);
        $documentname = $document->file_name;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$sendername has drafted a '$documentname' for $casename ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'drafts',
            'destination' => "cases/caseFolder/$caseid?tid=documents"
        );

        $this->db->insert('notification', $data);
    }

    //Lawyer/Intern revised draft Draft for Case
    function draft_final($sender, $receiver, $caseid, $documentid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow
        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $document = $this->Case_model->select_legaldocument($documentid);
        $documentname = $document->file_name;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$sendername has approved and uploaded the final '$documentname' for $casename ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'drafts',
            'destination' => "cases/caseFolder/$caseid?tid=documents"
        );

        $this->db->insert('notification', $data);
    }

    //Lawyer has approved draft Draft for Case
    function draft_approve($sender, $receiver, $caseid, $documentid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow
        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;
        $document = $this->Case_model->select_legaldocument($documentid);
        $documentname = $document->file_name;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$sendername has approved '$documentname' for $casename ($casenum).",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'drafts',
            'destination' => "cases/caseFolder/$caseid?tid=documents"
        );

        $this->db->insert('notification', $data);
    }

    //Case has been transferred to New Intern / You from Old Intern
    function case_transfer($sender, $receiver, $caseid, $old, $new) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $newname = $this->People_model->getuserfield('firstname', $new);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;

        if (!$old == 0) {
            // $oldname = $this->People_model->getuserfield('firstname', $old);
            // $message= "$casename ($casenum) has been transferred to you from $oldname";
            $message = "$casename ($casenum) has been transferred to you.";
        } else
            $message = "$casename ($casenum) has been transferred to $newname.";

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => $message,
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => "cases/caseFolder/$caseid"
        );

        $this->db->insert('notification', $data);
    }

    //Case has been closed. Please assess the case.
    function case_closed($sender, $receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$casename ($casenum) has been closed. Please assess the case.",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => "cases/caseFolder/$caseid"
        );

        $this->db->insert('notification', $data);
    }

    //Case has been assessed by Intern/Lawyer and moved to the archives.
    function case_assessed($sender, $receiver, $caseid) {
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow

        $sendername = $this->People_model->getuserfield('firstname', $sender);
        $casename = $this->Case_model->select_case($caseid)->caseName;
        $casenum = $this->Case_model->select_case($caseid)->caseNum;

        $data = array(
            'sender' => $sender,
            'receiver' => $receiver,
            'message' => "$casename ($casenum) has been assessed by $sendername and moved to the archive.",
            'status' => 0,
            'dateTime' => $datetimenow,
            'category' => 'case',
            'destination' => "cases/caseFolder/$caseid"
        );

        $this->db->insert('notification', $data);
    }

    function select_notifs($pid) {
        $query = $this->db->query("SELECT * FROM notification WHERE receiver = $pid ORDER BY dateTime DESC");
        return $query->result();
    }

    function select_count_unread($pid) {
        $query = $this->db->query("SELECT count(*) count from notification where receiver = $pid and status = 0");
        return $query->row();
    }

    function update_status($nid, $status) {
        $changes = array(
            'status' => $status
        );

        $this->db->where('notificationID', $nid);
        $this->db->update('notification', $changes);
    }

}

?>