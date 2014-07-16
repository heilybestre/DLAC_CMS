<?php

//Case Model

class Case_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // <editor-fold defaultstate="collapsed" desc="ALL KINDS OF LISTS OF CASES">
    function select_casepending() {
        $query = $this->db->get('casepending');
        return $query->result();
    }

    function select_mycasepending($pid) {
        $query = $this->db->query("SELECT * FROM casepending JOIN interview ON interview.caseID = casepending.caseID WHERE appSubmittedBy = $pid OR personID = $pid GROUP BY casepending.caseID");
        return $query->result();
    }

    function select_caserejected() {
        $query = $this->db->get('caserejected');
        return $query->result();
    }

    function select_caseaccepted() {
        $query = $this->db->get('caseaccepted');
        return $query->result();
    }

    function select_mycaseaccepted($pid) {
        $query = $this->db->query("SELECT * FROM caseaccepted JOIN case_people ON case_people.caseID = caseaccepted.caseID WHERE case_people.personID = $pid AND `status` IN (3, 4, 7, 8) AND (`condition` = 'current' OR `condition` = 'applytotransfer' OR (`condition` = 'expired' AND `status` = 5 AND `strength` IS NULL AND `weakness` IS NULL AND `opportunity` IS NULL AND `threat` IS NULL AND `strategy` IS NULL))");
        return $query->result();
    }

    function select_caseactiveinactive() {
        $query = $this->db->get('caseactiveinactive');
        return $query->result();
    }

    function select_caserequest() {
        $query = $this->db->get('caserequest');
        return $query->result();
    }

    function select_caseclosed() {
        $query = $this->db->get('caseclosed');
        return $query->result();
    }

    function count_ongoing($startyear, $endyear) {
        if ($startyear == NULL AND $endyear == NULL) {
            $query = $this->db->query('SELECT COUNT(*) AS `count` FROM caseongoing');
        } else {
            if ($startyear == NULL) {
                $startyear = '';
            }
            if ($endyear == NULL) {
                $endyear = '';
            }
            $query = $this->db->query("SELECT COUNT(*) AS `count` FROM caseongoing WHERE dateReceived LIKE '$startyear%' OR dateReceived LIKE '$endyear%'");
        }
        return $query->row();
    }

    function count_closed($startyear, $endyear) {
        if ($startyear == NULL AND $endyear == NULL) {
            $query = $this->db->query('SELECT COUNT(*) AS `count` FROM caseclosed');
        } else {
            if ($startyear == NULL) {
                $startyear = '';
            }
            if ($endyear == NULL) {
                $endyear = '';
            }
            $query = $this->db->query("SELECT COUNT(*) AS `count` FROM caseclosed WHERE dateReceived LIKE '$startyear%' OR dateReceived LIKE '$endyear%'");
        }
        return $query->row();
    }

    function select_usercases($uid) {
        $type = $this->People_model->getuserfield('type', $uid);

        if ($type == 1) {
            $query = $this->db->query("SELECT * 
    			FROM  `case`
    			WHERE `case`.status = 3");
        } else {
            $query = $this->db->query("SELECT * 
    			FROM  `case_people` 
    			JOIN  `case` ON  `case_people`.caseID =  `case`.caseID
    			WHERE personID = $uid AND `case`.`status` = 3");
        }

        return $query->result();
    }

    function select_mycases($uid) {
        $query = $this->db->query("SELECT * FROM mycases JOIN `case_people` ON `case_people`.`caseID` = `mycases`.`caseID` WHERE `case_people`.`personID` = $uid");
        return $query->result();
    }

    // </editor-fold>
    // 
    // <editor-fold defaultstate="collapsed" desc="CREATE APPLICATION">

    function get_nextappno() {
        $this->db->select('caseID');
        $this->db->from('`case`');
        $this->db->order_by('caseID', 'desc');
        $this->db->limit(1);
        $query_str = $this->db->get();
        return $query_str->row('caseID');
    }

    function insert_app($data) {
        $this->db->insert('case', $data);
    }

    function insert_offense($data) {
        $this->db->insert('case_offense', $data);
    }

    function insert_court($data) {
        $this->db->insert('court', $data);
    }

    function insert_evidencedoc($data) {
        $this->db->insert('evidencedoc', $data);
    }

    function insert_evidenceobj($data) {
        $this->db->insert('evidenceobj', $data);
    }

    function insert_evidencetes($data) {
        $this->db->insert('evidencetes', $data);
    }

    function insert_legaladvice($cid, $data) { //
        $this->db->where('caseID = ', $cid);
        $this->db->update('case', $data);
    }

    function insert_interview($data) {
        $this->db->insert('interview', $data);
    }

    function insert_recommendation($cid, $data) { //
        $this->db->where('caseID = ', $cid);
        $this->db->update('case', $data);
    }

    function insert_log($data) {
        $this->db->insert('log', $data);
    }

    // </editor-fold>
    // 
    // <editor-fold defaultstate="collapsed" desc="SELECT 1(ONE) CASE ONLY!">
    function select_casecourt($cid) {
        $query = $this->db->query("SELECT * FROM court JOIN `ref_status` ON `ref_status`.`caseStatusID` = `court`.`courtstatus` WHERE caseID = $cid");
        return $query->result();
    }

    function select_caselog($cid, $stage) {
        $query = $this->db->query("SELECT * FROM log WHERE caseID = $cid AND stage = $stage ORDER BY dateTime DESC, logID DESC");
        return $query->result();
    }

    function select_caseoffense($cid) {
        $query = $this->db->query("SELECT * FROM case_offense JOIN ref_offense ON ref_offense.offenseID = case_offense.offenseID WHERE caseID = $cid ");
        return $query->result();
    }

    function select_casepeople($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` JOIN `ref_type` ON `ref_type`.`typeID` = `case_people`.`side` WHERE caseID = $cid ");
        return $query->result();
    }

    function select_caseclient($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` JOIN `ref_type` ON `ref_type`.`typeID` = `case_people`.`side` WHERE caseID = $cid AND `case_people`.`participation` = 6 AND `condition` = 'current'");
        return $query->result();
    }

    function select_closeclient($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` JOIN `ref_type` ON `ref_type`.`typeID` = `case_people`.`side` WHERE caseID = $cid AND `case_people`.`participation` = 6 AND `condition` = 'expired'");
        return $query->result();
    }

    function select_caseopposing($cid) {
        $query = $this->db->query("SELECT * FROM case_people
    		JOIN people ON `people`.`personID` = `case_people`.`personID`
    		JOIN `ref_type` ON `ref_type`.`typeID` = `case_people`.`side`
    		WHERE caseID = $cid AND `case_people`.`participation` = 7");
        return $query->result();
    }

    function select_closeopposing($cid) {
        $query = $this->db->query("SELECT * FROM case_people
    		JOIN people ON `people`.`personID` = `case_people`.`personID`
    		JOIN `ref_type` ON `ref_type`.`typeID` = `case_people`.`side`
    		WHERE caseID = $cid AND `case_people`.`participation` = 7 and `condition` = 'expired'");
        return $query->result();
    }

    function select_caseperson($cid, $pid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` WHERE caseID = $cid AND `people`.`personID` = $pid ");
        return $query->row();
    }

    function select_condition($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` WHERE caseID = $cid AND `condition` = 'applytotransfer'");

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    function select_caseinterns($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` WHERE caseID = $cid AND `people`.`type` = 5 AND (`condition` = 'current' OR `condition` = 'applytotransfer')");
        return $query->result();
    }

    function select_closecaseinterns($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` WHERE caseID = $cid AND `people`.`type` = 5 AND `condition` = 'expired' ORDER BY dateend DESC, datestart DESC");
        return $query->result();
    }

    function select_caselawyers($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` WHERE caseID = $cid AND `people`.`type` = 4 AND `condition` = 'current'");
        return $query->result();
    }

    function select_caseinternsandlawyers($cid) {
        $query = $this->db->query("SELECT * FROM case_people 
                    JOIN people ON `people`.`personID` = `case_people`.`personID` 
                    WHERE caseID = $cid 
                    AND (`people`.`type` = 5 
                    AND (`condition` = 'current' OR `condition` = 'applytotransfer'))
                    OR (caseID = 25 AND `people`.`type` = 4 AND `condition` = 'current')");
        return $query->result();
    }

    function select_closecaselawyers($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON `people`.`personID` = `case_people`.`personID` WHERE caseID = $cid AND `people`.`type` = 4 AND `condition` = 'expired' ORDER BY dateend DESC, datestart DESC");
        return $query->result();
    }

    function select_evidencedoc($cid) {
        $query = $this->db->query("SELECT * FROM evidencedoc WHERE caseID = $cid ");
        return $query->result();
    }

    function select_evidenceobj($cid) {
        $query = $this->db->query("SELECT * FROM evidenceobj WHERE caseID = $cid ");
        return $query->result();
    }

    function select_evidencetes($cid) {
        $query = $this->db->query("SELECT * FROM evidencetes
    		JOIN people ON evidencetes.ttestified = people.personID
    		WHERE caseID = $cid");
        return $query->result();
    }

    function select_case($cid) {
        $query = $this->db->query("SELECT * FROM `case`
    		
    		JOIN ref_status ON ref_status.caseStatusID = `case`.`status`
    		JOIN ref_stage ON ref_stage.stageID = `case`.stage
    		LEFT JOIN `people` ON `people`.`personID` = `case`.`applyToCloseBy`
    		WHERE `case`.caseID = $cid");
        /* LEFT JOIN court ON `case`.caseID = court.caseID ACCEPT NOT WORKING WITH THIS */
        return $query->row();
    }

    function select_caseinterviewee($cid) {
        $query = $this->db->query("

    SELECT * FROM interview JOIN people ON people.personID = interview.personID WHERE caseID = $cid AND type = 5");
        return $query->result();
    }

    function select_casesupervising($cid) {
        $query = $this->db->query("SELECT * FROM interview JOIN people ON people.personID = interview.personID WHERE caseID = $cid

     AND type = 4");
        return $query->row();
    }

    function select_casedocuments($cid, $type) {
        $query = $this
                ->db->query("SELECT * FROM legaldocument WHERE caseID = $cid AND doctype = $type ");
        return $query->result();
    }

    function select_actionplan($cid, $stage) {
        $query = $this->db->query("SELECT * from actionplan where caseID = $cid and stage = $stage");
        return $query->result();
    }

    function select_caseresearch($cid) {
        $query = $this->db->query("SELECT * FROM `research` JOIN `case` ON `case`.`caseID` = `research`.`relatedcaseID` WHERE `research`.`caseID` = $cid");
        return $query->result();
    }

    function select_nontransferees($cid) {
        $query = $this->db->query("SELECT * FROM interns WHERE personID NOT IN (SELECT personID FROM case_people WHERE caseID = $cid)");
        return $query->result();
    }

    function select_suggestedresearch($cid, $tag) {
        $query = $this->db->query("SELECT * FROM `caseclosed` WHERE `caseID` != $cid AND tags LIKE '%$tag%'; ");
        return $query->result();
    }

    function select_actionplancomplete($cid, $sid) {
        $query = $this->db->query("SELECT count(*) AS `count` FROM `actionplan` WHERE caseID = $cid AND stage = $sid AND status = 0");
        return $query->row();
    }

    function select_minutes($cid) {
        $query = $this->db->query("SELECT * FROM `schedule` WHERE caseID = $cid AND `summary` IS NOT NULL");
        return $query->result();
    }

    // </editor-fold>
    // 
    // <editor-fold defaultstate="collapsed" desc="UPDATE A SINGLE CASE">
    function insert_casenumber($data) {
        $this->db->insert('court', $data);
    }

    function update_case($cid, $changes) {
        $this->db->where('caseID', $cid);
        $this->db->update('case', $changes);
    }

    function update_casetags($cid, $tags) {
        $this->db->query("UPDATE `case` SET `tags` = CONCAT_WS(' #', `tags`, '$tags') WHERE caseID = $cid");
    }

    function delete_casetags($cid) {
        $data = array(
            'tags' => ''
        );
        $this->db->where('caseID', $cid);
        $this->db->update('case', $data);
    }

    //</editor-fold>
    // 
    // <editor-fold defaultstate="collapsed" desc="ACTIONPLAN">

    function getactioncategoryname($racID) {
        $query = $this->db->query("SELECT * from ref_action_category where racID = $racID");
        return $query->row();
    }

    function select_action_categories() {
        $query = $this->db->query("SELECT * from ref_action_category");
        return $query->result();
    }

    function select_action($apid) {
        $query = $this->db->query("SELECT * FROM actionplan WHERE actionplanID = $apid");
        return $query->row();
    }

    function select_caseactions($cid) {
        $query = $this->db->query("SELECT * FROM actionplan WHERE caseID = $cid");
        return $query->result();
    }

    function select_caseaction_notes($cid) {
        $query = $this->db->query("SELECT * FROM actionplan_notes "
                . "JOIN  actionplan ON  actionplan.actionplanID =  actionplan_notes.actionplanID "
                . "WHERE caseID = $cid");
        return $query->result();
    }

    function select_action_notes($actionplanID) {
        $query = $this->db->query("SELECT * FROM actionplan_notes WHERE actionplanID = $actionplanID");
        return $query->result();
    }

    function select_action_notes_count($actionplanID) {
        $query = $this->db->query("SELECT count(*) AS `count` FROM actionplan_notes WHERE actionplanID = $actionplanID");
        return $query->row();
    }

    function update_action($apid, $changes) {
        $this->db->where('actionplanID', $apid);
        $this->db->update('actionplan', $changes);
    }

    function insert_actionplan($data) {
        $this->db->insert('actionplan', $data);
    }

    function insert_actionplan_notes($data) {
        $this->db->insert('actionplan_notes', $data);
    }

    function update_casepeople($cid, $changes) {
        $this->db->where('caseID', $cid);
        $this->db->update('case_people', $changes);
    }

    function select_refactions($stage) {
        $query = $this->db->query("SELECT * FROM ref_actionplan WHERE stage = $stage");
        return $query->result();
    }

    function select_action_percategory($cid, $stage, $category) {
        $query = $this->db->query("SELECT * FROM actionplan WHERE caseID = $cid AND stage = $stage AND category = $category");
        return $query->result();
    }

    // </editor-fold>
    //
    //// <editor-fold defaultstate="collapsed" desc="LEGAL DOCUMENT">
    function insert_casedocument($cid, $data) {
        $this->db->insert('legaldocument', $data);
    }

    function select_legaldocument($did) {
        $query = $this->db->query("SELECT * FROM legaldocument WHERE documentID = $did");
        return $query->row();
    }

    function select_mydocumentpending($pid) {
        $query = $this->db->query("SELECT `legaldocument`.*, `case`.`caseNum` FROM `legaldocument` JOIN `case_people` ON `case_people`.`caseID` = `legaldocument`.`caseID` JOIN `case` ON `case`.`caseID` = `case_people`.`caseID`WHERE `legaldocument`.`status` = 'pending' AND `legaldocument`.`doctype` = 1 AND `case_people`.`personID` = $pid");
        return $query->result();
    }

    function delete_legaldocument($did) {
        $this->db->where('documentID', $did);
        $this->db->delete('legaldocument');
    }

    function update_legaldocument($did, $changes) {
        $this->db->where('documentID', $did);
        $this->db->update('legaldocument', $changes);
    }

    //</editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="OFFENSE">
    function select_offense() {
        $query = $this->db->query("SELECT * FROM offenses ORDER BY offenseName ASC");
        return $query->result();
    }

    function delete_offense($cid) {
        $this->db->where('caseID', $cid);
        $this->db->delete('case_offense');
    }

    //</editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="RESEARCH">
    function insert_research($data) {
        $this->db->insert('research', $data);
    }

    //</editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="CASE PEOPLE">
    function insert_caseperson($data) {
        $this->db->insert('case_people', $data);
    }

    function apply_to_transfer($cid, $pid, $changes) {
        $this->db->where('caseID', $cid);
        $this->db->where('personID', $pid);
        $this->db->update('case_people', $changes);
    }

    function select_transferees($cid) {
        $query = $this->db->query("SELECT * FROM case_people JOIN people ON people.`personID` = case_people.`personID` WHERE caseID = $cid AND `condition` = 'applytotransfer'");
        return $query->result();
    }

    function select_transferrequest() {
        $query = $this->db->query("SELECT * FROM `case` JOIN `case_people` ON `case_people`.`caseID` = `case`.`caseID` JOIN `people` ON `people`.`personID` = `case_people`.`personID` WHERE `condition` = 'applytotransfer'");
        return $query->result();
    }

    //</editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="REFERENCE ID">
    function select_strtype($inttype) {
        $query = $this->db->query("SELECT * FROM ref_type WHERE typeID = $inttype");
        return $query->row();
    }

    function select_strstage($id) {
        $query = $this->db->query("SELECT * FROM ref_stage WHERE stageID = $id");
        return $query->row();
    }

    function select_stages() {
        $query = $this->db->query("SELECT * FROM ref_stage");
        return $query->result();
    }

    function select_action_category() {
        $query = $this->db->query("SELECT * FROM ref_action_category");
        return $query->result();
    }

    function select_stroffense($id) {
        $query = $this->db->query("SELECT * FROM ref_offense WHERE offenseID = $id");
        return $query->row();
    }

    // </editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="For Report">
    function select_weekly_log($cid, $stage, $date) {
        $query = $this->db->query("SELECT * FROM log WHERE caseID = $cid AND stage = $stage AND date(`dateTime`) >= date_sub(date($date), INTERVAL 3 day) AND date(`dateTime`) <= date_sub(date($date), INTERVAL - 3 day) ORDER BY dateTime DESC , logID DESC");
        return $query->result();
    }

    // </editor-fold>
}

?>
