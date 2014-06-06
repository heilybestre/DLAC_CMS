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

}

?>
