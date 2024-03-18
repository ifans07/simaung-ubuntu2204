<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TodolistModel;

class Todolist extends BaseController
{
    protected $todolistModel;
    public function __construct()
    {
        $this->todolistModel = new TodolistModel();
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
        $symbols = "~`!@$%^&*()_|][{}';:.,?><";
        $lowerCase = str_shuffle($lowerCase);
        $upperCase = str_shuffle($upperCase);
        $numbers = str_shuffle($numbers);
        $symbols = str_shuffle($symbols);
        $randomPassword = substr($lowerCase, 0, 4);
        $randomPassword .= substr($upperCase, 0, 4);
        $randomPassword .= substr($numbers, 0, 4);
        $randomPassword
            .= substr($symbols, 0, 4);
        $password = str_shuffle($randomPassword);
        $data = [
            'title' => $this->request->getVar('title'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'slug' => uniqid($password, $randomPassword),
            'tanggal' => date('Y-m-d H:i:s')
        ];
        $this->todolistModel->save($data);
        session()->setFlashdata('addberhasil', '1 kegiatan berhasil ditambahkan');
        return redirect()->to(base_url('/'));
    }

    public function update($slug)
    {
        $data = [
            'title' => 'Form update To-do',
            'todo' => $this->todolistModel->getToDo($slug)
        ];
        return view('todolist/update', $data);
    }

    public function updateproses()
    {
        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getVar('title'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tanggal' => date('Y-m-d H:i:s')
        ];
        $this->todolistModel->update($id, $data);
        session()->setFlashdata('updateberhasil', '1 kegiatan berhasil dirubah');
        return redirect()->to(base_url('/'));
    }

    public function deleteproses($slug)
    {
        // dd($slug);
        $this->todolistModel->hapus($slug);
        session()->setFlashdata('deleteberhasil', '1 data berhasil dihapus');
        return redirect()->to(base_url('/'));
    }

    // list
    public function datalist()
    {
        $data = [
            'datatodolist' => $this->todolistModel->getToDo()
        ];
        return view('todolist/index-list', $data);
    }

    // kalendar
    public function calendar()
    {
        return view('filterdata/kalender');
    }
}
