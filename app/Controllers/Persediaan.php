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
            'title' => 'Tambah Data Persediaan',
            'validation' => \Config\Services::validation()
        ];
        return view('persediaan/create', $data);
    }

    // simpan data
    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'foto_barang' => [
                'rules' => 'uploaded[foto_barang]|is_image[foto_barang]|mime_in[foto_barang,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
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
        $fileGambar = $this->request->getFile('foto_barang');
        // Generate random name
        $namaGambar = $fileGambar->getRandomName();
        // Memindahkan file ke folder img/persediaan
        $fileGambar->move('img/persediaan', $namaGambar);

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->persediaanModel->save([
            'foto_barang'     => $namaGambar,
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
        $dataPersediaan = $this->persediaanModel->find($id);
        // Hapus Gambar
        unlink('img/persediaan/' . $dataPersediaan['foto_barang']);

        $this->persediaanModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/persediaan');
    }

    // edit data
    public function edit($id_persediaan)
    {
        $data = [
            'title' => 'Form Edit Data Persediaan',
            'validation' => \Config\Services::validation(),
            'datas' => $this->persediaanModel->getData($id_persediaan)
        ];
        return view('persediaan/edit', $data);
    }

    public function update($id)
    {
        // Validasi Input
        if (!$this->validate([
            'foto_barang' => [
                'rules' => 'uploaded[foto_barang]is_image[foto_barang]|mime_in[foto_barang,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/persediaan/edit/' . $this->request->getVar('id_persediaan'))->withInput();
        }

        // Ambil Gambar
        $fileGambar = $this->request->getFile('foto_barang');
        // Generate random name
        $namaGambar = $fileGambar->getRandomName();
        // Memindahkan file ke folder img/persediaan
        $fileGambar->move('img/persediaan', $namaGambar);

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->persediaanModel->save([
            'id_persediaan' => $id,
            'foto_barang'     => $namaGambar,
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
}
