<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_user_model extends CI_Model
{
    public function get_user_list()
    {

        $this->load->database();

        $sorting = $this->db->escape_str($this->input->get('jtSorting'));

        $sorting_and_paging = $sorting === '' ? '' : ' ORDER BY ' . $sorting;
        if ($this->input->get('jtPageSize') && $this->input->get('jtStartIndex') !== false) {
            $sorting_and_paging .= ' LIMIT ' . $this->input->get('jtPageSize') . ' OFFSET ' . $this->input->get('jtStartIndex');
        }
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM user_information WHERE perm ='0' ";
        $sql .= $sorting_and_paging;
        $query = $this->db->query($sql);
        $sql = "select found_rows() as TotalRecordCount";
        $total = $this->db->query($sql);
        $total_result = $total->row_array();

        $array_list = array();
        foreach ($query->result() as $row) {
            $token = base64_encode($row->id);
            $array_list[] = array(
                'name' => $row->name,
                'password' => $row->password,
                'email' => $row->email,
                'perm' => $row->perm,
                'token' => $token,
                'TotalRecordCount' => $total_result['TotalRecordCount'],
            );
        }

        return ($array_list);
    }

    public function update_user($input)
    {
        $this->load->database();
        $token = base64_decode($input['token']);
        $this->db->where('id', $token);
        unset($input['token']);
        $this->db->trans_start();
        $this->db->update('user_information', $input);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
            return 'error';
        } else {
            return 'success';
        }
    }

    public function delete_user($input)
    {
        $this->load->database();
        $token = base64_decode($input['token']);
        $this->db->where('id', $token);
        unset($input['token']);
        $query = $this->db->delete('user_information', $input);
        if ($query === true) {
            return 'success';
        } else {
            return 'error';
        }
    }

}
