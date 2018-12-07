<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Controller extends CI_Controller{

    //core功用為controller共通的function
    public function __construct (){
        parent::__construct();
    }
}
?>