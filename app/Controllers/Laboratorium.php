<?php

namespace App\Controllers;

use \App\Models\ModelLaboratorium;

class Laboratorium extends BaseController
{
    protected $labModel;

    public function __construct()
    {
        $this->labModel = new ModelLaboratorium();
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'daftar barang laboratorium',
            'datas' => $this->labModel->getData(),
        ];
        return view('laboratorium/index', $data);
    }

    // edit data
    public function edit()
    {
        return view('laboratorium/edit');
    }

    // public function delete()
    // {
    //     // return view('');
    //     echo "index laboratorium";
    // }

    // // save
    // public function save()
    // {
    //     // return view('');
    //     echo "index laboratorium";
    // }
}
