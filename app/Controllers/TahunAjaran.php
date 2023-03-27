<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTahunAjar;

class TahunAjaran extends BaseController
{
    private $ModelTahunAjar = null;
    public function __construct()
    {
        $this->ModelTahunAjar = new ModelTahunAjar();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Tahun Ajaran',
            'th_ajar' => $this->ModelTahunAjar->findAll(),

        ];
        return view('admin/tahunajaran/index', $data);
    }
    public function insertData()
    {
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'status' => $this->request->getPost('status'),
        ];
        $this->ModelTahunAjar->insert($data);
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan..!!');
        return redirect()->to('tahunajaran');
    }

    public function editData($id)
    {
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'status' => $this->request->getPost('status'),
        ];
        $this->ModelTahunAjar->update($id, $data);
        session()->setFlashdata('edit', 'Data berhasil diedit..!!');
        return redirect()->to('tahunajaran');
    }

    public function deleteData($id)
    {
        $this->ModelTahunAjar->delete($id);
        session()->setFlashdata('delete', 'Data berhasil dihapus..!!');
        return redirect()->to('tahunajaran');
    }
}
