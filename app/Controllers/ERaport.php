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
    public function nilai($nis)
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
        $dtSiswa = $this->modelSiswa->where('nis', $nis)->where('id_kelas', session('log_auth')['waliKelas']['id'])->first();
        if (empty($dtSiswa)) {
            session()->setFlashdata('danger', 'Data siswa tidak ditemukan');
            return $this->redirectBack();
        }
        $dtNond = $this->modelNilaiNonAkademikDetail->join('nilai_non_akademik', 'non_id=nond_non_id')
            ->where('non_semester_id', $dtSmt['id_semester'])
            ->where('non_kelas_id', $dtSiswa['id_kelas'])
            ->where('nond_siswa_id', $dtSiswa['id'])
            ->first();
        $dtPrestasi = $this->modelPrestasi->where('prestasi_nond_id', $dtNond['nond_id'])->findAll();
        $dtEkskul = $this->modelEkskul->where('ekskul_nond_id', $dtNond['nond_id'])->findAll();
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
        $dtKelas = $this->modelKelas->join('guru', 'id_guru=wali_kelas_id')->where('id_kelas', $dtSiswa['id_kelas'])->where('wali_kelas_id', session('log_auth')['akunID'])->first();
        if (empty($dtKelas)) {
            session()->setFlashdata('danger', 'Anda tidak punya akses kesini');
            return $this->redirectBack();
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
}
