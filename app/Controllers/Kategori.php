<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;
    public function __construct(){
        $this->kategoriModel = new kategoriModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'datakategori' => $this->kategoriModel->findAll()
        ];
        return view('kategori/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Kategori',
        ];
        return view('kategori/tambah', $data);
    }

    public function addproses()
    {
        $data = array(
            'kategori' => htmlspecialchars($this->request->getPost('kategori')),
            'icon' => $this->request->getPost('icon'),
            'slug' => uniqid($this->code()['password'], $this->code()['randomPassword']),'id_user' => user_id()
        );
        $this->kategoriModel->save($data);
        session()->setFlashdata('addberhasil', 'data berhasil ditambahkan!');
        return redirect()->to(base_url('kategori'));
    }

    public function update($slug)
    {
        $data = [
            'title' => 'Update data Kategori',
            'kategori' => $this->kategoriModel->findKategori($slug)
        ];
        return view('kategori/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getPost('idkategori');
        $data = [
            'kategori' => htmlspecialchars($this->request->getPost('kategori')),
            'icon' => $this->request->getPost('icon'),
            'id_user' => user_id()
        ];
        
        $this->kategoriModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Data berhasil di rubah!');
        return redirect()->to(base_url('/kategori'));
    }

    public function deleteproses($slug)
    {
        $this->kategoriModel->hapus($slug);
        session()->setFlashdata('hapusberhasil', 'berhasil hapus data!');
        return redirect()->to(base_url('/kategori'));
    }
}
