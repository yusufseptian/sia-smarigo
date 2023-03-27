<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengumuman;

class Pengumuman extends BaseController
{
    private $db = null;
    private $ModelPengumuman = null;

    function __construct()
    {
        $this->db = \config\Database::connect();
        $this->ModelPengumuman = new ModelPengumuman();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Pengumuman',
            'pengumuman' => $this->ModelPengumuman->findAll(),
        ];

        return view('admin/pengumuman/index', $data);
    }

    public function insertData()
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'pengumuman' => $this->request->getPost('pengumuman'),
        ];

        $this->ModelPengumuman->insert($data);
        return redirect()->to('pengumuman')->with('success', 'Data berhasil ditambahkan');
    }

    public function editData($id)
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'pengumuman' => $this->request->getPost('pengumuman'),
        ];

        $this->ModelPengumuman->update($id, $data);
        return redirect()->to('pengumuman')->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id)
    {
        $this->ModelPengumuman->delete($id);
        return redirect()->to('pengumuman')->with('danger', 'Data berhasil dihapus');
    }
}
