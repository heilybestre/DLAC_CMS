<?php

//people controller

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class People extends CI_Controller {

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

        $data['external'] = $this->People_model->select_external();
        $data['internal'] = $this->People_model->select_internal();

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $this->load->view('director/menubar', $data);
                $this->load->view('director/people', $data);
                break;
            case 2 :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/people', $data);
                break;
            case 3 :
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/people', $data);
                break;
            case 4 :
                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/people', $data);
                break;
            case 5 :
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/people', $data);
                break;
        }
        $this->load->view('footer');
    }

    function profile() {

        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $utype = $this->People_model->getuserfield('type', $uid);

        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $data['person'] = $this->People_model->select_person($uid);
        $data['currentcasehandled'] = $this->People_model->count_currentcase($uid);

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $this->load->view('director/menubar', $data);
                $this->load->view('director/profile', $data);
                break;
            case 2 :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/profile', $data);
                break;
            case 3 :
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/profile', $data);
                break;
            case 4 :
                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/profile', $data);
                break;
            case 5 :
                $data['cases'] = $this->Case_model->select_mycases($uid);
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/profile', $data);
                break;
        }
        $this->load->view('footer');
    }

    function add($person) {
        $this->People_model->insert_client($person);
    }

    function edit($pid) {
        
    }

    function delete($pid) {
        
    }

    function newclient() {
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $utype = $this->People_model->getuserfield('type', $uid);

        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $this->load->view('header');
        $this->load->view('intern/menubar', $data);
        $this->load->view('intern/addnewclient-1');
        $this->load->view('footer');
    }

    function addnewclient() {
        extract($_POST);
        $data = array(
            'type' => 14, //14 = external
            'lastname' => $clientLastName,
            'firstname' => $clientFirstName,
            'middlename' => $clientMiddleName,
            'addrhouse' => $clientAddressHouseNo,
            'addrstreet' => $clientAddressStreet,
            'addrtown' => $clientAddressTown,
            'addrdistrict' => $clientAddressDistrict,
            'addrpostalcode' => $clientAddressPostalCode,
            'contacthome' => $clientCNHome,
            'contactoffice' => $clientCNOffice,
            'contactmobile' => $clientCNMobile,
            'emailaddr' => $clientEmail,
            'fbemailaddr' => $clientFb,
            'referredby' => $clientReferredBy,
            'rbcontact' => $rbContact,
            'sex' => $clientSex,
            'civilstatus' => $clientCivilStatus,
            'birthdate' => $clientBirthday,
            'birthplace' => $clientBirthPlace,
            'jobless' => $clientJobless,
            'salary' => $clientSalary,
            'occupation' => $clientOccupation,
            'organization' => $clientOrganization,
            'organizationaddr' => $clientOrganizationAddress
        );

        $this->add($data);

        $clientid = $this->db->insert_id();
        $this->session->set_userdata('newclientid', $clientid);

        redirect('application/createApplication');
    }

    function addexternal() {
        $data = array(
            'type' => 14, //external
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'middlename' => $this->input->post('middlename'),
            'addrhouse' => $this->input->post('addrhouse'),
            'addrstreet' => $this->input->post('addrstreet'),
            'addrtown' => $this->input->post('addrtown'),
            'addrdistrict' => $this->input->post('addrdistrict'),
            'addrpostalcode' => $this->input->post('addrpostalcode'),
            'contacthome' => $this->input->post('contacthome'),
            'contactoffice' => $this->input->post('contactoffice'),
            'contactmobile' => $this->input->post('contactmobile')
        );

        $this->add($data);

        $data['opposingpartylist'] = $this->People_model->opposingpartylist();
        $data['externals'] = $this->People_model->select_external();
        $data['lastname'] = $this->input->post('lastname');
        $data['firstname'] = $this->input->post('firstname');
        $data['middlename'] = $this->input->post('middlename');
        $data['use'] = $this->input->post('use');
        $data['clientid'] = $this->People_model->select_firstclient();

        $this->load->view('intern/createApplication/dropdowns', $data);
    }

    function internAttendance() {
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $datestring = "%F %j, %Y";
        $datestring2 = "%Y-%m-%d";
        $time = now();
        $datenow = mdate($datestring, $time);
        $datenowdd = mdate($datestring2, $time);

        $data['datenow'] = $datenow;
        $data['datenowdd'] = $datenowdd;
        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $data['interns'] = $this->People_model->select_interns();

        $this->load->view('header');
        $this->load->view('secretary/menubar', $data);
        $this->load->view('secretary/attendanceLogs', $data);
        $this->load->view('footer');
    }

    function attendancelogs() {
        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $datestring = "%F %j, %Y";
        $datestring2 = "%Y-%m-%d";
        $time = now();
        $datenow = mdate($datestring, $time);
        $datenowdd = mdate($datestring2, $time);

        $data['datenow'] = $datenow;
        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $data['residency'] = $this->People_model->select_residency('2014-06-28');

        $this->load->view('header');
        $this->load->view('secretary/menubar', $data);
        $this->load->view('secretary/internmgt', $data);
        $this->load->view('footer');
    }

    function insertResidency() {
        $error = 'blank';
        $x = $_POST['recordsAttendance'];
        $date = $_POST['residencydate'];
        for ($i = 1; $i <= $x; $i++) {

            $pid = $_POST['internname' . $i];
            $timein = $_POST['timestart' . $i];
            $timeout = $_POST['timeend' . $i];

            $available = $this->People_model->check_residency($pid, $date, $timein, $timeout);

            if ($available->Available) {
                $changes = array(
                    'userID' => $pid,
                    'date' => $date,
                    'timeStarted' => $timein,
                    'timeEnded' => $timeout,
                );
                $this->People_model->insert_residency($changes);
            } else {
                $error = "An intern was not logged properly. Please <a href='people/internAttendance'>try again.</a>";
            }
        }

        if ($error = 'blank') {
            redirect('people/internAttendance?recorded=yes');
        } else {
            echo $error;
        }
    }

    function showinterns() {
        $interns = $this->People_model->internlist();
        $count = 0;
        $arrinterns = array();

        foreach ($interns as $i) {
            $arrinterns[$count] = $i->personID;
            $count++;
        }

        // //var_dump($arrinterns);
        // $arr = array();
        // $arr[0] = "Mark Reed";
        // $arr[1] = "34";
        // $arr[2] = "Australia";

        echo json_encode($arrinterns);
        exit();
    }

    function showspecializedlawyers($offenseID) {
        $lawyers = $this->People_model->select_specialized($offenseID);
        $count = 0;
        $arrlawyers = array();

        foreach ($lawyers as $l) {
            $arrlawyers[$count] = $i->firstname . ' ' . $i->lastname . ' (' . $i->difficultyLevel . ')';
            $count++;
        }

        echo json_encode($arrlawyers);
        exit();
    }

    // function showname($id){
    //     $name = $this->People_model->getuserfield('firstname', $id) . ' ' . $this->People_model->getuserfield('lastname', $id);
    //     echo $name;
    // }
    function showname() {
        $id = $this->input->post('id');
        $name = $this->People_model->getuserfield('firstname', $id) . ' ' . $this->People_model->getuserfield('lastname', $id);
        echo json_encode($name);
        exit();
    }

}

?>
