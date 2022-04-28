<?php

namespace App\Controllers;

use App\Models\ModelPersediaan;

class Persediaan extends BaseController
{
    protected $persediaanModel;

    public function __construct()
    {
        $this->persediaanModel = new ModelPersediaan();
        $this->menu = "Persediaan";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->persediaanModel->getData()
        ];
        return view('persediaan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()
        ];
        return view('persediaan/create', $data);
    }

    // edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->persediaanModel->getData($id)
        ];
        return view('persediaan/edit', $data);
    }

    public function update($id)
    {
        // Validasi Input
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
            // return redirect()->to('/persediaan/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/persediaan/edit/')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');

        // cek gambar, apakah tetap gambar lama
        if ($filePhoto->getError() == 4) {
            // dd('tidak ganti sampul');
            $fileName = $this->request->getVar('foto_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/persediaan/');

            // cari gambar berdasarkan id
            $data = $this->persediaanModel->find($id);
            // cek jika file gambarnya default.png
            if ($data['foto_barang'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/persediaan/' . $this->request->getVar('foto_lama'));
            }
            // Ambil nama file
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->persediaanModel->save([
            'id' => $id,
            'foto_barang'     => $fileName,
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
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/persediaan');
    }

    // simpan data
    public function save()
    {
        // Validasi Input
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
            // return redirect()->to('/persediaan/create')->withInput()->with('validation', $validation);
            return redirect()->to('/persediaan/create')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');

        // apakah tidak ada file yang diupload
        if ($filePhoto->getError() == 4) {
            $fileName = 'default.png';
        } else {
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/persediaan');
            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->persediaanModel->save([
            'foto_barang'     => $fileName,
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

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->persediaanModel->find($id);

        // cek jika file gambarnya default.png
        if ($data['foto_barang'] != 'default.png') {
            // hapus file gambar
            unlink('img/persediaan/' . $data['foto_barang']);
        }

        $this->persediaanModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/persediaan');
    }
}
