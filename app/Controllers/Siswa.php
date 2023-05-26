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
            'id_kelas' => $this->request->getPost('id_kelas'),
            'gender' => $this->request->getPost('gender'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'photo' => $nama_file,
        ];
        $file->move('foto_siswa/', $nama_file);
        $this->ModelSiswa->insert($data);

        return redirect()->to('siswa')->with('success', 'Data berhasil ditambahkan');
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
            $siswa = $this->ModelSiswa->where('id', $id)->get()->getRowArray();
            if ($siswa['photo'] != "") {
                unlink('./foto_siswa/' . $siswa['photo']);
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
                'id_kelas' => $this->request->getPost('id_kelas'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'jabatan' => $this->request->getPost('jabatan'),
                'photo' => $nama_file,
            ];
            $file->move('foto_siswa/', $nama_file);
            $this->ModelSiswa->update($id, $data);
        }
        return redirect()->to('siswa')->with('warning', 'Data berhasil diubah');
    }
    public function deleteData($nis)
    {
        $siswa = $this->ModelSiswa->where('nis', $nis)->get()->getRowArray();
        if ($siswa['photo'] != "") {
            unlink('./foto_siswa/' . $siswa['photo']);
        }
        $data = [
            'id' => $siswa['id'],
        ];
        $this->ModelSiswa->delete($data);
        return redirect()->to('siswa')->with('success', 'Data berhasil dihapus');
    }
}
