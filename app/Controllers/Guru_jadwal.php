<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelKelas;
use App\Models\ModelMapel;

class Guru_jadwal extends BaseController
{
    private $ModelJadwal = null;
    private $ModelMapel = null;
    private $ModelGuru = null;
    private $ModelKelas = null;
    public function __construct()
    {
        $this->ModelJadwal  = new ModelJadwal();
        $this->ModelMapel   = new ModelMapel();
        $this->ModelGuru    = new ModelGuru();
        $this->ModelKelas   = new ModelKelas();
        helper('form');
    }
    public function index()
    {
        $id_guru = session('log_auth')['akunID'];
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Jadwal Mata Pelajaran',
            'dt_jadwal' => $this->ModelJadwal->getDataJadwal($id_guru),
            'dt_mapel'  => $this->ModelMapel->findAll(),
            'dt_guru'   => $this->ModelGuru->findAll(),
            'dt_kelas'  => $this->ModelKelas->findAll(),
            'hari'      => $this->hari
        ];
        return view('guru/jadwal/index', $data);
    }
}
