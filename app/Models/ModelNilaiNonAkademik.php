<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilaiNonAkademik extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nilai_non_akademik';
    protected $primaryKey       = 'non_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'non_kelas_id', 'non_wali_kelas_id', 'non_semester_id', 'non_created_by', 'non_created_at', 'non_edited_at', 'non_edited_by'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'non_created_at';
    protected $updatedField  = 'non_edited_at';
    protected $deletedField  = 'deleted_at';
}
