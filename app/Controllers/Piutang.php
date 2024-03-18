<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PiutangModel;
use App\Models\DompetModel;
use App\Models\LogaktivitasModel;
use App\Models\CicilanModel;

class Piutang extends BaseController
{
    protected $piutangModel;
    protected $dompetModel;
    protected $logModel;
    protected $cicilanModel;
    public function __construct()
    {
        $this->piutangModel = new PiutangModel();
        $this->dompetModel = new DompetModel();
        $this->logModel = new LogaktivitasModel();
        $this->cicilanModel = new CicilanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Piutang | Simaung',
            'datapiutang' => $this->piutangModel->getPiutang(),
            'cicilan' => $this->cicilanModel->findAll()
        ];
        return view('piutang/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Piutang | Simaung',
            'piutang' => $this->piutangModel->getPiutang($id),
            'cicilan' => $this->cicilanModel->getCicilan($id)
        ];
        return view('piutang/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah data',
            'datadompet' => $this->dompetModel->findAll(),
            'sumsaldo' => $this->logModel->getSumAll()
        ];
        return view('piutang/tambah', $data);
    }

    public function addproses()
    {
        $idsaldo = explode(' ', $this->request->getPost('dompet'));
        $data = [
            'nama_peminjam' => htmlspecialchars($this->request->getPost('peminjam')),
            'nominal' => htmlspecialchars($this->request->getPost('jumlah')),
            'tanggal_pinjam' => $this->request->getPost('tanggal')." ".$this->request->getPost('waktu'),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $idsaldo[0],
            'status' => 1
        ];
        $this->piutangModel->save($data);

        $datalog = [
            'log_aktivitas' => "Piutang",
            'jumlah' => htmlspecialchars($this->request->getPost('jumlah')),
            'tanggal' => htmlspecialchars($this->request->getPost('tanggal')),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $idsaldo[0],
            'status' => 6
        ];
        $this->logModel->save($datalog);

        $datadompet = [
            'saldo' => $idsaldo[1] - htmlspecialchars($this->request->getPost('jumlah'))
        ];
        $this->dompetModel->update($idsaldo[0], $datadompet);

        session()->setFlashdata('addberhasil', 'Peminjam ditambahkan!');
        return redirect()->to(base_url('/piutang'));
    }

    // update
    public function update($id)
    {
        $data = [
            'data' => $this->piutangModel->find($id),
            'datadompet' => $this->dompetModel->findAll(),
            'sumsaldo' => $this->logModel->getSumAll()
        ];
        return view('/piutang/update', $data);
    }
    public function updateproses()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama_peminjam' => htmlspecialchars($this->request->getPost('peminjam')),
            'nominal' => htmlspecialchars($this->request->getPost('jumlah')),
            'tanggal_pinjam' => $this->request->getPost('tanggal')." ".$this->request->getPost('waktu'),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $this->request->getPost('dompet'),
            'status' => 1
        ];
        $this->piutangModel->update($id, $data);

        session()->setFlashdata('updateberhasil', 'data berhasil di update!');
        return redirect()->to(base_url('/piutang'));
    }

    public function tambahDetail($id)
    {
        $data = [
            'title' => 'Form peminjam | Simaung',
            'piutang' => $this->piutangModel->find($id),
            'dompet' => $this->dompetModel->findAll(),
            'sumsaldo' => $this->logModel->getSumAll()
        ];
        return view('piutang/tambah-detail', $data);
    }

    public function cicilan()
    {
        $idpiutang = $this->request->getPost('idpiutang');
        $idsaldo = explode(' ', $this->request->getPost('dompet'));
        $statusC = ($this->request->getPost('pilihan') == 0)?5:6;
        $saldo = ($this->request->getPost('pilihan') == 0)?$idsaldo[1]+htmlspecialchars($this->request->getPost('jmlcicilan')):$idsaldo[1]-htmlspecialchars($this->request->getPost('jmlcicilan'));

        $data = [
            'id_piutang' => htmlspecialchars($this->request->getPost('idpiutang')),
            'id_dompet' => $idsaldo[0],
            'catatan_cicilan' => htmlspecialchars($this->request->getPost('catatan')),
            'jml_cicilan' => htmlspecialchars($this->request->getPost('jmlcicilan')),
            'tanggal' => htmlspecialchars($this->request->getPost('tanggal')),
            'status_cicilan' => htmlspecialchars($this->request->getPost('pilihan'))
        ];

        $datalog = [
            'log_aktivitas' => "Piutang",
            'jumlah' => htmlspecialchars($this->request->getPost('jmlcicilan')),
            'tanggal' => htmlspecialchars($this->request->getPost('tanggal')),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $idsaldo[0],
            'status' => $statusC,
            'id_piutang' => htmlspecialchars($this->request->getPost('idpiutang'))
        ];
        $this->logModel->save($datalog);

        $datadompet = [
            'saldo' => $saldo
        ];
        $this->dompetModel->update($idsaldo[0], $datadompet);

        $this->cicilanModel->save($data);
        return redirect()->to(base_url('piutang/detail/'.$idpiutang));
    }

    // pengambilan data cicilan piutang
    public function orangutang($id){
        return $this->response->setJSON([
            'piutang' => $this->piutangModel->find($id)
        ]);
    }
    public function piutang($id){
        return $this->response->setJSON([
            'cicilan' => $this->cicilanModel->getCicilan($id)
        ]);
    }
}