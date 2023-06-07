<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelOrtu;

class Ortu_profil extends BaseController
{

    private $ModelOrtu = null;
    public function __construct()
    {
        $this->ModelOrtu    = new ModelOrtu();
        helper('form');
    }
    public function index()
    {
        $id_ortu = session('log_auth')['akunID'];
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Profil Orang Tua',
            'dt_ortu'   => $this->ModelOrtu->where('id_orangtua', $id_ortu)->first()
        ];
        return view('ortu/profil/index', $data);
    }
    public function editdata()
    {
        $id_ortu = session('log_auth')['akunID'];

        $data = [
            'id_orangtua' => $id_ortu,
            'username'  => $this->request->getPost('username'),
            'password' => md5((string)$this->request->getPost('password')),
            'nama'      => $this->request->getPost('nama'),
            'no_hp'     => $this->request->getPost('no_hp'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat'    => $this->request->getPost('alamat'),
        ];
        $this->ModelOrtu->update($id_ortu, $data);
        return redirect()->to('ortu_profil')->with('warning', 'Data berhasil diubah');
    }
}
