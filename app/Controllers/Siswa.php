<?php

namespace App\Controllers;

use App\Models\ModelSiswa;


use App\Controllers\BaseController;
use App\Models\ModelKelas;

class Siswa extends BaseController
{
    private $ModelSiswa = null;
    private $ModelKelas = null;
    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Siswa',
            'siswa' => $this->ModelSiswa->findAll(),
            'kelas' => $this->ModelKelas->findAll(),
        ];
        return view('admin/siswa/index', $data);
    }
    public function insertData()
    {
        $file = $this->request->getFile('photo');
        $nama_file = $file->getRandomName();
        $data = [
            'nis' => $this->request->getPost('nis'),
            'username' => $this->request->getPost('username'),
            'password' => md5((string)$this->request->getPost('password')),
            'nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'gender' => $this->request->getPost('gender'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'photo' => $nama_file,
        ];
        $file->move('foto_siswa/', $nama_file);
        $this->ModelSiswa->insert($data);

        session()->setFlashdata('tambah', 'Data berhasil ditambahkan..!!');
        return redirect()->to('siswa');
    }
    public function editData($id)
    {
        // jika logo tidak diganti
        $file = $this->request->getFile('photo');
        if ($file->getError() == 4) {
            $data = [
                'id' => $id,
                'nis' => $this->request->getPost('nis'),
                'username' => $this->request->getPost('username'),
                'password' => md5((string)$this->request->getPost('password')),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'gender' => $this->request->getPost('gender'),
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            $this->ModelSiswa->update($id, $data);
        } else {
            // jika logo diganti
            $guru = $this->ModelSiswa->where('id', $id)->get()->getRowArray();
            if ($guru['guru_foto'] != "") {
                unlink('./foto_siswa/' . $guru['guru_foto']);
            }
            $nama_file = $file->getRandomName();
            $data = [
                'id' => $id,
                'nis' => $this->request->getPost('nis'),
                'username' => $this->request->getPost('username'),
                'password' => md5((string)$this->request->getPost('password')),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'gender' => $this->request->getPost('gender'),
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
                'jabatan' => $this->request->getPost('jabatan'),
                'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
                'photo' => $nama_file,
            ];
            $file->move('foto_siswa/', $nama_file);
            $this->ModelSiswa->update($id, $data);
        }
        session()->setFlashdata('edit', 'Data berhasil diedit..!!');
        return redirect()->to('siswa');
    }
    public function deleteData($id)
    {
        $guru = $this->ModelSiswa->where('id', $id)->get()->getRowArray();
        if ($guru['photo'] != "") {
            unlink('./foto_siswa/' . $guru['photo']);
        }
        $data = [
            'id' => $id,
        ];
        $this->ModelSiswa->delete($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus..!!');
        return redirect()->to('siswa');
    }
}
