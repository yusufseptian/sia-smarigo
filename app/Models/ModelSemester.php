<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSemester extends Model
{
    protected $table            = 'semester';
    protected $primaryKey       = 'id_semester';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_semester',
        'id_ta',
        'semester',
        'mulai',
        'selesai',
        'mulai_by',
        'selesai_by'
    ];
    public function getDataSmt()
    {
        return $this->db->table('semester')
            ->join('tahun_ajaran', 'tahun_ajaran.id=semester.id_ta')
            ->get()->getResultArray();
    }
    public function getActiveSemester()
    {
        $ta = new ModelTahunAjar();
        foreach ($this->where('id_ta', $ta->getTANow()['id'])->findAll() as $dt) {
            if (!is_null($dt['mulai']) && is_null($dt['selesai'])) {
                return $dt;
            }
        }
        return null;
    }
}
