<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSemester;
use App\Models\ModelTahunAjar;

class TahunAjaran extends BaseController
{

    private $ModelTahunAjar = null;
    private $ModelSemester = null;

    public function __construct()
    {
        $this->ModelTahunAjar = new ModelTahunAjar();
        $this->ModelSemester = new ModelSemester();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Siasmarigo',
            'sub_title' => 'Tahun Ajaran',
            'th_ajar' => $this->ModelTahunAjar->orderBy('id', 'desc')->findAll(),
            'semester' => $this->ModelSemester->select('id_ta as tahunAjaran, semester, mulai, selesai')->findAll(),
            'isFinished' => $this->ModelTahunAjar->isFinished()
        ];
        // dd($data);
        return view('admin/tahunAjaran/index', $data);
    }
    public function insertData()
    {
        if (!$this->validate([
            'tahun_ajaran' => 'required|is_unique[tahun_ajaran.tahun_ajaran]',
            'kkm' => 'required|is_natural_no_zero|less_than_equal_to[100]'
        ])) {
            return redirect()->to(base_url('tahunajaran'))->with('danger', 'Tahun ajaran harus diisi dan tidak boleh sama. (Unique value)');
        }
        if (!is_null($this->ModelTahunAjar->getTANow())) {
            $dtTA_before = $this->ModelTahunAjar->getTANow();
            foreach ($this->ModelSemester->where('id_ta', $dtTA_before['id'])->findAll() as $dt) {
                if (is_null($dt['mulai'])) {
                    $data = [
                        'mulai' => date('Y-m-d H:i:s'),
                        'mulai_by' => session('log_auth')['akunID']
                    ];
                    $this->ModelSemester->update($dt['id_semester'], $data);
                }
                if (is_null($dt['selesai'])) {
                    $data = [
                        'selesai' => date('Y-m-d H:i:s'),
                        'selesai_by' => session('log_auth')['akunID']
                    ];
                    $this->ModelSemester->update($dt['id_semester'], $data);
                }
            }
        }
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'kkm' => $this->request->getPost('kkm'),
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => session('log_auth')['akunID']
        ];
        if ($this->ModelTahunAjar->insert($data)) {
            $idTA = $this->ModelTahunAjar->orderBy('id', 'DESC')->first()['id'];
            $data = [
                'id_ta' => $idTA,
                'semester' => 'Ganjil'
            ];
            if ($this->ModelSemester->insert($data)) {
                $data['semester'] = 'Genap';
                if ($this->ModelSemester->insert($data)) {
                    return redirect()->to(base_url('TahunAjaran'))->with('success', 'Data berhasil ditambahkan');
                } else {
                    return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Gagal menambahkan data semester genap');
                }
            } else {
                return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Gagal menambahkan data semester ganjil');
            }
        }
        return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Gagal menambahkan data tahun ajaran');
    }

    public function startSemester()
    {
        // Cek data tahun ajaran
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Data tahun ajaran belum  ada');
        }
        if ($this->ModelTahunAjar->isFinished()) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Akses edit data tahun ajaran telah ditutup!');
        }
        // Get data semester by tahun ajaran
        $dtSemester = $this->ModelSemester->where('id_ta', $dtTA['id'])->findAll();
        if (count($dtSemester) == 0) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Data tsemester tidak ditemukan');
        }
        foreach ($dtSemester as $dt) {
            if (strtolower($dt['semester']) == 'ganjil') {
                if ($dt['mulai'] == null) {
                    $data = [
                        'mulai' => date("Y-m-d H:i:s"),
                        'mulai_by' => session('log_auth')['akunID']
                    ];
                    if ($this->ModelSemester->update($dt['id_semester'], $data)) {
                        return redirect()->to(base_url('TahunAjaran'))->with('success', 'Semester ganjil tahun ajaran ' . $dtTA['tahun_ajaran'] . ' berhasil dimulai');
                    } else {
                        return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Semester ganjil tahun ajaran ' . $dtTA['tahun_ajaran'] . ' gagal dimulai');
                    }
                }
            } else {
                $dtGanjil = $this->ModelSemester->where('semester', 'ganjil')->where('id_ta', $dtTA['id'])->first();
                if (is_null($dtGanjil['selesai'])) {
                    $data = [
                        'selesai' => date('Y-m-d H:i:s'),
                        'selesai_by' => session('log_auth')['akunID']
                    ];
                    $this->ModelSemester->update($dtGanjil['id_semester'], $data);
                }
                $data = [
                    'mulai' => date('Y-m-d H:i:s'),
                    'mulai_by' => session('log_auth')['akunID']
                ];
                if ($dt['mulai'] == null) {
                    $data['mulai'] = date("Y-m-d H:i:s");
                    if ($this->ModelSemester->update($dt['id_semester'], $data)) {
                        return redirect()->to(base_url('TahunAjaran'))->with('success', 'Semester genap tahun ajaran ' . $dtTA['tahun_ajaran'] . ' berhasil dimulai');
                    } else {
                        return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Semester genap tahun ajaran ' . $dtTA['tahun_ajaran'] . ' gagal dimulai');
                    }
                }
            }
        }
    }
    public function finishSemester()
    {
        // Cek data tahun ajaran
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Data tahun ajaran belum  ada');
        }
        if ($this->ModelTahunAjar->isFinished()) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Akses edit data tahun ajaran telah ditutup!');
        }
        // Get data semester by tahun ajaran
        $dtSemester = $this->ModelSemester->where('id_ta', $dtTA['id'])->findAll();
        if (count($dtSemester) == 0) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Data semester tidak ditemukan');
        }
        foreach ($dtSemester as $dt) {
            if (!is_null($dt['mulai'])) {
                if ($dt['selesai'] == null) {
                    $data = [
                        'selesai' => date('Y-m-d H:i:s'),
                        'selesai_by' => session('log_auth')['akunID']
                    ];
                    if ($this->ModelSemester->update($dt['id_semester'], $data)) {
                        return redirect()->to(base_url('TahunAjaran'))->with('success', 'Semester ' . $dt['semester'] . ' tahun ajaran ' . $dtTA['tahun_ajaran'] . ' berhasil diselesaikan');
                    } else {
                        return redirect()->to(base_url('TahunAjaran'))->with('success', 'Semester ' . $dt['semester'] . ' tahun ajaran ' . $dtTA['tahun_ajaran'] . ' gagal diselesaikan');
                    }
                }
            }
        }
        return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Tidak ditemukan data semester yang dapat diselsaikan');
    }
    public function editData($id)
    {
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Data tahun ajaran belum  ada');
        }
        if ($this->ModelTahunAjar->isFinished()) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Akses edit data tahun ajaran telah ditutup!');
        }
        if ($id != $this->ModelTahunAjar->getTANow()['id']) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Anda hanya dapat mengedit tahun ajaran saat ini saja');
        }
        $valid = [
            'tahun_ajaran' => 'required',
            'kkm' => 'required|is_natural_no_zero|less_than_equal_to[100]'
        ];
        if (strtolower(trim((string)$dtTA['tahun_ajaran'])) != strtolower(trim((string)$this->request->getPost('tahun_ajaran')))) {
            $valid['tahun_ajaran'] = 'required|is_unique[tahun_ajaran . tahun_ajaran]';
        }
        if (!$this->validate($valid)) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Tahun ajaran harus diisi dan tidak boleh sama. (Unique value)');
        }
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'kkm' => $this->request->getPost('kkm'),
            'edited_at' => date('Y-m-d H:i:s'),
            'edited_by' => session('log_auth')['akunID']
        ];
        $this->ModelTahunAjar->update($id, $data);
        return redirect()->to('TahunAjaran')->with('success', 'Data berhasil diubah');
    }

    public function deleteData($id)
    {
        if ($this->ModelTahunAjar->isFinished()) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Akses edit data tahun ajaran telah ditutup!');
        }
        if ($id != $this->ModelTahunAjar->getTANow()['id']) {
            return redirect()->to(base_url('TahunAjaran'))->with('danger', 'Anda hanya dapat mengedit tahun ajaran saat ini saja');
        }
        // Data semester tidak dihapus melalui program karena pada relasi sudah menggunakan CASCADE on DELETE
        $this->ModelTahunAjar->delete($id);
        return redirect()->to('TahunAjaran')->with('success', 'Data berhasil dihapus');
    }
}
