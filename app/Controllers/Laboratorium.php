<?php

namespace App\Controllers;

use \App\Models\ModelLaboratorium;

class Laboratorium extends BaseController
{
    protected $labModel;


    public function __construct()
    {
        $this->labModel = new ModelLaboratorium();
        $this->menu = "Laboratorium";
    }


    // method untuk menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->labModel->getData(),
        ];
        return view('laboratorium/index', $data);
    }


    // method untuk menampilkan halaman tambah data
    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()  // ambil validasi
        ];
        return view('laboratorium/create', $data);
    }


    // method untuk menampilkan halaman ubah data
    public function edit($id)
    {
        $data = [
            'title' => 'Edit ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),  // ambil validasi
            'data' => $this->labModel->getData($id)
        ];
        return view('laboratorium/edit', $data);
    }


    // method untuk memproses update/edit data
    public function update($id)
    {
        // validasi input
        if (!$this->validate([
            'item_photo' => [
                'rules' => 'max_size[item_photo,2048]|is_image[item_photo]|mime_in[item_photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/laboratorium/edit')->withInput();
        }

        // dd('berhasil'); // jika lolos

        // lolos validasi :
        $filePhoto = $this->request->getFile('item_photo');

        // cek gambar, apakah tetap gambar lama
        if ($filePhoto->getError() == 4) {
            // dd('tidak ganti sampul');
            $fileName = $this->request->getVar('old_photo');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/laboratorium/');

            // cari gambar berdasarkan id
            $data = $this->labModel->find($id);
            // cek jika file gambarnya default.png
            if ($data['item_photo'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/laboratorium/' . $this->request->getVar('old_photo'));
            }

            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->labModel->save([
            'id_lab' => $id,
            'item_photo'     => $fileName,
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

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/laboratorium');
    }


    // method untuk memproses simpan data
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'item_photo' => [
                'rules' => 'max_size[item_photo,1024]|is_image[item_photo]|mime_in[item_photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();

            // redirect dan kirim semua validasi ke method create
            // return redirect()->to('/laboratorium/create')->withInput()->with('validation', $validation);

            return redirect()->to('/laboratorium/create')->withInput();
        }

        // dd('berhasil'); // jika lolos

        // ambil gambar :
        $filePhoto = $this->request->getFile('item_photo');

        // apakah tidak ada file yang diupload
        if ($filePhoto->getError() == 4) {
            $fileName = 'default.png';
        } else {
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/laboratorium');
            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->labModel->insert([
            'item_photo'     => $fileName,
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

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/laboratorium');
    }


    // method untuk hapus data
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $data = $this->labModel->find($id);

        // cek jika file gambarnya default.png
        if ($data['item_photo'] != 'default.png') {
            // hapus file gambar
            unlink('img/laboratorium/' . $data['item_photo']);
        }


        $this->labModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/laboratorium');
    }
}
