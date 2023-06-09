<?php

namespace App\Controllers;

use App\Models\ModelSiswa;


use App\Controllers\BaseController;
use App\Models\ModelKelas;
use App\Models\ModelOrtu;
use Exception;

class Siswa extends BaseController
{
    private $ModelSiswa = null;
    private $ModelKelas = null;
    private $ModelOrtu = null;

    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
        $this->ModelOrtu = new ModelOrtu();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Siswa',
            'siswa' => $this->ModelSiswa->join('kelas', 'siswa.id_kelas=kelas.id_kelas', 'left')->findAll(),
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
            'password' => base64_encode((string)$this->request->getPost('password')),
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
    public function editData($nis)
    {
        $dtSiswa = $this->ModelSiswa->where('nis', $nis)->first();

        if (empty($dtSiswa)) {
            session()->setFlashdata('danger', 'Data siswa tidak ditemukan');
        }
        $id = $dtSiswa['id'];
        // jika logo tidak diganti
        $file = $this->request->getFile('photo');
        if ($file->getError() == 4) {
            $data = [
                'nis' => $this->request->getPost('nis'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'gender' => $this->request->getPost('gender'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            if (trim((string)$this->request->getPost('password')) != '') {
                $data['password'] = base64_encode((string)$this->request->getPost('password'));
            };
            $this->ModelSiswa->update($id, $data);
        } else {
            // jika logo diganti
            $siswa = $this->ModelSiswa->where('id', $id)->get()->getRowArray();
            if ($siswa['photo'] != "") {
                try {
                    unlink('./foto_siswa/' . $siswa['photo']);
                } catch (Exception $e) {
                }
            }
            $nama_file = $file->getRandomName();
            $data = [
                'nis' => $this->request->getPost('nis'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'gender' => $this->request->getPost('gender'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'photo' => $nama_file,
            ];
            if (trim((string)$this->request->getPost('password')) != '') {
                $data['password'] = base64_encode((string)$this->request->getPost('password'));
            };
            $file->move('foto_siswa/', $nama_file);
            $this->ModelSiswa->update($id, $data);
        }
        return redirect()->to('siswa')->with('warning', 'Data berhasil diubah');
    }
    public function deleteData($nis)
    {
        $siswa = $this->ModelSiswa->where('nis', $nis)->first();
        if (empty($siswa)) {
            session()->setFlashdata('danger', 'Data siswa tidak ditemukan');
            return $this->redirectBack();
        }
        if ($siswa['photo'] != "") {
            try {
                unlink('./foto_siswa/' . $siswa['photo']);
            } catch (Exception $e) {
            }
        }
        $this->ModelSiswa->delete($siswa['id']);
        $dtOrtu = $this->ModelOrtu->where('nis_siswa', $siswa['nis'])->first();
        if (!empty($dtOrtu)) {
            $this->ModelOrtu->delete($dtOrtu['id_orangtua']);
        }
        return redirect()->to('siswa')->with('success', 'Data berhasil dihapus');
    }
}
