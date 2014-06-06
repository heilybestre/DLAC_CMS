<?php

//login controller

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->spark('markdown-extra/0.0.0');
    }

    function index() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length(50)|xaa_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length(50)|xaa_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('loginheader');
            $this->load->view('loginbody');
            $this->load->view('loginfooter');
        } else {
            //process their input and login the user            
            extract($_POST); //Gets everything $username $password

            $userid = $this->People_model->login($username, $password);

            if (!$userid) {
                //login failed error
                $this->session->set_flashdata('login_error', TRUE);
                redirect('login/index');
            } else {
                //logem in
                //admin privileges

                $login_data = array(
                    'logged_in' => TRUE,
                    'userid' => $userid
                    );
                $this->session->set_userdata($login_data);
                $this->session->set_userdata('cid', '0');
                redirect('dashboard/');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();

        //Delete cookies
        foreach($_COOKIE AS $key => $value) {
           SETCOOKIE($key,$value,TIME()-10000,"/",".domain.com");
       }
       redirect('login/');
   }

}

?>
