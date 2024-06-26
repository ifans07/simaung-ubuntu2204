<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaanlModel;
use App\Models\InventoryModel;

class Penggunaanl extends BaseController
{
    protected $penggunaanModel;
    protected $inventoryModel;
    public function __construct()
    {
        $this->penggunaanModel = new PenggunaanlModel();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lama penggunaan',
            'datapenggunaan' => $this->penggunaanModel->getAllPenggunaanUser(user_id()),
            'code' => $this->code()
        ];
        return view('penggunaan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah barang',
            'barang' => $this->inventoryModel->getBarangUser()
        ];
        return view('penggunaan/tambah', $data);
    }

    public function addproses()
    {
        $check = $this->request->getPost('check');
        if($check == "on"){
            $barang = $this->request->getPost('barang');
        }else{
            $barang = $this->request->getPost('barang-exist');
        }
        $data = [
            'nama_barang' => $barang,
            'catatan' => $this->request->getPost('catatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal'),
            'id_user' => user_id()
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
