<?php

namespace App\Controllers;

use App\Models\ModelGuru;
use App\Models\ModelKelas;
use App\Models\ModelOrtu;
use App\Models\ModelSiswa;
use App\Models\ModelUser;

class Auth extends BaseController
{
    private $modelGuru = null;
    private $modelSiswa = null;
    private $modelOrtu = null;
    private $modelAdmin = null;
    private $modelKelas = null;

    public function __construct()
    {
        $this->modelAdmin = new ModelUser();
        $this->modelGuru = new ModelGuru();
        $this->modelOrtu = new ModelOrtu();
        $this->modelSiswa = new ModelSiswa();
        $this->modelKelas = new ModelKelas();
    }

    public function index()
    {
        if (session('log_auth')) {
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Login'
        ];
        return view('auth/other', $data);
    }

    public function administrator()
    {
        if (session('log_auth')) {
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Login Administrator'
        ];
        return view('auth/admin', $data);
    }

    public function login()
    {
        if (session('log_auth')) {
            return $this->redirectBack();
        }
        if (!$this->validate([
            'txtUsername' => 'required',
            'txtPassword' => 'required',
            'cmbRole' => 'required|in_list[Guru,Siswa,Ortu,Administrator]'
        ])) {
            return redirect()->to(base_url('auth'))->with('danger', 'Mohon isi data dengan lengkap!');
        }
        $role = $this->request->getPost('cmbRole');
        $username = $this->request->getPost('txtUsername');
        $password = base64_encode((string) $this->request->getPost('txtPassword'));
        if ($role == 'Guru') {
            $dtAkun = $this->modelGuru->where('username', $username)->first();
            $key = 'id_guru';
        } elseif ($role == 'Siswa') {
            $dtAkun = $this->modelSiswa->where('username', $username)->first();
            $key = 'id';
        } elseif ($role == 'Ortu') {
            $dtAkun = $this->modelOrtu->where('username', $username)->first();
            $key = 'id_orangtua';
        } elseif ($role == 'Administrator') {
            $dtAkun = $this->modelAdmin->where('username', $username)->first();
            $key = 'id';
        } else {
            return redirect()->to(base_url('auth'))->with('danger', 'Role tidak ditemukan');
        }
        if ($role == 'Administrator') {
            $link = 'administrator';
        } else {
            $link = '';
        }
        if (empty($dtAkun)) {
            return redirect()->to(base_url("auth/$link"))->with('wrongData', 'Username atau password anda salah');
        }
        if ($dtAkun['password'] != $password) {
            return redirect()->to(base_url("auth/$link"))->with('wrongData', 'Username atau password anda salah');
        }
        $tmp = [
            'akunID' => $dtAkun[$key],
            'role' => strtoupper((string)$role)
        ];
        if ($role == 'Guru') {
            $dtWaliKelas = $this->modelKelas->where('wali_kelas_id', $dtAkun[$key])->first();
            if (!empty($dtWaliKelas)) {
                $tmp['waliKelas'] = [
                    'id' => $dtWaliKelas['id_kelas'],
                    'namaKelas' => $dtWaliKelas['nama_kelas']
                ];
            }
        }
        session()->set('log_auth', $tmp);
        return redirect()->to(base_url());
    }
    public function logout()
    {
        if (!session('log_auth')) {
            return redirect()->to(base_url('auth'));
        }
        if (session('log_auth')['role'] == "ADMINISTRATOR") {
            $link = "administrator";
        } else {
            $link = "";
        }
        if (session('log_auth')['role'] == "GURU") {
            session()->remove('idKelasForHasil');
        }
        session()->remove('log_auth');
        return redirect()->to(base_url("auth/$link"));
    }
}
