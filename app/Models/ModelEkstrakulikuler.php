<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEkstrakulikuler extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ekstrakulikuler';
    protected $primaryKey       = 'ekskul_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ekskul_nama', 'ekskul_predikat', 'ekskul_deskripsi', 'ekskul_nond_id', 'ekskul_created_at', 'ekskul_created_by', 'ekskul_edited_at', 'ekskul_edited_by'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'ekskul_created_at';
    protected $updatedField  = 'ekskul_edited_at';
    protected $deletedField  = 'deleted_at';
}
