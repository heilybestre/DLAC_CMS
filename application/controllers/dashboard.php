<?php

//dashboard controller

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->spark('markdown-extra/0.0.0');
    }

    public function index() {
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }

        $utype = $this->People_model->getuserfield('type', $uid);
        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['appointments'] = $this->Calendar_model->select_schedulenow($uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $datestring = "%Y-%m-%d %H:%i %s";
        $time = now();
        $datetimenow = mdate($datestring, $time);
        $data['datetimenow'] = $datetimenow;

        $this->load->view('header');

        switch ($utype) {
            case "1" :
                $data['requests'] = $this->Case_model->select_caserequest();
                $data['transferrequests'] = $this->Case_model->select_transferrequest();
                $data['applications'] = $this->Case_model->select_casepending();
                $data['cases'] = $this->Case_model->select_caseactiveinactive();

                $this->load->view('director/menubar', $data);
                $this->load->view('director/dashboard', $data);
                break;
            case "2" :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/dashboard', $data);
                break;
            case "3" :
                $data['reassignappointments'] = $this->Calendar_model->select_reassign_appointments();
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/dashboard', $data);
                break;
            case "4" :
                $data['cases'] = $this->Case_model->select_mycaseaccepted($uid);
                $data['drafts'] = $this->Case_model->select_mydocumentpending($uid);
                $data['thingstodo'] = $this->Task_model->select_theirtask($uid);

                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/dashboard', $data);
                break;
            case "5" :
                $data['applications'] = $this->Case_model->select_mycasepending($uid);
                $data['cases'] = $this->Case_model->select_mycaseaccepted($uid);
                $data['thingstodo'] = $this->Task_model->select_mytask($uid);

                $data['person'] = $this->People_model->select_person($uid);
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/dashboard', $data);
                break;
        }
        $this->load->view('footer');
    }

}

?>