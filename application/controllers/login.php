<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public $user = array();

    public function get_user()
    {
        $input = $this->input->post();
        print_r($input);
        if ($input['name'] === 'wesley' && $input['password'] === '0000') {
            echo '200';

        } else {
            header("Location: " . base_url() . "");
            echo '400';
        }

    }
    public function user_count()
    {
        return sizeof($this->user);
    }

}
