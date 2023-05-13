<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategoriTugas extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kategori_tugas';
    protected $primaryKey       = 'kt_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kt_nama', 'kt_jenis', 'kt_deskripsi', 'kt_tanggal', 'kt_kkm', 'kt_bobot', 'kt_jadwal_id', 'kt_semester_id', 'kt_created_at', 'kt_edited_at', 'kt_deleted_at', 'kt_assessed_at', 'kt_value_changed_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'kt_created_at';
    protected $updatedField  = 'kt_edited_at';
    protected $deletedField  = 'kt_deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
