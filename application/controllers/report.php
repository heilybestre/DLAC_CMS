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
        if (empty($uid)) {
            redirect('login/index');
        }
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

    function weeklyReport() {
        define('FPDF_FONTPATH', APPPATH . 'plugins/fpdf/font/');
        require(APPPATH . 'plugins/fpdf/fpdf.php');


        $uid = $this->session->userdata('userid');
        if (empty($uid)) {
            redirect('login/index');
        }
        $utype = $this->People_model->getuserfield('type', $uid);
        $username = $this->People_model->getuserfield('firstname', $uid) . ' ' . $this->People_model->getuserfield('lastname', $uid);
        $datestring = "%m/%d/%Y";
        $time = now();
        $datenow = mdate($datestring, $time);

        $pdf = new FPDF();
        $pdf->AddPage();

        // <editor-fold defaultstate="collapsed" desc="HEADER">
        // Logo
        $pdf->Image(base_url() . '/assets/img/logo.png', 80, 10, 50);

        // Prepared by and Date
        $pdf->SetFont('Times', '', 8);  // TIMES REGULAR 8
        $pdf->Cell(140);
        $pdf->Cell(18, 5, 'Prepared By:');
        $pdf->Cell(20, 5, $username, 0, 1);

        $pdf->Cell(140);
        $pdf->Cell(10, 5, 'Date:');
        $pdf->Cell(20, 5, $datenow, 0, 1);
        $pdf->Ln(20);

        // Header
        $pdf->SetFont('Times', 'B', 12); // TIMES BOLD 8
        $pdf->Cell(80);
        $pdf->Cell(18, 5, 'Weekly Report', 0, 1);

        $pdf->Cell(79);
        $pdf->Cell(20, 5, '4th week of July', 0, 1);

        $pdf->SetFont('Times', '', 12); // TIMES REGULAR 8
        $pdf->Cell(75);
        $pdf->Cell(20, 5, 'Term 2 AY 2013-2014', 0, 1);

        // Line break
        $pdf->Ln(20);


        // Case Details
        $cases = $this->Case_model->select_mycaseaccepted($uid);

        foreach ($cases as $case) {

            // Case Title
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Case Title:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, $case->caseName);
            $pdf->Ln();

            // Case Status
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Case Status:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, $case->statusName);
            $pdf->Ln();

            // Case Stage
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Stage of the case:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, $case->stageName);
            $pdf->Ln();

            // Last Incident
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Last Incident:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, '');
            $pdf->Ln();

            // Brief Summary
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Brief Summary:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, '');
            $pdf->Ln();

            // Line break
            $pdf->Ln(20);

            // Timeline Table
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Timeline:');
            $pdf->Ln();

            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $timelines = $this->Case_model->select_caselog($case->caseID, $case->stage);

            $pdf->Cell(15);
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(80, 5, 'Date', 1, 0);
            $pdf->Cell(80, 5, 'Action', 1);
            $pdf->Ln();

            foreach ($timelines as $TL) {
                $pdf->SetFont('Times', '', 10); // TIMES Regular 8
                $pdf->Cell(15);
                $pdf->Cell(80, 5, $TL->dateTime, 1, 0);
                $pdf->Cell(80, 5, $TL->action, 1);
                $pdf->Ln();
            }
            $pdf->AddPage();
        }


        // Line break
        $pdf->Ln(20);
        //$txt = '<html> <body> <h1>table<h1> <table><tr><td>1</td><td>2</td></tr><tr><td>3</td><td>4</td></tr></table></body> </html>';
        //$pdf->Write(5, $txt);
        $pdf->Output();
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
        if (empty($uid)) {
            redirect('login/index');
        }
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
