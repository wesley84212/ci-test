<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Super_user extends CI_Controller
{
    public function get_user_list()
    {
        $this->load->model('super_user_model');
        $result = $this->super_user_model->get_user_list();
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $result;
        $jTableResult['TotalRecordCount'] = $result[0]['TotalRecordCount'];
        print json_encode($jTableResult);
    }

    public function update_user()
    {
        $input = $this->input->post();
        $this->load->model('super_user_model');
        $result = $this->super_user_model->update_user($input);
        if ($result === 'success') {
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            print json_encode($jTableResult);
        } else {
            $jTableResult = array();
            $jTableResult['Result'] = "ERROR";
            print json_encode($jTableResult);
        }

    }
    public function delete_user()
    {
        $input = $this->input->post();
        $this->load->model('super_user_model');
        $result = $this->super_user_model->delete_user($input);
        if ($result === 'success') {
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            print json_encode($jTableResult);
        } else {
            $jTableResult = array();
            $jTableResult['Result'] = "ERROR";
            print json_encode($jTableResult);
        }
    }
}
