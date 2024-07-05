<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DompetModel;
use App\Models\GajiModel;
use App\Models\KebutuhanModel;
use App\Models\LogaktivitasModel;
use App\Models\PenggunaanlModel;
use App\Models\PenghitungpModel;
use App\Models\RencanaModel;
use App\Models\RiwayatgajiModel;
use App\Models\TargetModel;
use App\Models\TodolistModel;
use App\Models\PiutangModel;
use App\Models\CicilanModel;
use DOMText;

class Dompet extends BaseController
{
    protected $penghitungpModel;
    protected $penggunaanModel;
    protected $rencanaModel;
    protected $todoModel;
    protected $gajiModel;
    protected $riwayatgajiModel;
    protected $piutangModel;
    protected $cicilanModel;
    protected $dompetModel;
    public function __construct()
    {
        $this->penghitungpModel = new PenghitungpModel();
        $this->penggunaanModel = new PenggunaanlModel();
        $this->rencanaModel = new RencanaModel();
        $this->todoModel = new TodolistModel();
        $this->gajiModel = new GajiModel();
        $this->riwayatgajiModel = new RiwayatgajiModel();
        $this->piutangModel = new PiutangModel();
        $this->cicilanModel = new CicilanModel();
        $this->dompetModel = new DompetModel();


        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "1234567890";
        $symbols = "!@#$%^&*()_+=-.";

        $lowerCase = str_shuffle($lowerCase);
        $upperCase = str_shuffle($upperCase);
        $numbers = str_shuffle($numbers);
        $symbols = str_shuffle($symbols);
        $randomPassword = substr($lowerCase, 0, 4);
        $randomPassword .= substr($upperCase, 0, 4);
        $randomPassword .= substr($numbers, 0, 4);
        $randomPassword .= substr($symbols, 0, 4);
        $password = str_shuffle($randomPassword);
        $datagaji = $this->gajiModel->findAll();
        foreach ($datagaji as $row) {
            if (date('Y-m-' . $row['tanggal_gajian'] . ' 16:00:00') == date('Y-m-d H:i:s')) {
                $data = [
                'id_gaji' => $row['id'],
                'tanggal' => date('Y-m-d H:i:s'),
                'status' => 1,
                'slug' => uniqid($password, $randomPassword)
                ];
                $this->riwayatgajiModel->save($data);
                session()->setFlashdata('addberhasil', 'Gaji bulan' . date('m') . 'telah masuk');
                return redirect()->to(base_url('/'));
            }
        }
    }

    public function index()
    {
        $dompetModel = new DompetModel();
        $kebutuhanModel = new KebutuhanModel();
        $targetModel = new TargetModel();
        $logModel = new LogaktivitasModel();

        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "1234567890";
        $symbols = "!@#$%^&*()_+=-.";

        $lowerCase = str_shuffle($lowerCase);
        $upperCase = str_shuffle($upperCase);
        $numbers = str_shuffle($numbers);
        $symbols = str_shuffle($symbols);
        $randomPassword = substr($lowerCase, 0, 4);
        $randomPassword .= substr($upperCase, 0, 4);
        $randomPassword
        .= substr($numbers, 0, 4);
        $randomPassword .= substr($symbols, 0, 4);
        $password = str_shuffle($randomPassword);

        $data = [ 
            'title' => 'Dompet',
            'datadompet' => $dompetModel->getAllDompet(user_id()),
            'datakebutuhan' => $kebutuhanModel->getLimitKebutuhan(user_id()),
            'datatarget' => $targetModel->getLimitTarget(user_id()),
            'keluartotal' => $logModel->getAllLog(user_id()),
            'datalog' => $logModel->getLogBulan(user_id()),
            'sumsaldo' => $logModel->getSumAll(user_id()),
            'datatrf' => $logModel->getJmlTrf(user_id()),
            'logbulan' => $logModel->getLogBulanIni(user_id()),
            'loghariini' => $logModel->getLogHariIni(user_id()),
            'datapenghitung' => $this->penghitungpModel->getAllPenghitungUser(user_id()),
            'datapenggunaan' => $this->penggunaanModel->getAllPenggunaanUser(user_id()),
            'datarencana' => $this->rencanaModel->getRencanaUser(user_id()),
            'datatodolist' => $this->todoModel->getToDoUser(user_id()),
            'datagaji' => $this->gajiModel->getGajiUser(user_id()),
            'datapiutang' => $this->piutangModel->getPiutangUser(user_id()),
            'datacicilan' => $this->cicilanModel->getCicilanUser(user_id()),
            'jmltrxblnini' => $logModel->getJmlTrxBlnIni(user_id()),
            'riwayatgaji' => $this->riwayatgajiModel->getRiwayatGajiBulan(date('Y-m')),
            'generate' => $password,
            'random' => $randomPassword,
            'iduser' => user_id(),
        ];

        return view('dompet/index', $data);
    }

    public function tambah()
    {
        $data = [
        'title' => 'Form tambah dompet'
        ];
        return view('dompet/tambah', $data);
    }

    public function detail($id)
    {
        $dompetModel = new DompetModel();
        $logModel = new LogaktivitasModel();
        $data = [
        'title' => 'Detail dompet',
        'dompet' => $dompetModel->find($id),
        'logkeluar' => $logModel->logKeluar($id),
        'countlogkeluar' => $logModel->countLogKeluar($id),
        'countlogtarget' => $logModel->countLogTarget($id),
        'countlogkebutuhan' => $logModel->countLogKebutuhan($id)
        ];
        return view('dompet/detail', $data);
    }

    public function editdompet($id)
    {
        $dompetModel = new DompetModel();
        $data = [
        'title' => 'Form edit dompet',
        'datadompet' => $dompetModel->find($id)
        ];
        return view('dompet/update-dompet', $data);
    }
    public function editsaldo($id)
    {
        $dompetModel = new DompetModel();
        $logModel = new LogaktivitasModel();
        $data = [
        'title' => 'Form edit saldo',
        'datadompet' => $dompetModel->find($id),
        'logkeluar' => $logModel->logKeluar($id)
        ];
        return view('dompet/update-saldo', $data);
    }

    // proses
    public function addproses()
    {
        $dompetModel = new DompetModel();
        $saldo = $this->request->getPost('saldo');
        $sldo = explode('.', $saldo);
        $sld = implode($sldo);

        $saldo_awal = $this->request->getPost('saldoawal');
        $sldo_awal = explode('.',$saldo_awal);
        $sld_awal = implode($sldo_awal);

        $data = array(
            'nama_dompet' => $this->request->getPost('namadompet'),
            'saldo' => $sld,
            'saldo_awal' => $sld_awal,
            'status' => $this->request->getPost('status'),
            'id_user' => user_id()
        );
        $dompetModel->save($data);
        session()->setFlashdata('addberhasil', '1 Dompet bertambah!');
        return redirect()->to(base_url('/'));
    }

    public function updateproses()
    {
        $dompetModel = new DompetModel();
        $id = $this->request->getPost('iddompet');

        $saldo = $this->request->getPost('saldo');
        $sldo = explode('.',$saldo);
        $sld = implode($sldo);

        $saldo_awal = $this->request->getPost('saldoawal');
        $sldo_awal = explode('.',$sldo_awal);
        $sld_awal = implode($sldo_awal);

        $data = array(
            'nama_dompet' => $this->request->getPost('namadompet'),
            'saldo' => $sld,
            'saldoawal' => $sld_awal,
            'status' => $this->request->getPost('status'),
            'id_user' => user_id()
        );
        $dompetModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Data dompet berhasil diupdate!');
        return redirect()->to(base_url('/dompet/detail/' . $id));
    }

    public function deleteproses($id)
    {
        $dompetModel = new DompetModel();
        $dompetModel->delete($id);
        session()->setFlashdata('deleteberhasil', '1 Dompet dihapus!');
        return redirect()->to(base_url('/'));
    }

    public function updateprosessaldo()
    {
        $dompetModel = new DompetModel();
        $id = $this->request->getPost('iddompet');

        $saldo = $this->request->getPost('saldo');
        $sldo = explode('.',$saldo);
        $sld = implode($sldo);

        $data = [
            'saldo' => $sld
        ];
        $dompetModel->update($id, $data);
        session()->setFlashdata('updatesaldoberhasil', 'Nilai saldo berhasil diupdate!');
        return redirect()->to(base_url('/dompet/detail/' . $id));
    }


    // data JSON
    public function dataDompet()
    {
        $dompetModel = new DompetModel();
        $id = $this->request->getPost('iddompet');
        return $this->response->setJSON([
        'hasil' => $dompetModel->find($id),
        'error' => 'gagal ambil data'
        ]);
    }

    public function dataPiutang($id)
    {
        return $this->response->setJSON([
            'piutang' => $this->piutangModel->getIdDompet($id)
        ]);
    }
    public function dataCicilan($id)
    {
        return $this->response->setJSON([
            'cicilan' => $this->cicilanModel->getIdDompet($id)
        ]);
    }
    public function idDompet($id){
        return $this->response->setJSON([
            'dompet' => $this->dompetModel->find($id)
        ]);
    }
}
