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
            'th_ajar' => $this->ModelTahunAjar->findAll(),
            'semester' => $this->ModelSemester->select('id_ta as tahunAjaran, semester, mulai, selesai')->findAll()
        ];
        // dd($data);
        return view('admin/tahunajaran/index', $data);
    }
    public function insertData()
    {
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran')
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
                    return redirect()->to('tahunajaran')->with('success', 'Data berhasil ditambahkan');
                } else {
                    return redirect()->to('tahunajaran')->with('danger', 'Gagal menambahkan data semester genap');
                }
            } else {
                return redirect()->to('tahunajaran')->with('danger', 'Gagal menambahkan data semester ganjil');
            }
        }
        return redirect()->to('tahunajaran')->with('danger', 'Gagal menambahkan data tahun ajaran');
    }

    public function startSemester()
    {
        // Cek data tahun ajaran
        $dtTA = $this->ModelTahunAjar->getTANow();
        if (empty($dtTA)) {
            return redirect()->to(base_url('tahunajaran'))->with('danger', 'Data tahun ajaran belum  ada');
        }
        // Get data semester by tahun ajaran
        $dtSemester = $this->ModelSemester->where('id_ta', $dtTA['id'])->findAll();
        if (count($dtSemester) == 0) {
            return redirect()->to(base_url('tahunajaran'))->with('danger', 'Data tsemester tidak ditemukan');
        }
        foreach ($dtSemester as $dt) {
            if (strtolower($dt['semester']) == 'ganjil') {
                if ($dt['mulai'] == null) {
                    $data['mulai'] = date("Y-m-d H:i:s");
                    if ($this->ModelSemester->update($dt['id_semester'], $data)) {
                        return redirect()->to(base_url('tahunajaran'))->with('success', 'Semester ganjil tahun ajaran ' . $dtTA['tahun_ajaran'] . ' berhasil dimulai');
                    } else {
                        return redirect()->to(base_url('tahunajaran'))->with('danger', 'Semester ganjil tahun ajaran ' . $dtTA['tahun_ajaran'] . ' gagal dimulai');
                    }
                }
            } else {
                $dtGanjil = $this->ModelSemester->where('semester', 'ganjil')->where('id_ta', $dtTA['id'])->first();
                if (is_null($dtGanjil['selesai'])) {
                    $data = [
                        'selesai' => date('Y-m-d H:i:s')
                    ];
                    $this->ModelSemester->update($dtGanjil['id_semester'], $data);
                }
                $data = [
                    'mulai' => date('Y-m-d H:i:s')
                ];
                if ($dt['mulai'] == null) {
                    $data['mulai'] = date("Y-m-d H:i:s");
                    if ($this->ModelSemester->update($dt['id_semester'], $data)) {
                        return redirect()->to(base_url('tahunajaran'))->with('success', 'Semester genap tahun ajaran ' . $dtTA['tahun_ajaran'] . ' berhasil dimulai');
                    } else {
                        return redirect()->to(base_url('tahunajaran'))->with('danger', 'Semester genap tahun ajaran ' . $dtTA['tahun_ajaran'] . ' gagal dimulai');
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
            return redirect()->to(base_url('tahunajaran'))->with('danger', 'Data tahun ajaran belum  ada');
        }
        // Get data semester by tahun ajaran
        $dtSemester = $this->ModelSemester->where('id_ta', $dtTA['id'])->findAll();
        if (count($dtSemester) == 0) {
            return redirect()->to(base_url('tahunajaran'))->with('danger', 'Data semester tidak ditemukan');
        }
        foreach ($dtSemester as $dt) {
            if (!is_null($dt['mulai'])) {
                if ($dt['selesai'] == null) {
                    $data['selesai'] = date('Y-m-d H:i:s');
                    if ($this->ModelSemester->update($dt['id_semester'], $data)) {
                        return redirect()->to(base_url('tahunajaran'))->with('success', 'Semester ' . $dt['semester'] . ' tahun ajaran ' . $dtTA['tahun_ajaran'] . ' berhasil diselesaikan');
                    } else {
                        return redirect()->to(base_url('tahunajaran'))->with('success', 'Semester ' . $dt['semester'] . ' tahun ajaran ' . $dtTA['tahun_ajaran'] . ' gagal diselesaikan');
                    }
                }
            }
        }
        return redirect()->to(base_url('tahunajaran'))->with('danger', 'Tidak ditemukan data semester yang dapat diselsaikan');
    }
    public function editData($id)
    {
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'status' => $this->request->getPost('status'),
        ];
        $this->ModelTahunAjar->update($id, $data);
        return redirect()->to('tahunajaran')->with('warning', 'Data berhasil diubah');
    }

    public function deleteData($id)
    {
        $this->ModelTahunAjar->delete($id);
        return redirect()->to('tahunajaran')->with('danger', 'Data berhasil dihapus');
    }
}
