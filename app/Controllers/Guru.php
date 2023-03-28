<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;

class Guru extends BaseController
{
    private $ModelGuru = null;
    public function __construct()
    {
        $this->ModelGuru = new ModelGuru();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Guru',
            'guru' => $this->ModelGuru->findAll()
        ];
        return view('admin/guru/index', $data);
    }
    public function insertData()
    {
        $file = $this->request->getFile('photo');
        $nama_file = $file->getRandomName();
        $data = [
            'nip' => $this->request->getPost('nip'),
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
        $file->move('foto_guru/', $nama_file);
        $this->ModelGuru->insert($data);

        return redirect()->to('guru')->with('success', 'Data berhasil ditambahkan');
    }
    public function editData($id_guru)
    {
        // jika logo tidak diganti
        $file = $this->request->getFile('photo');
        if ($file->getError() == 4) {
            $data = [
                'id_guru' => $id_guru,
                'nip' => $this->request->getPost('nip'),
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
            ];
            $this->ModelGuru->update($id_guru, $data);
        } else {
            // jika logo diganti
            $guru = $this->ModelGuru->where('id_guru', $id_guru)->get()->getRowArray();
            if ($guru['guru_foto'] != "") {
                unlink('./foto_guru/' . $guru['guru_foto']);
            }
            $nama_file = $file->getRandomName();
            $data = [
                'id_guru' => $id_guru,
                'nip' => $this->request->getPost('nip'),
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
            $file->move('foto_guru/', $nama_file);
            $this->ModelGuru->update($id_guru, $data);
        }
        return redirect()->to('Guru')->with('warning', 'Data berhasil diubah');;
    }
    public function deleteData($id_guru)
    {
        $guru = $this->ModelGuru->where('id_guru', $id_guru)->get()->getRowArray();
        if ($guru['photo'] != "") {
            unlink('./foto_guru/' . $guru['photo']);
        }
        $data = [
            'id_guru' => $id_guru,
        ];
        $this->ModelGuru->delete($data);
        return redirect()->to('guru')->with('danger', 'Data berhasil dihapus');
    }
}
