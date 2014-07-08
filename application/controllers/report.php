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

        // <editor-fold defaultstate="collapsed" desc="Logo">
        $pdf->Image(base_url() . '/assets/img/logo.png', 80, 10, 50);
        // </editor-fold>
        // 
        // <editor-fold defaultstate="collapsed" desc="Prepared by and Date">
        $pdf->SetFont('Times', '', 8);  // TIMES REGULAR 8
        $pdf->Cell(140);
        $pdf->Cell(18, 5, 'Prepared By:');
        $pdf->Cell(20, 5, $username, 0, 1);

        $pdf->Cell(140);
        $pdf->Cell(10, 5, 'Date:');
        $pdf->Cell(20, 5, $datenow, 0, 1);
        $pdf->Ln(20);
        // </editor-fold>
        // 
        // <editor-fold defaultstate="collapsed" desc="Report Header">
        $pdf->SetFont('Times', 'B', 12); // TIMES BOLD 8
        $pdf->Cell(80);
        $pdf->Cell(18, 5, 'Weekly Report', 0, 1);

        $pdf->Cell(79);
        $pdf->Cell(20, 5, '4th week of July', 0, 1);

        $pdf->SetFont('Times', '', 12); // TIMES REGULAR 8
        $pdf->Cell(75);
        $pdf->Cell(20, 5, 'Term 2 AY 2013-2014', 0, 1);
        // </editor-fold>
        // 
        // Line break
        $pdf->Ln(20);


        // <editor-fold defaultstate="collapsed" desc="Report Header">
        $cases = $this->Case_model->select_mycaseaccepted($uid);

        foreach ($cases as $case) {

            // <editor-fold defaultstate="collapsed" desc="Case Title">
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Case Title:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, $case->caseName);
            $pdf->Ln();
            // </editor-fold>
            // 
            // <editor-fold defaultstate="collapsed" desc="Case Status">
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Case Status:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, $case->statusName);
            $pdf->Ln();
            // </editor-fold>
            // 
            // <editor-fold defaultstate="collapsed" desc="Case Stage">
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Stage of the case:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, $case->stageName);
            $pdf->Ln();
            // </editor-fold>
            // 
            // <editor-fold defaultstate="collapsed" desc="Last Incident">
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Last Incident:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, '');
            $pdf->Ln();
            // </editor-fold>
            // 
            // <editor-fold defaultstate="collapsed" desc="Brief Summary">
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Brief Summary:  ');
            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $pdf->Write(5, '');
            $pdf->Ln();
            // </editor-fold>
            // Line break
            $pdf->Ln(20);

            // <editor-fold defaultstate="collapsed" desc="Timeline Table">
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(15);
            $pdf->Write(5, 'Timeline:');
            $pdf->Ln();
            // </editor-fold>

            $pdf->SetFont('Times', '', 10); // TIMES REGULAR 8
            $timelines = $this->Case_model->select_weekly_log($case->caseID, $case->stage);

            // <editor-fold defaultstate="collapsed" desc="Table Header">
            $pdf->Cell(15);
            $pdf->SetFont('Times', 'B', 10); // TIMES BOLD 8
            $pdf->Cell(80, 5, 'Date', 1, 0);
            $pdf->Cell(80, 5, 'Action', 1);
            $pdf->Ln();
            // </editor-fold>

            $pdf->SetFont('Times', '', 10); // TIMES Regular 8
            if (!empty($timelines)) {
                foreach ($timelines as $TL) {

                    $pdf->Cell(15);
                    $pdf->Cell(80, 5, $TL->dateTime, 1, 0);
                    $pdf->Cell(80, 5, $TL->action, 1);
                    $pdf->Ln();
                }
            } else {
                $pdf->Cell(15);
                $pdf->Cell(160, 5, 'No data Available', 1, 0, 'C');
            }
            $pdf->AddPage();
        }
        // </editor-fold>
        // Line break
        $pdf->Ln(20);
        //$txt = '<html> <body> <h1>table<h1> <table><tr><td>1</td><td>2</td></tr><tr><td>3</td><td>4</td></tr></table></body> </html>';
        //$pdf->Write(5, $txt);
        $pdf->Output();
    }

    function casesReport() {
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

        // <editor-fold defaultstate="collapsed" desc="Logo">
        $pdf->Image(base_url() . '/assets/img/logo.png', 80, 10, 50);
        $pdf->Ln(20);
        // </editor-fold>
        //
        // <editor-fold defaultstate="collapsed" desc="Report Header">
        $pdf->SetFont('Times', 'B', 12); // TIMES BOLD 8
        $pdf->Cell(83);
        $pdf->Cell(25, 5, 'Case Report', 0, 1);

        $pdf->SetFont('Times', '', 12); // TIMES REGULAR 8
        $pdf->Cell(81);
        $pdf->Cell(30, 5, 'AY 2013-2014', 0, 1);
        $pdf->Ln(20);
        // </editor-fold>
        //
        // <editor-fold defaultstate="collapsed" desc="Content">
        $pdf->SetFont('Times', 'B', 20); // TIMES BOLD 20
        $pdf->Cell(55);
        $pdf->Cell(30, 5, 'Ongoing and Closed Cases', 0, 1);
        $pdf->Ln(20);

        $countOngoing = $this->Case_model->count_ongoing();
        $countClosed = $this->Case_model->count_closed();

        $pdf->Cell(30);
        $pdf->SetFont('Times', 'B', 10); // TIMES Bold 10
        $pdf->Cell(30, 5, 'Ongoing Cases:  ', 1, 0);

        $pdf->SetFont('Times', '', 10); // TIMES Regular 10
        $pdf->Cell(30, 5, $countOngoing->count, 1, 1);

        $pdf->Cell(30);
        $pdf->SetFont('Times', 'B', 10); // TIMES Bold 10
        $pdf->Cell(30, 5, 'Closed Cases:  ', 1, 0);

        $pdf->SetFont('Times', '', 10); // TIMES Regular 10
        $pdf->Cell(30, 5, $countClosed->count, 1, 1);

        $pdf->SetFont('Times', '', 11); // TIMES Regular 12
        $pdf->SetXY(23, 266);

        $pdf->Cell(170, 5, '12/F Br. Andrew Hall, 2401 Taft Avenue, 1004 Manila, Philippines | Direct Line: (632) 3029167 | Trunk', 0, 1);
        $pdf->Cell(50);

        $pdf->Cell(57, 5, 'Line: (632) 524-4611 loc. 285, 286', 0, 0);

        $pdf->SetFont('Times', 'U', 11); // TIMES Regular 12
        $pdf->Cell(30, 5, 'www.dlsu.edu.ph', 0, 0, 'L', false, 'http://www.dlsu.edu.ph/');
        // </editor-fold>
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
