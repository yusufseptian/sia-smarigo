<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{
    protected $table            = 'matapelajaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'kode_matapelajaran',
        'nama_matapelajaran',
        'kkm_mapel',
        'kategori_mapel',
        'jurusan_mapel',
    ];
}
