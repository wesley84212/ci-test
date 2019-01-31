<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function get_user($input)
    {

        $this->load->database();
        $query = $this->db->query('SELECT name,password FROM user_information');
        foreach ($query->result() as $row) {

        }

    }
}
