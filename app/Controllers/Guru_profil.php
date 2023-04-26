<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;


class Guru_profil extends BaseController
{

    private $ModelGuru = null;
    public function __construct()
    {
        $this->ModelGuru    = new ModelGuru();
        helper('form');
    }
    public function index()
    {
        $id_guru = session('log_auth')['akunID'];
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Profil Guru',
            'dt_guru'   => $this->ModelGuru->where('id_guru', $id_guru)->first()
        ];
        return view('guru/profil/index', $data);
    }
}
