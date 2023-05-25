<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelEkstrakulikuler;
use App\Models\ModelJadwal;
use App\Models\ModelKategoriTugas;
use App\Models\ModelKelas;
use App\Models\ModelNilaiAkademik;
use App\Models\ModelNilaiNonAkademik;
use App\Models\ModelNilaiNonAkademikDetail;
use App\Models\ModelOrtu;
use App\Models\ModelPrestasi;
use App\Models\ModelSemester;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjar;

class ERaport extends BaseController
{
    private $modelSiswa = null;
    private $modelKelas = null;
    private $modelTahunAjar = null;
    private $modelSemester = null;
    private $modelPrestasi = null;
    private $modelEkskul = null;
    private $modelNilaiNonAkademik = null;
    private $modelNilaiNonAkademikDetail = null;
    private $modelKategoriTugas = null;
    private $modelNilaiAkademikDetail = null;
    private $modelJadwal = null;
    private $modelOrtu = null;

    public function __construct()
    {
        $this->modelSiswa = new ModelSiswa();
        $this->modelKelas = new ModelKelas();
        $this->modelSemester = new ModelSemester();
        $this->modelTahunAjar = new ModelTahunAjar();
        $this->modelEkskul = new ModelEkstrakulikuler();
        $this->modelPrestasi = new ModelPrestasi();
        $this->modelNilaiNonAkademik = new ModelNilaiNonAkademik();
        $this->modelNilaiNonAkademikDetail = new ModelNilaiNonAkademikDetail();
        $this->modelKategoriTugas = new ModelKategoriTugas();
        $this->modelNilaiAkademikDetail = new ModelNilaiAkademik();
        $this->modelJadwal = new ModelJadwal();
        $this->modelOrtu = new ModelOrtu();
        helper('form');
    }
    public function index()
    {
        $dtTA = $this->modelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajar masih kosong');
            return $this->redirectBack();
        }
        $dtKelas = $this->modelKelas->find(session('log_auth')['waliKelas']['id']);
        $dtSiswa = $this->modelSiswa->where('id_kelas', session('log_auth')['waliKelas']['id'])->findAll();
        if (empty($dtSiswa)) {
            session()->setFlashdata('danger', 'Data siswa pada kelas ' . $dtKelas['nama_kelas'] . ' masih kosong');
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'E-Raport',
            'dtSiswa' => $dtSiswa,
            'dtKelas' => $dtKelas,
            'dtTA' => $dtTA,
            'dtSmt' => $this->modelSemester->getActiveSemester()
        ];
        return view('guru/eraport/index', $data);
    }
    public function nilai($nis, $idTA = 0, $semester = 0)
    {
        $dtTA = $this->modelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajar masih kosong');
            return $this->redirectBack();
        }
        $dtSmt = $this->modelSemester->getActiveSemester();
        if (empty($dtSmt)) {
            session()->setFlashdata('danger', 'Belum ada semester yang dimulai pada tahun ajaran ini. Silahkan hubungi admin');
            return $this->redirectBack();
        }
        if (session('log_auth')['role'] == "SISWA" || session('log_auth')['role'] == "ORTU") {
            $dtSiswa = $this->modelSiswa->where('nis', $nis)->first();
            $dtKelas =  $this->modelKelas->join('guru', 'id_guru=wali_kelas_id')->where('id_kelas', $dtSiswa['id_kelas'])->first();
        } else {
            $dtSiswa = $this->modelSiswa->where('nis', $nis)->where('id_kelas', session('log_auth')['waliKelas']['id'])->first();
            $dtKelas = $this->modelKelas->join('guru', 'id_guru=wali_kelas_id')->where('id_kelas', $dtSiswa['id_kelas'])->where('wali_kelas_id', session('log_auth')['akunID'])->first();
        }
        if (empty($dtSiswa)) {
            session()->setFlashdata('danger', 'Data siswa tidak ditemukan');
            return $this->redirectBack();
        }
        if (empty($dtKelas)) {
            session()->setFlashdata('danger', 'Anda tidak punya akses kesini');
            return $this->redirectBack();
        }
        if (session('log_auth')['role'] == "SISWA" || session('log_auth')['role'] == "ORTU") {
            if (!is_numeric($idTA) || !is_numeric($semester)) {
                session()->setFlashdata('danger', 'Data tidak valid!');
                return $this->redirectBack();
            }
            $dtTA = $this->modelTahunAjar->find($idTA);
            if (empty($dtTA)) {
                session()->setFlashdata('danger', 'Data tidak valid!');
                return $this->redirectBack();
            }
            $dtSmt = $this->modelSemester->where('id_ta', $idTA);
            if ($semester == 1) {
                $dtSmt->where('semester', 'ganjil');
            } elseif ($semester == 2) {
                $dtSmt->where('semester', 'genap');
            } else {
                session()->setFlashdata('danger', 'Data tidak valid!');
                return $this->redirectBack();
            }
            $dtSmt = $dtSmt->first();
        }
        if (session('log_auth')['role'] == "SISWA") {
            $tmpDataSiswa = $this->modelSiswa->find(session('log_auth')['akunID']);
            if ($tmpDataSiswa['id'] != $dtSiswa['id']) {
                session()->setFlashdata('danger', 'Akses ditolak');
                return $this->redirectBack();
            }
        } elseif (session('log_auth')['role'] == "ORTU") {
            $tmpOrtu = $this->modelOrtu->find(session('log_auth')['akunID']);
            if ($tmpOrtu['nis_siswa'] != $nis) {
                session()->setFlashdata('danger', 'Akses ditolak');
                return $this->redirectBack();
            }
        }
        $dtNond = $this->modelNilaiNonAkademikDetail->join('nilai_non_akademik', 'non_id=nond_non_id')
            ->where('non_semester_id', $dtSmt['id_semester'])
            ->where('non_kelas_id', $dtSiswa['id_kelas'])
            ->where('nond_siswa_id', $dtSiswa['id'])
            ->first();
        if (!empty($dtNond)) {
            $dtPrestasi = $this->modelPrestasi->where('prestasi_nond_id', $dtNond['nond_id'])->findAll();
            $dtEkskul = $this->modelEkskul->where('ekskul_nond_id', $dtNond['nond_id'])->findAll();
        } else {
            $dtPrestasi = [];
            $dtEkskul = [];
        }
        $dtNA = [];
        $dtJadwal = $this->modelJadwal->join('matapelajaran', 'id=mapel_id')
            ->where('kelas_id', $dtSiswa['id_kelas'])->where('tahun_ajaran', $dtTA['id'])->findAll();
        foreach ($dtJadwal as $dt) {
            $tmpNAP = 0;
            $tmpNAK = 0;
            foreach ($this->modelKategoriTugas->where('kt_jadwal_id', $dt['jadwal_id'])->where('kt_semester_id', $dtSmt['id_semester'])->where('kt_jenis', 'pengetahuan')->findAll() as $kategori) {
                $tmNilai = $this->modelNilaiAkademikDetail->where('na_kategori_id', $kategori['kt_id'])->where('na_siswa_id', $dtSiswa['id'])->first();
                $nilai = (is_null($tmNilai)) ? 0 : $tmNilai['na_nilai'];
                $tmpNAP += $kategori['kt_bobot'] / 100 * $nilai;
            }
            foreach ($this->modelKategoriTugas->where('kt_jadwal_id', $dt['jadwal_id'])->where('kt_semester_id', $dtSmt['id_semester'])->where('kt_jenis', 'keterampilan')->findAll() as $kategori) {
                $tmNilai = $this->modelNilaiAkademikDetail->where('na_kategori_id', $kategori['kt_id'])->where('na_siswa_id', $dtSiswa['id'])->first();
                $nilai = (is_null($tmNilai)) ? 0 : $tmNilai['na_nilai'];
                $tmpNAK += $kategori['kt_bobot'] / 100 * $nilai;
            }
            $dtNA[$dt['mapel_id']] = [
                'namaMapel' => $dt['nama_matapelajaran'],
                'nilaiPengetahuan' => $tmpNAP,
                'nilaiKeterampilan' => $tmpNAK
            ];
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'E-Raport',
            'dtSiswa' => $dtSiswa,
            'dtTA' => $dtTA,
            'dtSmt' => $this->modelSemester->getActiveSemester(),
            'nisSiswa' => $nis,
            'dtNond' => $dtNond,
            'dtPrestasi' => $dtPrestasi,
            'dtEkskul' => $dtEkskul,
            'dtNA' => $dtNA,
            'dtKelas' => $dtKelas,
            'listBulan' => $this->listBulan,
            'dtJadwal' => $dtJadwal
        ];
        return view('guru/eraport/detail', $data);
    }

    public function tahun_ajaran()
    {
        $dtSiswa = $this->modelSiswa->find(session('log_auth')['akunID']);
        $dtTahun = $this->modelNilaiNonAkademikDetail
            ->join('nilai_non_akademik', 'nond_non_id=non_id')
            ->join('kelas', 'id_kelas=non_kelas_id')
            ->join('semester', 'id_semester=non_semester_id')
            ->join('tahun_ajaran', 'semester.id_ta=id')
            ->groupBy('id')->findAll();
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'E-Raport',
            'dtSiswa' => $dtSiswa,
            'dtTahun' => $dtTahun
        ];
        return view('siswa/eraport/select_tahun', $data);
    }
}
