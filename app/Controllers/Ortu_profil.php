<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelOrtu;

class Ortu_profil extends BaseController
{

    private $ModelOrtu = null;
    public function __construct()
    {
        $this->ModelOrtu    = new ModelOrtu();
        helper('form');
    }
    public function index()
    {
        $id_ortu = session('log_auth')['akunID'];
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Profil Orang Tua',
            'dt_ortu'   => $this->ModelOrtu->where('id_orangtua', $id_ortu)->first()
        ];
        return view('ortu/profil/index', $data);
    }
}
