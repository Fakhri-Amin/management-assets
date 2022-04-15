<?php

namespace App\Controllers;

use App\Models\ModelPersediaan;

class Persediaan extends BaseController
{
    protected $modelPersediaan;

    public function __construct()
    {
        $this->modelPersediaan = new ModelPersediaan();
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'daftar barang laboratorium',
            'data' => $this->modelPersediaan->getData()
        ];
        return view('persediaan/index', $data);
    }

    // edit data
    public function edit()
    {
        return view('persediaan/edit');
    }

    // public function delete()
    // {
    //     // return view('');
    //     echo "index persediaan";
    // }

    // // save
    // public function save()
    // {
    //     // return view('');
    //     echo "index persediaan";
    // }
}
