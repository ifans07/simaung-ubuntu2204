<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\RiwayatgajiModel;

class Riwayatgaji extends BaseController
{
    protected $gajiModel;
    protected $riwayatgajiModel;
    public function __construct()
    {
        $this->gajiModel = new GajiModel();
        $this->riwayatgajiModel = new RiwayatgajiModel();
    }

    public function index()
    {
        //
    }

    public function addproses()
    {
        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "1234567890";
        $symbols = "~`!@#$%^&*()_+-=\|][{}';:/.,?><";
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
        $datagaji = $this->gajiModel->findAll();
        $datariwayatgaji = $this->riwayatgajiModel->findAll();
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
}
