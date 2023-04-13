<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTahunAjar extends Model
{
    protected $table            = 'tahun_ajaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'tahun_ajaran',
        'status',
        'created_at',
        'created_by',
        'edited_at',
        'edited_by'
    ];

    public function getTANow()
    {
        return $this->orderBy('id', 'desc')->first();
    }

    public function isFinished(): bool
    {
        $semester = new ModelSemester();
        if (is_null($this->getTANow())) {
            return true;
        }
        $dt = $semester->where('id_ta', $this->getTANow()['id'])->where('semester', 'genap')->first();
        if (!is_null($dt['selesai'])) {
            return true;
        }
        return false;
    }
}
