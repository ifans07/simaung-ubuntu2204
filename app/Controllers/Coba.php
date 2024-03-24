<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DompetModel;
use App\Models\LogaktivitasModel;

class Coba extends BaseController
{
    protected $logModel;
    protected $dompetModel;
    public function __construct()
    {
        $this->logModel = new LogaktivitasModel();
        $this->dompetModel = new DompetModel();
    }
    public function index()
    {
        //
        $data = [
            'title' => 'Coba | Percobaan syntax',
            'datalog' => $this->logModel->filterData(),
            'datadompet' => $this->dompetModel->getAllDompet(user_id())
        ];
        return view('coba/indexcoba', $data);
    }

    public function filterLog($tanggal1 = 'Y-m-d', $tanggal2 = 'Y-m-d')
    {
        $data = [
            'datalog' => $this->logModel->filterData($tanggal1, $tanggal2),
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
        ];
        return view('filterdata/log', $data);
    }

    public function detaillog($tanggal)
    {
        $data = [
            'title' => 'Detail Log',
            'datalog' => $this->logModel->filterData($tanggal, $tanggal),
            'logdata' => $this->logModel->getLogBulan(user_id()),
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
            'tanggal' => $tanggal
        ];
        return view('coba/detailtrxcoba', $data);
    }
}
