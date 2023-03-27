<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    protected $table            = 'guru';
    protected $primaryKey       = 'id_guru';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_guru',
        'username',
        'password',
        'nip',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'gender',
        'no_hp',
        'email',
        'alamat',
        'jabatan',
        'pendidikan_terakhir',
        'photo'
    ];
}
