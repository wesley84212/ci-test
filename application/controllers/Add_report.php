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

    public function get_report_detail()
    {
        $input=$this->input->post();
        $this->load->model('add_report_model');
        $result = $this->add_report_model->get_report_detail($input);
    }

    public function update_report()
    {
        $input=$this->input->post();
        $this->load->model('add_report_model');
        $result = $this->add_report_model->update_report($input);
    }

    public function insert_report()
    {
        $input=$this->input->post();
        $this->load->model('add_report_model');
        $result = $this->add_report_model->insert_report($input);
    }

    public function delete_report()
    {
        $input =$this->input->post();
        $this->load->model('add_report_model');
        $result=$this->add_report_model->delete_report($input);
    }
}
