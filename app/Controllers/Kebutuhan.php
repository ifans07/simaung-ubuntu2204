<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DompetModel;
use App\Models\KebutuhanModel;
use App\Models\LogaktivitasModel;
use App\Models\InventoryModel;
use App\Models\GajiModel;

class Kebutuhan extends BaseController
{
    protected $kebutuhanModel;
    protected $dompetModel;
    protected $logModel;
    protected $inventoryModel;
    protected $gajiModel;
    public function __construct()
    {
        $this->kebutuhanModel = new KebutuhanModel();
        $this->dompetModel = new DompetModel();
        $this->logModel = new LogaktivitasModel();
        $this->inventoryModel = new InventoryModel();
        $this->gajiModel = new GajiModel();
    }

    public function index()
    {
        // $kebutuhanModel = new KebutuhanModel();
        // $dompetModel = new DompetModel();
        $saldo = $this->dompetModel->getAllDompet(user_id());
        $totalsaldo = 0;
        foreach ($saldo as $row) {
            $totalsaldo += $row['saldo'];
        }
        $data = [
            'title' => 'Kebutuhan',
            'totalSaldo' => $totalsaldo,
            // 'datakebutuhandone' => $this->kebutuhanModel->getAllKebutuhan(user_id()),
            'datakebutuhan' => $this->kebutuhanModel->getAllKebutuhan(user_id()),
            'countkebutuhan' => $this->kebutuhanModel->countKebutuhanDone(user_id()),
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
            'logkeluar' => $this->logModel->getSumAll(user_id()),
            'logkebutuhan' => $this->logModel->getLogBulanIni(user_id()),
            'gaji' => $this->gajiModel->getGajiUser(user_id())
        ];
        return view('kebutuhan/index', $data);
    }

    public function tambah()
    {
        //
        $kebutuhanModel = new KebutuhanModel();
        $data = [
            'title' => 'Form tambah kebutuhan',
            'barang' => $this->inventoryModel->getBarangUser(),
            'dompet' => $this->dompetModel->getAllDompet(user_id())
        ];
        return view('kebutuhan/tambah', $data);
    }

    public function addproses()
    {
        // $kebutuhanModel = new KebutuhanModel();
        $status = $this->request->getPost('status');
        if($status == "on"){
            $setStatus = 0;
        }else{
            $setStatus = 1;
        }
        $dompet = $this->request->getPost('dompet');
        $pisahdompet = explode('|',$dompet);
        $iddompet = $pisahdompet[0];
        $saldo = end($pisahdompet);

        $check = $this->request->getPost('check');
        if($check == "on"){
            $kebutuhan = $this->request->getPost('barang');
            $h = $this->request->getPost('cost');
            $hrg = explode('.',$h);
            $harga = implode($hrg);
        }else{
            $kebutuhanharga = $this->request->getPost('barang');
            $pisahkebutuhanharga = explode('|',$kebutuhanharga);
            $kebutuhan = $pisahkebutuhanharga[0];
            $harga = $pisahkebutuhanharga[1];
        }
        $gettanggal = $this->request->getPost('tanggal');
        $tanggal = explode('T', $gettanggal);
        $gabungtanggal = implode(' ', $tanggal);

        $data =
        [
            'kebutuhan' => $kebutuhan,
            'harga' => $harga,
            'catatan' => $this->request->getPost('catatan'),
            'periode' => $gabungtanggal,
            'status' => $setStatus,
            'id_dompet' => $iddompet,
            'id_user' => user_id()
        ];

        if($status == "on"){
            $datalog = [
                'log_aktivitas' => $kebutuhan,
                'jumlah' => $harga,
                'tanggal' => $tanggal[0],
                'catatan' => $this->request->getPost('catatan'),
                'status' => 4,
                'id_dompet' => $iddompet,
                'id_user' => user_id()
            ];

            $datadompet = [
                'saldo' => (int) $saldo - (int) $harga
            ];
            $this->logModel->save($datalog);
            $this->dompetModel->update($iddompet, $datadompet);
        }

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
            'id_dompet' => $iddompet,
            'id_user' => user_id()
        ];
        $this->logModel->save($datalog);

        $id = $this->request->getPost('id');
        $datakebutuhan = [
            'periode' => $this->request->getPost('tanggal'),
            'status' => $this->request->getPost('status'),
            'id_dompet' => $id,
            // 'id_user' => user_id()
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
