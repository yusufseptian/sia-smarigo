<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKelas;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjar;

class Kelas extends BaseController
{
    private $ModelKelas = null;
    private $ModelTahunAjar = null;
    private $ModelSiswa = null;

    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
        $this->ModelTahunAjar = new ModelTahunAjar();
        $this->ModelSiswa = new ModelSiswa();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Kelas',
            'kelas' => $this->ModelKelas->getDataKelas(),
            'th_ajar' => $this->ModelTahunAjar->findAll(),
        ];
        return view('admin/kelas/index', $data);
    }
    public function insertData()
    {
        $data = [
            'kode_kelas' => $this->request->getPost('kode_kelas'),
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'id_ta' => $this->request->getPost('id_ta'),
        ];
        $this->ModelKelas->insert($data);
        return redirect()->to(base_url('kelas'))->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id_kelas)
    {
        $data = [
            'kode_kelas' => $this->request->getPost('kode_kelas'),
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'id_ta' => $this->request->getPost('id_ta'),
        ];
        $this->ModelKelas->update($id_kelas, $data);
        return redirect()->to(base_url('kelas'))->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id_kelas)
    {
        $this->ModelKelas->delete($id_kelas);
        return redirect()->to(base_url('kelas'))->with('danger', 'Data berhasil dihapus');
    }
    public function siswa()
    {
        $idKelas = $this->request->uri->getSegment(3);
        $dtKelas = $this->ModelKelas->find($idKelas);
        if (empty($dtKelas)) {
            return redirect()->to(base_url('kelas'))->with('danger', 'Data kelas tidak ditemukan');
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Kelas',
            'dtSiswa' => $this->ModelSiswa->where('id_kelas', $idKelas)->findAll(),
            'dtSiswaNotMember' => $this->ModelSiswa->whereNotIn('id_kelas', [$idKelas])->orWhere('id_kelas', null)->findAll(),
            'dtKelas' => $dtKelas
        ];
        return view('admin/kelas/daftar_siswa', $data);
    }
    public function insertSiswa()
    {
        // Cek and get data 
        if (!$this->validate([
            'nisSiswa' => 'required|numeric',
            'kelas' => 'required|numeric'
        ])) {
            return redirect()->to(base_url('kelas'))->with('danger', 'Data tidak valid');
        }
        $idKelas = $this->request->getPost('kelas');
        $nis = $this->request->getPost('nisSiswa');
        // Cek data kelas
        $dtKelas = $this->ModelKelas->find($idKelas);
        if (empty($dtKelas)) {
            return redirect()->to(base_url('kelas'))->with('danger', 'Data kelas tidak ditemukan');
        }
        // cek data siswa
        $dtSiswa = $this->ModelSiswa->where('nis', $nis)->first();
        if (empty($dtSiswa)) {
            return redirect()->to(base_url("kelas/siswa/$idKelas"))->with('danger', 'Data siswa tidak ditemukan');
        }
        // Update kelas pada data siswa
        $data['id_kelas'] = $idKelas;
        if ($this->ModelSiswa->update($dtSiswa['id'], $data)) {
            return redirect()->to(base_url("kelas/siswa/$idKelas"))->with('success', 'Data siswa berhasil ditambahkan');
        }
        return redirect()->to(base_url("kelas/siswa/$idKelas"))->with('danger', 'Data siswa gagal ditambahkan karena ada masalah pada sistem');
    }
    public function deleteSiswa()
    {
        // Get data from url segment
        $idKelas = $this->request->uri->getSegment(3);
        $nis = $this->request->uri->getSegment(4);
        // cek data siswa
        $dtSiswa = $this->ModelSiswa->where('id_kelas', $idKelas)->where('nis', $nis)->first();
        if (empty($dtSiswa)) {
            return redirect()->to(base_url("kelas/siswa/$idKelas"))->with('danger', 'Data siswa tidak ditemukan');
        }
        $data['id_kelas'] = null;
        if ($this->ModelSiswa->update($dtSiswa['id'], $data)) {
            return redirect()->to(base_url("kelas/siswa/$idKelas"))->with('success', 'Data siswa berhasil dihapus');
        }
        return redirect()->to(base_url("kelas/siswa/$idKelas"))->with('danger', 'Data siswa gagal dihapus karena kesalahan sistem');
    }
}
