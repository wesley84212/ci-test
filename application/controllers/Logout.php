<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout extends CI_Controller
{
    public function clear_session()
    {
        $this->session->unset_userdata('username');
        if (!isset($this->session->username)) {
            header("Location: " . base_url());
        }
    }
}
