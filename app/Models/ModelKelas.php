<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kelas',
        'kode_kelas',
        'nama_kelas',
        'id_ta',
        'wali_kelas_id'
    ];
    public function getDataKelas()
    {
        return $this->db->table('kelas')
            ->join('tahun_ajaran', 'tahun_ajaran.id=kelas.id_ta')
            ->get()->getResultArray();
    }
}
