<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Home'
        ];
        return view('templates/index', $data);
    }
}
