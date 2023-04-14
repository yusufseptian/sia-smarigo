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
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Dashboard',
            'pengumuman' => $this->ModelPengumuman->findAll(),
        ];
        return view('templates/index', $data);
    }
}
