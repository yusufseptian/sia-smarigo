<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPrestasi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prestasi';
    protected $primaryKey       = 'prestasi_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'prestasi_nama', 'prestasi_deskripsi', 'prestasi_nond_id', 'prestasi_created_at', 'prestasi_created_by', 'prestasi_edited_at', 'prestasi_edited_by'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'prestasi_created_at';
    protected $updatedField  = 'prestasi_edited_at';
    protected $deletedField  = 'deleted_at';
}
