<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_report_model extends CI_Model
{
    public function get_report_list($input)
    {
        $this->load->database();
        $this->db->select('name');
        $this->db->from('report');
        $this->db->where('owner', $input);
        $this->db->where('active', '1');
        $query = $this->db->get();
        $array_list =[];
        foreach ($query->result() as $row){
            array_push($array_list,$row->name);
        }
        return $array_list;
    }

    public function get_report_detail($input)
    {
        $this->load->database();
        $this->db->select('content');
        $this->db->from('report');
        $this->db->where('owner',$input['owner']);
        $this->db->where('name', $input['report_name']);
        $this->db->where('active', '1');
        $query = $this->db->get();
        
        foreach ($query->result() as $row){
            echo $row->content;
        }
    }

    public function update_report($input)
    {
        $this->load->database();       
        $this->db->where('owner',$input['owner']);
        $this->db->where('name', $input['report_name']);
        unset($input['owner']);
        unset($input['report_name']);
        $this->db->trans_start();
        $this->db->update('report',$input);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
            echo 'error';
        } else {
            echo 'success';
        }
    }

    public function insert_report ($input)
    {
        $this->load->database();
        $this->db->trans_start();
            $this->db->insert('report', $input);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                echo 'error';
            } else {
                echo 'success';
            }
    }
        
}
