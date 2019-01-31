<?php

class Login_test extends TestCase
{
    public function test_get_user()
    {
        $userName = 'wesley';
        $userPassword = '0000';
        $userinfo = array(
            'name' => $userName,
            'password' => $userPassword,
        );
        $output = $this->request('POST', 'login/get_user', $userinfo);
        // $user = new \login($userName, $userPassword);
        // $user->get_user( $userinfo);
        $this->assertContains('200', $output);

    }
}
