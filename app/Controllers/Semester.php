<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSemester;
use App\Models\ModelTahunAjar;

class Semester extends BaseController
{
    private $ModelSemester = null;
    private $ModelTahunAjar = null;

    public function __construct()
    {
        $this->ModelSemester = new ModelSemester();
        $this->ModelTahunAjar = new ModelTahunAjar();

        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Semester',
            'smt' => $this->ModelSemester->getDataSmt(),
            'th_ajar' => $this->ModelTahunAjar->findAll(),

        ];
        return view('admin/semester/index', $data);
    }
    public function insertData()
    {
        $data = [
            'id_ta' => $this->request->getPost('id_ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelSemester->insert($data);
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan..!!');
        return redirect()->to('semester');
    }
    public function editData($id_semester)
    {
        $data = [
            'id_ta' => $this->request->getPost('id_ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelSemester->update($id_semester, $data);
        session()->setFlashdata('edit', 'Data berhasil diedit..!!');
        return redirect()->to('semester');
    }

    public function deleteData($id_semester)
    {
        $this->ModelSemester->delete($id_semester);
        session()->setFlashdata('delete', 'Data berhasil dihapus..!!');
        return redirect()->to('semester');
    }
}
