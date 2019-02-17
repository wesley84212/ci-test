<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function get_user($array)
    {
        $result;
        $this->load->database();

        $this->db->select('*');
        $this->db->from('user_information');
        $this->db->where('name', $array['name']);
        $this->db->where('password', $array['password']);

        $query = $this->db->get();
        if (($query->num_rows()) > 0) {
            foreach($query->result() as $row){
                $this->session->userinfo = array(
                    'name'=>$row->name,
                    'perm'=>$row->perm,
                );
            }
            
            $result = array(
                'status' => '200',
            );
        } else {
            $result = array(
                'status' => '400',
                'error_msg' => '帳號或密碼錯誤',
            );
        }
        return $result;
    }

    public function register($input)
    {
        $this->load->database();
        $this->db->select('name');
        $this->db->from('user_information');
        $this->db->where('name', $input['name']);
        $query = $query = $this->db->get();
        if ($query->num_rows() > 0) {
            echo '此帳號已使用';
        } else {
            $this->db->trans_start();
            $this->db->insert('user_information', $input);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                return 'error';
            } else {
                return 'success';
            }
        }
    }
}
