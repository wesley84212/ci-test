<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public $user = array();

    public function get_user()
    {
        $input = $this->input->post();

        $this->load->model('login_model');
        $result = $this->login_model->get_user($input);
        if ($result['status'] === '200') {
            header("Location: " . base_url() . "login/login_page");
        } else {
            header("Location: " . base_url());
            echo json_encode($result);
        }

    }

    public function login_page()
    {
        
        if (isset($this->session->username)) {
            $user = $this->session->username;
            $this->load->model('add_report_model');
            $Field=$this->add_report_model->get_report_list($user);
            $data['field']=$Field;
            $this->load->view('login_page', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function register()
    {
        $input = $this->input->post();
        $this->load->model('login_model');
        $result = $this->login_model->register($input);
        echo $result;
    }
}
