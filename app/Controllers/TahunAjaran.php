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
        return redirect()->to('tahunajaran')->with('success', 'Data berhasil ditambahkan');
    }

    public function editData($id)
    {
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'status' => $this->request->getPost('status'),
        ];
        $this->ModelTahunAjar->update($id, $data);
        return redirect()->to('tahunajaran')->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id)
    {
        $this->ModelTahunAjar->delete($id);
        return redirect()->to('tahunajaran')->with('danger', 'Data berhasil dihapus');
    }
}
