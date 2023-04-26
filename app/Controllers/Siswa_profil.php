<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;

class Siswa_profil extends BaseController
{

    private $ModelSiswa = null;
    public function __construct()
    {
        $this->ModelSiswa    = new ModelSiswa();
        helper('form');
    }
    public function index()
    {
        $id_siswa = session('log_auth')['akunID'];
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Profil Siswa',
            'dt_siswa'   => $this->ModelSiswa->where('id', $id_siswa)->first()
        ];
        return view('siswa/profil/index', $data);
    }
}
