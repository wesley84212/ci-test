<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Add_report extends CI_Controller
{
    public function get_report_list()
    {
        $this->load->model('add_report_model');
        $user = $this->session->username;
        $result = $this->add_report_model->get_report_list($user);
        print_r($result);
    }
}
