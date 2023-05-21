<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelJadwal;
use App\Models\ModelMapel;
use App\Models\ModelSemester;
use App\Models\ModelTahunAjar;

class Mapel extends BaseController
{
    private $ModelMapel = null;
    private $ModelGuru = null;
    private $ModelSemester = null;
    private $ModelTahunAjaran = null;
    private $ModelJadwal = null;

    public function __construct()
    {
        $this->ModelMapel = new ModelMapel();
        $this->ModelSemester = new ModelSemester();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelTahunAjaran = new ModelTahunAjar();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Mata Pelajaran',
            'mapel' => $this->ModelMapel->findAll(),
            'kategori_mapel' => $this->kategori_mapel,
            'jurusan'   => $this->jurusan,
        ];
        return view('admin/mapel/index', $data);
    }
    public function insertData()
    {
        if (!$this->validate([
            'kode_matapelajaran' => 'required|is_unique[matapelajaran.kode_matapelajaran]',
            'nama_matapelajaran' => 'required|is_unique[matapelajaran.nama_matapelajaran]',
            'kkm_mapel' => 'required|greater_than_equal_to[0]|less_than_equal_to[100]',
            'kategori_mapel' => 'required|in_list[Kelompok A (Umum),Kelompok B (Umum),Kelompok C (Peminatan)]',
            'jurusan_mapel' => 'required|in_list[IPA,IPS]'
        ])) {
            session()->setFlashdata('danger', 'Mohon isi data dengan tepat!');
            return $this->redirectBack();
        }
        $data = [
            'kode_matapelajaran' => $this->request->getPost('kode_matapelajaran'),
            'nama_matapelajaran' => $this->request->getPost('nama_matapelajaran'),
            'kkm_mapel' => $this->request->getPost('kkm_mapel'),
            'kategori_mapel' => $this->request->getPost('kategori_mapel'),
            'jurusan_mapel' => $this->request->getPost('jurusan_mapel'),
        ];
        $this->ModelMapel->insert($data);
        return redirect()->to('mapel')->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id)
    {
        $dtMapel = $this->ModelMapel->find($id);
        if (empty($dtMapel)) {
            session()->setFlashdata('danger', 'Data mapel tidak ditemukan!');
            return $this->redirectBack();
        }
        $valid = [
            'kode_matapelajaran' => 'required',
            'nama_matapelajaran' => 'required',
            'kkm_mapel' => 'required|greater_than_equal_to[0]|less_than_equal_to[100]',
            'kategori_mapel' => 'required|in_list[Kelompok A (Umum),Kelompok B (Umum),Kelompok C (Peminatan)]',
            'jurusan_mapel' => 'required|in_list[IPA,IPS]'
        ];
        if (strtolower($dtMapel['kode_matapelajaran']) != strtolower((string)$this->request->getPost('kode_matapelajaran'))) {
            $valid['kode_matapelajaran'] = 'required|is_unique[matapelajaran.kode_matapelajaran]';
        }
        if (strtolower($dtMapel['nama_matapelajaran']) != strtolower((string)$this->request->getPost('nama_matapelajaran'))) {
            $valid['nama_matapelajaran'] = 'required|is_unique[matapelajaran.nama_matapelajaran]';
        }
        if (!$this->validate($valid)) {
            session()->setFlashdata('danger', 'Mohon isi data dengan tepat!');
            return $this->redirectBack();
        }
        $data = [
            'kode_matapelajaran' => $this->request->getPost('kode_matapelajaran'),
            'nama_matapelajaran' => $this->request->getPost('nama_matapelajaran'),
            'kkm_mapel' => $this->request->getPost('kkm_mapel'),
            'kategori_mapel' => $this->request->getPost('kategori_mapel'),
            'jurusan_mapel' => $this->request->getPost('jurusan_mapel'),
        ];
        $this->ModelMapel->update($id, $data);
        $dtTA = $this->ModelTahunAjaran->getTANow();
        if (!empty($dtTA)) {
            $data = [
                'mapel_kkm' => $this->request->getPost('kkm_mapel')
            ];
            foreach ($this->ModelJadwal->where('mapel_id', $dtMapel['id'])->where('tahun_ajaran', $dtTA['id'])->findAll() as $dt) {
                $this->ModelJadwal->update($dt['jadwal_id'], $data);
            }
        }
        return redirect()->to('mapel')->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id)
    {
        $this->ModelMapel->delete($id);
        return redirect()->to('mapel')->with('danger', 'Data berhasil dihapus');
    }
}
