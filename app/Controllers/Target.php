<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TargetModel;
use App\Models\DompetModel;
use App\Models\LogaktivitasModel;

class Target extends BaseController
{
    protected $targetModel;
    protected $dompetModel;
    protected $logModel;
    public function __construct()
    {
        $this->targetModel = new TargetModel();
        $this->dompetModel = new DompetModel();
        $this->logModel = new LogaktivitasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Target',
            'rows' => $this->targetModel->findAll(),
            'datatargetdone' => $this->targetModel->getAllTarget(),
            'counttarget' => $this->targetModel->countTarget(),
            'datadompet' => $this->dompetModel->findAll(),
            'logkeluar' => $this->logModel->getSumAll()
        ];
        return view('target/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah target'
        ];
        return view('target/tambah', $data);
    }

    public function addproses()
    {
        $hari = $this->request->getPost('hari');
        $tanggal = $this->request->getPost('tanggal');
        $waktu = $this->request->getPost('time');
        $haritanggal = [$hari, $tanggal];
        $gabungtanggal = implode(', ', $haritanggal);
        $arraytanggal = [$gabungtanggal, $waktu];
        $time = implode(' ', $arraytanggal);

        $data = [
            'target' => $this->request->getPost('target'),
            'cost' => $this->request->getPost('cost'),
            'tanggal_mulai' => $time,
            'catatan' => $this->request->getPost('catatan')
        ];
        $this->targetModel->save($data);
        session()->setFlashdata('addberhasil', '1 Target ditambahkan');
        return redirect()->to(base_url('/target'));
    }

    // public function checkedproses()
    // {
    //     $id = $this->request->getPost('id');
    //     $data = [
    //         'status' => $this->request->getPost('status'),
    //         'tanggal_selesai' => $this->request->getPost('tgl')
    //     ];
    //     $this->targetModel->update($id, $data);
    //     return $this->response->setJSON([
    //         'hasil' => $this->targetModel->findAll()
    //     ]);
    // }

    public function update($id)
    {
        $data = [
            'title' => 'Form ubah target',
            'row' => $this->targetModel->find($id)
        ];
        return view('target/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getPost('id');
        $hari = $this->request->getPost('hari');
        $tanggal = $this->request->getPost('tanggal');
        $time = $this->request->getPost('time');
        $status = $this->request->getPost('status');
        $haritanggal = [$hari, $tanggal];
        $ht = implode(', ', $haritanggal);
        $haritanggalwaktu = [$ht, $time];
        $htw = implode(' ', $haritanggalwaktu);
        $data = [
            'target' => $this->request->getPost('target'),
            'cost' => $this->request->getPost('cost'),
            'catatan' => $this->request->getPost('catatan')
        ];
        if ($status == 1) {
            $data += array('tanggal_mulai' => $htw);
        } else {
            $data += array('tanggal_selesai' => $htw);
        }
        $this->targetModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Target berhasil diedit');
        return redirect()->to(base_url('/target'));
    }

    public function doneproses()
    {
        $tgl = $this->request->getPost('tanggal');
        $tglpisah = explode(', ', $tgl); //['hari'], [23-01-2022 23:23:23]
        $tanggal = explode(' ', $tglpisah[1]);

        $datalog = [
            'log_aktivitas' => $this->request->getPost('target'),
            'jumlah' => $this->request->getPost('cost'),
            'tanggal' => $tanggal[0],
            'catatan' => $this->request->getPost('catatan'),
            'status' => 3,
            'id_dompet' => $this->request->getPost('dompet')
        ];
        $this->logModel->save($datalog);

        $id = $this->request->getPost('id');
        $datatarget = [
            'tanggal_selesai' => $this->request->getPost('tanggal'),
            'status' => $this->request->getPost('status'),
            'id_dompet' => $this->request->getPost('dompet') 
        ];
        $this->targetModel->update($id, $datatarget);
        session()->setFlashdata('doneberhasil', '1 Target selesai!');
        return redirect()->to(base_url('/target'));
    }

    public function deleteproses($id)
    {
        $this->targetModel->delete($id);
        session()->setFlashdata('deleteberhasil', '1 Data berhasil dihapus!');
        return redirect()->to(base_url('/target'));
    }
}