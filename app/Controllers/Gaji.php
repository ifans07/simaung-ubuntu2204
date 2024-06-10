<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\DompetModel;
use App\Models\RiwayatgajiModel;
use App\Models\LogaktivitasModel;

class Gaji extends BaseController
{

    protected $gajiModel;
    protected $dompetModel;
    protected $riwayatgajiModel;
    protected $logaktivitasModel;
    public function __construct()
    {
        $this->gajiModel = new GajiModel();
        $this->dompetModel = new DompetModel();
        $this->riwayatgajiModel = new RiwayatgajiModel();
        $this->logaktivitasModel = new LogaktivitasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Input Gaji',
            'dompet' => $this->dompetModel->getAllDompet(user_id()),
            'gaji' => $this->gajiModel->getGajiUser(user_id()),
            'riwayatgaji' => $this->riwayatgajiModel->getRiwayatGajiBulan('2024-04'),
            'riwayatgajiuser' => $this->riwayatgajiModel->getRiwayatGajiUser()
        ];
        return view('pengaturan/add-gaji', $data);
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


        $gaji = htmlspecialchars($this->request->getPost('gaji'));
        $gj = explode('.', $gaji);
        $g = implode($gj);

        $data = [
            'gaji' => $g,
            'tanggal_gajian' => \htmlspecialchars($this->request->getPost('jmlhari')),
            'slug' => uniqid($password, $randomPassword),
            'iddompet' => $this->request->getPost('dompet'),
            'id_user' => user_id()
        ];
        // dd($data);
        $this->gajiModel->save($data);
        session()->setFlashdata('addberhasil', 'Besaran gaji berhasil dimasukkan!');
        return redirect()->to(base_url('user/gaji/input-gaji'));
    }

    public function update($slug)
    {
        $data = [
            'title' => 'Update Gaji',
            'gaji' => $this->gajiModel->getFindGaji($slug),
            'dompet' => $this->dompetModel->getAllDompet(user_id())
        ];
        return view('pengaturan/edit-gaji', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getPost('idgaji');

        $gaji = htmlspecialchars($this->request->getPost('gaji'));
        $gj = explode('.', $gaji);
        $g = implode($gj);

        $data = [
            'gaji' => $g,
            'tanggal_gajian' => $this->request->getPost('jmlhari'),
            'iddompet' => (int) $this->request->getPost('dompet')
        ];
        // dd($data);
        $this->gajiModel->update($id, $data);
        session()->setFlashdata('updateberhasil', 'Berhasil di ubah!');
        return redirect()->to(base_url('user/gaji/input-gaji'));
    }

    public function deleteproses($slug)
    {
        $this->gajiModel->hapus($slug);
        session()->setFlashdata('deleteberhasil', 'Data berhasil di hapus!');
        return redirect()->to(base_url('user/gaji/input-gaji'));
    }

    public function addriwayatgaji()
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

        $iddompet = $this->request->getPost('iddompet');
        $saldo = $this->request->getPost('saldo');
        $jmlgaji = $this->request->getPost('jml');

        $datariwayatgaji = [
            'id_gaji' => $this->request->getPost('idgaji'),
            'id_user' => user_id(),
            'tanggal' => date('Y-m-d H:i:s'),
            'slug' => uniqid($password, $randomPassword)
        ];

        $datalogaktivitas = [
            'log_aktivitas' => 'Gaji',
            'jumlah' => $jmlgaji,
            'tanggal' => date('Y-m-d'),
            'catatan' => 'Gaji bulan '.date('F'),
            'status' => 1,
            'id_dompet' => $iddompet,
            'id_user' => user_id()
        ];

        $datasaldodompet = [
            'saldo' => $saldo + $jmlgaji
        ];

        $this->riwayatgajiModel->save($datariwayatgaji);
        $this->logaktivitasModel->save($datalogaktivitas);
        $this->dompetModel->update($iddompet, $datasaldodompet);
        session()->setFlashdata('addberhasil', 'Gaji bulan ini berhasil di input!');
        return redirect()->to(base_url('/'));
    }
}
