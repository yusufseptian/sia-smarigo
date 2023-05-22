<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelEkstrakulikuler;
use App\Models\ModelKelas;
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
    { {
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
            $isFinished = false;
            $dtNilaiNonAkademik = $this->modelNilaiNonAkademik->where('non_kelas_id', $dtSiswa['id_kelas'])->where('non_semester_id', $dtSmt['id_semester'])->first();
            if (!empty($dtNilaiNonAkademik)) {
                $dtNond = $this->modelNilaiNonAkademikDetail->where('nond_non_id', $dtNilaiNonAkademik['non_id'])->where('nond_siswa_id', $dtSiswa['id'])->first();
                if (!empty($dtNond)) {
                    $isFinished = true;
                    $dtPrestasi = $this->modelPrestasi->where('prestasi_nond_id', $dtNond['nond_id'])->findAll();
                    $dtEkskul = $this->modelEkskul->where('ekskul_nond_id', $dtNond['nond_id'])->findAll();
                }
            }
            $data = [
                'title' => 'Siasmarigo',
                'sub_title' => 'E-Raport',
                'dtSiswa' => $dtSiswa,
                'dtTA' => $dtTA,
                'dtSmt' => $this->modelSemester->getActiveSemester(),
                'nisSiswa' => $nis,
                'isFinished' => $isFinished
            ];
            if ($isFinished) {
                $data['dtNilaiNonAkademik'] = $dtNilaiNonAkademik;
                $data['dtNond'] = $dtNond;
                $data['dtPrestasi'] = $dtPrestasi;
                $data['dtEkskul'] = $dtEkskul;
            }
            return view('guru/eraport/detail', $data);
        }
    }
}
