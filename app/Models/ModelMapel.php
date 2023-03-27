<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{
    protected $table            = 'matapelajaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'kode_matapelajaran',
        'nama_matapelajaran',
        'id_semester',
        'id_guru',
        'jam_pelajaran'
    ];
    public function getDataMapel()
    {
        return $this->db->table('matapelajaran')
            ->join('semester', 'semester.id_semester=matapelajaran.id_semester')
            ->join('guru', 'guru.id_guru=matapelajaran.id_guru')
            ->get()->getResultArray();
    }
}
