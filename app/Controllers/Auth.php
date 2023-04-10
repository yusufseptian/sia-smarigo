<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Login'
        ];
        return view('templates/login', $data);
    }
}
