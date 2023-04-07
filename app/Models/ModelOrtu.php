<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOrtu extends Model
{
    protected $table            = 'orangtua';
    protected $primaryKey       = 'id_orangtua';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_orangtua',
        'username',
        'password',
        'nama',
        'no_hp',
        'pekerjaan',
        'nis_siswa',
        'alamat',
    ];
}
