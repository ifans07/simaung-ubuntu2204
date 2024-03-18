<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DompetModel;
use App\Models\KebutuhanModel;
use App\Models\LogaktivitasModel;

class Kebutuhan extends BaseController
{
    protected $kebutuhanModel;
    protected $dompetModel;
    protected $logModel;
    public function __construct()
    {
        $this->kebutuhanModel = new KebutuhanModel();
        $this->dompetModel = new DompetModel();
        $this->logModel = new LogaktivitasModel();
    }

    public function index()
    {
        // $kebutuhanModel = new KebutuhanModel();
        // $dompetModel = new DompetModel();
        $saldo = $this->dompetModel->getAllDompet();
        $totalsaldo = 0;
        foreach ($saldo as $row) {
            $totalsaldo += $row['saldo'];
        }
        $data = [
            'title' => 'Kebutuhan',
            'totalSaldo' => $totalsaldo,
            'datakebutuhandone' => $this->kebutuhanModel->getAllKebutuhan(),
            'datakebutuhan' => $this->kebutuhanModel->findAll(),
            'countkebutuhan' => $this->kebutuhanModel->countKebutuhanDone(),
            'datadompet' => $this->dompetModel->findAll(),
            'logkeluar' => $this->logModel->getSumAll(),
            'logkebutuhan' => $this->logModel->getLogBulanIni()
        ];
        return view('kebutuhan/index', $data);
    }

    public function tambah()
    {
        //
        $kebutuhanModel = new KebutuhanModel();
        $data = [
            'title' => 'Form tambah kebutuhan'
        ];
        return view('kebutuhan/tambah', $data);
    }

    public function addproses()
    {
        // $kebutuhanModel = new KebutuhanModel();
        $data =
            [
                'kebutuhan' => $this->request->getPost('kebutuhan'),
                'harga' => $this->request->getPost('cost'),
                'catatan' => $this->request->getPost('catatan')
            ];
    
        $this->kebutuhanModel->save($data);
        session()->setFlashdata('addberhasil', '1 Kebutuhan berhasil ditambah');
        return redirect()->to(base_url('/kebutuhan'));
    }

    // public function checkedproses()
    // {
    //     $id = $this->request->getPost('id');
    //     $status = $this->request->getPost('status');
    //     $tgl = $this->request->getPost('tgl');
    //     $data = array(
    //         'status' => $status,
    //         'periode' => $tgl
    //     );
    //     // $kebutuhanModel = new KebutuhanModel();
    //     $this->kebutuhanModel->update($id, $data);
    //     return $this->response->setJSON([
    //         'hasil' => $this->kebutuhanModel->findAll()
    //     ]);
    // }

    public function update($id)
    {
        $data = [
            'title' => 'Form edit Kebutuhan',
            'rows' => $this->kebutuhanModel->find($id)
        ];
        return view('/kebutuhan/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getPost('id');
        $datakebutuhan = [
            'kebutuhan' => $this->request->getPost('kebutuhan'),
            'harga' => $this->request->getPost('cost'),
            'catatan' => $this->request->getPost('catatan')
        ];
        $this->kebutuhanModel->update($id, $datakebutuhan);
        session()->setFlashdata('updateberhasil', 'Berhasil update data!');
        return redirect()->to(base_url('/kebutuhan'));
    }

    public function doneproses()
    {
        $tgl = $this->request->getPost('tanggal');
        $tglpisah = explode(', ', $tgl); //['hari'], [23-01-2022 23:23:23]
        $tanggal = explode(' ', $tglpisah[1]);
        $getid = $this->request->getPost('dompet');
        $jumlah = $this->request->getPost('harga');
        $pisahid = explode(',', $getid);
        $saldo = end($pisahid);
        $iddompet = $pisahid[0];

        $datalog = [
            'log_aktivitas' => $this->request->getPost('kebutuhan'),
            'jumlah' => $jumlah,
            'tanggal' => $tanggal[0],
            'catatan' => $this->request->getPost('catatan'),
            'status' => 4,
            'id_dompet' => $iddompet
        ];
        $this->logModel->save($datalog);

        $id = $this->request->getPost('id');
        $datakebutuhan = [
            'periode' => $this->request->getPost('tanggal'),
            'status' => $this->request->getPost('status'),
            'id_dompet' => $id
        ];
        $this->kebutuhanModel->update($id, $datakebutuhan);

        $datadompet = [
            'saldo' => $saldo - $jumlah
        ];
        $this->dompetModel->update($iddompet, $datadompet);

        session()->setFlashdata('doneproses', 'Berhasil update data!');
        return redirect()->to(base_url('/kebutuhan'));
    }

    public function deleteproses($id)
    {
        $this->kebutuhanModel->delete($id);
        session()->setFlashdata('deleteberhasil', '1 Kebutuhan dihapus!');
        return redirect()->to(base_url('/kebutuhan'));
    }
}
