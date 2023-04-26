<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengumuman;

class Home extends BaseController
{
    private $db = null;
    private $ModelPengumuman = null;

    function __construct()
    {
        $this->db = \config\Database::connect();
        $this->ModelPengumuman = new ModelPengumuman();
    }

    public function index()
    {
        if (session('log_auth')['role'] == 'ADMINISTRATOR') {
            $data_akun = $this->db->table('user')->where('id', session('log_auth')['akunID'])->get()->getResultArray();
        }
        if (session('log_auth')['role'] == 'GURU') {
            $data_akun = $this->db->table('guru')->where('id_guru', session('log_auth')['akunID'])->get()->getResultArray();
        }
        if (session('log_auth')['role'] == 'SISWA') {
            $data_akun = $this->db->table('siswa')->where('id', session('log_auth')['akunID'])->get()->getResultArray();
        }
        if (session('log_auth')['role'] == 'ORTU') {
            $data_akun = $this->db->table('orangtua')->where('id_orangtua', session('log_auth')['akunID'])->get()->getResultArray();
        }

        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Dashboard',
            'pengumuman' => $this->ModelPengumuman->findAll(),
            'user' => $data_akun,
        ];
        return view('/dashboard/index', $data);
    }
}
