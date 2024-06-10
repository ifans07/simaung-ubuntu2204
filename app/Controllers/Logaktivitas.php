<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DompetModel;
use App\Models\LogaktivitasModel;
use App\Models\GajiModel;

class Logaktivitas extends BaseController
{
    protected $logModel;
    protected $dompetModel;
    protected $gajiModel;
    public function __construct()
    {
        $this->logModel = new LogaktivitasModel();
        $this->dompetModel = new DompetModel();
        $this->gajiModel = new GajiModel();
        helper('form');
    }

    public function index()
    {
        //
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah aktivitas',
            'dompet' => $this->dompetModel->getAllDompet(user_id()),
            'sumsaldo' => $this->logModel->getSumAll(user_id())
        ];
        return view('logaktivitas/tambah', $data);
    }

    public function addproses()
    {
        $jumlah = $this->request->getPost('jumlah');
        $jml = explode('.', $jumlah);
        $j = implode($jml);

        $saldo = $this->request->getPost('saldo');
        $sldo = explode('.',$saldo);
        $sld = implode($sldo);

        $iddompet = $this->request->getPost('dompet');
        $dataLog = [
            'log_aktivitas' => $this->request->getPost('log'),
            'jumlah' => $j,
            'tanggal' => $this->request->getPost('tanggal'),
            'catatan' => $this->request->getPost('catatan'),
            'id_dompet' => $iddompet,
            'id_user' => user_id()
        ];
        $datadompet = [
            'saldo' => $sld - $j
        ];
        $this->logModel->save($dataLog);
        $this->dompetModel->update($iddompet, $datadompet);
        session()->setFlashdata('addberhasil', '1 data berhasil ditambahkan');
        return redirect()->to(base_url('/'));
    }

    public function addpemasukan()
    {
        $jumlah = $this->request->getPost('jumlah');
        $jml = explode('.',$jumlah);
        $j = implode($jml);

        $saldo = $this->request->getPost('saldo');
        $sldo = explode('.',$saldo);
        $sld = implode($sldo);

        $iddompet = $this->request->getPost('dompet');
        $dataLog = [
            'log_aktivitas' => $this->request->getPost('log'),
            'jumlah' => $j,
            'tanggal' => $this->request->getPost('tanggal'),
            'catatan' => $this->request->getPost('catatan'),
            'id_dompet' => $iddompet,
            'status' => 1,
            'id_user' => user_id()
        ];
        $datadompet = [
            'saldo' => $sld + $j
        ];

        $this->logModel->save($dataLog);
        $this->dompetModel->update($iddompet, $datadompet);
        session()->setFlashdata('addberhasil', '1 pemasukan berhasil di tambah');
        return redirect()->to(base_url('/'));
    }

    public function addtransfer()
    {
        $jumlah = $this->request->getPost('jumlah');
        $jml = explode('.',$jumlah);
        $j = implode($jml);
        // dd($j);

        $saldo1 = $this->request->getPost('saldo-1');
        $sldo1 = explode('.',$saldo1);
        $sld1 = implode($sldo1);

        $saldo2 = $this->request->getPost('saldo-2');
        $sldo2 = explode('.',$saldo2);
        $sld2 = implode($sldo2);

        $iddompet1 = $this->request->getPost('dompet-1');
        $iddompet2 = $this->request->getPost('dompet-2');
        $dataLog = [
            'log_aktivitas' => 'Transfer',
            'jumlah' => $j,
            'tanggal' => $this->request->getPost('tanggal'),
            'catatan' => $this->request->getPost('catatan'),
            'id_dompet' => $iddompet1,
            'ke_iddompet' => $iddompet2,
            'biaya_tf' => $this->request->getPost('biaya-tf'),
            'status' => 2,
            'id_user' => user_id()
        ];

        $datadompet1 = [
            'saldo' => $sld1 - $j
        ];
        $datadompet2 = [
            'saldo' => $sld2 + $j
        ];

        $this->dompetModel->update($iddompet1, $datadompet1);
        $this->logModel->save($dataLog);
        $this->dompetModel->update($iddompet2, $datadompet2);
        session()->setFlashdata('addberhasil', '1 Transfer berhasil dilakukan');
        return redirect()->to(base_url('/'));
    }

    public function update($id)
    {
        $data = [
            'title' => 'Form update aktivitas',
            'log' => $this->logModel->find($id),
            'dompet' => $this->dompetModel->findAll()
        ];
        return view('logaktivitas/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getPost('id');
        $data = [
            'log_aktivitas' => $this->request->getPost('log'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
            'catatan' => $this->request->getPost('catatan'),
            'id_dompet' => $this->request->getPost('dompet')
        ];
        $this->logModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Update berhasil');
        return redirect()->to(base_url('/'));
    }

    public function logFilter($tanggal1 = 'Y-m-d', $tanggal2 = 'Y-m-d')
    {
        $data = [
            'title' => 'Log Detail',
            'datalog' => $this->logModel->filterData($tanggal1, $tanggal2),
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
            'datagaji' => $this->gajiModel->getGajiUser(user_id())
        ];
        return view('filterdata/logbulanan', $data);
    }

    public function logDetail($tanggal)
    {
        $data = [
            'title' => 'Detail',
            'datalog' => $this->logModel->filterData($tanggal, $tanggal),
            'logdata' => $this->logModel->getLogBulan(user_id()),
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
            'tanggal' => $tanggal
        ];
        return view('logaktivitas/detailtransaksi', $data);
    }

    public function deleteproses()
    {
        $logid = $this->request->getPost('logid');
        $dompetid = $this->request->getPost('dompetid');
        $saldo = $this->request->getPost('saldo');
        $jml = $this->request->getPost('jumlah');
        $statusLog = $this->request->getPost('statuslog');
        if($statusLog == 1 || $statusLog == 2 || $statusLog == 5){
            $currentSaldo = $saldo - $jml;
        }else{
            $currentSaldo = $saldo + $jml;
        }

        $data = [
            'saldo' => $currentSaldo
        ];
        $this->dompetModel->update($dompetid, $data);
        $this->logModel->delete($logid);

        session()->setFlashdata('hapusberhasil', 'Satu riwayat dihapus!');
        return redirect()->to(base_url('/'));
    }
}
