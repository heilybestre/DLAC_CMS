<?php

// draft controller

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archive extends CI_Controller {

    function __construct() {
        parent::__construct();
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

        $data['archives'] = $this->Case_model->select_caseclosed();

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $this->load->view('director/menubar', $data);
                $this->load->view('director/archive', $data);
                break;
            case 2 :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/archive', $data);
                break;
            case 3 :
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/archive', $data);
                break;
            case 4 :
                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/archive', $data);
                break;
            case 5 :
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/archive', $data);
                break;
        }
        $this->load->view('footer');
    }

    function view($cid) {
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $utype = $this->People_model->getuserfield('type', $uid);

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
        $data['casecloseclient'] = $this->Case_model->select_closeclient($cid);
        $data['caseopposing'] = $this->Case_model->select_caseopposing($cid);
        $data['casecloseopposing'] = $this->Case_model->select_closeopposing($cid);
        $data['casepeople'] = $this->Case_model->select_casepeople($cid);
        $data['casecloseinterns'] = $this->Case_model->select_closecaseinterns($cid);
        $data['casecloselawyers'] = $this->Case_model->select_closecaselawyers($cid);

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $data['casecondition'] = $this->Case_model->select_condition($cid);

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
        // </editor-fold>
    }

}

?>
