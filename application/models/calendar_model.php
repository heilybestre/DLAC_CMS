<?php

//Calendar Model

class Calendar_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // <editor-fold defaultstate="collapsed" desc="SCHEDULE RELATED">
    function select_userschedule($uid) {
        $query = $this->db->query("SELECT *
			FROM `schedule`
			JOIN schedule_attendee ON `schedule`.scheduleID = schedule_attendee.scheduleID
			WHERE `date` > CURDATE() AND userID = $uid");
        return $query->result();
    }

    function select_schedulenow($uid) {
        $utype = $this->People_model->getuserfield('type', $uid);

        if ($utype == 1) {
            $query = $this->db->query("SELECT *
			FROM `schedule`
			WHERE `date` = CURDATE()");
        } else {
            $query = $this->db->query("SELECT *
			FROM `schedule`
			JOIN schedule_attendee ON `schedule`.scheduleID = schedule_attendee.scheduleID
			WHERE userID = $uid
			AND `date` = CURDATE()");
        }

        return $query->result();
    }

    function select_caseschedule($cid) {
        $query = $this->db->query("SELECT * FROM `schedule`
			WHERE caseID = $cid"
        );

        return $query->result();
    }

    function insert_schedule($data) {
        $this->db->insert('schedule', $data);
    }

    function update_schedule($sid, $changes) {
        $this->db->where('scheduleID', $sid);
        $this->db->update('schedule', $changes);
    }

    function delete_schedule($sid) {
        
    }

    function check_availability($pid, $date, $start, $end) {
        $query = $this->db->query(" SELECT 
			COUNT(*) = 0 AS Available
			FROM
			people
			LEFT JOIN
			`schedule_attendee` ON schedule_attendee.userID = people.personID
			LEFT JOIN
			`schedule` ON `schedule_attendee`.`scheduleID` = `schedule`.`scheduleID`
			WHERE
			people.`type` = 5 AND
			userID = $pid AND `date` = '$date'
			AND (`start` <= '$start'
				AND `end` >= '$end'
				OR `start` <= '$start'
				AND `end` >= '$end'
				OR `start` < '$start'
				AND `end` > '$start'
				OR `start` < '$end'
				AND `end` > '$end'
				OR `start` > '$start'
				AND `start` < '$end'
				AND `end` > '$start'
				AND `end` < '$end')
		");
        return $query->row();
    }

    // </editor-fold>
    // 
    // <editor-fold defaultstate="collapsed" desc="ATTENDEE RELATED">
    function insert_attendee($data) {
        $this->db->insert('schedule_attendee', $data);
    }

    function select_attendees($sid) {
        $query = $this->db->query("SELECT * FROM schedule_attendee WHERE scheduleID = $sid");
        return $query->result();
    }

    function select_attendee($sid, $uid) {
        $query = $this->db->query("SELECT * FROM schedule_attendee WHERE scheduleID = $sid AND userID = $uid");
        return $query->row();
    }

    function update_attendee($aid, $changes) {
        $this->db->where('attendeeID', $aid);
        $this->db->update('schedule_attendee', $changes);
    }

    function delete_attendee($aid) {
        
    }

    // </editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="APPOINTMENT RELATED">
    function select_appointment($sid) {
        $query = $this->db->query("SELECT * FROM `schedule` WHERE scheduleID = $sid");
        return $query->row();
    }

    function select_reassign_appointments() {
        $query = $this->db->query("SELECT *
			FROM
			schedule_attendee
			JOIN
			`schedule` ON `schedule`.scheduleID = schedule_attendee.scheduleID
			WHERE
			attended = 0
			ORDER BY `date` DESC
			");
        return $query->result();
    }

    function select_reassign_appointment($aid) {
        $query = $this->db->query("SELECT *
			FROM
			schedule_attendee
			JOIN
			`schedule` ON `schedule`.scheduleID = schedule_attendee.scheduleID
			WHERE
			attendeeID = $aid
			ORDER BY `date` DESC
			");
        return $query->row();
    }

    // </editor-fold>
}

?>