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
        foreach ($actual as $category) {
            $this->assertEquals($expected[0], $actual[0]);
        }

    }

    // public function test_js_loader()
    // {
    //     $actual = $this->obj->js_loader('test');
    //     $this->assertContains('success', $actual);

    // }

}
