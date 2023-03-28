<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKelas;
use App\Models\ModelTahunAjar;

class Kelas extends BaseController
{
    private $ModelKelas = null;
    private $ModelTahunAjar = null;
    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
        $this->ModelTahunAjar = new ModelTahunAjar();
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
        return redirect()->to('kelas')->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id_kelas)
    {
        $data = [
            'kode_kelas' => $this->request->getPost('kode_kelas'),
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'id_ta' => $this->request->getPost('id_ta'),
        ];
        $this->ModelKelas->update($id_kelas, $data);
        return redirect()->to('kelas')->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id_kelas)
    {
        $this->ModelKelas->delete($id_kelas);
        return redirect()->to('kelas')->with('danger', 'Data berhasil dihapus');
    }
}
