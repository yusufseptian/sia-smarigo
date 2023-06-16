<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelKategoriTugas;
use App\Models\ModelNilaiAkademik;
use App\Models\ModelOrtu;
use App\Models\ModelSemester;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjar;

class HasilBelajar extends BaseController
{

    private $ModelTahunAjar = null;
    private $ModelJadwal = null;
    private $ModelNilaiAkademik = null;
    private $ModelOrtu = null;
    private $ModelSiswa = null;
    private $ModelKategori = null;
    private $ModelSemester = null;

    public function __construct()
    {
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelNilaiAkademik = new ModelNilaiAkademik();
        $this->ModelOrtu = new ModelOrtu();
        $this->ModelTahunAjar = new ModelTahunAjar();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKategori = new ModelKategoriTugas();
        $this->ModelSemester = new ModelSemester();
    }

    public function index()
    {
        if (session('log_auth')['role'] == "GURU") {
            $dtTahun = $this->ModelJadwal->join('tahun_ajaran', 'jadwal.tahun_ajaran=id')
                ->where('guru_id', session('log_auth')['akunID'])
                ->groupBy('jadwal.tahun_ajaran')
                ->findAll();
            $dtKelas = $this->ModelJadwal->select('kelas_id as idKelas, nama_kelas as namaKelas, tahun_ajaran as idTahunAjaran')
                ->where('guru_id', session('log_auth')['akunID'])
                ->join('kelas', 'kelas_id=id_kelas')
                ->groupBy('kelas_id')
                ->findAll();
        } elseif (session('log_auth')['role'] == "SISWA") {
            $dtTahun = $this->ModelNilaiAkademik->join('kategori_tugas', 'na_kategori_id=kt_id')
                ->join('jadwal', 'kt_jadwal_id=jadwal_id')
                ->join('kelas', 'kelas_id=id_kelas')
                ->join('tahun_ajaran', 'tahun_ajaran.id=jadwal.tahun_ajaran')
                ->where('na_siswa_id', session('log_auth')['akunID'])
                ->groupBy('kelas_id')
                ->findAll();
        } elseif (session('log_auth')['role'] == "ORTU") {
            $dtAkun = $this->ModelOrtu->select('siswa.id as siswaID')->join('siswa', 'nis_siswa=nis')->where('id_orangtua', session('log_auth')['akunID'])->first();
            $dtTahun = $this->ModelNilaiAkademik->join('kategori_tugas', 'na_kategori_id=kt_id')
                ->join('jadwal', 'kt_jadwal_id=jadwal_id')
                ->join('kelas', 'kelas_id=id_kelas')
                ->join('tahun_ajaran', 'tahun_ajaran.id=jadwal.tahun_ajaran')
                ->where('na_siswa_id', $dtAkun['siswaID'])
                ->groupBy('kelas_id')
                ->findAll();
        } else {
            session()->setFlashdata('Anda tidak memiliki akses');
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Hasil Belajar',
            'dtTahunAjaran' => $dtTahun
        ];
        if (isset($dtKelas)) {
            $data['dtKelas'] = $dtKelas;
        }
        return view('guru/hasilbelajar/index', $data);
    }

    public function mapel($idTahunAjaran, $idKelas = 0)
    {
        $dtTA = $this->ModelTahunAjar->find($idTahunAjaran);
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran tidak ditemukan');
            return $this->redirectBack();
        }
        if (session('log_auth')['role'] == "GURU") {
            if ($idKelas == 0) {
                session()->setFlashdata('danger', 'Mohon pilih kelas terlebih dahulu');
                return $this->redirectBack();
            }
            $dtMapel = $this->ModelJadwal->join('matapelajaran', 'mapel_id=matapelajaran.id')
                ->where('guru_id', session('log_auth')['akunID'])
                ->where('tahun_ajaran', $idTahunAjaran)
                ->where('kelas_id', $idKelas)
                ->groupBy('mapel_id')->findAll();
            session()->set('idKelasForHasil', $idKelas);
        } elseif (session('log_auth')['role'] == "SISWA") {
            $dtMapel = $this->ModelNilaiAkademik->join('kategori_tugas', 'na_kategori_id=kt_id')
                ->join('jadwal', 'kt_jadwal_id=jadwal_id')
                ->join('matapelajaran', 'mapel_id=matapelajaran.id')
                ->where('na_siswa_id', session('log_auth')['akunID'])
                ->where('jadwal.tahun_ajaran', $idTahunAjaran)
                ->groupBy('mapel_id')
                ->findAll();
        } elseif (session('log_auth')['role'] == "ORTU") {
            $dtAkun = $this->ModelOrtu->select('siswa.id as siswaID')->join('siswa', 'nis_siswa=nis')->where('id_orangtua', session('log_auth')['akunID'])->first();
            $dtSiswa = $this->ModelSiswa->find($dtAkun['siswaID']);
            $dtMapel = $this->ModelNilaiAkademik->join('kategori_tugas', 'na_kategori_id=kt_id')
                ->join('jadwal', 'kt_jadwal_id=jadwal_id')
                ->join('matapelajaran', 'mapel_id=matapelajaran.id')
                ->where('na_siswa_id', $dtAkun['siswaID'])
                ->where('jadwal.tahun_ajaran', $idTahunAjaran)
                ->groupBy('mapel_id')
                ->findAll();
        } else {
            session()->setFlashdata('Anda tidak memiliki akses');
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Hasil Belajar',
            'dtMapel' => $dtMapel,
            'tahunAjaranID' => $idTahunAjaran
        ];
        if (isset($dtSiswa)) {
            $data['dtSiswa'] = $dtSiswa;
        }
        return view('guru/hasilbelajar/pilih_mapel', $data);
    }

    public function hasil($idTahunAjaran, $idMapel, $semester = 0, $keterangan = null)
    {
        $dtTA = $this->ModelTahunAjar->find($idTahunAjaran);
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran tidak ditemukan');
            return $this->redirectBack();
        }
        if ($semester == 0) {
            $dtSmt = $this->ModelSemester->where('id_ta', $dtTA['id'])->first();
        } else {
            $dtSmt = $this->ModelSemester->where('id_ta', $dtTA['id'])->where('id_semester', $semester)->first();
            if (empty($dtSmt)) {
                session()->setFlashdata('danger', 'Data semester tidak ditemukan');
                return $this->redirectBack();
            }
        }
        $keterangan = strtolower($keterangan);
        if (is_null($keterangan)) {
            $keterangan = 'pengetahuan';
        } else {
            if ($keterangan == 'pengetahuan' || $keterangan == 'keterampilan') {
                session()->setFlashdata('danger', 'Data keterangan kategori tidak sesuai');
                return $this->redirectBack();
            }
        }
        $dtSiswa = $this->ModelSiswa->find(session('log_auth')['akunID']);
        $dtMapel = $this->ModelJadwal->join('matapelajaran', 'id = mapel_id')
            ->join('kelas', 'kelas_id=id_kelas')
            ->where('mapel_id', $idMapel)
            ->where('kelas_id', $dtSiswa['id_kelas'])
            ->where('tahun_ajaran', $idTahunAjaran);
        if (session('log_auth')['role'] == "GURU") {
            $dtMapel->where('kelas_id', session('idKelasForHasil'))
                ->where('guru_id', session('log_auth')['akunID']);
            $dtMapel = $dtMapel->first();
        } elseif (session('log_auth')['role'] == "SISWA" || session('log_auth')['role'] == "ORTU") {
            $dtMapel = $dtMapel->first();
        } else {
            session()->setFlashdata('Anda tidak memiliki akses');
            return $this->redirectBack();
        }
        if (empty($dtMapel)) {
            session()->setFlashdata('danger', 'Data mapel tidak ditemukan');
            return $this->redirectBack();
        }
        if (is_null($keterangan)) {
            $keterangan = 'pengetahuan';
        }
        $dtKategori = $this->ModelKategori->where('kt_jadwal_id', $dtMapel['jadwal_id'])->where('kt_semester_id', $dtSmt['id_semester'])->where('kt_jenis', $keterangan)->findAll();
        if (session('log_auth')['role'] == "GURU") {
            $dtNilai = [];
            $dtSiswa = $this->ModelSiswa->select('id,nis,nama')->where('id_kelas', $dtMapel['kelas_id'])->findAll();
            if ($dtTA['id'] != $this->ModelTahunAjar->getTANow()['id']) {
                $dtSiswa = $this->ModelNilaiAkademik->join('kategori_tugas', 'na_kategori_id=kt_id')
                    ->join('jadwal', 'kt_jadwal_id=jadwal_id')
                    ->where('jadwal_id', $dtMapel['jadwal_id'])
                    ->groupBy('na_siswa_id')->findAll();
            }
            if (empty($dtSiswa)) {
                session()->setFlashdata('danger', 'Data siswa masih kosong');
                return $this->redirectBack();
            }
            foreach ($dtSiswa as $siswa) {
                $tmpSiswa = $siswa;
                foreach ($dtKategori as $dt) {
                    $tmp = $this->ModelNilaiAkademik->where('na_kategori_id', $dt['kt_id'])->where('na_siswa_id', $siswa['id'])->first();
                    if (!empty($tmp)) {
                        $tmpSiswa[$dt['kt_id']] = $tmp;
                    } else {
                        $tmpSiswa[$dt['kt_id']] = null;
                    }
                }
                array_push($dtNilai, $tmpSiswa);
            }
        } elseif (session('log_auth')['role'] == "SISWA") {
            $dtNilai = [];
            foreach ($dtKategori as $dt) {
                $tmp = $this->ModelNilaiAkademik->where('na_kategori_id', $dt['kt_id'])->where('na_siswa_id', session('log_auth')['akunID'])->first();
                if (!empty($tmp)) {
                    $dtNilai[$dt['kt_id']] = $tmp;
                } else {
                    $dtNilai[$dt['kt_id']] = null;
                }
            }
            $dtSiswa = $this->ModelSiswa->find(session('log_auth')['akunID']);
        } elseif (session('log_auth')['role'] == "ORTU") {
            $dtAkun = $this->ModelOrtu->select('siswa.id as siswaID')->join('siswa', 'nis_siswa=nis')->where('id_orangtua', session('log_auth')['akunID'])->first();
            $dtSiswa = $this->ModelSiswa->find($dtAkun['siswaID']);
            $dtNilai = [];
            foreach ($dtKategori as $dt) {
                $tmp = $this->ModelNilaiAkademik->where('na_kategori_id', $dt['kt_id'])->where('na_siswa_id', $dtAkun['siswaID'])->first();
                if (!empty($tmp)) {
                    $dtNilai[$dt['kt_id']] = $tmp;
                } else {
                    $dtNilai[$dt['kt_id']] = null;
                }
            }
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Hasil Belajar',
            'dtMapel' => $dtMapel,
            'dtNilai' => $dtNilai,
            'dtKategori' => $dtKategori,
            'tahunAjaranID' => $idTahunAjaran,
            'mapelID' => $idMapel,
            'dtTA' => $dtTA,
            'jenisKategori' => strtolower($keterangan),
            'listSemester' => $this->ModelSemester->where('id_ta', $dtTA['id'])->findAll(),
            'dtSmt' => $dtSmt,
            'semesterID' => $dtSmt['id_semester']
        ];
        if (isset($dtSiswa)) {
            $data['dtSiswa'] = $dtSiswa;
        }
        return view('guru/hasilbelajar/hasil', $data);
    }
}
