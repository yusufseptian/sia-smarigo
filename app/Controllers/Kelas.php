<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelKelas;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjar;

class Kelas extends BaseController
{
    private $ModelKelas = null;
    private $ModelTahunAjar = null;
    private $ModelSiswa = null;
    private $ModelGuru = null;
    private $ModelJadwal = null;

    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
        $this->ModelTahunAjar = new ModelTahunAjar();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelGuru = new ModelGuru();
        $this->ModelJadwal = new ModelJadwal();
        helper('form');
    }
    public function index()
    {
        $dtKelas = $this->ModelKelas->select('kelas.*, nama, id_guru, nip, no_hp')->join('guru', 'wali_kelas_id=id_guru')->findAll();
        $listGuru = [];
        foreach ($dtKelas as $dt) {
            array_push($listGuru, $dt['id_guru']);
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Kelas',
            'kelas' => $this->ModelKelas->select('kelas.*, nama, id_guru')->join('guru', 'wali_kelas_id=id_guru', 'left')->findAll(),
            'dtGuru' => (count($listGuru) == 0) ? $this->ModelGuru->findAll() : $this->ModelGuru->whereNotIn('id_guru', $listGuru)->findAll(),
            'listWaliKelas' => $dtKelas,
            'th_ajar' => $this->ModelTahunAjar->findAll(),
        ];
        return view('admin/kelas/index', $data);
    }
    public function insertData()
    {
        $data = [
            'kode_kelas' => $this->request->getPost('kode_kelas'),
            'nama_kelas' => $this->request->getPost('nama_kelas')
        ];
        if ($this->validate([
            'wali_kelas_id' => 'required|is_natural_no_zero'
        ])) {
            $dtGuru = $this->ModelGuru->find($this->request->getPost('wali_kelas_id'));
            if (!empty($dtGuru)) {
                $tmpKelas = $this->ModelKelas->where('wali_kelas_id', $this->request->getPost('wali_kelas_id'))->first();
                if (!empty($tmpKelas)) {
                    $tmpData['wali_kelas_id'] = null;
                    $this->ModelKelas->update($tmpKelas['id_kelas'], $tmpData);
                }
                $data['wali_kelas_id'] = $dtGuru['id_guru'];
            }
        }
        $this->ModelKelas->insert($data);
        return redirect()->to(base_url('kelas'))->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id_kelas)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran masih kosong');
            return $this->redirectBack();
        }
        $data = [
            'kode_kelas' => $this->request->getPost('kode_kelas'),
            'nama_kelas' => $this->request->getPost('nama_kelas')
        ];
        $editedWali = false;
        $chagedWali = false;
        $chagedPreClass = null;
        if ($this->validate([
            'wali_kelas_id' => 'required|is_natural_no_zero'
        ])) {
            $dtGuru = $this->ModelGuru->find($this->request->getPost('wali_kelas_id'));
            if (!empty($dtGuru)) {
                $tmpKelas = $this->ModelKelas->where('wali_kelas_id', $this->request->getPost('wali_kelas_id'))->first();
                if (!empty($tmpKelas)) {
                    $tmpData['wali_kelas_id'] = null;
                    $this->ModelKelas->update($tmpKelas['id_kelas'], $tmpData);
                    $chagedWali = true;
                    $chagedPreClass = $tmpKelas['id_kelas'];
                }
                $data['wali_kelas_id'] = $dtGuru['id_guru'];
                $editedWali = true;
            }
        }
        if ($this->ModelKelas->update($id_kelas, $data)) {
            if ($editedWali) {
                $dtJadwal = $this->ModelJadwal->where('kelas_id', $id_kelas)->where('tahun_ajaran', $dtTA['id'])->findAll();
                $data = [
                    'wali_kelas_id' => $this->request->getPost('wali_kelas_id')
                ];
                foreach ($dtJadwal as $jadwal) {
                    $this->ModelJadwal->update($jadwal['jadwal_id'], $data);
                }
                if ($chagedWali) {
                    $dtJadwal = $this->ModelJadwal->where('kelas_id', $chagedPreClass)->where('tahun_ajaran', $dtTA['id'])->findAll();
                    $data = [
                        'wali_kelas_id' => null
                    ];
                    foreach ($dtJadwal as $jadwal) {
                        $this->ModelJadwal->update($jadwal['jadwal_id'], $data);
                    }
                }
            }
            return redirect()->to(base_url('kelas'))->with('warning', 'Data berhasil diubah');
        }
        return redirect()->to(base_url('kelas'))->with('danger', 'Data gagal diubah');
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
            'nisSiswa' => 'required',
            'kelas' => 'required|numeric'
        ])) {
            return redirect()->to(base_url('kelas'))->with('danger', 'Data tidak valid');
        }
        $idKelas = $this->request->getPost('kelas');
        // Cek data kelas
        $dtKelas = $this->ModelKelas->find($idKelas);
        if (empty($dtKelas)) {
            return redirect()->to(base_url('kelas'))->with('danger', 'Data kelas tidak ditemukan');
        }
        $data['id_kelas'] = $idKelas;
        $success = 0;
        $fail = 0;
        foreach ($this->request->getPost('nisSiswa') as $nis) {
            // cek data siswa
            $dtSiswa = $this->ModelSiswa->where('nis', $nis)->first();
            if (empty($dtSiswa)) {
                $fail++;
                break;
            }
            // Update kelas pada data siswa
            if ($this->ModelSiswa->update($dtSiswa['id'], $data)) {
                $success++;
            } else {
                $fail++;
            }
        }
        if (count($this->request->getPost('nisSiswa')) != 0) {
            if ($success == count($this->request->getPost('nisSiswa'))) {
                session()->setFlashdata('success', "Seluruh data siswa berhasil ditambahkan. Jumlah data siswa: $success");
            } else {
                session()->setFlashdata('warning', "Jumlah data siswa yang berhasil ditambahkan: $success. Jumlah data siswa yang gagal ditambahkan: $fail");
            }
        } else {
            session()->setFlashdata('danger', "Seluruh data siswa gagal dimasukan.");
        }
        return redirect()->to(base_url("kelas/siswa/$idKelas"));
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
