<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use CodeIgniter\HTTP\RequestInterface;

class Siswa_profil extends BaseController
{

    private $ModelSiswa = null;
    public function __construct()
    {
        $this->ModelSiswa    = new ModelSiswa();
        helper('form');
    }
    public function index()
    {
        $id_siswa = session('log_auth')['akunID'];
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Profil Siswa',
            'dt_siswa'   => $this->ModelSiswa->where('id', $id_siswa)->first()
        ];
        return view('siswa/profil/index', $data);
    }

    public function update()
    {
        // dd($this->request->getPost('username'), $this->request->getGet('username'));
        $id_siswa = session('log_auth')['akunID'];
        // $object = new Myclass();
        //  $this->ModelSiswa->where('id', $id_siswa)->update($data);
        //  $this->ModelSiswa;
        // jika photo tidak diganti
        $file = $this->request->getFile('photo');
        if ($file->getError() == 4) {
            $data = [
                'id' => $id_siswa,
                'username' => $this->request->getPost('username'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'gender' => $this->request->getPost('gender'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            $this->ModelSiswa->update($id_siswa, $data);
        } else {
            // jika logo diganti
            $siswa = $this->ModelSiswa->where('id', $id_siswa)->get()->getRowArray();
            if ($siswa['photo'] != "") {
                unlink('./foto_siswa/' . $siswa['photo']);
            }
            $nama_file = $file->getRandomName();
            $data = [
                'id' => $id_siswa,
                'username' => $this->request->getPost('username'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'gender' => $this->request->getPost('gender'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'photo' => $nama_file,
            ];
            $file->move('foto_siswa/', $nama_file);
            $this->ModelSiswa->update($id_siswa, $data);
        }
        return redirect()->to('siswa_profil')->with('warning', 'Data berhasil diubah');;
    }
}
