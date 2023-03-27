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
        'semester'
    ];
    public function getDataSmt()
    {
        return $this->db->table('semester')
            ->join('tahun_ajaran', 'tahun_ajaran.id=semester.id_ta')
            ->get()->getResultArray();
    }
}
