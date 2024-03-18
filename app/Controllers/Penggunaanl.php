<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaanlModel;

class Penggunaanl extends BaseController
{
    protected $penggunaanModel;
    public function __construct()
    {
        $this->penggunaanModel = new PenggunaanlModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lama penggunaan',
            'datapenggunaan' => $this->penggunaanModel->findAll()
        ];
        return view('penggunaan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah barang'
        ];
        return view('penggunaan/tambah', $data);
    }

    public function addproses()
    {
        $data = [
            'nama_barang' => $this->request->getPost('barang'),
            'catatan' => $this->request->getPost('catatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal')
        ];
        $this->penggunaanModel->save($data);
        session()->setFlashdata('addberhasil', '1 Barang ditambahkan untuk dihitung lama penggunaannya!');
        return redirect()->to(base_url('/penggunaan'));
    }

    public function update($id)
    {
        $data = [
            'title' => 'Form edit barang',
            'data' => $this->penggunaanModel->find($id)
        ];
        return view('penggunaan/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama_barang' => $this->request->getPost('barang'),
            'catatan' => $this->request->getPost('catatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal')
        ];
        $this->penggunaanModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Perubahan berhasil dilakukan');
        return redirect()->to(base_url('/penggunaan'));
    }

    public function deleteproses($id)
    {
        $this->penggunaanModel->delete($id);
        session()->setFlashdata('deleteberhasil', '1 Data terhapus');
        return redirect()->to(base_url('/penggunaan'));
    }

    public function doneproses()
    {
        $id = $this->request->getPost('id');
        $data = [
            'tanggal_selesai' => $this->request->getPost('tgl_selesai'),
            'status_penggunaan' => 1
        ];
        $this->penggunaanModel->update($id, $data);
        session()->setFlashdata('doneberhasil', '1 barang sudah habis dipakai!');
        return redirect()->to(base_url('/penggunaan'));
    }
}
