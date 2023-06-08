<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'nis',
        'username',
        'password',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'gender',
        'id_kelas',
        'alamat',
        'no_hp',
        'photo'
    ];
}
