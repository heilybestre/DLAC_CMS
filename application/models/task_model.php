<?php

//Task Model

class Task_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_mytask($uid) {
        $query = $this->db->query("SELECT * FROM tasks WHERE assignedTo = $uid");
        return $query->result();
    }

    function select_mycasetask($cid, $uid) {
        $query = $this->db->query("SELECT * FROM task JOIN `people` ON `people`.`personID` = `task`.`assignedBy` WHERE assignedTo = $uid AND caseID = $cid");
        return $query->result();
    }

    function select_theirtask($uid) {
        $query = $this->db->query("SELECT * FROM tasks WHERE assignedBy = $uid");
        return $query->result();
    }

    function select_theircasetask($cid, $uid) {
        $query = $this->db->query("SELECT * FROM task JOIN `people` ON `people`.`personID` = `task`.`assignedTo` WHERE assignedBy = $uid AND caseID = $cid");
        return $query->result();
    }

    function insert_task($data) {
        $this->db->insert('task', $data);
    }

    function update_task($tid) {
        $this->db->where('taskID', $tid);
        $this->db->update('task', $changes);
    }

    function delete_task($tid) {
        
    }

}

?>