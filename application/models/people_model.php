<?php

//People Model

class People_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //User
    function login($un, $pw) {
        $query = "SELECT personID FROM people WHERE username = ? and password = ?";
        $result = $this->db->query($query, array($un, md5($pw)));

        if ($result->num_rows() == 1) {
            return $result->row(0)->personID;
        } else {
            return false;
        }
    }

    function getuserfield($field, $userid) {
        $query_str = 'SELECT * FROM `people` WHERE `personID` = ? ';

        $query = $this->db->query($query_str, array($userid));

        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                switch ($field) {
                    case "type": return $row->type;
                        break;
                    case "username": return $row->username;
                        break;
                    case "lastname": return $row->lastname;
                        break;
                    case "firstname": return $row->firstname;
                        break;
                    case "middlename": return $row->middlename;
                        break;
                    case "sex": return $row->sex;
                        break;
                    case "birthdate": return $row->birthdate;
                        break;
                    case "birthplace": return $row->birthplace;
                        break;
                    case "address": return $row->address;
                        break;
                    case "contacthome": return $row->contacthome;
                        break;
                    case "contactoffice": return $row->contactoffice;
                        break;
                    case "contactmobile": return $row->contactmobile;
                        break;
                    case "image": return $row->image;
                        break;
                    case "typeName": return $row->typeName;
                }
            }
        } else {
            return false;
        }
    }

    //client
    function clientlist() {
        $query = $this->db->query("SELECT * FROM people
            WHERE type = 14
            ORDER BY lastname");
        return $query->result();
    }

    function insert_client($data) {
        $this->db->insert('people', $data);
    }

    function update_client($pid, $data) {
        $this->db->where('personID', $pid);
        $this->db->update('people', $data);
    }

    function delete_client($pid) {
        $this->db->delete('people', array('personID' => $pid));
    }

    function select_client($pid) {
        $query = $this->db->get_where('clients', array('personID' => $pid)); // 3rd and 4th parameter is $limit and $offset
        return $query->row();
    }

    //other

    function externallist() {
        $query = $this->db->query("SELECT * FROM people
            WHERE type = 14
            ORDER BY lastname");
        return $query->result();
    }

    function opposingpartylist() {
        $query = $this->db->get('externals');
        return $query->result();
    }

    function lawyerlist() {
        $query = $this->db->get('lawyers');
        return $query->result();
    }

    function internlist() {
        $query = $this->db->get('interns');
        return $query->result();
    }

    function select_internal() {
        $query = $this->db->query("SELECT * FROM internals");
        return $query->result();
    }

    function select_external() {
        $query = $this->db->query("SELECT * FROM externals");
        return $query->result();
    }

    function select_lawyers() {
        $query = $this->db->query("SELECT * FROM lawyers 
            ORDER BY caseload ASC, difficultyLevel ASC");
        return $query->result();
    }

    function select_specialized($offenseID) {
//        $query = $this->db->query("SELECT * FROM `lawyers` JOIN `people_offense` ON (`people_offense`.`personID` = `lawyers`.`personID`) WHERE `lawyers`.`difficultyLevel` < '10' AND `people_offense`.`offenseID` = $offenseID");
//        return $query->result();
    }

    function select_non_specialized($offenseID) {
//        $query = $this->db->query("SELECT * FROM `lawyers` JOIN `people_offense` ON (`people_offense`.`personID` = `lawyers`.`personID`) WHERE `lawyers`.`difficultyLevel` < '10' AND `people_offense`.`offenseID` != $offenseID");
//        return $query->result();
    }

    function select_interns() {
        $query = $this->db->query("SELECT * FROM interns");
        return $query->result();
    }

    function select_similar($personID, $offenseID) {
        $query = $this->db->query("SELECT COUNT(*) AS similar FROM cms.case_people JOIN case_offense ON (case_offense.caseID = case_people.caseID) JOIN ref_offense ON (case_offense.offenseID = ref_offense.offenseID) WHERE personID = $personID AND `CONDITION` = 'CURRENT' and `ref_offense`.`offenseID`=$offenseID ");
        return $query->row();
    }

    function select_person($pid) {
        $query = $this->db->query("SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(timeEnded, timeStarted)))) AS 'residency', SEC_TO_TIME('540000' - SUM(TIME_TO_SEC(timediff(timeEnded, timeStarted)))) AS 'remainder' FROM internals LEFT JOIN `residency` ON `residency`.`userID` = `internals`.`personID` WHERE personID = $pid");
        return $query->row();
    }

    function count_currentcase($pid) {
        $query = $this->db->query("SELECT count(*) AS currentcaseload FROM case_people WHERE personID = $pid AND `condition` = 'current'");
        return $query->row();
    }

    function select_firstclient() {
        $query = $this->db->query("SELECT personID FROM externals limit 1");

        foreach ($query->result() as $row) {
            return $row->personID;
        }
    }

    function select_residency($date) {
        $query = $this->db->query("SELECT * FROM residency JOIN people ON people.personID = residency.userID WHERE `date` = '$date'");
        return $query->result();
    }

    function insert_residency($data) {
        $this->db->insert('residency', $data);
    }

    function check_residency($pid, $date, $start, $end) {
        $query = $this->db->query(" SELECT 
            COUNT(*) = 0 AS Available
            FROM
            residency
            WHERE
            userID = $pid AND `date` = '$date'
            AND 
            (
                (date_format(timeStarted, '%h:%i %p') <= '$start' AND date_format(timeEnded, '%h:%i %p') >= '$end')
                OR
                (date_format(timeStarted, '%h:%i %p') <= '$start' AND date_format(timeEnded, '%h:%i %p') >= '$end')
                OR
                (date_format(timeStarted, '%h:%i %p') < '$start' AND date_format(timeEnded, '%h:%i %p') > '$start') OR (date_format(timeStarted, '%h:%i %p') < '$end' AND date_format(timeEnded, '%h:%i %p') > '$end')
                OR
                (date_format(timeStarted, '%h:%i %p') > '$start' AND date_format(timeStarted, '%h:%i %p') < '$end') AND (date_format(timeEnded, '%h:%i %p') > '$start' AND date_format(timeEnded, '%h:%i %p') < '$end')
                )
        ");
        return $query->row();
    }

    function complete_residency() {
        $data = array(
            'condition' => 'applytotransfer',
            'reason' => ''
        );

        $this->db->where('personID', $pid);
        $this->db->update('case_people', $data);
    }

    function matched_lawyers($offenseID) {
        $query = $this->db->query("SELECT * FROM `people_offense` JOIN `lawyers` ON (`lawyers`.`personID` = `people_offense`.`personID`) WHERE offenseID = $offenseID");
        return $query;
    }

}

?>
