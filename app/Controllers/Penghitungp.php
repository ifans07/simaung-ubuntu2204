<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenghitungpModel;

class Penghitungp extends BaseController
{
    protected $periodeModel;
    public function __construct()
    {
        $this->periodeModel = new PenghitungpModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Penghitung periode',
            'dataperiode' => $this->periodeModel->findAll()
        ];
        return view('periode/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah data'
        ];
        return view('periode/tambah', $data);
    }

    public function addproses()
    {
        $data = [
            'nama_aktivitas' => $this->request->getPost('aktivitas'),
            'catatan' => $this->request->getPost('catatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal')
        ];
        $this->periodeModel->save($data);
        session()->setFlashdata('addberhasil', 'Data kegiatan berhasil ditambah');
        return redirect()->to(base_url('/periode'));
    }

    public function update($id)
    {
        $data = [
            'title' => 'Update data',
            'data' => $this->periodeModel->find($id)
        ];
        return view('periode/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama_aktivitas' => $this->request->getPost('aktivitas'),
            'catatan' => $this->request->getPost('catatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal')
        ];
        $this->periodeModel->update($id, $data);
        return redirect()->to('/periode');
    }

    public function deleteproses($id)
    {
        $this->periodeModel->delete($id);
        return redirect()->to(base_url('/periode'));
    }

    public function doneproses()
    {
        $id = $this->request->getPost('id');
        $data = [
            'tanggal_selesai' => $this->request->getPost('tgl_selesai'),
            'status_penghitung' => 1
        ];
        $this->periodeModel->update($id, $data);
        session()->setFlashdata('doneberhasil', '1 aktivitas sudah selesai!');
        return redirect()->to(base_url('/periode'));
    }
}
