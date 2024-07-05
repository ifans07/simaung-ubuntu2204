<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Icons extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Icons'
        ];
        return view('icon/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah icons'
        ];
        return view('icon/tambah', $data);
    }
}
