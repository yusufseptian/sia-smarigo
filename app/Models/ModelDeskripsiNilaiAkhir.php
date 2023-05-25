<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDeskripsiNilaiAkhir extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'deskripsi_nilai_akhir';
    protected $primaryKey       = 'dna_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'dna_siswa_id', 'dna_kategori', 'dna_jadwal_id', 'dna_deskripsi', 'dna_semester_id', 'dna_created_by', 'dna_edited_by'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dna_created_at';
    protected $updatedField  = 'dna_edited_at';
    protected $deletedField  = 'deleted_at';
}
