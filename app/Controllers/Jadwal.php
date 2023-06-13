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
        $dtKelas = $this->ModelKelas->join('guru', 'wali_Kelas_id=id_guru')->where('wali_kelas_id is not null')->findAll();
        if (count($dtKelas) == 0) {
            session()->setFlashdata('danger', 'Data mata pelajaran masih kosong. Pastikan kelas sudah ada wali kelasnya.');
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Jadwal Guru',
            'dt_jadwal' => $this->ModelJadwal->getDataJadwal(),
            'dt_mapel'  => $this->ModelMapel->findAll(),
            'dt_guru'   => $this->ModelGuru->findAll(),
            'dt_kelas'  => $dtKelas,
            'hari'      => $this->hari
        ];
        return view('admin/jadwal/index', $data);
    }
    public function insertData()
    {
        $dt_th_ajar = $this->ModelThajar->getTANow();
        $dtMapel = $this->ModelMapel->find($this->request->getPost('mapel_id'));
        if (empty($dtMapel)) {
            session()->setFlashdata('danger', 'Data mapel tidak ditemukan');
            return $this->redirectBack();
        }
        $dtKelas = $this->ModelKelas->find($this->request->getPost('kelas_id'));
        if (empty($dtKelas)) {
            session()->setFlashdata('danger', 'Data kelas tidak ditemukan');
            return $this->redirectBack();
        }
        if (is_null($dtKelas['wali_kelas_id'])) {
            session()->setFlashdata('danger', 'Wali kelas belum ditentukan');
            return $this->redirectBack();
        }

        $data = [
            'mapel_id' => $this->request->getPost('mapel_id'),
            'guru_id' => $this->request->getPost('guru_id'),
            'kelas_id' => $this->request->getPost('kelas_id'),
            'hari' => $this->request->getPost('hari'),
            'jam_mengajar' => $this->request->getPost('jam_mengajar'),
            'wali_kelas_id' => $dtKelas['wali_kelas_id'],
            'tahun_ajaran' => $dt_th_ajar['id']
        ];
        $this->ModelJadwal->insert($data);
        return redirect()->to(base_url('jadwal'))->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($jadwal_id)
    {
        $dtTA = $this->ModelThajar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ada');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->where('tahun_ajaran', $dtTA['id'])->where('jadwal_id', $jadwal_id)->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tia=dak ditemukan');
            return $this->redirectBack();
        }
        $data = [
            'mapel_id' => $this->request->getPost('mapel_id'),
            'jam_mengajar' => $this->request->getPost('jam_mengajar'),
        ];
        if ($this->validate([
            'kelas_id' => 'required|is_natural_no_zero'
        ])) {
            $dtKelas = $this->ModelKelas->find($this->request->getPost('kelas_id'));
            if (!empty($dtKelas)) {
                if (is_null($dtKelas['wali_kelas_id'])) {
                    session()->setFlashdata('danger', 'Wali kelas pada kelas ini belum ditentukan.');
                    return $this->redirectBack();
                } else {
                    $data['kelas_id'] = $dtKelas['id_kelas'];
                    $data['wali_kelas_id'] = $dtKelas['wali_kelas_id'];
                }
            }
        }
        $this->ModelJadwal->update($jadwal_id, $data);
        return redirect()->to(base_url('jadwal'))->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($jadwal_id)
    {
        $this->ModelJadwal->delete($jadwal_id);
        return redirect()->to(base_url('jadwal'))->with('danger', 'Data berhasil dihapus');
    }
}
