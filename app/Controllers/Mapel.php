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
        $this->ModelGuru = new ModelGuru();
        $this->ModelSemester = new ModelSemester();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Mata Pelajaran',
            'mapel' => $this->ModelMapel->getDataMapel(),
            'semester' => $this->ModelSemester->getDataSmt(),
            'guru' => $this->ModelGuru->findAll(),
        ];
        return view('admin/mapel/index', $data);
    }
    public function insertData()
    {
        $data = [
            'kode_matapelajaran' => $this->request->getPost('kode_matapelajaran'),
            'nama_matapelajaran' => $this->request->getPost('nama_matapelajaran'),
            'id_semester' => $this->request->getPost('id_semester'),
            'id_guru' => $this->request->getPost('id_guru'),
            'jam_pelajaran' => $this->request->getPost('jam_pelajaran'),
        ];
        $this->ModelMapel->insert($data);
        return redirect()->to('mapel')->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id)
    {
        $data = [
            'kode_matapelajaran' => $this->request->getPost('kode_matapelajaran'),
            'nama_matapelajaran' => $this->request->getPost('nama_matapelajaran'),
            'id_semester' => $this->request->getPost('id_semester'),
            'id_guru' => $this->request->getPost('id_guru'),
            'jam_pelajaran' => $this->request->getPost('jam_pelajaran'),
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
