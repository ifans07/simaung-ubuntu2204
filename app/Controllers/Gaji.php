<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GajiModel;

class Gaji extends BaseController
{

    protected $gajiModel;
    public function __construct()
    {
        $this->gajiModel = new GajiModel();
    }

    public function index()
    {
        //
    }
}
