<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;
use App\Models\ModelMapel;
use App\Models\ModelSemester;

class Mapel extends BaseController
{
    private $ModelMapel = null;
    private $ModelGuru = null;
    private $ModelSemester = null;

    public function __construct()
    {
        $this->ModelMapel = new ModelMapel();
        $this->ModelSemester = new ModelSemester();
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
        $data = [
            'kode_matapelajaran' => $this->request->getPost('kode_matapelajaran'),
            'nama_matapelajaran' => $this->request->getPost('nama_matapelajaran'),
            'kategori_mapel' => $this->request->getPost('kategori_mapel'),
            'jurusan_mapel' => $this->request->getPost('jurusan_mapel'),
        ];
        $this->ModelMapel->insert($data);
        return redirect()->to('mapel')->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id)
    {
        $data = [
            'kode_matapelajaran' => $this->request->getPost('kode_matapelajaran'),
            'nama_matapelajaran' => $this->request->getPost('nama_matapelajaran'),
            'kategori_mapel' => $this->request->getPost('kategori_mapel'),
            'jurusan_mapel' => $this->request->getPost('jurusan_mapel'),
        ];
        $this->ModelMapel->update($id, $data);
        return redirect()->to('mapel')->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id)
    {
        $this->ModelMapel->delete($id);
        return redirect()->to('mapel')->with('danger', 'Data berhasil dihapus');
    }
}
