<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTahunAjar extends Model
{
    protected $table            = 'tahun_ajaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'tahun_ajaran',
        'status'
    ];
}
