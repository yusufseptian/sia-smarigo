<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelOrtu;
use App\Models\ModelSiswa;

class Ortu extends BaseController
{
    private $ModelOrtu = null;
    private $ModelSiswa = null;

    public function __construct()
    {
        $this->ModelOrtu = new ModelOrtu();
        $this->ModelSiswa = new ModelSiswa();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title'     => 'Siasmarigo',
            'sub_title' => 'Data Orang Tua',
            'siswa'     => $this->ModelSiswa->findAll(),
            'ortu'      => $this->ModelOrtu->findAll(),
        ];
        return view('admin/ortu/index', $data);
    }
    public function insertData()
    {
        $data = [
            'username'  => $this->request->getPost('username'),
            'password' => base64_encode((string)$this->request->getPost('password')),
            'nama'      => $this->request->getPost('nama'),
            'no_hp'     => $this->request->getPost('no_hp'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nis_siswa' => $this->request->getPost('nis_siswa'),
            'alamat'    => $this->request->getPost('alamat'),
        ];
        $this->ModelOrtu->insert($data);
        return redirect()->to(base_url('ortu'))->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id_orangtua)
    {
        $data = [
            'username'  => $this->request->getPost('username'),
            'nama'      => $this->request->getPost('nama'),
            'no_hp'     => $this->request->getPost('no_hp'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nis_siswa' => $this->request->getPost('nis_siswa'),
            'alamat'    => $this->request->getPost('alamat'),
        ];
        if (trim((string)$this->request->getPost('password')) != '') {
            $data['password'] = base64_encode((string)$this->request->getPost('password'));
        };
        $this->ModelOrtu->update($id_orangtua, $data);
        return redirect()->to(base_url('ortu'))->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id_orangtua)
    {
        $this->ModelOrtu->delete($id_orangtua);
        return redirect()->to(base_url('ortu'))->with('danger', 'Data berhasil dihapus');
    }
}
