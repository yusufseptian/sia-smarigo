<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Dashboard'
        ];
        return view('templates/index', $data);
    }
}
