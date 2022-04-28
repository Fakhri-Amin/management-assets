<?php

namespace App\Controllers;

use \App\Models\ModelMeubellair;

class Meubellair extends BaseController
{
    protected $meubellairModel;

    public function __construct()
    {
        $this->meubellairModel = new ModelMeubellair();
        $this->menu = "Meuballair";
    }


    // method untuk menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->meubellairModel->getData(),
        ];
        return view('meubellair/index', $data);
    }


    // method untuk menampilkan halaman tambah data
    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()  // ambil validasi
        ];
        return view('meubellair/create', $data);
    }


    // method untuk menampilkan halaman ubah data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),  // ambil validasi
            'data' => $this->meubellairModel->getData($id)
        ];
        return view('meubellair/edit', $data);
    }


    // method untuk memproses update/edit data
    public function update($id)
    {
        // validasi input
        if (!$this->validate([
            'foto_barang' => [
                'rules' => 'max_size[foto_barang,2048]|is_image[foto_barang]|mime_in[foto_barang,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/meubellair/edit')->withInput();
        }

        // dd('berhasil'); // jika lolos

        // lolos validasi :
        $filePhoto = $this->request->getFile('foto_barang');

        // cek gambar, apakah tetap gambar lama
        if ($filePhoto->getError() == 4) {
            // dd('tidak ganti sampul');
            $fileName = $this->request->getVar('foto_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/meubellair/');

            // cari gambar berdasarkan id
            $data = $this->meubellairModel->find($id);
            // cek jika file gambarnya default.png
            if ($data['foto_barang'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/meubellair/' . $this->request->getVar('foto_lama'));
            }

            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->meubellairModel->save([
            'id' => $id,
            'foto_barang'     => $fileName,
            'kode_barang'      => $this->request->getVar('kode_barang'),
            'nama_barang'      => $this->request->getVar('nama_barang'),
            'spesifikasi'      => $this->request->getVar('spesifikasi'),
            'tahun_perolehan'  => $this->request->getVar('tahun_perolehan'),
            'nilai_satuan'     => $this->request->getVar('nilai_satuan'),
            'kondisi'      => $this->request->getVar('kondisi'),
            'jumlah'          => $this->request->getVar('jumlah'),
            'pengguna'      => $this->request->getVar('pengguna'),
            'unit_pengguna'      => $this->request->getVar('unit_pengguna'),
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/meubellair');
    }


    // method untuk memproses simpan data
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'foto_barang' => [
                'rules' => 'max_size[foto_barang,1024]|is_image[foto_barang]|mime_in[foto_barang,image/jpg,image/jpeg,image/png]',
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

            return redirect()->to('/meubellair/create')->withInput();
        }

        // dd('berhasil'); // jika lolos

        // ambil gambar :
        $filePhoto = $this->request->getFile('foto_barang');

        // apakah tidak ada file yang diupload
        if ($filePhoto->getError() == 4) {
            $fileName = 'default.png';
        } else {
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/meubellair');
            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // dd($fileName);

        $this->meubellairModel->insert([
            'foto_barang'     => $fileName,
            'kode_barang'      => $this->request->getVar('kode_barang'),
            'nama_barang'      => $this->request->getVar('nama_barang'),
            'spesifikasi'      => $this->request->getVar('spesifikasi'),
            'tahun_perolehan'  => $this->request->getVar('tahun_perolehan'),
            'nilai_satuan'     => $this->request->getVar('nilai_satuan'),
            'kondisi'      => $this->request->getVar('kondisi'),
            'jumlah'          => $this->request->getVar('jumlah'),
            'pengguna'      => $this->request->getVar('pengguna'),
            'unit_pengguna'      => $this->request->getVar('unit_pengguna'),
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/meubellair');
    }


    // method untuk hapus data
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $data = $this->meubellairModel->find($id);

        // cek jika file gambarnya default.png
        if ($data['foto_barang'] != 'default.png') {
            // hapus file gambar
            unlink('img/meubellair/' . $data['foto_barang']);
        }

        $this->meubellairModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/meubellair');
    }
}
