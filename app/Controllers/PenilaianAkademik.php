<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelKategoriTugas;
use App\Models\ModelKelas;
use App\Models\ModelMapel;
use App\Models\ModelNilaiAkademik;
use App\Models\ModelSemester;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjar;

class PenilaianAkademik extends BaseController
{

    private $ModelJadwal = null;
    private $ModelSemester = null;
    private $ModelTahunAjar = null;
    private $ModelMapel = null;
    private $ModelKelas = null;
    private $ModelKategori = null;
    private $ModelNilaiAkademik = null;
    private $ModelSiswa = null;

    public function __construct()
    {
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelSemester = new ModelSemester();
        $this->ModelTahunAjar = new ModelTahunAjar();
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        $this->ModelKategori = new ModelKategoriTugas();
        $this->ModelNilaiAkademik = new ModelNilaiAkademik();
        $this->ModelSiswa = new ModelSiswa();
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
            'sub_title' => 'Pengumuman',
            'dtJadwal' => $dtJadwal
        ];
        return view('guru/penilaian/index', $data);
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
            'sub_title' => 'Pengumuman',
            'dtJadwal' => $dtJadwal,
            'mapelID' => $idMapel
        ];
        return view('guru/penilaian/pilih_kelas', $data);
    }

    public function kategori($idMapel, $idKelas)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtSmt = $this->ModelSemester->getActiveSemester();
        if (is_null($dtSmt)) {
            session()->setFlashdata('danger', 'Mohon aktifkan semester tahun ajaran sakarang terlebih dahulu');
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
        $dtJadwal = $this->ModelJadwal->where('mapel_id', $idMapel)->where('kelas_id', $idKelas)->where('tahun_ajaran', $dtTA['id'])->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        if ($dtJadwal['guru_id'] != session('log_auth')['akunID']) {
            session()->setFlashdata('danger', 'Anda tidak memiliki akses ke jadwal ini');
            return $this->redirectBack();
        }
        if ($dtJadwal['tahun_ajaran'] != $dtTA['id']) {
            session()->setFlashdata('danger', 'Jadwal tidak tersedia pada tahun ajaran saat ini');
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Penilaian Akademik',
            'dtJadwal' => $dtJadwal,
            'mapelID' => $idMapel,
            'kelasID' => $idKelas,
            'dtKategori' => $this->ModelKategori->where('kt_jadwal_id', $dtJadwal['jadwal_id'])->findAll(),
            'dtMapel' => $dtMapel,
            'dtKelas' => $dtKelas,
            'dtSmt' => $dtSmt,
            'dtTA' => $dtTA
        ];
        return view('guru/penilaian/kategori_tugas', $data);
    }

    public function addKategori($idMapel, $idKelas)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->where('mapel_id', $idMapel)->where('kelas_id', $idKelas)->where('tahun_ajaran', $dtTA['id'])->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        if ($dtJadwal['guru_id'] != session('log_auth')['akunID']) {
            session()->setFlashdata('danger', 'Anda tidak memiliki akses ke jadwal ini');
            return $this->redirectBack();
        }
        if ($dtJadwal['tahun_ajaran'] != $dtTA['id']) {
            session()->setFlashdata('danger', 'Jadwal tidak tersedia pada tahun ajaran saat ini');
            return $this->redirectBack();
        }
        if (!$this->validate([
            'txtNamaKategori' => 'required|max_length[50]',
            'txtTanggal' => 'required|valid_date',
            'txtKKM' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]',
            'txtBobot' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]',
        ])) {
            session()->setFlashdata('danger', 'Mohon isi data dengan lengkap dan sesuai');
            return $this->redirectBack();
        }
        $data = [
            'kt_nama' => $this->request->getPost('txtNamaKategori'),
            'kt_deskripsi' => $this->request->getPost('txtDeskripsi'),
            'kt_tanggal' => $this->request->getPost('txtTanggal'),
            'kt_kkm' => $this->request->getPost('txtKKM'),
            'kt_bobot' => $this->request->getPost('txtBobot'),
            'kt_jadwal_id' => $dtJadwal['jadwal_id']
        ];
        if ($this->ModelKategori->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('danger', 'Data gagal ditambahkan');
        }
        return redirect()->to(base_url('penilaianakademik/kategori/' . $idMapel . '/' . $idKelas));
    }

    public function editKategori($idMapel, $idKelas, $idKategori)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->where('mapel_id', $idMapel)->where('kelas_id', $idKelas)->where('tahun_ajaran', $dtTA['id'])->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        if ($dtJadwal['guru_id'] != session('log_auth')['akunID']) {
            session()->setFlashdata('danger', 'Anda tidak memiliki akses ke jadwal ini');
            return $this->redirectBack();
        }
        if ($dtJadwal['tahun_ajaran'] != $dtTA['id']) {
            session()->setFlashdata('danger', 'Jadwal tidak tersedia pada tahun ajaran saat ini');
            return $this->redirectBack();
        }
        $dtKategori = $this->ModelKategori->where('kt_jadwal_id', $dtJadwal['jadwal_id'])->where('kt_id', $idKategori)->first();
        if (empty($dtKategori)) {
            session()->setFlashdata('danger', 'Data kategori tidak ditemukan.');
            return $this->redirectBack();
        }
        if (!$this->validate([
            'txtNamaKategori_Edit' => 'required|max_length[50]',
            'txtTanggal_Edit' => 'required|valid_date',
            'txtKKM_Edit' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]',
            'txtBobot_Edit' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]',
        ])) {
            session()->setFlashdata('danger', 'Mohon isi data dengan lengkap dan sesuai');
            return $this->redirectBack();
        }
        $data = [
            'kt_nama' => $this->request->getPost('txtNamaKategori_Edit'),
            'kt_deskripsi' => $this->request->getPost('txtDeskripsi_Edit'),
            'kt_tanggal' => $this->request->getPost('txtTanggal_Edit'),
            'kt_kkm' => $this->request->getPost('txtKKM_Edit'),
            'kt_bobot' => $this->request->getPost('txtBobot_Edit')
        ];
        if ($this->ModelKategori->update($idKategori, $data)) {
            session()->setFlashdata('success', 'Data berhasil diedit');
        } else {
            session()->setFlashdata('danger', 'Data gagal diedit');
        }
        return redirect()->to(base_url('penilaianakademik/kategori/' . $idMapel . '/' . $idKelas));
    }

    public function nilai($idMapel, $idKelas, $idKategori)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtSmt = $this->ModelSemester->getActiveSemester();
        if (is_null($dtSmt)) {
            session()->setFlashdata('danger', 'Mohon aktifkan semester tahun ajaran sakarang terlebih dahulu');
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
        $dtJadwal = $this->ModelJadwal->where('mapel_id', $idMapel)->where('kelas_id', $idKelas)->where('tahun_ajaran', $dtTA['id'])->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        if ($dtJadwal['guru_id'] != session('log_auth')['akunID']) {
            session()->setFlashdata('danger', 'Anda tidak memiliki akses ke jadwal ini');
            return $this->redirectBack();
        }
        if ($dtJadwal['tahun_ajaran'] != $dtTA['id']) {
            session()->setFlashdata('danger', 'Jadwal tidak tersedia pada tahun ajaran saat ini');
            return $this->redirectBack();
        }
        $dtKategori = $this->ModelKategori->where('kt_jadwal_id', $dtJadwal['jadwal_id'])->where('kt_id', $idKategori)->first();
        if (empty($dtKategori)) {
            session()->setFlashdata('danger', 'Kategori tidak ditemukan');
            return $this->redirectBack();
        }
        $dtSiswa = $this->ModelNilaiAkademik->join('siswa', 'na_siswa_id=id')->where('na_kategori_id', $dtKategori['kt_id'])->findAll();
        if (count($dtSiswa) == 0) {
            $dtSiswa = $this->ModelSiswa->where('id_kelas', $dtKelas['id_kelas'])->findAll();
            $isCompleted = false;
        } else {
            $isCompleted = true;
        }
        if (count($dtSiswa) == 0) {
            session()->setFlashdata('danger', 'Data siswa masih kosong, silahkan hubungi admin');
            return $this->redirectBack();
        }
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Penilaian Akademik',
            'dtJadwal' => $dtJadwal,
            'mapelID' => $idMapel,
            'kelasID' => $idKelas,
            'kategoriID' => $idKategori,
            'dtKategori' => $this->ModelKategori->where('kt_jadwal_id', $dtJadwal['jadwal_id'])->findAll(),
            'dtMapel' => $dtMapel,
            'dtKelas' => $dtKelas,
            'dtSmt' => $dtSmt,
            'dtTA' => $dtTA,
            'dtKategori' => $dtKategori,
            'dtSiswa' => $dtSiswa,
            'isCompleted' => $isCompleted
        ];
        return view('guru/penilaian/penilaian', $data);
    }

    public function insertNilai($idMapel, $idKelas, $idKategori)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtSmt = $this->ModelSemester->getActiveSemester();
        if (is_null($dtSmt)) {
            session()->setFlashdata('danger', 'Mohon aktifkan semester tahun ajaran sakarang terlebih dahulu');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->where('mapel_id', $idMapel)->where('kelas_id', $idKelas)->where('tahun_ajaran', $dtTA['id'])->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        if ($dtJadwal['guru_id'] != session('log_auth')['akunID']) {
            session()->setFlashdata('danger', 'Anda tidak memiliki akses ke jadwal ini');
            return $this->redirectBack();
        }
        if ($dtJadwal['tahun_ajaran'] != $dtTA['id']) {
            session()->setFlashdata('danger', 'Jadwal tidak tersedia pada tahun ajaran saat ini');
            return $this->redirectBack();
        }
        $dtKategori = $this->ModelKategori->where('kt_jadwal_id', $dtJadwal['jadwal_id'])->where('kt_id', $idKategori)->first();
        if (empty($dtKategori)) {
            session()->setFlashdata('danger', 'Kategori tidak ditemukan');
            return $this->redirectBack();
        }
        $dtNilai = $this->ModelNilaiAkademik->where('na_kategori_id', $dtKategori['kt_id'])->findAll();
        if (count($dtNilai) > 0) {
            session()->setFlashdata('danger', 'Nilai telah dimasukan sebelumnya');
            return $this->redirectBack();
        }
        $dtSiswa = $this->ModelSiswa->where('id_kelas', $idKelas)->findAll();
        if (count($dtSiswa) == 0) {
            session()->setFlashdata('danger', 'Data siswa masih kosong, silahkan hubungi admin');
            return $this->redirectBack();
        }
        $validate = [];
        foreach ($dtSiswa as $dt) {
            $validate["txtNilai_" . $dt['nis']] = 'required|greater_than_equal_to[0]|less_than_equal_to[100]';
        }
        if (!$this->validate($validate)) {
            session()->setFlashdata('danger', 'Mohon lengkapi data');
            return $this->redirectBack();
        }
        $success = 0;
        $failed = 0;
        foreach ($dtSiswa as $dt) {
            $data = [
                'na_siswa_id' => $dt['id'],
                'na_kategori_id' => $dtKategori['kt_id'],
                'na_nilai' => $this->request->getPost('txtNilai_' . $dt['nis'])
            ];
            if ($this->ModelNilaiAkademik->insert($data)) {
                $success++;
            } else {
                $failed++;
            }
        }
        $data = [
            'kt_assessed_at' => date("Y-m-d H:i:s")
        ];
        $this->ModelKategori->update($dtKategori['kt_id'], $data);
        if ($success > 0) {
            if (count($dtSiswa) == $success) {
                session()->setFlashdata('success', 'Semua data nilai telah berhasil dimasukan');
            } else {
                session()->setFlashdata("warning", "Data yang berhasil ditambahkan sebanyak $success. Data yang gagal dimasukan sebanyak $failed");
            }
        } else {
            session()->setFlashdata('danger', 'Seluruh data gagal dimasukan');
        }
        return redirect()->to(base_url("penilaianakademik/nilai/$idMapel/$idKelas/$idKategori"));
    }

    public function editNilai($idMapel, $idKelas, $idKategori)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            session()->setFlashdata('danger', 'Data tahun ajaran belum ditentukan');
            return $this->redirectBack();
        }
        $dtSmt = $this->ModelSemester->getActiveSemester();
        if (is_null($dtSmt)) {
            session()->setFlashdata('danger', 'Mohon aktifkan semester tahun ajaran sakarang terlebih dahulu');
            return $this->redirectBack();
        }
        $dtJadwal = $this->ModelJadwal->where('mapel_id', $idMapel)->where('kelas_id', $idKelas)->where('tahun_ajaran', $dtTA['id'])->first();
        if (empty($dtJadwal)) {
            session()->setFlashdata('danger', 'Data jadwal tidak ditemukan');
            return $this->redirectBack();
        }
        if ($dtJadwal['guru_id'] != session('log_auth')['akunID']) {
            session()->setFlashdata('danger', 'Anda tidak memiliki akses ke jadwal ini');
            return $this->redirectBack();
        }
        if ($dtJadwal['tahun_ajaran'] != $dtTA['id']) {
            session()->setFlashdata('danger', 'Jadwal tidak tersedia pada tahun ajaran saat ini');
            return $this->redirectBack();
        }
        $dtKategori = $this->ModelKategori->where('kt_jadwal_id', $dtJadwal['jadwal_id'])->where('kt_id', $idKategori)->first();
        if (empty($dtKategori)) {
            session()->setFlashdata('danger', 'Kategori tidak ditemukan');
            return $this->redirectBack();
        }
        $dtNilai = $this->ModelNilaiAkademik->join('siswa', 'na_siswa_id=id')->where('na_kategori_id', $dtKategori['kt_id'])->findAll();
        if (count($dtNilai) == 0) {
            session()->setFlashdata('danger', 'Nilai belum dimasukan sebelumnya');
            return $this->redirectBack();
        }
        $dtSiswa = $this->ModelSiswa->where('id_kelas', $idKelas)->findAll();
        if (count($dtSiswa) == 0) {
            session()->setFlashdata('danger', 'Data siswa masih kosong, silahkan hubungi admin');
            return $this->redirectBack();
        }
        $validate = [];
        foreach ($dtSiswa as $dt) {
            $validate["txtNilai_" . $dt['nis']] = 'required|greater_than_equal_to[0]|less_than_equal_to[100]';
        }
        if (!$this->validate($validate)) {
            session()->setFlashdata('danger', 'Mohon lengkapi data');
            return $this->redirectBack();
        }
        $success = 0;
        $failed = 0;
        foreach ($dtNilai as $dt) {
            $data = [
                'na_nilai' => $this->request->getPost('txtNilai_' . $dt['nis'])
            ];
            if ($this->ModelNilaiAkademik->update($dt['na_id'], $data)) {
                $success++;
            } else {
                $failed++;
            }
        }
        $data = [
            'kt_value_changed_at' => date("Y-m-d H:i:s")
        ];
        $this->ModelKategori->update($dtKategori['kt_id'], $data);
        if ($success > 0) {
            if (count($dtSiswa) == $success) {
                session()->setFlashdata('success', 'Semua data nilai telah berhasil diedit');
            } else {
                session()->setFlashdata("warning", "Data yang berhasil ditambahkan sebanyak $success. Data yang gagal diedit sebanyak $failed");
            }
        } else {
            session()->setFlashdata('danger', 'Seluruh data gagal diedit');
        }
        return redirect()->to(base_url("penilaianakademik/nilai/$idMapel/$idKelas/$idKategori"));
    }
}
