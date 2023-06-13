<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelOrtu;
use App\Models\ModelSiswa;

class Ortu_profil extends BaseController
{

    private $ModelOrtu = null;
    private $ModelSiswa = null;

    public function __construct()
    {
        $this->ModelOrtu  = new ModelOrtu();
        $this->ModelSiswa = new ModelSiswa();
        helper('form');
    }
    public function index()
    {
        $id_ortu = session('log_auth')['akunID'];
        $dtOrtu = $this->ModelOrtu->where('id_orangtua', $id_ortu)->first();
        if (is_null($dtOrtu['nis_siswa'])) {
            session()->setFlashdata('danger', 'Data anak anda tidak ditemukan, silahkan hubungi admin');
            return $this->redirectBack();
        }
        $dtSiswa = $this->ModelSiswa->where('nis', $dtOrtu['nis_siswa'])->join('kelas', 'kelas.id_kelas=siswa.id_kelas')->first();
        if (empty($dtSiswa)) {
            session()->setFlashdata('danger', 'Data anak anda tidak ditemukan, silahkan hubungi admin');
            return $this->redirectBack();
        }
        $data = [
            'title'     => 'Siasmarigo',
            'sub_title' => 'Profil Orang Tua',
            'dt_ortu'   => $dtOrtu,
            'dt_siswa'  => $dtSiswa
        ];
        return view('ortu/profil/index', $data);
    }
}
