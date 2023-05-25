<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDeskripsiNilaiAkhir;
use App\Models\ModelJadwal;
use App\Models\ModelKategoriTugas;
use App\Models\ModelKelas;
use App\Models\ModelMapel;
use App\Models\ModelNilaiAkademik;
use App\Models\ModelSemester;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjar;

class DeskripsiNilaiAkhir extends BaseController
{
    private $ModelTahunAjar = null;
    private $ModelJadwal = null;
    private $ModelMapel = null;
    private $ModelSemester = null;
    private $ModelKelas = null;
    private $ModelDeskripsiNA = null;
    private $ModelSiswa = null;
    private $ModelNilaiAkademikDetail = null;
    private $ModelKategori = null;

    public function __construct()
    {
        $this->ModelTahunAjar = new ModelTahunAjar();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelMapel = new ModelMapel();
        $this->ModelSemester = new ModelSemester();
        $this->ModelKelas = new ModelKelas();
        $this->ModelDeskripsiNA = new ModelDeskripsiNilaiAkhir();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelNilaiAkademikDetail = new ModelNilaiAkademik();
        $this->ModelKategori = new ModelKategoriTugas();
    }

    public function index()
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal
            ->join('matapelajaran', 'mapel_id=matapelajaran.id')
            ->where('tahun_ajaran', $dtTA['id'])
            ->where('guru_id', session('log_auth')['akunID'])
            ->groupBy('mapel_id')
            ->findAll();
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Penilaian Akademik',
            'dtJadwal' => $dtJadwal
        ];
        return view('guru/deskripsinilaiakhir/index', $data);
    }

    public function kelas($idMapel)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtMapel = $this->ModelMapel->find($idMapel);
        if (empty($dtMapel)) {
            session()->setFlashdata('danger', 'Data mapel tidak ditemukan');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->join('kelas', 'kelas_id=id_kelas')
            ->where('mapel_id', $dtMapel['id'])
            ->where('tahun_ajaran', $dtTA['id'])
            ->groupBy('kelas_id')->findAll();
        if (count($dtJadwal) == 0) {
            session()->setFlashdata('danger', 'Data kelas tidak ditemukan');
            return $this->redirectBack();
        }
        if ($dtJadwal[0]['guru_id'] != session('log_auth')['akunID']) {
            session()->setFlashdata('danger', 'Anda tidak memiliki akses ke jadwal ini');
            return $this->redirectBack();
        }
        if ($dtJadwal[0]['tahun_ajaran'] != $dtTA['id']) {
            session()->setFlashdata('danger', 'Jadwal tidak tersedia pada tahun ajaran saat ini');
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Penilaian Akademik',
            'dtJadwal' => $dtJadwal,
            'mapelID' => $idMapel,
            'dtSemester' => $this->ModelSemester->getActiveSemester()
        ];
        return view('guru/deskripsinilaiakhir/pilih_kelas', $data);
    }

    public function nilai($kategori, $idMapel, $idKelas)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtSmt = $this->ModelSemester->getActiveSemester();
        if (empty($dtSmt)) {
            session()->setFlashdata('danger', 'Tidak ada semester yang aktif');
            return $this->redirectBack();
        }
        if (strtolower($kategori) == 'pengetahuan' || strtolower($kategori) == 'keterampilan') {
            $kategori = strtolower($kategori);
        } else {
            session()->setFlashdata('danger', 'Data kategori tidak sesuai');
            return $this->redirectBack();
        }
        $dtMapel = $this->ModelMapel->find($idMapel);
        if (empty($dtMapel)) {
            session()->setFlashdata('danger', 'Data mapel tidak ditemukan');
            return $this->redirectBack();
        }
        $dtKelas = $this->ModelKelas->find($idKelas);
        if (empty($dtKelas)) {
            session()->setFlashdata('danger', 'Data kelas tidak ditemukan');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->join('guru', 'guru_id=id_guru')
            ->where('mapel_id', $idMapel)
            ->where('kelas_id', $idKelas)
            ->where('tahun_ajaran', $dtTA['id'])
            ->where('guru_id', session('log_auth')['akunID'])
            ->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        $dtSiswa = $this->ModelDeskripsiNA->join('siswa', 'dna_siswa_id=id')
            ->where('dna_kategori', $kategori)
            ->where('dna_jadwal_id', $dtJadwal['jadwal_id'])
            ->where('dna_semester_id', $dtSmt['id_semester'])->findAll();
        if (empty($dtSiswa)) {
            $dtSiswa = $this->ModelSiswa->where('id_kelas', $idKelas)->findAll();
            $isFinished = false;
        } else {
            $isFinished = true;
        }
        $dtNilaiAkademik = [];
        foreach ($dtSiswa as $dt) {
            $nilai = 0;
            $dtKT = $this->ModelKategori->where('kt_jadwal_id', $dtJadwal['jadwal_id'])->where('kt_semester_id', $dtSmt['id_semester'])->where('kt_jenis', $kategori)->findAll();
            foreach ($dtKT as $kt) {
                $tmpNilai = $this->ModelNilaiAkademikDetail->where('na_kategori_id', $kt['kt_id'])->where('na_siswa_id', $dt['id'])->first();
                $tmp = (empty($tmpNilai)) ? 0 : $tmpNilai['na_nilai'];
                $nilai += $kt['kt_bobot'] / 100 * $tmp;
            }
            $dtNilaiAkademik[$dt['id']] = $nilai;
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Penilaian Akademik',
            'mapelID' => $idMapel,
            'kelasID' => $idKelas,
            'kategori' => $kategori,
            'dtJadwal' => $dtJadwal,
            'dtSiswa' => $dtSiswa,
            'dtMapel' => $dtMapel,
            'dtKelas' => $dtKelas,
            'dtTA' => $dtTA,
            'dtSmt' => $dtSmt,
            'dtNilaiAkademik' => $dtNilaiAkademik,
            'dtSemester' => $this->ModelSemester->getActiveSemester(),
            'isFinished' => $isFinished
        ];
        return view('guru/deskripsinilaiakhir/penilaian', $data);
    }

    public function save($kategori, $idMapel, $idKelas)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtSmt = $this->ModelSemester->getActiveSemester();
        if (empty($dtSmt)) {
            session()->setFlashdata('danger', 'Tidak ada semester yang aktif');
            return $this->redirectBack();
        }
        if (strtolower($kategori) == 'pengetahuan' || strtolower($kategori) == 'keterampilan') {
            $kategori = strtolower($kategori);
        } else {
            session()->setFlashdata('danger', 'Data kategori tidak sesuai');
            return $this->redirectBack();
        }
        $dtMapel = $this->ModelMapel->find($idMapel);
        if (empty($dtMapel)) {
            session()->setFlashdata('danger', 'Data mapel tidak ditemukan');
            return $this->redirectBack();
        }
        $dtKelas = $this->ModelKelas->find($idKelas);
        if (empty($dtKelas)) {
            session()->setFlashdata('danger', 'Data kelas tidak ditemukan');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->join('guru', 'guru_id=id_guru')
            ->where('mapel_id', $idMapel)
            ->where('kelas_id', $idKelas)
            ->where('tahun_ajaran', $dtTA['id'])
            ->where('guru_id', session('log_auth')['akunID'])
            ->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        $dtSiswa = $this->ModelDeskripsiNA->join('siswa', 'dna_siswa_id=id')
            ->where('dna_kategori', $kategori)
            ->where('dna_jadwal_id', $dtJadwal['jadwal_id'])
            ->where('dna_semester_id', $dtSmt['id_semester'])->findAll();
        if (empty($dtSiswa)) {
            $dtSiswa = $this->ModelSiswa->where('id_kelas', $idKelas)->findAll();
        } else {
            session()->setFlashdata('danger', 'Data telah dimasukan sebelumnya');
            return $this->redirectBack();
        }
        foreach ($dtSiswa as $dt) {
            $data = [
                'dna_jadwal_id' => $dtJadwal['jadwal_id'],
                'dna_siswa_id' => $dt['id'],
                'dna_kategori' => $kategori,
                'dna_deskripsi' => $this->request->getPost('txtDeskripsi' . $dt['nis']),
                'dna_semester_id' => $dtSmt['id_semester'],
                'dna_created_by' => session('log_auth')['akunID']
            ];
            $this->ModelDeskripsiNA->insert($data);
        }
        return redirect()->to(base_url("deskripsinilaiakhir/nilai/$kategori/$idMapel/$idKelas"))->with('success', 'Deskripsi nilai akhir berhasil dimasukan');
    }

    public function edit($kategori, $idMapel, $idKelas)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtSmt = $this->ModelSemester->getActiveSemester();
        if (empty($dtSmt)) {
            session()->setFlashdata('danger', 'Tidak ada semester yang aktif');
            return $this->redirectBack();
        }
        if (strtolower($kategori) == 'pengetahuan' || strtolower($kategori) == 'keterampilan') {
            $kategori = strtolower($kategori);
        } else {
            session()->setFlashdata('danger', 'Data kategori tidak sesuai');
            return $this->redirectBack();
        }
        $dtMapel = $this->ModelMapel->find($idMapel);
        if (empty($dtMapel)) {
            session()->setFlashdata('danger', 'Data mapel tidak ditemukan');
            return $this->redirectBack();
        }
        $dtKelas = $this->ModelKelas->find($idKelas);
        if (empty($dtKelas)) {
            session()->setFlashdata('danger', 'Data kelas tidak ditemukan');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->join('guru', 'guru_id=id_guru')
            ->where('mapel_id', $idMapel)
            ->where('kelas_id', $idKelas)
            ->where('tahun_ajaran', $dtTA['id'])
            ->where('guru_id', session('log_auth')['akunID'])
            ->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        $dtSiswa = $this->ModelDeskripsiNA->join('siswa', 'dna_siswa_id=id')
            ->where('dna_kategori', $kategori)
            ->where('dna_jadwal_id', $dtJadwal['jadwal_id'])
            ->where('dna_semester_id', $dtSmt['id_semester'])->findAll();
        if (empty($dtSiswa)) {
            session()->setFlashdata('danger', 'Data belum dimasukan sebelumnya');
            return $this->redirectBack();
        }
        foreach ($dtSiswa as $dt) {
            $data = [
                'dna_deskripsi' => $this->request->getPost('txtDeskripsi' . $dt['nis']),
                'dna_edited_by' => session('log_auth')['akunID']
            ];
            $this->ModelDeskripsiNA->update($dt['dna_id'], $data);
        }
        return redirect()->to(base_url("deskripsinilaiakhir/nilai/$kategori/$idMapel/$idKelas"))->with('success', 'Deskripsi nilai akhir berhasil dimasukan');
    }
}
