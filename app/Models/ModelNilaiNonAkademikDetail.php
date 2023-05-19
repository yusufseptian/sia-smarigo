<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilaiNonAkademikDetail extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nilai_non_akademik_detail';
    protected $primaryKey       = 'nond_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nond_non_id', 'nond_siswa_id', 'nond_spiritual_predikat', 'nond_spiritual_deskripsi', 'nond_sosial_predikat', 'nond_sosial_deskripsi', 'nond_sakit', 'nond_izin', 'nond_tanpa_keterangan', 'nond_catatan_wali_kelas', 'nond_catatan_ortu', 'nond_created_by', 'nond_created_at', 'nond_edited_at', 'nond_edited_by'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'nond_created_at';
    protected $updatedField  = 'nond_edited_at';
    protected $deletedField  = 'deleted_at';
}
