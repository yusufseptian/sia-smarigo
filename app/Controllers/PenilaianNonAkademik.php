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

class PenilaianNonAkademik extends BaseController
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
            'sub_title' => 'Pengumuman',
            'dtSiswa' => $dtSiswa,
            'dtKelas' => $dtKelas,
            'dtTA' => $dtTA,
            'dtSmt' => $this->modelSemester->getActiveSemester()
        ];
        return view('guru/penilaiannonakademik/index', $data);
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
            'sub_title' => 'Pengumuman',
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
        return view('guru/penilaiannonakademik/penilaian', $data);
    }

    public function save($nis)
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
        if (is_null($dtSiswa['id_kelas'])) {
            session()->setFlashdata('danger', 'Siswa dengan nama ' . $dtSiswa['nama'] . ' dan nis ' . $dtSiswa['nis'] . ' belum ditentukan kelasnya.');
            return $this->redirectBack();
        }
        $dtKelas = $this->modelKelas->where('id_kelas', $dtSiswa['id_kelas'])->first();
        if (!$this->validate([
            'cmbSpiritual' => 'required|in_list[Baik,Cukup,Sedang]',
            'txtSpiritual' => 'required',
            'cmbSosial' => 'required|in_list[Baik,Cukup,Sedang]',
            'txtSpiritual' => 'required',
            'txtPrestasiList' => 'required|is_natural',
            'txtEkstrakulikulerList' => 'required|is_natural',
            'txtSakit' => 'required|is_natural',
            'txtIzin' => 'required|is_natural',
            'txtTanpaKeterangan' => 'required|is_natural',
            'txtCatatanWali' => 'required'
        ])) {
            session()->setFlashdata('danger', 'Mohon masukan data dengan benar!');
            return $this->redirectBack();
        }
        $listPrestasi = [];
        for ($i = 1; $i <= $this->request->getPost('txtPrestasiList'); $i++) {
            if (trim((string)$this->request->getPost("txtPrestasi_$i")) != "" && trim((string)$this->request->getPost("txtPrestasi_" . $i . "_deskripsi")) != "") {
                $tmp = [
                    'nama' => $this->request->getPost("txtPrestasi_$i"),
                    'deskripsi' => $this->request->getPost("txtPrestasi_$i" . "_deskripsi")
                ];
                array_push($listPrestasi, $tmp);
            }
        }
        $listEkskul = [];
        for ($i = 1; $i <= $this->request->getPost('txtEkstrakulikulerList'); $i++) {
            if (trim((string)$this->request->getPost("txtEkstrakulikuler_$i")) != "" && trim((string)$this->request->getPost("txtEkstrakulikuler_" . $i . "_deskripsi")) != "" && trim((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) != "") {
                if (strtolower((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) == 'a' || strtolower((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) == 'b' || strtolower((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) == 'c') {
                    $tmp = [
                        'nama' => $this->request->getPost("txtEkstrakulikuler_$i"),
                        'predikat' => $this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat"),
                        'deskripsi' => $this->request->getPost("txtEkstrakulikuler_$i" . "_deskripsi")
                    ];
                    array_push($listEkskul, $tmp);
                }
            }
        }
        $dtNilaiNonAkademik = $this->modelNilaiNonAkademik->where('non_kelas_id', $dtKelas['id_kelas'])->where('non_semester_id', $dtSmt['id_semester'])->first();
        if (empty($dtNilaiNonAkademik)) {
            $data = [
                'non_kelas_id' => $dtKelas['id_kelas'],
                'non_wali_kelas_id' => $dtKelas['wali_kelas_id'],
                'non_semester_id' => $dtSmt['id_semester'],
                'non_created_by' => session('log_auth')['akunID']
            ];
            if ($this->modelNilaiNonAkademik->insert($data)) {
                $idNilaiNonAkademik = $this->modelNilaiNonAkademik->orderBy('non_id', 'desc')->first()['non_id'];
            } else {
                // Jika gagal insert
            }
        } else {
            $idNilaiNonAkademik = $dtNilaiNonAkademik['non_id'];
        }
        $cekNilai = $this->modelNilaiNonAkademikDetail->where('nond_non_id', $idNilaiNonAkademik)->where('nond_siswa_id', $dtSiswa['id'])->first();
        if (!empty($cekNilai)) {
            session()->setFlashdata('danger', 'Data telah dimasukan sebelumnya');
            return $this->redirectBack();
        }
        $data = [
            'nond_non_id' => $idNilaiNonAkademik,
            'nond_siswa_id' => $dtSiswa['id'],
            'nond_spiritual_predikat' => $this->request->getPost('cmbSpiritual'),
            'nond_spiritual_deskripsi' => $this->request->getPost('txtSpiritual'),
            'nond_sosial_predikat' => $this->request->getPost('cmbSosial'),
            'nond_sosial_deskripsi' => $this->request->getPost('txtSosial'),
            'nond_sakit' => $this->request->getPost('txtSakit'),
            'nond_izin' => $this->request->getPost('txtIzin'),
            'nond_tanpa_Keterangan' => $this->request->getPost('txtTanpaKeterangan'),
            'nond_catatan_wali_kelas' => $this->request->getPost('txtCatatanWali'),
            'nond_created_by' => session('log_auth')['akunID']
        ];
        if ($this->modelNilaiNonAkademikDetail->insert($data)) {
            $nondID = $this->modelNilaiNonAkademikDetail->where('nond_non_id', $idNilaiNonAkademik)->where('nond_siswa_id', $dtSiswa['id'])->first()['nond_id'];
            foreach ($listEkskul as $dt) {
                $data = [
                    'ekskul_nama' => $dt['nama'],
                    'ekskul_predikat' => $dt['predikat'],
                    'ekskul_deskripsi' => $dt['deskripsi'],
                    'ekskul_nond_id' => $nondID,
                    'ekskul_created_by' => session('log_auth')['akunID']
                ];
                $this->modelEkskul->insert($data);
            }
            foreach ($listPrestasi as $dt) {
                $data = [
                    'prestasi_nama' => $dt['nama'],
                    'prestasi_deskripsi' => $dt['deskripsi'],
                    'prestasi_nond_id' => $nondID,
                    'prestasi_created_by' => session('log_auth')['akunID']
                ];
                $this->modelPrestasi->insert($data);
            }
            session()->setFlashdata('success', 'Nilai non akademik untuk ' . $dtSiswa["nama"] . ' berhasil dimasukan');
        } else {
            session()->setFlashdata('danger', 'Nilai non akademik untuk ' . $dtSiswa["nama"] . ' gagal dimasukan');
        }
        return redirect()->to(base_url("penilaiannonakademik/nilai/$nis"));
    }

    public function edit($nis)
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
        if (is_null($dtSiswa['id_kelas'])) {
            session()->setFlashdata('danger', 'Siswa dengan nama ' . $dtSiswa['nama'] . ' dan nis ' . $dtSiswa['nis'] . ' belum ditentukan kelasnya.');
            return $this->redirectBack();
        }
        $dtKelas = $this->modelKelas->where('id_kelas', $dtSiswa['id_kelas'])->first();
        if (!$this->validate([
            'cmbSpiritual' => 'required|in_list[Baik,Cukup,Sedang]',
            'txtSpiritual' => 'required',
            'cmbSosial' => 'required|in_list[Baik,Cukup,Sedang]',
            'txtSpiritual' => 'required',
            'txtPrestasiList' => 'required|is_natural',
            'txtEkstrakulikulerList' => 'required|is_natural',
            'txtSakit' => 'required|is_natural',
            'txtIzin' => 'required|is_natural',
            'txtTanpaKeterangan' => 'required|is_natural',
            'txtCatatanWali' => 'required'
        ])) {
            session()->setFlashdata('danger', 'Mohon masukan data dengan benar!');
            return $this->redirectBack();
        }
        $listPrestasi = [];
        for ($i = 1; $i <= $this->request->getPost('txtPrestasiList'); $i++) {
            if (trim((string)$this->request->getPost("txtPrestasi_$i")) != "" && trim((string)$this->request->getPost("txtPrestasi_" . $i . "_deskripsi")) != "") {
                $tmp = [
                    'nama' => $this->request->getPost("txtPrestasi_$i"),
                    'deskripsi' => $this->request->getPost("txtPrestasi_$i" . "_deskripsi")
                ];
                array_push($listPrestasi, $tmp);
            }
        }
        $listEkskul = [];
        for ($i = 1; $i <= $this->request->getPost('txtEkstrakulikulerList'); $i++) {
            if (trim((string)$this->request->getPost("txtEkstrakulikuler_$i")) != "" && trim((string)$this->request->getPost("txtEkstrakulikuler_" . $i . "_deskripsi")) != "" && trim((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) != "") {
                if (strtolower((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) == 'a' || strtolower((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) == 'b' || strtolower((string)$this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat")) == 'c') {
                    $tmp = [
                        'nama' => $this->request->getPost("txtEkstrakulikuler_$i"),
                        'predikat' => $this->request->getPost("cmbEkstrakulikuler_" . $i . "_predikat"),
                        'deskripsi' => $this->request->getPost("txtEkstrakulikuler_$i" . "_deskripsi")
                    ];
                    array_push($listEkskul, $tmp);
                }
            }
        }
        $dtNilaiNonAkademik = $this->modelNilaiNonAkademik->where('non_kelas_id', $dtKelas['id_kelas'])->where('non_semester_id', $dtSmt['id_semester'])->first();
        if (empty($dtNilaiNonAkademik)) {
            session()->setFlashdata('danger', 'Edit gagal karena nilai non akademik tidak ditemukan');
            return $this->redirectBack();
        }
        $idNilaiNonAkademik = $dtNilaiNonAkademik['non_id'];
        $cekNilai = $this->modelNilaiNonAkademikDetail->where('nond_non_id', $idNilaiNonAkademik)->where('nond_siswa_id', $dtSiswa['id'])->first();
        if (empty($cekNilai)) {
            session()->setFlashdata('danger', 'Data nilai belum dimasukan sebelumnya');
            return $this->redirectBack();
        }
        $data = [
            'nond_spiritual_predikat' => $this->request->getPost('cmbSpiritual'),
            'nond_spiritual_deskripsi' => $this->request->getPost('txtSpiritual'),
            'nond_sosial_predikat' => $this->request->getPost('cmbSosial'),
            'nond_sosial_deskripsi' => $this->request->getPost('txtSosial'),
            'nond_sakit' => $this->request->getPost('txtSakit'),
            'nond_izin' => $this->request->getPost('txtIzin'),
            'nond_tanpa_Keterangan' => $this->request->getPost('txtTanpaKeterangan'),
            'nond_catatan_wali_kelas' => $this->request->getPost('txtCatatanWali'),
            'nond_edited_by' => session('log_auth')['akunID']
        ];
        if ($this->modelNilaiNonAkademikDetail->update($cekNilai['nond_id'], $data)) {
            $dtPrestasi = $this->modelPrestasi->where('prestasi_nond_id', $cekNilai['nond_id'])->findAll();
            $dtEkskul = $this->modelEkskul->where('ekskul_nond_id', $cekNilai['nond_id'])->findAll();
            $index = 0;
            if (count($listPrestasi) > 0) {
                if (count($dtPrestasi) < count($listPrestasi)) {
                    $index = 0;
                    foreach ($dtPrestasi as $dt) {
                        $data = [
                            'prestasi_nama' => $listPrestasi[$index]['nama'],
                            'prestasi_deskripsi' => $listPrestasi[$index]['deskripsi'],
                            'prestasi_edited_by' => session('log_auth')['akunID']
                        ];
                        $this->modelPrestasi->update($dt['prestasi_id'], $data);
                        $index++;
                    }
                    for ($i = $index; $i < count($listPrestasi); $i++) {
                        $data = [
                            'prestasi_nama' => $listPrestasi[$i]['nama'],
                            'prestasi_deskripsi' => $listPrestasi[$i]['deskripsi'],
                            'prestasi_nond_id' => $cekNilai['nond_id'],
                            'prestasi_created_by' => session('log_auth')['akunID']
                        ];
                        $this->modelPrestasi->insert($data);
                    }
                } elseif (count($dtPrestasi) == count($listPrestasi)) {
                    $index = 0;
                    foreach ($dtPrestasi as $dt) {
                        $data = [
                            'prestasi_nama' => $listPrestasi[$index]['nama'],
                            'prestasi_deskripsi' => $listPrestasi[$index]['deskripsi'],
                            'prestasi_edited_by' => session('log_auth')['akunID']
                        ];
                        $this->modelPrestasi->update($dt['prestasi_id'], $data);
                        $index++;
                    }
                } else {
                    $index = 0;
                    foreach ($dtPrestasi as $dt) {
                        if ($index < count($listPrestasi)) {
                            $data = [
                                'prestasi_nama' => $listPrestasi[$index]['nama'],
                                'prestasi_deskripsi' => $listPrestasi[$index]['deskripsi'],
                                'prestasi_edited_by' => session('log_auth')['akunID']
                            ];
                            $this->modelPrestasi->update($dt['prestasi_id'], $data);
                        } else {
                            $this->modelPrestasi->delete($dt['prestasi_id']);
                        }
                        $index++;
                    }
                }
            } else {
                if (count($dtPrestasi) > 0) {
                    foreach ($dtPrestasi as $dt) {
                        $this->modelPrestasi->delete($dt['prestasi_id']);
                    }
                }
            }
            if (count($listEkskul) > 0) {
                if (count($dtEkskul) < count($listEkskul)) {
                    $index = 0;
                    foreach ($dtEkskul as $dt) {
                        $data = [
                            'ekskul_nama' => $listEkskul[$index]['nama'],
                            'ekskul_predikat' => $listEkskul[$index]['predikat'],
                            'ekskul_deskripsi' => $listEkskul[$index]['deskripsi'],
                            'ekskul_edited_by' => session('log_auth')['akunID']
                        ];
                        $this->modelEkskul->update($dt['ekskul_id'], $data);
                        $index++;
                    }
                    for ($i = $index; $i < count($listEkskul); $i++) {
                        $data = [
                            'ekskul_nama' => $listEkskul[$i]['nama'],
                            'ekskul_predikat' => $listEkskul[$i]['predikat'],
                            'ekskul_deskripsi' => $listEkskul[$i]['deskripsi'],
                            'ekskul_nond_id' => $cekNilai['nond_id'],
                            'ekskul_created_by' => session('log_auth')['akunID']
                        ];
                        $this->modelEkskul->insert($data);
                    }
                } elseif (count($dtEkskul) == count($listEkskul)) {
                    $index = 0;
                    foreach ($dtEkskul as $dt) {
                        $data = [
                            'ekskul_nama' => $listEkskul[$index]['nama'],
                            'ekskul_predikat' => $listEkskul[$index]['predikat'],
                            'ekskul_deskripsi' => $listEkskul[$index]['deskripsi'],
                            'ekskul_edited_by' => session('log_auth')['akunID']
                        ];
                        $this->modelEkskul->update($dt['ekskul_id'], $data);
                        $index++;
                    }
                } else {
                    $index = 0;
                    foreach ($dtEkskul as $dt) {
                        if ($index < count($listEkskul)) {
                            $data = [
                                'ekskul_nama' => $listEkskul[$index]['nama'],
                                'ekskul_predikat' => $listEkskul[$index]['predikat'],
                                'ekskul_deskripsi' => $listEkskul[$index]['deskripsi'],
                                'ekskul_edited_by' => session('log_auth')['akunID']
                            ];
                            $this->modelEkskul->update($dt['ekskul_id'], $data);
                        } else {
                            $this->modelEkskul->delete($dt['ekskul_id']);
                        }
                        $index++;
                    }
                }
            } else {
                if (count($dtEkskul) > 0) {
                    foreach ($dtEkskul as $dt) {
                        $this->modelEkskul->delete($dt['ekskul_id']);
                    }
                }
            }
            session()->setFlashdata('success', 'Nilai non akademik untuk ' . $dtSiswa["nama"] . ' berhasil diedit');
        } else {
            session()->setFlashdata('danger', 'Nilai non akademik untuk ' . $dtSiswa["nama"] . ' gagal diedit');
        }
        return redirect()->to(base_url("penilaiannonakademik/nilai/$nis"));
    }
}
