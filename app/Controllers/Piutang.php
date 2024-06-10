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
            'datapiutang' => $this->piutangModel->getPiutangUser(user_id()),
            // 'cicilan' => $this->cicilanModel->findAll()
            'cicilan' => $this->cicilanModel->getCicilanUser(user_id()),
            'cicilansum' => $this->cicilanModel->getCicilanSum()
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
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
            'sumsaldo' => $this->logModel->getSumAll(user_id())
        ];
        return view('piutang/tambah', $data);
    }

    public function addproses()
    {
        $id = $this->request->getPost('dompet');
        if($id == 0){
            $idsaldo = $id;
        }else{
            $idsaldopisah = explode(' ',$id);
            $idsaldo = $idsaldopisah[0];
        }

        // $idsaldo = explode(' ', $this->request->getPost('dompet'));

        $jumlah_nominal = htmlspecialchars($this->request->getPost('jumlah'));
        $jmlh_nmnl = explode('.',$jumlah_nominal);
        $jml_nml = implode($jmlh_nmnl);

        $data = [
            'nama_peminjam' => htmlspecialchars($this->request->getPost('peminjam')),
            'nominal' => $jml_nml,
            'tanggal_pinjam' => $this->request->getPost('tanggal')." ".$this->request->getPost('waktu'),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $idsaldo,
            'status' => 1,
            'id_user' => user_id()
        ];
        $this->piutangModel->save($data);

        $datalog = [
            'log_aktivitas' => "Piutang",
            'jumlah' => $jml_nml,
            'tanggal' => htmlspecialchars($this->request->getPost('tanggal')),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $idsaldo,
            'status' => 6,
            'id_user' => user_id()
        ];
        $this->logModel->save($datalog);

        
        if($id != 0) {
            $datadompet = [
                'saldo' => (int) $idsaldopisah[1] - (int) $jml_nml,
            ];
            $this->dompetModel->update($idsaldo, $datadompet);
        }

        session()->setFlashdata('addberhasil', 'Peminjam ditambahkan!');
        return redirect()->to(base_url('/piutang'));
    }

    // update
    public function update($id)
    {
        $data = [
            'title' => 'Edit Piutang',
            'data' => $this->piutangModel->find($id),
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
            'sumsaldo' => $this->logModel->getSumAll(user_id())
        ];
        return view('/piutang/update', $data);
    }
    public function updateproses()
    {
        $dompetlamaid = $this->request->getPost('dompetlama'); //sudah di set di form hidden - id lama
        $datadompetlama = $this->dompetModel->find($dompetlamaid); 

        $id = $this->request->getPost('id');
        $dompet = explode(' ',$this->request->getPost('dompet'));
        $dompetid = $dompet[0]; //dari form yang dipilih user - id baru
        $saldo = $dompet[1];

        $nominalama = $this->request->getPost('jml-lama');
        $nominal = htmlspecialchars($this->request->getPost('jumlah'));
        $nmnl = explode('.',$nominal);
        $nml = implode($nmnl);

        // if($nominalama != $nml){
        //     if((int) $nml > (int) $nominalama){
        //         $nml -= $nominalama;
        //     }elseif((int) $nml < (int) $nominalama){
        //         $nominalama -= $nml;
        //     }
        // }
        
        $data = [
            'nama_peminjam' => htmlspecialchars($this->request->getPost('peminjam')),
            'nominal' => $nml,
            'tanggal_pinjam' => $this->request->getPost('tanggal')." ".$this->request->getPost('waktu'),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $dompetid,
            'status' => 1
        ];

        if($dompetlamaid != $dompetid){
            if($dompetlamaid == 0){
                // saldolama jangan di set
                $datadompetbaru = [
                    'saldo' => $saldo - $nml
                ];
                $this->dompetModel->update($dompetid, $datadompetbaru);
            }elseif($dompetid == 0){
                // saldo baru jangan di set
                $datadompetlama = [
                    'saldo' => $datadompetlama['saldo'] + $nominalama
                ];
                $this->dompetModel->update($dompetlamaid, $datadompetlama);
            }else{
                $datadompetlama = [
                    'saldo' => $datadompetlama['saldo'] + $nominalama
                ];
                $datadompetbaru = [
                    'saldo' => $saldo - $nml
                ];
                $this->dompetModel->update($dompetlamaid, $datadompetlama);
                $this->dompetModel->update($dompetid, $datadompetbaru);
            }
        }else{
            if($dompetid != 0){
                if($nml > $nominalama){
                    $datadompet = [
                        'saldo' => $saldo - ($nml - $nominalama)
                    ];

                    $this->dompetModel->update($dompetid, $datadompet);
                }elseif($nml < $nominalama){
                    $datadompet = [
                        'saldo' => $saldo + ($nominalama - $nml)
                    ];

                    $this->dompetModel->update($dompetid, $datadompet);
                }else{
                    $datates['testing'] = 'testing broo!';
                }
            }
        }

        $this->piutangModel->update($id, $data);

        session()->setFlashdata('updateberhasil', 'data berhasil di update!');
        return redirect()->to(base_url('/piutang'));
    }

    public function tambahDetail($id)
    {
        $data = [
            'title' => 'Form peminjam | Simaung',
            'piutang' => $this->piutangModel->find($id),
            'cicilan' => $this->cicilanModel->getCicilan($id),
            'dompet' => $this->dompetModel->getAllDompet(user_id()),
            'sumsaldo' => $this->logModel->getSumAll(user_id())
        ];
        return view('piutang/tambah-detail', $data);
    }

    public function cicilan()
    {
        $jumlah_cicil = htmlspecialchars($this->request->getPost('jmlcicilan'));
        $jmlh_cicil = explode('.',$jumlah_cicil);
        $jml_cicil = implode($jmlh_cicil);

        $idpiutang = $this->request->getPost('idpiutang');
        $idsaldo = explode(' ', $this->request->getPost('dompet'));
        $statusC = ($this->request->getPost('pilihan') == 0)?5:6;
        $saldo = ($this->request->getPost('pilihan') == 0)?$idsaldo[1]+$jml_cicil:$idsaldo[1]-$jml_cicil;

        // status hutang
        $status = $this->request->getPost('status-hutang');
        if($status == "on"){
            $statusHutang = 1;
        }else{
            $statusHutang = 0;
        }
        if(isset($_POST['status-hutang'])){
            $datadone = [
                'status' => $statusHutang
            ];
            $this->piutangModel->update($idpiutang, $datadone);
        }
        // end status hutang


        $data = [
            'id_piutang' => htmlspecialchars($this->request->getPost('idpiutang')),
            'id_dompet' => $idsaldo[0],
            'catatan_cicilan' => htmlspecialchars($this->request->getPost('catatan')),
            'jml_cicilan' => $jml_cicil,
            'tanggal' => htmlspecialchars($this->request->getPost('tanggal')),
            'status_cicilan' => htmlspecialchars($this->request->getPost('pilihan')),
            'id_user' => user_id()
        ];

        $datalog = [
            'log_aktivitas' => "Piutang",
            'jumlah' => $jml_cicil,
            'tanggal' => htmlspecialchars($this->request->getPost('tanggal')),
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'id_dompet' => $idsaldo[0],
            'status' => $statusC,
            'id_piutang' => htmlspecialchars($this->request->getPost('idpiutang')),
            'id_user' => user_id()
        ];
        $this->logModel->save($datalog);

        $datadompet = [
            'saldo' => $saldo
        ];
        $this->dompetModel->update($idsaldo[0], $datadompet);

        $this->cicilanModel->save($data);
        return redirect()->to(base_url('piutang/detail/'.$idpiutang));
    }

    public function piutanglunas($id){
        $data = [
            'status' => 0
        ];
        $this->piutangModel->update($id, $data);
        session()->setFlashdata('verifydone', 'Hutang Lunas!');
        return redirect()->to(base_url('/piutang'));
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