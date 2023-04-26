<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{
    protected $table            = 'jadwal';
    protected $primaryKey       = 'jadwal_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jadwal_id',
        'mapel_id',
        'guru_id',
        'kelas_id',
        'hari',
        'jam_mengajar',
        'tahun_ajaran'
    ];
    public function getDataJadwal($id_guru = null)
    {
        $dt_jadwal =  $this->db->table('jadwal')
            ->join('matapelajaran', 'matapelajaran.id=jadwal.mapel_id')
            ->join('guru', 'guru.id_guru=jadwal.guru_id')
            ->join('kelas', 'kelas.id_kelas=jadwal.kelas_id');
        if (!is_null($id_guru)) {
            $dt_jadwal->where('guru_id', $id_guru);
        }
        return $dt_jadwal->get()->getResultArray();
    }
}
