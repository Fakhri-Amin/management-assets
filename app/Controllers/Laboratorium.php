<?php

namespace App\Controllers;

class Laboratorium extends BaseController
{
    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'daftar barang laboratorium'
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
