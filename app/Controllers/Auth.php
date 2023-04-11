<?php

namespace App\Controllers;

use App\Models\ModelGuru;
use App\Models\ModelOrtu;
use App\Models\ModelSiswa;
use App\Models\ModelUser;

class Auth extends BaseController
{
    private $modelGuru = null;
    private $modelSiswa = null;
    private $modelOrtu = null;
    private $modelAdmin = null;

    public function __construct()
    {
        $this->modelAdmin = new ModelUser();
        $this->modelGuru = new ModelGuru();
        $this->modelOrtu = new ModelOrtu();
        $this->modelSiswa = new ModelSiswa();
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
        $password = md5((string) $this->request->getPost('txtPassword'));
        if ($role == 'Guru') {
            $dtAkun = $this->modelGuru->where('username', $username)->where('password', $password)->first();
            $key = 'id_guru';
        } elseif ($role == 'Siswa') {
            $dtAkun = $this->modelSiswa->where('username', $username)->where('password', $password)->first();
            $key = 'id';
        } elseif ($role == 'Ortu') {
            $dtAkun = $this->modelOrtu->where('username', $username)->where('password', $password)->first();
            $key = 'id_orangtua';
        } elseif ($role == 'Administrator') {
            $dtAkun = $this->modelAdmin->where('username', $username)->where('password', $password)->first();
            $key = 'id';
        } else {
            return redirect()->to(base_url('auth'))->with('danger', 'Role tidak ditemukan');
        }
        if (empty($dtAkun)) {
            if ($role == 'Administrator') {
                $link = 'administrator';
            } else {
                $link = '';
            }
            return redirect()->to(base_url("auth/$link"))->with('wrongData', 'Username atau password anda salah');
        }
        $tmp = [
            'akunID' => $dtAkun[$key],
            'role' => strtoupper((string)$role)
        ];
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
        session()->remove('log_auth');
        return redirect()->to(base_url("auth/$link"));
    }
}
