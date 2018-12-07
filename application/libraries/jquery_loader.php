<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jquery_loader {

    private $_CI;
    public function __construct(){
        $this->_CI = & get_instance();
    }

    public function package ($package){
        $this->_CI->load->config('ver');
        $version = $this->_CI->config->item('ver');

        if(!isset($version[$package])){
            exit('no file search');
        }
        $folder ='api/'.$package;
        $package_ver = $version[$package];
        $file_path = array (
            'package'=>$folder.'/'.$package_ver.'/',
        );
        foreach($file_path as $value){
            echo '<script src="'.base_url().$value.$package.'.min.js" ></script>';
        }
    }
}

?>