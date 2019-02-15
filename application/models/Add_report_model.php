<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_report_model extends CI_Model
{
    public function get_report_list($input)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('user', $input);
        $this->db->where('active', '1');
        $query = $this->db->get();
        return $query->result();
    }
}
