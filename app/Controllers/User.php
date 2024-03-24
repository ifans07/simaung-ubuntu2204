<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DompetModel;
use App\Models\LogaktivitasModel;
use App\Models\PiutangModel;
use App\Models\UserModel;


use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User as AuthUser;
use Myth\Auth\Models\UserModel as AuthUserModel;


class User extends BaseController
{
    protected $piutangModel;
    protected $dompetModel;
    protected $userModel;
    protected $logModel;

    protected $config;
    public function __construct()
    {
        $this->piutangModel = new PiutangModel();
        $this->dompetModel = new DompetModel();
        $this->userModel = new UserModel();
        $this->logModel = new LogaktivitasModel();

        $this->config = config('Auth');
    }

    public function index()
    {
        //

        $data = [
            'title' => 'User',
            'datapiutang' => $this->piutangModel->getPiutangUser(user_id()),
            'datadompet' => $this->dompetModel->getAllDompet(user_id()),
            ''
        ];
        return view('user/index', $data);
    }

    // auth
    public function login(){
        $data = [
            'title' => 'Form login | Simaung',
            'config' => $this->config
        ];
        return view('auth/login', $data);
    }
    public function daftar(){
        $data = [
            'title' => 'Form login | Simaung'
        ];
        return view('auth/daftar', $data);
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}
