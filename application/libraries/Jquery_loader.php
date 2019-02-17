<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jquery_loader
{

    private $_CI;
    public function __construct()
    {
        $this->_CI = &get_instance();
    }

    public function package($package)
    {
        $this->_CI->load->config('ver');
        $version = $this->_CI->config->item('ver');
        $package_array = [];

        if (!isset($version[$package])) {
            exit('no file search');
        }

        $folder = 'api/' . $package;
        $package_ver = $version[$package];
        $file_path = array(
            'package' => $folder . '/' . $package_ver . '/',
        );
        foreach ($file_path as $value) {

            array_push($package_array, $value); //get test return
            echo '<script src="' . base_url() . $value . $package . '.min.js" ></script>';
        }

        return ($package_array);
    }

    public function js_loader($js_file)
    {
        $js_loader_array = [];

        $folder = 'js/';
        $file_path = array(
            'file' => $folder . $js_file . '.js',
        );
        foreach ($file_path as $value) {
            array_push($js_loader_array, $value);
            echo '<script src="' . base_url() . $value . '" ></script>';
        }
        return ($js_loader_array);
    }

    public function css_loader($css_file)
    {
        $css_loader_array = [];

        $folder = 'css/';
        $file_path = array(
            'file' => $folder . $css_file . '.css',
        );
        foreach ($file_path as $value) {
            array_push($css_loader_array, $value);
            echo '<link rel="stylecheet" href="' . base_url() . $value . '" type="text/css">';
        }
        return ($css_loader_array);
    }

}
