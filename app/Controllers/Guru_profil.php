<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGuru;


class Guru_profil extends BaseController
{

    private $ModelGuru = null;
    public function __construct()
    {
        $this->ModelGuru    = new ModelGuru();
        helper('form');
    }
    public function index()
    {
        $id_guru = session('log_auth')['akunID'];
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Profil Guru',
            'dt_guru'   => $this->ModelGuru->where('id_guru', $id_guru)->first()
        ];
        return view('guru/profil/index', $data);
    }
    public function editData()
    {
        $id_guru = session('log_auth')['akunID'];
        // jika photo tidak diganti
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
            // jika photo diganti
            $guru = $this->ModelGuru->where('id_guru', $id_guru)->get()->getRowArray();
            if ($guru['photo'] != "") {
                unlink('./foto_guru/' . $guru['photo']);
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
        return redirect()->to('guru_profil')->with('warning', 'Data berhasil diubah');
    }
    public function update(){
        
        $id_guru = session('log_auth')['akunID'];
        // jika photo tidak diganti
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
            // jika photo diganti
            $guru = $this->ModelGuru->where('id_guru', $id_guru)->get()->getRowArray();
            if ($guru['photo'] != "") {
                unlink('./foto_guru/' . $guru['photo']);
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
        return redirect()->to('guru_profil')->with('warning', 'Data berhasil diubah');
    }
}
