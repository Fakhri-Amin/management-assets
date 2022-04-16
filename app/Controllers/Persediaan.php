<?php

namespace App\Controllers;

use App\Models\ModelPersediaan;

class Persediaan extends BaseController
{
    protected $persediaanModel;

    public function __construct()
    {
        $this->persediaanModel = new ModelPersediaan();
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar barang Persediaan',
            'datas' => $this->persediaanModel->getData()
        ];
        return view('persediaan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah barang Persediaan'
        ];
        return view('persediaan/create', $data);
    }

    // edit data
    public function edit()
    {
        return view('persediaan/edit');
    }

    // simpan data
    public function save()
    {
        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->labModel->insert([
            'foto_barang'     => $this->request->getVar('foto_barang'),
            'kode_barang'      => $this->request->getVar('kode_barang'),
            'nama_barang'      => $this->request->getVar('nama_barang'),
            'spesifikasi'      => $this->request->getVar('spesifikasi'),
            'tahun_perolehan'  => $this->request->getVar('tahun_perolehan'),
            'nilai_satuan'     => $this->request->getVar('nilai_satuan'),
            'jumlah_barang_masuk'      => $this->request->getVar('jumlah_barang_masuk'),
            'jumlah_barang_keluar'          => $this->request->getVar('jumlah_barang_keluar'),
            'sisa_barang'      => $this->request->getVar('sisa_barang'),
            'unit_pengguna_barang' => $this->request->getVar('unit_pengguna_barang')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/persediaan');
    }

    // public function delete()
    // {
    //     // return view('');
    //     echo "index persediaan";
    // }

}
