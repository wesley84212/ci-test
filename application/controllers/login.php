<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public $user = array();

    public function get_user()
    {
        $input = $this->input->post();
        if ($input['name'] === 'wesley' && $input['password'] === '0000') {
            $this->user['0'] = $input;
            echo '200';
        } else {
            echo '400';
        }

    }
    public function user_count()
    {
        return sizeof($this->user);
    }

}
