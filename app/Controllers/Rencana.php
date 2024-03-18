<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RencanaModel;

class Rencana extends BaseController
{
    protected $rencanaModel;
    public function __construct()
    {
        $this->rencanaModel = new RencanaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Rencana | Simaung',
            'datarencana' => $this->rencanaModel->getRencana()
        ];
        return view('rencana/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah rencana'
        ];
        return view('rencana/tambah', $data);
    }

    public function addproses()
    {
        $data = [
            'rencana' => $this->request->getVar('rencana'),
            'catatan' => $this->request->getVar('catatan')
        ];
        $this->rencanaModel->save($data);
        session()->setFlashdata('addberhasil', '1 Data berhasil ditambahkan');
        return redirect()->to(base_url('/rencana'));
    }

    public function update($id)
    {
        $data = [
            'title' => 'Form update rencana',
            'row' => $this->rencanaModel->find($id)
        ];
        return view('rencana/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getVar('id');
        $data = [
            'rencana' => $this->request->getVar('rencana'),
            'catatan' => $this->request->getVar('catatan')
        ];
        $this->rencanaModel->update($id, $data);
        session()->setFlashdata('updateberhasil', '1 data berhasil dirubah');
        return redirect()->to(base_url('/rencana'));
    }

    public function deleteproses($id)
    {
        $this->rencanaModel->delete($id);
        session()->setFlashdata('hapusberhasil', '1 Rencana dihapus');
        return redirect()->to(base_url('/rencana'));
    }
}
