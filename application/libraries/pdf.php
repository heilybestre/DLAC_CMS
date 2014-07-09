<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pdf {

    function pdf() {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load($param = NULL) {
        include_once APPPATH . 'third_party/mpdf/mpdf.php';

        if ($params == NULL) {
            $param = '"en-GB-x","Letter","12","Arial",20,20,10,20,9,9';
        }

        return new mPDF($param);
    }

}
