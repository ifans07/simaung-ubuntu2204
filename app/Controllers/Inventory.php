<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\InventoryModel;
use App\Models\DompetModel;
use App\Models\KebutuhanModel;
use App\Models\TargetModel;
use App\Models\LogaktivitasModel;

class Inventory extends BaseController
{
    protected $inventoryModel;
    protected $dompetModel;
    protected $kebutuhanModel;
    protected $targetModel;
    protected $logModel;
    public function __construct(){
        $this->inventoryModel = new InventoryModel;
        $this->dompetModel = new DompetModel;
        $this->kebutuhanModel = new KebutuhanModel;
        $this->targetModel = new TargetModel;
        $this->logModel = new LogaktivitasModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Inventory',
            'inventory' => $this->inventoryModel->getBarangUser()
        ];
        return view('inventory/index', $data);
    }

    // tambah
    public function tambah()
    {
        $data = [
            'title' => 'Tambah data'
        ];
        return view('inventory/tambah', $data);
    }
    public function addproses()
    {
        
        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "1234567890";

        $lowerCase = str_shuffle($lowerCase);
        $upperCase = str_shuffle($upperCase);
        $numbers = str_shuffle($numbers);
        $randomPassword = substr($lowerCase, 0, 7);
        $randomPassword .= substr($upperCase, 0, 6);
        $randomPassword .= substr($numbers, 0, 5);
        $password = str_shuffle($randomPassword);


        $harga = htmlspecialchars($this->request->getPost('harga'));
        $hrg = explode('.',$harga);
        $h = implode($hrg);

        $data = [
            'nama_barang' => htmlspecialchars($this->request->getPost('barang')),
            'harga' => $h,
            'catatan' => htmlspecialchars($this->request->getPost('catatan')),
            'slug' => uniqid($password, $randomPassword),
            'id_user' => user_id()
        ];
        $this->inventoryModel->save($data);
        session()->setFlashdata('addberhasil', '1 Barang berhasil ditambahkan!');
        return redirect()->to(base_url('/inventory'));
    }

    // proses update
    public function update($slug){
        $data = [
            'title' => 'Update data',
            'barang' => $this->inventoryModel->getBarang($slug)
        ];
        return view('inventory/update', $data);
    }
    public function updateproses()
    {
        $id = htmlspecialchars($this->request->getPost('id'));

        $harga = htmlspecialchars($this->request->getPost('harga'));
        $hrg = explode('.',$harga);
        $h = implode($hrg);

        $data = [
            'nama_barang' => htmlspecialchars($this->request->getPost('barang')),
            'harga' => $h,
            'catatan' => htmlspecialchars($this->request->getPost('catatan'))
        ];
        $this->inventoryModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Berhasil ubah data!');
        return redirect()->to(base_url('/inventory'));
    }

    // hapus proses
    public function deleteproses($slug)
    {
        $this->inventoryModel->hapus($slug);
        session()->setFlashdata('deleteberhasil', 'Berhasil hapus data!');
        return redirect()->to(base_url('/inventory'));
    }

    // proses umum
    public function proses($slug)
    {
        $data = [
            'title' => 'Proses',
            'barang' => $this->inventoryModel->getBarang($slug),
            'dompet' => $this->dompetModel->getAllDompet(user_id())
        ];
        return view('inventory/proses', $data);
    }

    public function addkebutuhan()
    {
        $status = $this->request->getPost('status');
        $setStatus = ($status == "on")?0:1;

        $getTanggal = $this->request->getPost('tanggal');
        $tanggal = explode(' ', $getTanggal);

        $harga = $this->request->getPost('harga');

        $getDompet = $this->request->getPost('dompet');
        $setDompet = explode(' ', $getDompet);
        $iddompet = $setDompet[0];
        $saldo = end($setDompet);

        $data = [
            'kebutuhan' => $this->request->getPost('barang'),
            'harga' => $harga,
            'catatan' => $this->request->getPost('catatan'),
            'periode' => $this->request->getPost('tanggal'),
            'status' => $setStatus,
            'id_dompet' => $iddompet,
            'id_user' => user_id()
        ];

        
        if($status == "on") {
            $datalog = [
                'log_aktivitas' => $this->request->getPost('barang'),
                'jumlah' => $harga,
                'tanggal' => $tanggal[0],
                'catatan' => $this->request->getPost('catatan'),
                'status' => 4,
                'id_dompet' => $iddompet,
                'id_user' => user_id(),
            ];

            $datadompet = [
                'saldo' => (int) $saldo - (int) $harga,
            ];

            $this->logModel->save($datalog);
            $this->dompetModel->update($iddompet, $datadompet);
        }
        
        $this->kebutuhanModel->save($data);
        session()->setFlashdata('berhasil', '1 Kebutuhan ditambahkan!');
        return redirect()->to(base_url('/inventory'));
    }
}
