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

    // method untuk menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'daftar barang laboratorium',
            'datas' => $this->labModel->getData(),
        ];
        return view('laboratorium/index', $data);
    }

    // method untuk menampilkan halaman tambah data
    public function create()
    {
        $data = [
            'title' => 'tambah barang laboratorium',
        ];
        return view('laboratorium/create', $data);
    }

    // method untuk menampilkan halaman ubah data
    public function edit()
    {
        return view('laboratorium/edit');
    }

    // method untuk memproses simpan data
    public function save()
    {
        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->labModel->insert([
            'item_photo'     => $this->request->getVar('item_photo'),
            'item_code'      => $this->request->getVar('item_code'),
            'item_name'      => $this->request->getVar('item_name'),
            'item_spec'      => $this->request->getVar('item_spec'),
            'obtained_year'  => $this->request->getVar('obtained_year'),
            'unit_value'     => $this->request->getVar('unit_value'),
            'condition'      => $this->request->getVar('condition'),
            'total'          => $this->request->getVar('total'),
            'user_unit'      => $this->request->getVar('user_unit'),
            'ownership_type' => $this->request->getVar('ownership_type')
        ]);

        // lakukan flas data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/laboratorium');
    }

    // public function delete()
    // {
    //     // return view('');
    //     echo "index laboratorium";
    // }

}
