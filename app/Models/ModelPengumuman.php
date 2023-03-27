<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengumuman extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id',
        'judul',
        'pengumuman',
        'created_at',
        'update_at'
    ];
}
