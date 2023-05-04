<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelKelas;
use App\Models\ModelMapel;
use App\Models\ModelTahunAjar;

class Jadwal extends BaseController
{
    private $ModelJadwal = null;
    private $ModelMapel = null;
    private $ModelGuru = null;
    private $ModelKelas = null;
    private $ModelThajar = null;
    public function __construct()
    {
        $this->ModelJadwal  = new ModelJadwal();
        $this->ModelMapel   = new ModelMapel();
        $this->ModelGuru    = new ModelGuru();
        $this->ModelKelas   = new ModelKelas();
        $this->ModelThajar  = new ModelTahunAjar();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Jadwal',
            'dt_jadwal' => $this->ModelJadwal->getDataJadwal(),
            'dt_mapel'  => $this->ModelMapel->findAll(),
            'dt_guru'   => $this->ModelGuru->findAll(),
            'dt_kelas'  => $this->ModelKelas->findAll(),
            'hari'      => $this->hari
        ];
        return view('admin/jadwal/index', $data);
    }
    public function insertData()
    {
        $dt_th_ajar = $this->ModelThajar->first();

        $data = [
            'mapel_id' => $this->request->getPost('mapel_id'),
            'guru_id' => $this->request->getPost('guru_id'),
            'kelas_id' => $this->request->getPost('kelas_id'),
            'hari' => $this->request->getPost('hari'),
            'jam_mengajar' => $this->request->getPost('jam_mengajar'),
            'tahun_ajaran' => $dt_th_ajar['id']
        ];
        $this->ModelJadwal->insert($data);
        return redirect()->to(base_url('jadwal'))->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($jadwal_id)
    {
        $data = [
            'mapel_id' => $this->request->getPost('mapel_id'),
            'jam_mengajar' => $this->request->getPost('jam_mengajar'),
        ];
        $this->ModelJadwal->update($jadwal_id, $data);
        return redirect()->to(base_url('jadwal'))->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($jadwal_id)
    {
        $this->ModelJadwal->delete($jadwal_id);
        return redirect()->to(base_url('jadwal'))->with('danger', 'Data berhasil dihapus');
    }
}
