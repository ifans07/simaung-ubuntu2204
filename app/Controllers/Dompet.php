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
            'datadompet' => $dompetModel->getAllDompet(),
            'datakebutuhan' => $kebutuhanModel->getLimitKebutuhan(),
            'datatarget' => $targetModel->getLimitTarget(),
            'keluartotal' => $logModel->getAllLog(),
            'datalog' => $logModel->getLogBulan(),
            'sumsaldo' => $logModel->getSumAll(),
            'datatrf' => $logModel->getJmlTrf(),
            'logbulan' => $logModel->getLogBulanIni(),
            'loghariini' => $logModel->getLogHariIni(),
            'datapenghitung' => $this->penghitungpModel->findAll(),
            'datapenggunaan' => $this->penggunaanModel->findAll(),
            'datarencana' => $this->rencanaModel->getRencana(),
            'datatodolist' => $this->todoModel->getToDo(),
            'datagaji' => $this->gajiModel->findAll(),
            'datapiutang' => $this->piutangModel->findAll(),
            'datacicilan' => $this->cicilanModel->findAll(),
            'jmltrxblnini' => $logModel->getJmlTrxBlnIni(),
            'generate' => $password,
            'random' => $randomPassword
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
        'title' => 'Form edti dompet',
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
        $data = array(
        'nama_dompet' => $this->request->getPost('namadompet'),
        'saldo' => $this->request->getPost('saldo'),
        'saldo_awal' => $this->request->getPost('saldoawal'),
        'status' => $this->request->getPost('status')
        );
        $dompetModel->save($data);
        session()->setFlashdata('addberhasil', '1 Dompet bertambah!');
        return redirect()->to('/');
    }

    public function updateproses()
    {
        $dompetModel = new DompetModel();
        $id = $this->request->getPost('iddompet');
        $data = array(
        'nama_dompet' => $this->request->getPost('namadompet'),
        'saldo' => $this->request->getPost('saldo'),
        'saldoawal' => $this->request->getPost('saldoawal'),
        'status' => $this->request->getPost('status')
        );
        $dompetModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Data dompet berhasil diupdate!');
        return redirect()->to('/dompet/detail/' . $id);
    }

    public function deleteproses($id)
    {
        $dompetModel = new DompetModel();
        $dompetModel->delete($id);
        session()->setFlashdata('deleteberhasil', '1 Dompet dihapus!');
        return redirect()->to('/');
    }

    public function updateprosessaldo()
    {
        $dompetModel = new DompetModel();
        $id = $this->request->getPost('iddompet');
        $data = [
        'saldo' => $this->request->getPost('saldo')
        ];
        $dompetModel->update($id, $data);
        session()->setFlashdata('updatesaldoberhasil', 'Nilai saldo berhasil diupdate!');
        return redirect()->to('/dompet/detail/' . $id);
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
