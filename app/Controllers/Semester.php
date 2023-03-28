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
        return redirect()->to('semester')->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id_semester)
    {
        $data = [
            'id_ta' => $this->request->getPost('id_ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelSemester->update($id_semester, $data);
        return redirect()->to('semester')->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id_semester)
    {
        $this->ModelSemester->delete($id_semester);
        return redirect()->to('semester')->with('danger', 'Data berhasil dihapus');
    }
}
