<?php

class Jquery_loader_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->library('Jquery_loader');
        $this->obj = $this->CI->jquery_loader;
    }

    public function test_package()
    {
        $actual = $this->obj->package('jquery');
        $expected = array(
            0 => 'api/jquery/3.1.1/',
        );

        $this->assertEquals($expected[0], $actual[0]);
    }

    public function test_js_loader()
    {

        $actual = $this->obj->js_loader('js_test');
        $expected = array(
            0 => 'js/js_test.js',
        );

        $this->assertEquals($expected[0], $actual[0]);

    }

    public function test_css_loader()
    {
        $actual = $this->obj->css_loader('css_test');
        $expected = array(
            0 => 'css/css_test.css',
        );
        $this->assertEquals($expected[0], $actual[0]);
    }

}
