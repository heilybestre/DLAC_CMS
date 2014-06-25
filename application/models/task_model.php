<?php

//Task Model

class Task_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_mytask($uid) {
        $this->db->reconnect();
        $query = $this->db->query("SELECT * FROM task WHERE assignedTo = $uid");
        return $query->result();
    }

    function select_theirtask($uid) {
        $query = $this->db->query("SELECT * FROM task WHERE assignedBy = $uid");
        return $query->result();
    }

    function insert_task($data) {
        $this->db->insert('task', $data);
    }

    function update_task($tid) {
        
    }

    function delete_task($tid) {
        
    }

}

?>