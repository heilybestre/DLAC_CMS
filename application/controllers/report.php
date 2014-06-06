<?php

//reports controller

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->spark('markdown-extra/0.0.0');
    }

    function index() {
        $uid = $this->session->userdata('userid');
        $utype = $this->People_model->getuserfield('type', $uid);

        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $this->load->view('header');
        switch ($utype) {
            case 1 :
                $this->load->view('director/menubar', $data);
                $this->load->view('director/reports', array('error' => ' '), $data);
                break;
            case 2 :
                $this->load->view('assistant/menubar', $data);
                $this->load->view('assistant/reports', $data);
                break;
            case 3 :
                $this->load->view('secretary/menubar', $data);
                $this->load->view('secretary/reports', $data);
                break;
            case 4 :
                $this->load->view('lawyer/menubar', $data);
                $this->load->view('lawyer/reports', $data);
                break;
            case 5 :
                $this->load->view('intern/menubar', $data);
                $this->load->view('intern/reports', $data);
                break;
        }
        $this->load->view('footer');
    }

    function viewpdf() {

        define('FPDF_FONTPATH', APPPATH . 'plugins/fpdf/font/');
        require(APPPATH . 'plugins/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Hello World!');
        $pdf->Output('sample.pdf', 'D');
    }

    function uploadme() {
        $uid = $this->session->userdata('userid');
        $data['image'] = $this->People_model->getuserfield('image', $uid);
        $data['name'] = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);

        $data['notifs'] = $this->Notification_model->select_notifs($uid);
        $data['notifcount'] = $this->Notification_model->select_count_unread($uid);

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '99999';
        $config['max_height'] = '99999';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $data['error'] = ' ';

        if (!$this->upload->do_multi_upload("userfile")) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('header');
            $this->load->view('director/menubar', $data);
            $this->load->view('director/reports', $data);
            $this->load->view('footer');
        } else {

            //$data2['uploadfiles'] = $this->upload->get_multi_upload_data();
            $data2['multi'] = $this->upload->get_multi_upload_data();

            foreach ($data2 as $arr) {
                foreach ($arr as $file) {
                    $changes = array(
                        'caseID' => 1,
                        'doctype' => 1,
                        'stage' => 1,
                        'dateprepared' => '2014-03-10',
                        'file_type' => $file['file_type'],
                        'file_path ' => $file['full_path'],
                        'file_name ' => $file['raw_name'],
                        'file_ext' => $file['file_ext'],
                        'file_size' => $file['file_size'],
                        'status' => 'pending'
                    );

                    $this->Case_model->insert_casedocument(1, $changes);
                }
            }
        }
    }

}

?>
