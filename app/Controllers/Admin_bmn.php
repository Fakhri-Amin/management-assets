<?php

namespace App\Controllers;

use App\Models\ModelAdminBMN;

class Admin_bmn extends BaseController
{
    protected $adminBmnModel;

    public function __construct()
    {
        $this->adminBmnModel = new ModelAdminBMN();
        $this->menu = "Admin BMN";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->adminBmnModel->getData()
        ];
        return view('admin_bmn/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()
        ];
        return view('admin_bmn/create', $data);
    }

    // edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->adminBmnModel->getData($id)
        ];
        return view('admin_bmn/edit', $data);
    }

    public function update($id)
    {
        // Validasi Input
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
            // return redirect()->to('/admin_bmn/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/admin_bmn/edit/')->withInput();
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
            $filePhoto->move('img/admin_bmn/');

            // cari gambar berdasarkan id
            $data = $this->adminBmnModel->find($id);
            // cek jika file gambarnya default.png
            if ($data['foto_barang'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/admin_bmn/' . $this->request->getVar('foto_lama'));
            }
            // Ambil nama file
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->adminBmnModel->save([
            'id' => $id,
            'foto_barang'     => $fileName,
            'penyedia_perusahaan'  => $this->request->getVar('penyedia_perusahaan'),
            'nama_direktur'      => $this->request->getVar('nama_direktur'),
            'alamat_penyedia'      => $this->request->getVar('alamat_penyedia'),
            'nomor_siupal'  => $this->request->getVar('nomor_siupal'),
            'nilai_kontrak'  => $this->request->getVar('nilai_kontrak'),
            'pekerjaan'     => $this->request->getVar('pekerjaan'),
            'nomor_sp2d'      => $this->request->getVar('nomor_sp2d'),
            'jumlah_barang'          => $this->request->getVar('jumlah_barang'),
            'nama_barang'      => $this->request->getVar('nama_barang'),
            'spesifikasi' => $this->request->getVar('spesifikasi'),
            'nilai_satuan' => $this->request->getVar('nilai_satuan'),
            'unit_pengguna' => $this->request->getVar('unit_pengguna')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/admin_bmn');
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
            // return redirect()->to('/admin_bmn/create')->withInput()->with('validation', $validation);
            return redirect()->to('/admin_bmn/create')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');

        // apakah tidak ada file yang diupload
        if ($filePhoto->getError() == 4) {
            $fileName = 'default.png';
        } else {
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/admin_bmn');
            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->adminBmnModel->save([
            'foto_barang'     => $fileName,
            'penyedia_perusahaan'  => $this->request->getVar('penyedia_perusahaan'),
            'nama_direktur'      => $this->request->getVar('nama_direktur'),
            'alamat_penyedia'      => $this->request->getVar('alamat_penyedia'),
            'nomor_siupal'  => $this->request->getVar('nomor_siupal'),
            'nilai_kontrak'  => $this->request->getVar('nilai_kontrak'),
            'pekerjaan'     => $this->request->getVar('pekerjaan'),
            'nomor_sp2d'      => $this->request->getVar('nomor_sp2d'),
            'jumlah_barang'          => $this->request->getVar('jumlah_barang'),
            'nama_barang'      => $this->request->getVar('nama_barang'),
            'spesifikasi' => $this->request->getVar('spesifikasi'),
            'nilai_satuan' => $this->request->getVar('nilai_satuan'),
            'unit_pengguna' => $this->request->getVar('unit_pengguna')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/admin_bmn');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->adminBmnModel->find($id);

        // cek jika file gambarnya default.png
        if ($data['foto_barang'] != 'default.png') {
            // hapus file gambar
            unlink('img/admin_bmn/' . $data['foto_barang']);
        }

        $this->adminBmnModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/admin_bmn');
    }
}
