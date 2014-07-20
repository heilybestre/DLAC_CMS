<?php

//case controller

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cases extends CI_Controller {

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
                $data['cases'] = $this->Case_model->select_caseaccepted();
                $this->load->view('director/menubar', $data);
                $this->load->view('director/cases', $data);
                break;
            case 2 :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/cases', $data);
                break;
            case 3 :
                $data['cases'] = $this->Case_model->select_caseaccepted();
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/cases', $data);
                break;
            case 4 :
                $data['cases'] = $this->Case_model->select_mycaseaccepted($uid);
                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/cases', $data);
                break;
            case 5 :
                $data['cases'] = $this->Case_model->select_mycaseaccepted($uid);
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/cases', $data);
                break;
        }
        $this->load->view('footer');
    }

    function caseReopen($cid) {
        $uid = $this->session->userdata('userid');
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $casechanges = array(
            'status' => 2,
            'appSubmittedby' => $uid,
            'appDateSubmitted' => $datetimenow
        );
        $case_peoplechanges = array(
            'condition' => 'current',
            'datestart' => $datetimenow,
        );

        $this->Case_model->update_case($cid, $casechanges);
        $this->Case_model->return_case_people($cid, $case_peoplechanges);
        redirect("application/view/$cid?ref=caseReopen");
    }

    function caseClose($cid) {

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $changes = array(
            'status' => 5,
            'dateClosed' => $datetimenow
        );

        $changes2 = array(
            'condition' => 'expired',
            'dateend' => $datetimenow
        );

        /* NOTIFICATION TABLE */
        $uid = $this->session->userdata('userid');
        $interns = $this->Case_model->select_caseinterns($cid);
        $lawyers = $this->Case_model->select_caselawyers($cid);

        //For Intern/s
        foreach ($interns as $intern) {
            $this->Notification_model->case_closed($uid, $intern->personID, $cid);
        }
        //For Lawyer
        foreach ($lawyers as $lawyer)
            $this->Notification_model->case_closed($uid, $lawyer->personID, $cid);

        $this->Case_model->update_case($cid, $changes);
        $this->Case_model->update_casepeople($cid, $changes2);


        redirect("cases");
    }

    function rejectCaseClose($cid) {
        $changes = array(
            'status' => 3
        );

        $this->Case_model->update_case($cid, $changes);
        redirect("cases");
    }

    function caseApplytoclose() {
        $cid = $this->input->post('cid');
        $pid = $this->input->post('pid');
        $closereason = $this->input->post('reason');
        $closenotes = $this->input->post('notes');

        if ($closereason == 0) {

            $closedecision = $this->input->post('decision');
            $changes = array(
                'applyToCloseBy' => $pid,
                'status' => '4',
                'closereason' => $closereason,
                'closedecision' => $closedecision,
                'closenotes' => $closenotes
            );
        } else {
            $changes = array(
                'applyToCloseBy' => $pid,
                'status' => '4',
                'closereason' => $closereason,
                'closenotes' => $closenotes,
            );
        }
        $this->Case_model->update_case($cid, $changes);

        /* NOTIFICATION TABLE */
        $uid = $this->session->userdata('userid');
        $interns = $this->Case_model->select_caseinterns($cid);
        $lawyers = $this->Case_model->select_caselawyers($cid);

        // For Director
        $this->Notification_model->applytoclose($uid, 1, $cid);
        //For Intern/s
        foreach ($interns as $intern) {
            if ($intern->personID != $uid)
                $this->Notification_model->applytoclose($uid, $intern->personID, $cid);
        }
        //For Lawyer
        foreach ($lawyers as $lawyer)
            $this->Notification_model->applytoclose($uid, $lawyer->personID, $cid);


        redirect("cases/caseFolder/$cid");
    }

    function caseApplytoreopen($cid) {
        $uid = $this->session->userdata('userid');
        $reason = $this->input->post('reasonForReopening');
        $notes = $this->input->post('notes');

        $changes = array(
            'applyToReopenBy' => $uid,
            'status' => '6',
            'reopenreason' => "$reason, $notes"
        );

        $this->Case_model->update_case($cid, $changes);

        /* NOTIFICATION TABLE */
        // For Director
        $this->Notification_model->applytoreopen($uid, 1, $cid);
        redirect("archive/view/$cid");
    }

    function caseApplytotransfer() {

        $cid = $this->input->post('cid');
        $pid = $this->input->post('pid');
        $reason = $this->input->post('applytoclosereason');
        $notes = $this->input->post('notes');

        $changes = array(
            'condition' => 'applytotransfer',
            'reason' => "$reason, $notes"
        );

        $this->Case_model->apply_to_transfer($cid, $pid, $changes);

        /* NOTIFICATION TABLE */
        $uid = $this->session->userdata('userid');
        $interns = $this->Case_model->select_caseinterns($cid);
        $lawyers = $this->Case_model->select_caselawyers($cid);

        // For Director
        $this->Notification_model->applytotransfer($uid, 1, $cid);

        //For Intern/s
        foreach ($interns as $intern) {
            if ($intern->personID != $uid)
                $this->Notification_model->applytotransfer($uid, $intern->personID, $cid);
        }
        //For Lawyer
        foreach ($lawyers as $lawyer)
            $this->Notification_model->applytotransfer($uid, $lawyer->personID, $cid);

        redirect("cases/caseFolder/$cid");
    }

    function caseApplytotransfer_auto($pid) {

        $cases = $this->Case_model->select_usercases($pid);

        foreach ($cases as $case) {
            $cid = $case->caseID;

            $changes = array(
                'condition' => 'applytotransfer',
                'reason' => "Completed residency"
            );

            $this->Case_model->apply_to_transfer($cid, $pid, $changes);

            /* NOTIFICATION TABLE */
            $uid = $this->session->userdata('userid');
            $interns = $this->Case_model->select_caseinterns($cid);
            $lawyers = $this->Case_model->select_caselawyers($cid);

            // For Director
            $this->Notification_model->applytotransfer($uid, 1, $cid);
            //For Intern/s
            foreach ($interns as $intern) {
                if ($intern->personID != $uid)
                    $this->Notification_model->applytotransfer($uid, $intern->personID, $cid);
            }
            //For Lawyer
            foreach ($lawyers as $lawyer)
                $this->Notification_model->applytotransfer($uid, $lawyer->personID, $cid);
        }

        redirect('dashboard');
    }

    function openCase($cid) {
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $changes = array(
            'status' => 3,
            'dateReceived' => $datetimenow
        );
        $this->Case_model->update_case($cid, $changes);
        redirect("cases/caseFolder/$cid");
    }

    function caseFolder($cid) {
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $utype = $this->People_model->getuserfield('type', $uid);

        $this->session->set_userdata('cid', $cid);

        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $data['casecourt'] = $this->Case_model->select_casecourt($cid);
        $data['caseoffense'] = $this->Case_model->select_caseoffense($cid);
        $data['offenses'] = $this->Case_model->select_offense();
        $data['stages'] = $this->Case_model->select_stages();
        $data['actioncategory'] = $this->Case_model->select_action_category();
        $data['case'] = $this->Case_model->select_case($cid);

        // <editor-fold defaultstate="collapsed" desc="Action Plan">

        $data['actionplanstatus'] = $this->Case_model->select_case($cid)->actionplanstatus;
        $data['allcaseactionnotes'] = $this->Case_model->select_caseaction_notes($cid);
        $data['allcaseactions'] = $this->Case_model->select_caseactions($cid);

        //CREATE ACTION PLAN
        for ($x = 1; $x <= 4; $x++) {
            $data['refactionplan_s' . $x] = $this->Case_model->select_refactions($x);
        }

        //SUBMITTED ACTION PLAN
        for ($x = 1; $x <= 4; $x++) {
            $data['actionplan_s' . $x] = $this->Case_model->select_actionplan($cid, $x);
        }

        //For action plan connections
        $currentstage = $this->Case_model->select_case($cid)->stage;
        $data['actionplanfordraft'] = $this->Case_model->select_action_percategory($cid, $currentstage, 5);
        $data['actionplanfordocument'] = $this->Case_model->select_action_percategory($cid, $currentstage, 6);
        $data['actionplanforevent'] = $this->Case_model->select_action_percategory($cid, $currentstage, 2);
        $data['actionplanforevidence'] = $this->Case_model->select_action_percategory($cid, $currentstage, 4);


        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="Evidence">
        $data['evidencedoc'] = $this->Case_model->select_evidencedoc($cid);
        $data['evidenceobj'] = $this->Case_model->select_evidenceobj($cid);
        $data['evidencetes'] = $this->Case_model->select_evidencetes($cid);
        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="Legal Documents">
        $data['drafts'] = $this->Case_model->select_casedocuments($cid, 1);
        $data['byclient'] = $this->Case_model->select_casedocuments($cid, 2);
        $data['byopposing'] = $this->Case_model->select_casedocuments($cid, 3);
        $data['bycourt'] = $this->Case_model->select_casedocuments($cid, 4);
        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="People">
        $data['caseclient'] = $this->Case_model->select_caseclient($cid);
        $data['caseopposing'] = $this->Case_model->select_caseopposing($cid);
        $data['casepeople'] = $this->Case_model->select_casepeople($cid);
        $data['caseinterns'] = $this->Case_model->select_caseinterns($cid);
        $data['caselawyers'] = $this->Case_model->select_caselawyers($cid);
        if ($data['case']->status == 6 || ($data['case']->status == 5 && $data['case']->strength == NULL && $data['case']->weakness == NULL && $data['case']->opportunity == NULL && $data['case']->threat == NULL && $data['case']->strategy == NULL)) {
            $data['caseclient'] = $this->Case_model->select_closeclient($cid);
            $data['caseopposing'] = $this->Case_model->select_closeopposing($cid);
            $data['caseinterns'] = $this->Case_model->select_closecaseinterns($cid);
            $data['caselawyers'] = $this->Case_model->select_closecaselawyers($cid);
        }
        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="Research">
        $case = $this->Case_model->select_case($cid);
        $tags = explode(" #", $case->tags);
        foreach ($tags as $tag) {
            $suggestedresearch = $this->Case_model->select_suggestedresearch($cid, $tag);
            foreach ($suggestedresearch as $row) {
                $research[$row->caseID] = $row;
            }
        }

        if (!empty($research)) {
            $data['researchlist'] = $research;
        } else {
            $data['researchlist'] = 'empty';
        }

        $data['caseresearch'] = $this->Case_model->select_caseresearch($cid);
        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="Non Case Related">
        $data['clientlist'] = $this->People_model->clientlist();
        $data['opposingpartylist'] = $this->People_model->opposingpartylist();
        $data['externals'] = $this->People_model->select_external();
        $data['lawyerlist'] = $this->People_model->lawyerlist();
        $data['internlist'] = $this->People_model->internlist();
        $data['clientid'] = $this->People_model->select_firstclient();
        // </editor-fold>
        //<editor-fold defaultstate="collapsed" desc="Case Log">
        $data['caselog_stage1'] = $this->Case_model->select_caselog($cid, 1);
        $data['caselog_stage2'] = $this->Case_model->select_caselog($cid, 2);
        $data['caselog_stage3'] = $this->Case_model->select_caselog($cid, 3);
        $data['caselog_stage4'] = $this->Case_model->select_caselog($cid, 4);
        $data['caselog_stage5'] = $this->Case_model->select_caselog($cid, 5);
        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="Notification">
        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);
        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="Minutes">
        $data['minutes'] = $this->Case_model->select_minutes($cid);
        // </editor-fold>

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
                $data['casecondition'] = $this->Case_model->select_condition($cid);
                $data['thingstodo'] = $this->Task_model->select_theircasetask($cid, $uid);

                $this->load->view('director/menubar', $data);
                $this->load->view('director/caseFolder', $data);
                break;
            case 2 :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/caseFolder', $data);
                break;
            case 3 :
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/caseFolder', $data);
                break;
            case 4 :
                $data['casecondition'] = $this->Case_model->select_condition($cid);
                $data['thingstodo'] = $this->Task_model->select_theircasetask($cid, $uid);

                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/caseFolder', $data);
                break;
            case 5 :
                $data['caseperson'] = $this->Case_model->select_caseperson($cid, $uid);
                $data['thingstodo'] = $this->Task_model->select_mycasetask($cid, $uid);

                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/caseFolder', $data);
                break;
        }
        $this->load->view('footer');
    }

    function transferCase($cid) {
        $uid = $this->session->userdata('userid');
        $utype = $this->People_model->getuserfield('type', $uid);

        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $data['interns'] = $this->People_model->select_interns();
                $data['transferees'] = $this->Case_model->select_transferees($cid);
                $data['nontransferees'] = $this->Case_model->select_nontransferees($cid);
                $data['caselawyers'] = $this->Case_model->select_caselawyers($cid);

                $data['case'] = $this->Case_model->select_case($cid);
                $this->load->view('director/menubar', $data);
                $this->load->view('director/transferCase', $data);
                break;
        }
        $this->load->view('footer');
    }

    function editCase($cid, $oldcasename, $oldcasedesc) {
        extract($_POST);
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $equalname = strcmp(urldecode($oldcasename), $edit_caseTitle);
        $equaldesc = strcmp(urldecode($oldcasedesc), $edit_caseDescription);

        if ($equalname != 0) {
            $change = array('caseName' => $edit_caseTitle);
            $this->Case_model->update_case($cid, $change);

            /* LOG TABLE */
            $log = array(
                'caseID' => $cid,
                'action' => 'Case title has been changed to: ' . $edit_caseTitle,
                'dateTime' => $datetimenow,
                'stage' => $this->Case_model->select_case($cid)->stage,
                'category' => 'CASE'
            );
            $this->Case_model->insert_log($log);
        }

        if ($equaldesc != 0) {
            $change = array('caseDesc' => $edit_caseDescription);
            $this->Case_model->update_case($cid, $change);

            /* LOG TABLE */
            $log = array(
                'caseID' => $cid,
                'action' => 'Case description has been updated.',
                'dateTime' => $datetimenow,
                'stage' => $this->Case_model->select_case($cid)->stage,
                'category' => 'CASE'
            );
            $this->Case_model->insert_log($log);
        }


        redirect(base_url() . "cases/caseFolder/$cid");
    }

    function replaceInterns() {

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $cid = $this->input->post('cid');
        $old = $this->input->post('old');

        foreach ($old as $row) {
            $new = $this->input->post('old' . $row);
            $oldchanges = array(
                'condition' => 'expired',
                'dateend' => $datetimenow
            );

            $newchanges = array(
                'caseID' => $cid,
                'personID' => $new,
                'participation' => 5,
                'condition' => 'current',
                'datestart' => $datetimenow
            );

            /* NOTIFICATION TABLE (to requested intern/s) */
            $uid = $this->session->userdata('userid');
            $this->Notification_model->case_transfer($uid, $row, $cid, 0, $new);


            $this->Case_model->apply_to_transfer($cid, $row, $oldchanges);
            $this->Case_model->insert_caseperson($newchanges);


            /* NOTIFICATION TABLE (to assigned lawyer intern/s & new) */
            $interns = $this->Case_model->select_caseinterns($cid);
            $lawyers = $this->Case_model->select_caselawyers($cid);

            foreach ($interns as $intern) {
                if ($intern->personID != $new)
                    $this->Notification_model->case_transfer($uid, $intern->personID, $cid, 0, $new);
            }
            foreach ($lawyers as $lawyer)
                $this->Notification_model->case_transfer($uid, $lawyer->personID, $cid, 0, $new);

            /* NOTIFICATION TABLE (to new intern) */
            $this->Notification_model->case_transfer($uid, $new, $cid, $row, $new);

            /* LOG TABLE */
            $oldname = $this->People_model->getuserfield('firstname', $row);
            $newname = $this->People_model->getuserfield('firstname', $new);

            $log = array(
                'caseID' => $cid,
                'action' => "Case has been transferred from $oldname to $newname",
                'dateTime' => $datetimenow,
                'stage' => $this->Case_model->select_case($cid)->stage,
                'category' => 'PEOPLE'
            );
            $this->Case_model->insert_log($log);

            redirect(base_url() . "cases/caseFolder/$cid");
        }
    }

    function caseNumber() {

        $cid = $_POST['caseID'];
        $court = $_POST['caseForum'];
        $casenumber = $_POST['caseNumber'];
        $casestatus = $_POST['caseStatus'];

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $changes = array(
            'caseID' => $cid,
            'court' => $court,
            'casenumber' => $casenumber,
            'courtstatus' => $casestatus
        );
        $this->Case_model->insert_casenumber($changes);

        /* LOG TABLE */

        $log = array(
            'caseID' => $cid,
            'action' => "Added a new court and case number: $court - $casenumber",
            'dateTime' => $datetimenow,
            'stage' => $this->Case_model->select_case($cid)->stage,
            'category' => 'CASE'
        );
        $this->Case_model->insert_log($log);

        redirect("cases/caseFolder/$cid");
    }

    function addOffense() {

        extract($_POST);
        $case = $this->Case_model->select_case($cid);
        $offenseforlog = '';
        $tagoffense = '';
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $this->Case_model->delete_offense($cid);
        for ($index = 0; $index < count($inputoffense); $index++) {

            $data = array(
                'caseID' => $cid,
                'offenseID' => $inputoffense[$index],
                'stage' => $inputoffensestage[$index]
            );

            $offensename = $this->Case_model->select_stroffense($inputoffense[$index])->offenseName;
            $this->Case_model->insert_offense($data);
            $tagoffense = $tagoffense . ' #' . $offensename;

            if ($index == 0) {
                $offenseforlog = $inputoffense[$index] . ' (' . $inputoffensestage[$index] . ') ';
            } else {
                $offenseforlog = $offenseforlog + ', ' . $inputoffense[$index] . '( ' . $inputoffensestage[$index] . ') ';
            }
        }

        /* TAGS TABLE */
        // client type
        $caseclient = $this->Case_model->select_caseclient($cid);

        //$this->Case_model->select_strtype($appclienttype);
        // client/s name
        $strclientname = '';
        for ($index = 0; $index < count($caseclient); $index++) {
            $strclienttype = $caseclient[$index]->typeName;
            $strclientname = $strclientname . ' #' . $caseclient[$index]->firstname . ' ' . $caseclient[$index]->lastname;
        }

        // Tags 
        $tags = $case->caseName . $tagoffense . ' #' . $strclienttype . $strclientname;
        $this->Case_model->delete_casetags($cid);
        $this->Case_model->update_casetags($cid, $tags);

        /* LOG TABLE */
        $log = array(
            'caseID' => $cid,
            'action' => 'Offense has been updated to: ' . $offenseforlog,
            'dateTime' => $datetimenow,
            'stage' => $this->Case_model->select_case($cid)->stage,
            'category' => 'CASE'
        );
        $this->Case_model->insert_log($log);
        redirect("cases/caseFolder/$cid");
    }

    function addEvidence() {
        $variablename = $this->input->post('idnamesadata');

        $evidence = array(
            ''
        );

        $this->Case_model;
    }

    function addResearch($caseID, $suggestedID) {
        $changes = array(
            'caseID' => $caseID,
            'relatedcaseID' => $suggestedID
        );

        $this->Case_model->insert_research($changes);

        redirect("cases/caseFolder/$caseID?tid=research");
    }

    function attachDraft($cid, $sid) {
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|txt';
        $config['max_size'] = '999999';
        $config['max_width'] = '999999';
        $config['max_height'] = '999999';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_multi_upload("myfile")) {
            echo $data['error'] = $this->upload->display_errors();
        } else {

            $multi = $this->upload->get_multi_upload_data();
            $rawName = $_POST['rawName'];
            $selectactionplanfordraft = $_POST['selectactionplanfordraft'];
            $count = 0;
            foreach ($multi as $file) {

                $changes = array(
                    'caseID' => $cid,
                    'doctype' => 1,
                    'stage' => $sid,
                    'dateprepared' => $datetimenow,
                    'dateIssued' => '',
                    'file_name ' => $rawName[$count],
                    'file_type' => $file['file_type'],
                    'file_path ' => 'uploads/' . $file['file_name'], //$file['full_path'],
                    'file_ext' => $file['file_ext'],
                    'file_size' => $file['file_size'],
                    'status' => 'pending',
                    'actionplanID' => $selectactionplanfordraft[$count]
                );
                $this->Case_model->insert_casedocument($cid, $changes);
                $count++;
            }

            /* NOTIFICATION TABLE (to assigned intern/s) */
            $did = $this->db->insert_id();
            $uid = $this->session->userdata('userid');
            $interns = $this->Case_model->select_caseinterns($cid);
            $lawyers = $this->Case_model->select_caselawyers($cid);

            foreach ($interns as $intern) {
                if ($intern->personID != $uid)
                    $this->Notification_model->draft_new($uid, $intern->personID, $cid, $did);
            }
            foreach ($lawyers as $lawyer) {
                if ($lawyer->personID != $uid)
                    $this->Notification_model->draft_new($uid, $lawyer->personID, $cid, $did);
            }

            redirect("cases/caseFolder/$cid?tid=documents");
        }
    }

    function attachByClient($cid, $sid) {
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|txt';
        $config['max_size'] = '999999';
        $config['max_width'] = '999999';
        $config['max_height'] = '999999';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_multi_upload("myfile")) {
            echo $data['error'] = $this->upload->display_errors();
        } else {

            $multi = $this->upload->get_multi_upload_data();
            extract($_POST);

            $count = 0;
            foreach ($multi as $file) {

                $changes = array(
                    'caseID' => $cid,
                    'doctype' => 2,
                    'stage' => $sid,
                    'datereceived' => $datereceived[$count],
                    'dateissued' => $datefiled[$count],
                    'datefiled' => $datetimenow,
                    'file_name ' => $docname[$count],
                    'file_type' => $file['file_type'],
                    'file_path ' => 'uploads/' . $file['file_name'], //$file['full_path'],
                    'file_ext' => $file['file_ext'],
                    'file_size' => $file['file_size'],
                    'purpose' => $docpurpose[$count]
                );

                $this->Case_model->insert_casedocument($cid, $changes);

                /* LOG TABLE */
                $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow
                $log = array(
                    'caseID' => $cid,
                    'action' => 'New document by the client: ' . $docname[$count],
                    'dateTime' => $datetimenow,
                    'stage' => $this->Case_model->select_case($cid)->stage,
                    'category' => 'DOCUMENT'
                );
                $this->Case_model->insert_log($log);

                $count++;
            }

            redirect("cases/caseFolder/$cid?tid=documents");
        }
    }

    function attachByOpposing($cid, $sid) {
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|txt';
        $config['max_size'] = '999999';
        $config['max_width'] = '999999';
        $config['max_height'] = '999999';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_multi_upload("myfile")) {
            echo $data['error'] = $this->upload->display_errors();
        } else {

            $multi = $this->upload->get_multi_upload_data();
            extract($_POST);

            $count = 0;
            foreach ($multi as $file) {

                $changes = array(
                    'caseID' => $cid,
                    'doctype' => 3,
                    'stage' => $sid,
                    'datereceived' => $datereceived[$count],
                    'dateissued' => $datefiled[$count],
                    'datefiled' => $datetimenow,
                    'file_name ' => $docname[$count],
                    'file_type' => $file['file_type'],
                    'file_path ' => 'uploads/' . $file['file_name'], //$file['full_path'],
                    'file_ext' => $file['file_ext'],
                    'file_size' => $file['file_size'],
                    'purpose' => $docpurpose[$count]
                );

                $this->Case_model->insert_casedocument($cid, $changes);

                /* LOG TABLE */
                $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow
                $log = array(
                    'caseID' => $cid,
                    'action' => 'New document by the court: ' . $docnamecourt[$count],
                    'dateTime' => $datetimenow,
                    'stage' => $this->Case_model->select_case($cid)->stage,
                    'category' => 'DOCUMENT'
                );
                $this->Case_model->insert_log($log);

                $count++;
            }
            redirect("cases/caseFolder/$cid?tid=documents");
        }
    }

    function attachByCourt($cid, $sid) {
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|txt';
        $config['max_size'] = '999999';
        $config['max_width'] = '999999';
        $config['max_height'] = '999999';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $did = 0;

        if (!$this->upload->do_multi_upload("myfileCourt")) {
            echo $data['error'] = $this->upload->display_errors();
            echo 'error';
        } else {
            $multi = $this->upload->get_multi_upload_data();

            $docnamecourt = $_POST['docnameCourt'];
            $datereceivedcourt = $_POST['datereceivedCourt'];
            $dateissuedcourt = $_POST['dateissuedCourt'];
            $selectactionplanfordocument = $_POST['selectactionplanfordocument'];
            $doctitlecourt = $_POST['doctitleCourt'];
            $addnewdocdeadline = $_POST['addNewDocDeadline'];

            $count = 0;
            foreach ($multi as $file) {

                $changes = array(
                    'caseID' => $cid,
                    'doctype' => 4,
                    'stage' => $sid,
                    'dateReceived' => $datereceivedcourt[$count],
                    'dateIssued' => $dateissuedcourt[$count],
                    'file_type' => $file['file_type'],
                    'file_path' => $file['full_path'],
                    'file_name' => $docnamecourt[$count],
                    'file_ext' => $file['file_ext'],
                    'file_size' => $file['file_size'],
                    'title' => $doctitlecourt[$count],
                    'actionplanID' => $selectactionplanfordocument[$count]
                );

                $this->Case_model->insert_casedocument($cid, $changes);
                $did = $this->db->insert_id(); //last id inserted

                /* LOG TABLE */
                $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow
                $log = array(
                    'caseID' => $cid,
                    'action' => 'New document by the court: ' . $docnamecourt[$count],
                    'dateTime' => $datetimenow,
                    'stage' => $this->Case_model->select_case($cid)->stage,
                    'category' => 'DOCUMENT'
                );
                $this->Case_model->insert_log($log);

                // ADD NEW DEADLINE
                if ($addnewdocdeadline[$count] == 'on') {
                    $newdocumenttitle = $_POST['newDocumentTitle'];
                    $newdocumentdeadline = $_POST['newDocumentDeadline'];
                    $datenow = date("Y-m-d", now());
                    $uid = $this->session->userdata('userid');

                    $deadline = date('Y-m-d', strtotime("+$newdocumentdeadline[$count] days"));

                    $newdeadline = array(
                        'caseID' => $cid,
                        'title' => "Deadline for document: $newdocumenttitle[$count]",
                        'date' => $deadline,
                        'start' => $deadline . ' 00:00:00',
                        'end' => $deadline . ' 00:00:00',
                        'type' => 'External',
                        'place' => 'Court',
                        'createdBy' => $uid,
                    );
                    $this->Calendar_model->insert_schedule($newdeadline);

                    /* NOTIFICATION TABLE */
                    $lawyers = $this->Case_model->select_caselawyers($cid);
                    foreach ($lawyers as $lawyer) {
                        $this->Notification_model->documentdeadline_new($uid, $lawyer->personID, $cid);
                    }
                }

                $count++;
            }

            /* ACTION PLAN TABLE */
            $apID = $this->Case_model->select_legaldocument($did)->actionplanID;
            $doneaction = array(
                'status' => 1
            );
            $this->Case_model->update_action($apID, $doneaction);


            redirect("cases/caseFolder/$cid?tid=documents");
        }
    }

    function addDocuEvidence() {

        $changes = array(
            'caseID' => $this->input->post('caseID'),
            'dparty' => $this->input->post('case_evidenceof'),
            'dname' => $this->input->post('docName'),
            'dtype' => $this->input->post('case_doctype'),
            'dstatus' => $this->input->post('case_docstatus'),
            'ddesc' => $this->input->post('docdesc'),
            'dpurpose' => $this->input->post('docpurpose'),
            'dissueDate' => $this->input->post('docdateissued'),
            'dissuePlace' => $this->input->post('docplaceissued'),
            'ddateReceived' => $this->input->post('docdatereceived'),
            'dtestified' => $this->input->post('case_doctestify')
        );

        $this->Case_model->insert_evidencedoc($changes);
    }

    function addObjeEvidence() {

        $changes = array(
            'caseID' => $this->input->post('caseID'),
            'oparty' => $this->input->post('case_evidenceof'),
            'oobject' => $this->input->post('objname'),
            'ostatus' => $this->input->post('case_objstatus'),
            'odescription' => $this->input->post('objdesc'),
            'odateReceived' => $this->input->post('objdatereceived'),
            'odateRetrieved' => $this->input->post('objdateretrieved'),
            'otestified' => $this->input->post('case_objtestify')
        );
        $this->Case_model->insert_evidenceobj($changes);
    }

    function addTestEvidence() {

        $changes = array(
            'caseID' => $this->input->post('caseID'),
            'tparty' => $this->input->post('case_evidenceof'),
            'tnarrative' => $this->input->post('tesnarrative'),
            'tstatus' => $this->input->post('case_tesstatus'),
            'trelationship' => $this->input->post('tesrel'),
            'tpurpose' => $this->input->post('tespurpose'),
            'ttestified' => $this->input->post('case_tesname')
        );
        $this->Case_model->insert_evidencetes($changes);
    }

    // function returnDocevidencetable() {
    //  var tableHTML = "";
    //  foreach ($evidencedoc as $row){
    //      tableHTML += "<tr>";
    //      tableHTML += "<td></td>";
    //      tableHTML += "<td></td>";
    //      tableHTML += "<td></td>";
    //      tableHTML += "</tr>";
    //  }
    //  return tableHTML;
    // }

    function createactionplan($cid) {
        extract($_POST);
        $uid = $this->session->userdata('userid');

        for ($stage = 1; $stage <= 4; $stage++) {
            if (isset(${'action' . $stage})) {
                for ($index = 0; $index < count(${'action' . $stage}); $index++) {
                    ${'foraction_s' . $stage} = array(
                        'caseID' => $cid,
                        'stage' => $stage,
                        'action' => ${'action' . $stage}[$index],
                        'category' => ${'actiontype' . $stage}[$index],
                        'status' => 0
                    );
                    $this->Case_model->insert_actionplan(${'foraction_s' . $stage});
                }
            }
        }

        $this->Case_model->update_case($cid, array('actionplanstatus' => 'pending'));

        /* NOTIFICATION TABLE */
        $interns = $this->Case_model->select_caseinterns($cid);
        $lawyers = $this->Case_model->select_caselawyers($cid);

        //for intern/s
        foreach ($interns as $intern) {
            if ($intern->personID != $uid)
                $this->Notification_model->actionplan_new($uid, $intern->personID, $cid);
        }

        //for lawyer/s
        foreach ($lawyers as $lawyer) {
            $this->Notification_model->actionplan_new($uid, $lawyer->personID, $cid);
        }

        /* TASK TABLE */
        $case = $this->Case_model->select_action($cid);
        $caseName = $case->title;
        $userName = $this->People_model->getuserfield('firstname', $uid);
        $datetimenow = date("Y-m-d H:i:s", now());
        $datenow = date("Y-m-d", now());

        foreach ($lawyers as $lawyer) {
            $addtask = array(
                'caseID' => $cid,
                'task' => "Check action plan for $caseName by $userName",
                'assignedTo' => $lawyer->personID,
                'dateAssigned' => $datetimenow,
                'dateDue' => $datenow
            );
            $this->Task_model->insert_task($addtask);
        }

        redirect("cases/caseFolder/$cid?tid=actionplan");
    }

    function approveactionplan($cid) {
        extract($_POST);
        $uid = $this->session->userdata('userid');
        $allactions = $this->Case_model->select_caseactions($cid);
        $withnotes = false;

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        foreach ($allactions as $action) {
            if (isset(${'actionnotes_name_' . $action->actionplanID})) {
                for ($index = 0; $index < count(${'actionnotes_name_' . $action->actionplanID}); $index++) {
                    $actionnotes = array(
                        'actionplanID' => $action->actionplanID,
                        'note' => ${'actionnotes_message_' . $action->actionplanID}[$index],
                        'by' => ${'actionnotes_name_' . $action->actionplanID}[$index],
                        'dateTime' => $datetimenow
                    );
                    $this->Case_model->insert_actionplan_notes($actionnotes);
                }
                $withnotes = true;
            }
        }

        $this->Case_model->update_case($cid, array('actionplanstatus' => 'approved'));


        $uid = $this->session->userdata('userid');

        /* NOTIFICATION TABLE */
        $interns = $this->Case_model->select_caseinterns($cid);
        foreach ($interns as $intern) {
            $this->Notification_model->actionplan_approved($uid, $intern->personID, $cid, $withnotes);
        }

        /* LOG TABLE */
        $log = array(
            'caseID' => $cid,
            'action' => 'Approved Action Plan.',
            'dateTime' => $datetimenow,
            'stage' => $this->Case_model->select_case($cid)->stage,
            'category' => 'ACTIONPLAN'
        );
        $this->Case_model->insert_log($log);

        redirect("cases/caseFolder/$cid?tid=actionplan");
    }

    function changeactionstatus($apid) {
        $action = $this->Case_model->select_action($apid);
        $status = $action->status;
        $changes = array();

        if ($status == 0)
            $changes = array('status' => 1);
        else
            $changes = array('status' => 0);

        $this->Case_model->update_action($apid, $changes);
    }

    function assignAction($apid, $intern) {
        $changes = array(
            'assignedTo' => $intern
        );
        $this->Case_model->update_action($apid, $changes);

        $action = $this->Case_model->select_action($apid);
        $cid = $action->caseID;
        $case = $this->Case_model->select_case($cid);
        $caseName = $case->caseName;
        $uid = $this->session->userdata('userid');
        $datetimenow = date("Y-m-d H:i:s", now());
        $datenow = date("Y-m-d", now());
        $actionName = $action->action;

        /* TASK TABLE */
        $addtask = array(
            'caseID' => $cid,
            'task' => "$actionName for $caseName",
            'assignedBy' => $uid,
            'assignedTo' => $intern,
            'dateAssigned' => $datetimenow,
            'dateDue' => $datenow,
            'actionplanID' => $apid
        );
        $this->Task_model->insert_task($addtask);
    }

    function nextstage($apid) {
        $action = $this->Case_model->select_action($apid);
        $case = $this->Case_model->select_case($action->caseID);

        $cid = $case->caseID;
        $currentstage = $case->stage;
        $newstage = $currentstage + 1;
        $strnewstage = $this->Case_model->select_strstage($newstage)->stageName;

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        //Update stage in case table
        $this->Case_model->update_case($cid, array('stage' => "$newstage"));

        /* LOG TABLE */
        $log = array(
            'caseID' => $cid,
            'action' => 'Just started at ' . $strnewstage . ' stage.',
            'dateTime' => $datetimenow,
            'stage' => $newstage,
            'category' => 'CASE'
        );
        $this->Case_model->insert_log($log);
    }

    function EditCaseTags() {
        $cid = $_POST['caseID'];
        $tags = $_POST['caseTags'];
        $this->Case_model->update_casetags($cid, $tags);
        redirect("cases/caseFolder/$cid");
    }

    function addAssessment() {
        extract($_POST);

        $changes = array(
            'strategy' => $addStrategies,
            'strength' => $addStrengths,
            'weakness' => $addWeaknesses,
            'opportunity' => $addOpportunities,
            'threat' => $addThreats
        );

        $this->Case_model->update_case($cid, $changes);

        /* NOTIFICATION TABLE */
        $uid = $this->session->userdata('userid');
        $interns = $this->Case_model->select_closecaseinterns($cid);
        $lawyers = $this->Case_model->select_closecaselawyers($cid);

        // For Director
        $this->Notification_model->case_assessed($uid, 1, $cid);
        //For Intern/s
        foreach ($interns as $intern) {
            if ($intern->personID != $uid)
                $this->Notification_model->case_assessed($uid, $intern->personID, $cid);
        }
        //For Lawyer
        foreach ($lawyers as $lawyer) {
            if ($lawyer->personID != $uid)
                $this->Notification_model->case_assessed($uid, $lawyer->personID, $cid);
        }


        redirect('cases');
    }

    function download($cid, $did) {
        $legaldocument = $this->Case_model->select_legaldocument($did);
        $uid = $this->session->userdata('userid');
        $utype = $this->People_model->getuserfield('type', $uid);

        if ($legaldocument->status == 'pending' && $utype == 4) {
            $changes = array(
                'status' => 'checking'
            );
            $this->Case_model->update_legaldocument($did, $changes);
        }
        if ($legaldocument->status == 'revision' && $utype == 5) {
            $changes = array(
                'status' => 'editing'
            );
            $this->Case_model->update_legaldocument($did, $changes);
        }

        echo 'Your download will begin in a moment. <a href=\'' . base_url() . 'cases/caseFolder/' . $cid . '?tid=documents' . '\'>Continue</a>';
        redirect("cases/downloadNow/$cid/$did", 'refresh');
    }

    function downloadNow($cid, $did) {

        $this->load->helper('download');
        $legaldocument = $this->Case_model->select_legaldocument($did);
        $file_path = $legaldocument->file_path;
        $file_name = $legaldocument->file_name . $legaldocument->file_ext;
        $file = file_get_contents($file_path); // Read the file's contents
        force_download($file_name, $file);
    }

    function deletedocument($did) {
        $this->Case_model->delete_legaldocument($did);
    }

    function uploadReplace() {
        $uid = $this->session->userdata('userid');
        $utype = $this->People_model->getuserfield('type', $uid);
        $did = $_POST['documentid'];
        $cid = $_POST['caseid'];

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|txt';
        $config['max_size'] = '999999';
        $config['max_width'] = '999999';
        $config['max_height'] = '999999';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('revisionfile')) {
            echo $data['error'] = $this->upload->display_errors();
        } else {
            $file = $this->upload->data();
            $changes = array(
                'file_type' => $file['file_type'],
                'file_path ' => $file['full_path'],
                'file_ext' => $file['file_ext'],
                'file_size' => $file['file_size'],
                'status' => 'approved'
            );

            $this->Case_model->update_legaldocument($did, $changes);

            /* NOTIFICATION TABLE (to assigned intern/s) */
            $interns = $this->Case_model->select_caseinterns($cid);
            $lawyers = $this->Case_model->select_caselawyers($cid);

            foreach ($interns as $intern) {
                if ($intern->personID != $uid)
                    $this->Notification_model->draft_final($uid, $intern->personID, $cid, $did);
            }
            echo '<br><br>';
            foreach ($lawyers as $lawyer) {
                if ($lawyer->personID != $uid)
                    $this->Notification_model->draft_final($uid, $lawyer->personID, $cid, $did);
            }

            redirect("cases/caseFolder/$cid?tid=documents");
        }
    }

    function approvedocument($cid, $did) {
        $changes = array(
            'status' => 'approved'
        );
        $this->Case_model->update_legaldocument($did, $changes);

        /* NOTIFICATION TABLE (to assigned intern/s) */
        $uid = $this->session->userdata('userid');
        $interns = $this->Case_model->select_caseinterns($cid);
        $lawyers = $this->Case_model->select_caselawyers($cid);

        foreach ($interns as $intern) {
            if ($intern->personID != $uid)
                $this->Notification_model->draft_approve($uid, $intern->personID, $cid, $did);
        }

        foreach ($lawyers as $lawyer) {
            if ($lawyer->personID != $uid)
                $this->Notification_model->draft_approve($uid, $lawyer->personID, $cid, $did);
        }

        redirect("cases/caseFolder/$cid?tid=documents");
    }

    function filedocument() {
        extract($_POST);

        $changes = array(
            'datefiled' => $datefiled,
            'datereceived' => $datereceived,
            'purpose' => $purpose,
            'doctype' => 2
        );

        $this->Case_model->update_legaldocument($documentID, $changes);

        /* LOG TABLE */
        $document = $this->Case_model->select_legaldocument($documentID);
        $cid = $document->caseID;
        $datetimenow = date("Y-m-d H:i:s", now()); //datetimenow
        $log = array(
            'caseID' => $cid,
            'action' => 'Document by the client: ' . $document->file_name,
            'dateTime' => $datetimenow,
            'stage' => $this->Case_model->select_case($cid)->stage,
            'category' => 'DOCUMENT'
        );
        $this->Case_model->insert_log($log);

        /* ACTION PLAN TABLE */
        $apID = $document->actionplanID;
        $doneaction = array(
            'status' => 1
        );
        $this->Case_model->update_action($apID, $doneaction);

        redirect("cases/caseFolder/$caseID?tid=documents");
    }

    function casegeneral($cid) {
        echo $cid;
        //redirect("cases/caseFolder/$cid");
    }

    function addMyTask($cid) {
        extract($_POST);
        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $changes = array(
            'caseID' => $cid,
            'task' => $task,
            'assignedBy' => $assignedBy,
            'assignedTo' => $assignedBy,
            'dateAssigned' => $datetimenow,
            'dateDue' => $taskduedate,
            'notes' => $notes,
        );

        $this->Task_model->insert_task($changes);
        redirect("cases/caseFolder/$cid?tid=events");
    }

    function addTask() {
        extract($_POST);

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);


        if ($newtask_case == 0) {
            $newtask_case = NULL;
        }
        $changes = array(
            'caseID' => $newtask_case,
            'task' => $task,
            'assignedBy' => $assignedBy,
            'assignedTo' => $intern,
            'dateAssigned' => $datetimenow,
            'dateDue' => $taskduedate,
            'notes' => $notes,
            'dateDue' => $taskduedate
        );

        $this->Case_model->insert_task($changes);


        redirect("cases/caseFolder/$cid?tid=events");
    }

    function doneTask() {
        $tid = $_POST['taskID'];
        $summary = $_POST['summary'];

        $datestring = "%Y-%m-%d %H:%i:%s";
        $time = now();
        $datetimenow = mdate($datestring, $time);

        $changes = array(
            'dateDone' => $datetimenow,
            'summary' => $summary
        );

        $this->Case_model->update_task($tid, $changes);
        redirect("dashboard");
    }

    // <editor-fold defaultstate="collapsed" desc="TEMPLATE">
    function ComplaintAffidavit($cid) {

        //lewin
        $client = $this->Case_model->select_caseclient($cid);
        $clientfullname = $client[0]->firstname . ' ' . $client[0]->middlename . ' ' . $client[0]->lastname;
        $clientaddress = $client[0]->addrtown;
//        $clientaddress = $client[0]->addrhouse . ' ' . $client[0]->addrstreet . ' St., ' . $client[0]->addrtown;
//        if ($client[0]->addrdistrict != '' || $client[0]->addrdistrict != NULL) {
//            $clientaddress = $clientaddress . ' | District ' . $client[0]->addrdistrict;
//        }
//        if ($client[0]->addrpostalcode != '' || $client[0]->addrdistrict != NULL) {
//            $clientaddress = $clientaddress . ' (' . $client[0]->addrpostalcode . ')';
//        }
        $opposing = $this->Case_model->select_caseopposing($cid);
        $opposingfullname = $opposing[0]->firstname . ' ' . $opposing[0]->middlename . ' ' . $opposing[0]->lastname;
        $opposingaddress = $opposing[0]->addrtown;
//        $opposingaddress = $opposing[0]->addrhouse . ' ' . $opposing[0]->addrstreet . ' St., ' . $opposing[0]->addrtown;
//        if ($opposing[0]->addrdistrict != '' || $opposing[0]->addrdistrict != NULL) {
//            $opposingaddress = $opposingaddress . ' | District ' . $opposing[0]->addrdistrict;
//        }
//        if ($opposing[0]->addrpostalcode != '' || $opposing[0]->addrdistrict != NULL) {
//            $opposingaddress = $opposingaddress . ' (' . $opposing[0]->addrpostalcode . ')';
//        }

        $this->load->library('word');

        // <editor-fold defaultstate="collapsed" desc="Word file content">
        //our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 16));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'both', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $section->addText('COMPLAINT AFFIDAVIT', 'bStyle', 'uStyle');
        $section->addTextBreak(4);

        $textrun = $section->createTextRun();
        $sentence = "I, $clientfullname, Filipino, of legal age, (single / married / widow), and a resident of $clientaddress, Philippines, after being sworn to in accordance with law, depose and state: ";
        $word_arr = explode(' ', $sentence);
        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 12, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 12, 'name' => 'Times New Roman');
        $understyle = array('align' => 'center', 'size' => 12, 'name' => 'Times New Roman', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE);

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '2':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '3':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '4':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '18':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '19':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }


        $section->addTextBreak(4);

        $textrun = $section->createTextRun();
        $sentence = "1. That I know the person of $opposingfullname, who is a resident of $opposingaddress, Philippines;
                ";
        $word_arr = explode(' ', $sentence);


        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '8':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '9':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '10':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '16':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                case '17':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }
        $section->addTextBreak(4);

        $section->addText('I am therefore executing this Complaint-Affidavit in support of the charges for Violation of ', 'rStyle', 'pStyle');

        $section->addTextBreak(1);

        $textrun = $section->createTextRun();
        $sentence = "Batas Pambansa Bilang 22 against the said $opposingfullname, who may be served with";
        $word_arr = explode(' ', $sentence);


        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '2':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '3':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '4':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '8':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;

                case '9':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;

                case '10':
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }


        $section->addTextBreak(1);

        $section->addText('subpoena and other processes of this Honorable Office at (his/her) last known address at', 'rStyle', 'pStyle');

        $section->addTextBreak(1);

        $textrun = $section->createTextRun();
        $sentence = "$opposingaddress, Philippines;";
        $word_arr = explode(' ', $sentence);

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case count($word_arr):
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
                default:
                    $textrun->addText($word_arr[$i] . ' ', $understyle);
                    break;
            }
        }

        $section->addTextBreak(4);


        $textrun = $section->createTextRun();
        $sentence = 'IN WITNESS WHEREOF, I have hereunto set my hand this _____________ at _____________, Philippines.';
        $word_arr = explode(' ', $sentence);


        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '2':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '3':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }

        $section->addTextBreak(6);
        $section->addText('COMPLAINT', 'bStyle', 'cStyle');
        $section->addTextBreak(1);


        $textrun = $section->createTextRun();
        $sentence = 'SUBSCRIBED AND SWORN to before me this _____________ at _____________.';
        $word_arr = explode(' ', $sentence);
        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 12, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 12, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i ++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '2':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '3':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }

        $section->addTextBreak(1);

        $section->addText('I hereby certify that I have examined the Affiant and that I am fully satisfied that (he/she) has', 'rStyle', 'pStyle');

        $section->addTextBreak(1);

        $section->addText('voluntarily executed and understood the contents of (his/her) Complaint-Affidavit.', 'rStyle', 'pStyle');


        $section->addTextBreak(6);
        $section->addText('Administering Officer', 'rStyle', 'dStyle');

        // </editor-fold>

        $filename = 'Complaint Affidavit.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function MotionToBail() {


        $this->load->library('word');

        //our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 16, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 14, 'name' => 'Times New Roman'));
        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));
        $this->word->addParagraphStyle('lStyle', array('align' => 'left', 'spaceAfter' => 10));
        $section->addText('(Motion to Reduce Bail)', 'rStyle', 'cStyle');
        $section->addTextBreak(1);
        $section->addText('(CAPTION)', 'rStyle', 'cStyle');
        $section->addTextBreak(1);
        $section->addText('MOTION TO REDUCE BAIL', 'bStyle', 'uStyle');
        $section->addTextBreak(2);

        $textrun = $section->createTextRun();

        $sentence = 'ACCUSED, through counsel, by way of a special appearance solely for this purpose,';

        $word_arr = explode(' ', $sentence);

        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 14, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 14, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }

        $section->addTextBreak(2);
        $section->addText('respectfully alleges:', 'rStyle', 'pStyle');
        $section->addTextBreak(3);
        $section->addText('1.   That the accused has been charged with _____________ and that the bail for his provisional release has been set at P_____________;', 'rStyle', null);
        $section->addTextBreak(3);
        $section->addText('2.   That the accused is a poor fellow of very limited means such that it is impossible for him to pay the full amount of his bond and is therefore constrained to request for a reduction of the amount of bail;', 'rStyle', null);
        $section->addTextBreak(3);
        $section->addText('3.   That it would be advantageous to everyone if he be given temporary liberty thereby allowing him to continue with his gainful employment and as head of the family with _____________ dependents;', 'rStyle', null);
        $section->addTextBreak(3);
        $section->addText('4.   As such, accused appeals to the mercy and compassion of this Honorable Court and respectfully requests that his bail be reduced to P_____________.', 'rStyle', null);
        $section->addTextBreak(3);
        $section->addText('5.   That this motion for reduction of bail is being filed without prejudice to any other remedy which may be available to the accused and that the accused expressly reserves the right to question the legality of the issuance of the search warrant or his warrantless arrest if the circumstances would so warrant.', 'rStyle', null);
        $section->addTextBreak(4);

        $textrun = $section->createTextRun();

        $sentence = 'WHEREFORE, accused respectfully prays that his bail be reduced to P_____________.';

        $word_arr = explode(' ', $sentence);

        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 14, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 14, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }

        $section->addTextBreak(2);
        $section->addText('Other relief just and equitable are likewise prayed for.', 'rStyle', null);
        $section->addTextBreak(2);
        $section->addText('_____________, Philippines, __Date__.', 'rStyle', null);
        $section->addTextBreak(6);
        $section->addText('(COUNSEL)', 'rStyle', 'dStyle');
        $section->addTextBreak(4);
        $section->addText('(NOTICE OF HEARING)', 'rStyle', 'cStyle');
        $section->addTextBreak(4);
        $section->addText('(EXPLANATION)', 'rStyle', 'cStyle');
        $section->addTextBreak(4);
        $section->addText('COPY FURNISHED:', 'rStyle', 'lStyle');
        $section->addTextBreak(4);
        $section->addText('OPPOSING COUNSEL', 'rStyle', 'lStyle');

        $filename = 'Motion to Reduce Bail.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function PetitionForBail() {
        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 16, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 14, 'name' => 'Times New Roman'));
        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));
//$this->word->addParagraphStyle('lStyle', array('align' => 'left', 'spaceAfter' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));
        $section->addText('(Petition for Bail - for Non-Bailable Offense)', 'rStyle', 'cStyle');
        $section->addTextBreak(1);
        $section->addText('(CAPTION)', 'rStyle', 'cStyle');
        $section->addTextBreak(1);
        $section->addText('PETITION FOR BAIL', 'bStyle', 'cStyle', 'uStyle');
        $section->addTextBreak(4);

        $textrun = $section->createTextRun();

        $sentence = 'COMES NOW Defendant _____________, by the undersigned counsel and unto this Honorable';

        $word_arr = explode(' ', $sentence);

        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 14, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 14, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '2':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }


        $section->addTextBreak(2);
        $section->addText('Court, most respectfully states:', 'rStyle');
        $section->addTextBreak(2);
        $section->addText('1.   That the Defendant is in custody for the alleged commission of an offense punishable by (life imprisonment / reclusion perpetua); ', 'rStyle');
        $section->addTextBreak(2);
        $section->addText('2.   That no bail has been recommended for (his/her) temporary release, on the assumption that the evidence of guilt is strong; ', 'rStyle');
        $section->addTextBreak(2);
        $section->addText('3.   That the burden of showing that evidence of guilt is strong is on the prosecution, and unless this fact is satisfactorily shown, the defendant is entitled to bail as a matter of right. ', 'rStyle');
        $section->addTextBreak(2);
        $section->addText('P R A Y E R', 'bStyle', 'cStyle');
        $section->addTextBreak(2);

        $textrun = $section->createTextRun();

        $sentence = 'WHEREFORE, upon prior notice and hearing, it is respectfully prayed that the Defendant _____________ be admitted to bail in such amount as this Honorable Court may fix. ';

        $word_arr = explode(' ', $sentence);

        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 14, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 16, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }

        $section->addTextBreak(2);
        $section->addText('_____________, Philippines, __Date__.', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('(COUNSEL)', 'rStyle');
        $section->addTextBreak(2);
        $section->addText('(NOTICE OF HEARING)', 'rStyle', 'cStyle');
        $section->addTextBreak(2);
        $section->addText('(EXPLANATION)', 'rStyle', 'cStyle');
        $section->addTextBreak(3);
        $section->addText('COPY FURNISHED:', 'rStyle');
        $section->addTextBreak(2);
        $section->addText('PROSECUTOR', 'rStyle');

        $filename = 'Petition For Bail.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function PreTrialBrief() {

        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 16, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 14, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $this->word->addParagraphStyle('yStyle', array('align' => 'right', 'spaceBefore' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));

        $section->addText('REPUBLIC OF THE PHILIPPINES', 'bStyle', 'cStyle');
        $section->addText('NATIONAL CAPITAL JUDICIAL REGION', 'bStyle', 'cStyle');
        $section->addText('REGIONAL TRIAL COURT', 'bStyle', 'cStyle');
        $section->addTextBreak(4);

        $section->addText('PEOPLE OF THE PHILIPPINES', 'bStyle', null);
        $section->addTextBreak(1);
        $section->addText('Plaintiff,', 'bStyle', 'cStyle');
        $section->addTextBreak(4);

        $section->addText('-versus-                                        Criminal Case No.______________ ', 'bStyle');
        $section->addTextBreak(1);
        $section->addText('For:________________________', 'rStyle', 'yStyle');
        $section->addTextBreak(3);

        $section->addText('_________________________', 'rStyle');
        $section->addTextBreak(1);
        $section->addText('_________________________', 'rStyle');
        $section->addTextBreak(4);

        $section->addText('PRE-TRIAL BRIEF', 'bStyle', 'cStyle');
        $section->addTextBreak(2);

        $section->addText('ACCUSED _______________, by counsel and unto this Honorable Court respectfully submits herein Pre-trial Brief', 'rStyle', null);
        $section->addTextBreak(3);


        $section->addText('I. SUMMARY OF THE ADMITTED FACTS AND PROPOSED STIPULATION OF FACTS', 'bStyle', null);
        $section->addTextBreak(1);
        $section->addText('II. ISSUES', 'bStyle', null);
        $section->addTextBreak(1);
        $section->addText('III. DOCUMENTARY AND OBJECT EVIDENCE', 'bStyle', null);
        $section->addTextBreak(1);
        $section->addText('IV. WITNESS FOR THE DEFENSE', 'bStyle', null);
        $section->addTextBreak(9);

        $section->addText('RESPECTFULLY SUBMITTED', 'rStyle', null);
        $section->addText('Manila, Philippines', 'rStyle', null);
        $section->addTextBreak(3);

        $section->addText('Defense Counsel', 'rStyle', 'yStyle');
        $section->addTextBreak(3);


        $section->addText('Copy Furnished:', 'bStyle', null);

        $filename = 'Pre-Trial Brief.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function Manifestation() {

        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('eStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $this->word->addParagraphStyle('yStyle', array('align' => 'right', 'spaceBefore' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));

        $section->addText('REPUBLIC OF THE PHILIPPINES', 'bStyle', 'cStyle');
        $section->addText('REGIONAL TRIAL COURT', 'bStyle', 'cStyle');
        $section->addText('NATIONAL CAPITAL JUDICIAL REGION', 'bStyle', 'cStyle');
        $section->addText('BRANCH 29', 'bStyle', 'cStyle');

        $section->addTextBreak(4);

        $section->addText('PEOPLE OF THE PHILIPPINES', 'bStyle', null);
        $section->addTextBreak(1);
        $section->addText('Plaintiff,', 'bStyle', 'cStyle');
        $section->addTextBreak(4);

        $section->addText('-versus-                                        Criminal Case No.______________ ', 'bStyle');
        $section->addTextBreak(1);
        $section->addText('For:________________________', 'rStyle', 'yStyle');
        $section->addTextBreak(3);



        $section->addText('MANIFESTATION', 'bStyle', 'cStyle');
        $section->addTextBreak(2);

        $section->addText('ACCUSED _______________, by counsel and to this Honorable Court respectfully submits herein Pre-trial Brief', 'rStyle', null);
        $section->addTextBreak(3);


        $section->addText('In view of the foregoing, this Manifestation is filed to inform the Honorable Court of this recent development', 'rStyle', null);
        $section->addTextBreak(4);

        $section->addText('RESPECTFULLY SUBMITTED', 'rStyle', null);
        $section->addTextBreak(4);
        $section->addText('City of _________, ____________', 'rStyle', null);
        $section->addTextBreak(3);


        $section->addText('DEVELOPMENTAL LEGAL AID CLINIC (DLAC)', 'bStyle', 'iStyle');
        $section->addText('DE LA SALLE UNIVERSITY - COLLEGE OF LAW', 'bStyle', 'iStyle');
        $section->addText('Counsel for the Accused', 'rStyle');
        $section->addText('2139 Fidel Reyes Street, Malate Manila', 'rStyle');
        $section->addText('Tel No. (02) 523-2036; Mobile Number 0927-9649882', 'rStyle');
        $section->addText('Email Address: lac.ed.dlsu@gmail.com', 'rStyle');
        $section->addTextBreak(3);

        $section->addText('By:', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('Interns', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('(Lawyer)', 'rStyle');
        $section->addTextBreak(4);

        $section->addText('COPY FURNISHED:', 'eStyle', null);
        $section->addTextBreak(3);
        $section->addText('Asst. City Prosecutor', 'rStyle', null);
        $section->addText('RTC Branch 29', 'rStyle', null);
        $section->addText('Manila', 'rStyle', null);


        $filename = 'Manifestation.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function FormalEntryOfAppearance() {

        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('eStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $this->word->addParagraphStyle('yStyle', array('align' => 'right', 'spaceBefore' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));

        $section->addText('REPUBLIC OF THE PHILIPPINES', 'bStyle', 'cStyle');
        $section->addText('REGIONAL TRIAL COURT', 'bStyle', 'cStyle');
        $section->addText('NATIONAL CAPITAL JUDICIAL REGION', 'bStyle', 'cStyle');
        $section->addText('BRANCH 29', 'bStyle', 'cStyle');

        $section->addTextBreak(4);

        $section->addText('PEOPLE OF THE PHILIPPINES', 'bStyle', null);
        $section->addTextBreak(1);
        $section->addText('Plaintiff,', 'bStyle', 'cStyle');
        $section->addTextBreak(4);

        $section->addText('-versus-                                                                           Criminal Case No.______________ ', 'bStyle');
        $section->addTextBreak(1);
        $section->addText('For:________________________', 'rStyle', 'yStyle');
        $section->addTextBreak(3);



        $section->addText('FORMAL ENTRY OF APPEARANCE', 'bStyle', 'cStyle');
        $section->addTextBreak(2);

        $section->addText('THE BRANCH CLERK OF COURT', 'bStyle', null);
        $section->addText('Regional Trial Court', 'rStyle', null);
        $section->addText('City of Manila - Branch 29', 'bStyle', null);
        $section->addTextBreak(3);

        $section->addText('Please enter appearance of the undersigned as counsel for the accused. ___________________, with (his/her) express conformity as indicated below, in this case. Henceforth, kindly address all pertinent notices to the undersigned at the address given below.', 'bStyle', null);
        $section->addTextBreak(3);

        $section->addText('RESPECTFULLY SUBMITTED', 'rStyle', null);
        $section->addTextBreak(4);
        $section->addText('City of _________, ____________', 'rStyle', null);
        $section->addTextBreak(3);


        $section->addText('DEVELOPMENTAL LEGAL AND CLINIC (DLAC)', 'bStyle', 'iStyle');
        $section->addText('DE LA SALLE UNIVERSITY - COLLEGE OF LAW', 'bStyle', 'iStyle');
        $section->addText('Counsel for the Accused', 'rStyle');
        $section->addText('2139 Fidel Reyes Street, Malate Manila', 'rStyle');
        $section->addText('Tel No. (02) 523-2036; Mobile Number 0927-9649882', 'rStyle');
        $section->addText('Email Address: lac.ed.dlsu@gmail.com', 'rStyle');
        $section->addTextBreak(3);

        $section->addText('By:', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('Name of Interns', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('(Lawyer)', 'rStyle');
        $section->addTextBreak(4);

        $section->addText('WITH CONFORMITY', 'bStyle');
        $section->addTextBreak(4);

        $section->addText('COPY FURNISHED:', 'eStyle', null);
        $section->addTextBreak(3);
        $section->addText('Asst. City Prosecutor', 'rStyle', null);
        $section->addText('RTC Branch 29', 'rStyle', null);
        $section->addText('Manila', 'rStyle', null);


        $filename = 'Formal Entry of Appearance.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function JudicialAffidavit() {

        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('eStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $this->word->addParagraphStyle('yStyle', array('align' => 'right', 'spaceBefore' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));

        $section->addText('REPUBLIC OF THE PHILIPPINES', 'bStyle', 'cStyle');
        $section->addText('REGIONAL TRIAL COURT', 'bStyle', 'cStyle');
        $section->addText('NATIONAL CAPITAL JUDICIAL REGION', 'bStyle', 'cStyle');
        $section->addText('______ CITY, BRANCH ______', 'bStyle', 'cStyle');

        $section->addTextBreak(4);

        $section->addText('Petitioner,', 'bStyle', 'cStyle');
        $section->addTextBreak(4);

        $section->addText('-versus-                                                                           Criminal Case No.______________ ', 'bStyle');
        $section->addTextBreak(1);
        $section->addText('For:________________________', 'rStyle', 'yStyle');
        $section->addTextBreak(3);
        $section->addText('Petitioner,', 'bStyle', 'cStyle');



        $section->addText('JUDICIAL AFFIDAVIT', 'bStyle', 'cStyle');
        $section->addText('OF', 'bStyle', 'cStyle');
        $section->addText('________________________', 'bStyle', 'cStyle');
        $section->addTextBreak(6);

        $section->addText('________________________', 'bStyle', 'cStyle');
        $section->addText('Affiant', 'bStyle', 'cStyle');
        $section->addTextBreak(3);


        $textrun = $section->createTextRun();

        $sentence = 'SUBSCRIBED AND SWORN to before me this ____________ at _____________ . ';

        $word_arr = explode(' ', $sentence);

        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 12, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 12, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '2':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '3':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;


                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }

        $section->addText('Affiant exhibiting ________', 'rStyle', null);
        $section->addText('Doc No. ________', 'rStyle', null);
        $section->addText('Page No. ________', 'rStyle', null);
        $section->addText('Book No. ________', 'rStyle', null);
        $section->addText('Series of ________', 'rStyle', null);
        $section->addTextBreak(3);


        $section->addText('Please enter appearance of the undersigned as counsel for the accused. ___________________, with (his/her) express conformity as indicated below, in this case. Henceforth, kindly address all pertinent notices to the undersigned at the address given below.', 'rStyle', null);
        $section->addTextBreak(3);

        $section->addText('RESPECTFULLY SUBMITTED', 'rStyle', null);
        $section->addTextBreak(4);
        $section->addText('City of _________, ____________', 'rStyle', null);
        $section->addTextBreak(3);

        $section->addText('ATTESTATION', 'bStyle', 'cStyle');
        $section->addText('I hereby state, under oath, that I faithfully recorded the questions I asked and the corresponding answers that the witness gave and that neither I nor any other person present or assisting me has coached the witness regarding the latter statement', 'rStyle', null);
        $section->addText('___________', 'rStyle', null);
        $section->addTextBreak(4);



        $textrun = $section->createTextRun();

        $sentence = 'SUBSCRIBED AND SWORN to before me this ____________ at _____________ , Affiant exhibiting to me (his/her) _________ . ';

        $word_arr = explode(' ', $sentence);

        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 12, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 12, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '2':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                case '3':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;


                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }

        $section->addText('Doc No. ________', 'rStyle', null);
        $section->addText('Page No. ________', 'rStyle', null);
        $section->addText('Book No. ________', 'rStyle', null);
        $section->addText('Series of ________', 'rStyle', null);
        $section->addTextBreak(3);


        $section->addText('COPY FURNISHED:', 'eStyle', null);
        $section->addTextBreak(3);
        $section->addText('Office of the City Public Prosecutor', 'rStyle', null);
        $section->addText('_______ City', 'rStyle', null);


        $filename = 'Judicial Affidavit.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function OfferOfEvidence() {

        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('eStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('zStyle', array('italic' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $this->word->addParagraphStyle('yStyle', array('align' => 'right', 'spaceBefore' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));

        $section->addText('REPUBLIC OF THE PHILIPPINES', 'bStyle', 'cStyle');
        $section->addText('REGIONAL TRIAL COURT', 'bStyle', 'cStyle');
        $section->addText('NATIONAL CAPITAL JUDICIAL REGION', 'bStyle', 'cStyle');
        $section->addText('_________ CITY, BRANCH _____, ', 'bStyle', 'cStyle');

        $section->addTextBreak(6);

        $section->addText('                                                                                                    Case No.______________ ', 'bStyle');
        $section->addTextBreak(4);
        $section->addText('FORMAL OF EVIDENCE', 'bStyle', 'cStyle');
        $section->addTextBreak(3);
        $section->addText('GENERAL PURPOSES', 'bStyle', 'cStyle');
        $section->addTextBreak(3);
        $section->addText('(Insert exhibits being offered to prove here)', 'zStyle', 'cStyle');
        $section->addTextBreak(10);


        $section->addText('DEVELOPMENTAL LEGAL AID CLINIC (DLAC)', 'bStyle', 'iStyle');
        $section->addText('DE LA SALLE UNIVERSITY - COLLEGE OF LAW', 'bStyle', 'iStyle');
        $section->addText('Counsel for the Accused', 'rStyle');
        $section->addText('2139 Fidel Reyes Street, Malate Manila', 'rStyle');
        $section->addText('Tel No. (02) 523-2036; Mobile Number 0927-9649882', 'rStyle');
        $section->addText('Email Address: lac.ed.dlsu@gmail.com', 'rStyle');
        $section->addTextBreak(3);

        $section->addText('By:', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('Interns', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('(Lawyer)', 'rStyle');
        $section->addTextBreak(4);

        $section->addText('COPY FURNISHED:', 'eStyle', null);



        $filename = 'Offer Of Evidence.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function NoticeOfAppeal() {

        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('eStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $this->word->addParagraphStyle('yStyle', array('align' => 'right', 'spaceBefore' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));

        $section->addText('REPUBLIC OF THE PHILIPPINES', 'bStyle', 'cStyle');
        $section->addText('REGIONAL TRIAL COURT', 'bStyle', 'cStyle');
        $section->addText('NATIONAL CAPITAL JUDICIAL REGION', 'bStyle', 'cStyle');
        $section->addText('______ CITY, BATCH ____', 'bStyle', 'cStyle');

        $section->addTextBreak(4);

        $section->addText('Petitioner-Appellants,', 'rStyle', null);
        $section->addTextBreak(4);

        $section->addText('-versus-                                           CA G.R. SP No. ______________ ', 'bStyle');
        $section->addTextBreak(6);


        $section->addText('Respondent__-Appellees,', 'rStyle', null);
        $section->addTextBreak(4);


        $section->addText('NOTICE OF APPEAL', 'bStyle', 'cStyle');
        $section->addTextBreak(2);


        $section->addText('____________, by counsel, hereby file this Notice of Appeal from the Decision dated __________ issued by the _________ , Court of Appeals, dismissing the petition for _________ , the same not being in accord with the law, prevailing jurisprudence, and evidence.', 'rStyle', null);

        $section->addTextBreak(6);
        $section->addTextBreak(6);



        $section->addText('RESPECTFULLY SUBMITTED', 'rStyle', null);
        $section->addTextBreak(4);
        $section->addText('City of _________, ____________', 'rStyle', null);

        $section->addTextBreak(6);
        $section->addTextBreak(6);


        $section->addText('DEVELOPMENTAL LEGAL AID CLINIC (DLAC)', 'bStyle', 'iStyle');
        $section->addText('DE LA SALLE UNIVERSITY - COLLEGE OF LAW', 'bStyle', 'iStyle');
        $section->addText('Counsel for the Accused', 'rStyle');
        $section->addText('2139 Fidel Reyes Street, Malate Manila', 'rStyle');
        $section->addText('Tel No. (02) 523-2036; Mobile Number 0927-9649882', 'rStyle');
        $section->addText('Email Address: lac.ed.dlsu@gmail.com', 'rStyle');
        $section->addTextBreak(3);

        $section->addText('By:', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('Interns', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('(Lawyer)', 'rStyle');
        $section->addTextBreak(4);

        $section->addText('COPY FURNISHED:', 'eStyle', null);
        $section->addTextBreak(3);


        $filename = 'Notice of Appeal.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function TrialMemorandum() {

        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('eStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('zStyle', array('italic' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));

        $this->word->addParagraphStyle('yStyle', array('align' => 'right', 'spaceBefore' => 10));
        $this->word->addParagraphStyle('iStyle', array('align' => 'left', 'spaceBefore' => 10));

        $section->addText('REPUBLIC OF THE PHILIPPINES', 'bStyle', 'cStyle');
        $section->addText('REGIONAL TRIAL COURT', 'bStyle', 'cStyle');
        $section->addText('NATIONAL CAPITAL JUDICIAL REGION', 'bStyle', 'cStyle');
        $section->addText('______ CITY, BATCH ____', 'bStyle', 'cStyle');

        $section->addTextBreak(4);


        $section->addText('TRIAL MEMORANDUM', 'bStyle', 'cStyle');
        $section->addTextBreak(4);


        $section->addText('-versus-                                                                           Criminal Case No.______________ ', 'bStyle');

        $section->addTextBreak(6);


        $section->addText('STATEMENT OF FACTS', 'bStyle', 'cStyle');
        $section->addTextBreak(2);
        $section->addText('(Insert facts here in numbered form)', 'zStyle', 'cStyle');
        $section->addTextBreak(4);


        $section->addText('STATEMENT OF ISSUES', 'bStyle', 'cStyle');
        $section->addTextBreak(2);
        $section->addText('(Insert issues here in numbered form)', 'zStyle', 'cStyle');
        $section->addTextBreak(4);

        $section->addText('ARGUMENTS', 'bStyle', 'cStyle');
        $section->addTextBreak(2);
        $section->addText('(Insert arguments here in numbered form)', 'zStyle', 'cStyle');
        $section->addTextBreak(4);


        $section->addText('PRAYER', 'bStyle', 'cStyle');
        $section->addTextBreak(10);



        $section->addText('RESPECTFULLY SUBMITTED', 'rStyle', null);
        $section->addTextBreak(4);
        $section->addText('City of _________, ____________', 'rStyle', null);

        $section->addTextBreak(6);
        $section->addTextBreak(6);


        $section->addText('DEVELOPMENTAL LEGAL AID CLINIC (DLAC)', 'bStyle', 'iStyle');
        $section->addText('DE LA SALLE UNIVERSITY - COLLEGE OF LAW', 'bStyle', 'iStyle');
        $section->addText('Counsel for the Accused', 'rStyle');
        $section->addText('2139 Fidel Reyes Street, Malate Manila', 'rStyle');
        $section->addText('Tel No. (02) 523-2036; Mobile Number 0927-9649882', 'rStyle');
        $section->addText('Email Address: lac.ed.dlsu@gmail.com', 'rStyle');
        $section->addTextBreak(3);

        $section->addText('By:', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('Interns', 'rStyle');
        $section->addTextBreak(3);
        $section->addText('(Lawyer)', 'rStyle');
        $section->addTextBreak(4);

        $section->addText('COPY FURNISHED:', 'eStyle', null);
        $section->addTextBreak(3);


        $filename = 'Trial Memorandum.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    function MotionToQuash() {


        $this->load->library('word');

//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'portrait'));

        $section->addTextBreak(1);
        $this->word->addFontStyle('bStyle', array('bold' => true, 'size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('rStyle', array('size' => 12, 'name' => 'Times New Roman'));
        $this->word->addFontStyle('zStyle', array('italic' => true, 'size' => 12, 'name' => 'Times New Roman'));

        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spacing' => 0));
        $this->word->addParagraphStyle('dStyle', array('align' => 'right', 'spaceAfter' => 100));
        $this->word->addParagraphStyle('uStyle', array('align' => 'center', 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('cStyle', array('align' => 'center', 'spaceAfter' => 10));
        $this->word->addParagraphStyle('lStyle', array('align' => 'left', 'spaceAfter' => 10));
        $section->addText('(Motion to Quash)', 'rStyle', 'cStyle');
        $section->addTextBreak(1);
        $section->addText('(CAPTION)', 'rStyle', 'cStyle');
        $section->addTextBreak(4);
        $section->addText('MOTION TO QUASH', 'bStyle', 'uStyle');
        $section->addTextBreak(3);

        $section->addText('COME NOW DEFENDANTS, by counsel and unto this Honorable Court, most respectfully move to quash the information filed against the defendants on the ground of lack of jurisdiction over the subject matter.', 'rStyle', null);
        $section->addTextBreak(3);

        $section->addText('ARGUMENTS', 'bStyle', 'cStyle');
        $section->addTextBreak(2);
        $section->addText('(Insert arguments here in numbered form)', 'zStyle', 'cStyle');
        $section->addTextBreak(4);

        $section->addText('CONCLUSION', 'bStyle', 'cStyle');
        $section->addTextBreak(2);
        $section->addText('(Insert conclusion here)', 'zStyle', 'cStyle');
        $section->addTextBreak(4);


        $section->addText('PRAYER', 'bStyle', 'cStyle');
        $section->addTextBreak(2);


        $textrun = $section->createTextRun();

        $sentence = 'WHEREFORE, it view of all the foregoing, it is most respectfully prayed that the information be quashed, and defendants discharged.
        ';

        $word_arr = explode(' ', $sentence);

        $styleFont = array('bold' => true, 'align' => 'center', 'size' => 12, 'name' => 'Times New Roman');
        $styleFont2 = array('bold' => false, 'size' => 12, 'name' => 'Times New Roman');

        $c = 0;
        for ($i = 0; $i < count($word_arr); $i++) {
            $c++;
            switch ($c) {
                case '1':
                    $textrun->addText($word_arr[$i] . ' ', $styleFont);
                    break;

                default:
                    $textrun->addText($word_arr[$i] . ' ', $styleFont2);
                    break;
            }
        }


        $section->addTextBreak(4);
        $section->addText('Other relief just and equitable are likewise prayed for.', 'rStyle', null);
        $section->addTextBreak(2);

        $section->addText('____________, Philippines, ___Date__ .', 'rStyle', null);

        $section->addTextBreak(6);

        $section->addTextBreak(6);


        $section->addText('(COUNSEL)', 'rStyle', 'dStyle');
        $section->addTextBreak(4);
        $section->addText('(NOTICE OF HEARING)', 'rStyle', 'cStyle');
        $section->addTextBreak(4);
        $section->addText('(EXPLANATION)', 'rStyle', 'cStyle');
        $section->addTextBreak(4);
        $section->addText('COPY FURNISHED:', 'rStyle', 'lStyle');
        $section->addTextBreak(4);
        $section->addText('OPPOSING COUNSEL', 'rStyle', 'lStyle');

        $filename = 'Motion to Quash.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

// </editor-fold>
}

?>
