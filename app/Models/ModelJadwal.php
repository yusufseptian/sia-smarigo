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
        'mapel_kkm',
        'guru_id',
        'kelas_id',
        'hari',
        'jam_mengajar',
        'tahun_ajaran',
        'wali_kelas_id'
    ];
    public function getDataJadwal($id_guru = null)
    {
        $ModelThajar = new ModelTahunAjar();
        $dtTA = $ModelThajar->getTANow();
        $dt_jadwal =  $this->select('*','tahun_ajaran.tahun_ajaran as th')
            ->join('tahun_ajaran', 'tahun_ajaran.id=jadwal.tahun_ajaran')
            ->join('matapelajaran', 'matapelajaran.id=jadwal.mapel_id')
            ->join('guru', 'guru.id_guru=jadwal.guru_id')
            ->join('kelas', 'kelas.id_kelas=jadwal.kelas_id')
            ->where('jadwal.tahun_ajaran', $dtTA['id']);
        if (!is_null($id_guru)) {
            $dt_jadwal->where('guru_id', $id_guru);
        }
        return $dt_jadwal->get()->getResultArray();
    }
}
