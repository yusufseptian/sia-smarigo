<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelListDeskripsi;
use CodeIgniter\RESTful\ResourceController;

class Listdeskripsi extends ResourceController
{

    private $modelListDeskripsi = null;

    public function __construct()
    {
        $this->modelListDeskripsi = new ModelListDeskripsi();
    }

    private function redirectBack()
    {
        return "<script>window.history.back();</script>";
    }

    public function index()
    {
        session()->setFlashdata('danger', 'Akses ditolak');
        return $this->redirectBack();
    }

    public function get()
    {
        if ($this->request->isAJAX()) {
            $dtDeskripsi = $this->modelListDeskripsi->where('listdesk_guru_id', session('log_auth')['akunID'])->findAll();
            $msg = [
                'success' => true,
                'msg' => 'Data berhasil didapatkan',
                'data' => $dtDeskripsi
            ];
            return $this->respond($msg);
        } else {
            session()->setFlashdata('danger', 'Akses ditolak');
            return $this->redirectBack();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'listdesk_deskripsi' => 'required'
            ])) {
                $msg = [
                    'success' => false,
                    'msg' => 'Mohon lengkapi data dengan benar',
                    'data' => null
                ];
            } else {
                $data = [
                    'listdesk_deskripsi' => $this->request->getPost('listdesk_deskripsi'),
                    'listdesk_guru_id' => session('log_auth')['akunID']
                ];
                if ($this->modelListDeskripsi->insert($data)) {
                    $msg = [
                        'success' => true,
                        'msg' => 'Data berhasil disimpan',
                        'data' => null
                    ];
                } else {
                    $msg = [
                        'success' => false,
                        'msg' => 'Data gagal disimpan. Silahkan coba lagi nanti',
                        'data' => null
                    ];
                }
            }
            return $this->respond($msg);
        } else {
            session()->setFlashdata('danger', 'Akses ditolak');
            return $this->redirectBack();
        }
    }

    public function deletes()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'idDeskripsi' => 'required|is_natural_no_zero'
            ])) {
                $msg = [
                    'success' => false,
                    'msg' => 'ID tidak valid',
                    'data' => null
                ];
            } else {
                $dtDeskripsi = $this->modelListDeskripsi->find($this->request->getPost('idDeskripsi'));
                if (count($dtDeskripsi) == 0) {
                    $msg = [
                        'success' => false,
                        'msg' => 'Data deskripsi tidak ditemukan',
                        'data' => null
                    ];
                } else {
                    if ($dtDeskripsi['listdesk_guru_id'] != session('log_auth')['akunID']) {
                        $msg = [
                            'success' => false,
                            'msg' => 'Akses ditolak',
                            'data' => null
                        ];
                    } else {
                        if ($this->modelListDeskripsi->delete($this->request->getPost('idDeskripsi'))) {
                            $msg = [
                                'success' => true,
                                'msg' => 'Data deskripsi berhasil dihapus',
                                'data' => null
                            ];
                        } else {
                            $msg = [
                                'success' => false,
                                'msg' => 'Data deskripsi gagal dihapus, silahkan coba lagi nanti.',
                                'data' => null
                            ];
                        }
                    }
                }
            }
            return $this->respond($msg);
        } else {
            session()->setFlashdata('danger', 'Akses ditolak');
            return $this->redirectBack();
        }
    }
}
