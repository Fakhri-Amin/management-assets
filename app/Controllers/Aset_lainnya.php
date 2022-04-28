<?php

namespace App\Controllers;

use App\Models\ModelAsetLainnya;

class Aset_lainnya extends BaseController
{
    protected $asetLainnyaModel;

    public function __construct()
    {
        $this->asetLainnyaModel = new ModelAsetLainnya();
        $this->menu = "Asset Lainnya";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->asetLainnyaModel->getData()
        ];
        return view('aset_lainnya/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()
        ];
        return view('aset_lainnya/create', $data);
    }

    // edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->asetLainnyaModel->getData($id)
        ];
        return view('aset_lainnya/edit', $data);
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
            // return redirect()->to('/aset_lainnya/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/aset_lainnya/edit/')->withInput();
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
            $filePhoto->move('img/aset_lainnya/');

            // cari gambar berdasarkan id
            $data = $this->asetLainnyaModel->find($id);
            // cek jika file gambarnya default.png
            if ($data['foto_barang'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/aset_lainnya/' . $this->request->getVar('foto_lama'));
            }
            // Ambil nama file
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->asetLainnyaModel->save([
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
            'unit_pengguna' => $this->request->getVar('unit_pengguna'),
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan'),
            'kolom_keterangan' => $this->request->getVar('kolom_keterangan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/aset_lainnya');
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
            // return redirect()->to('/aset_lainnya/create')->withInput()->with('validation', $validation);
            return redirect()->to('/aset_lainnya/create')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');

        // apakah tidak ada file yang diupload
        if ($filePhoto->getError() == 4) {
            $fileName = 'default.png';
        } else {
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/aset_lainnya');
            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->asetLainnyaModel->save([
            'foto_barang'     => $fileName,
            'kode_barang'      => $this->request->getVar('kode_barang'),
            'nama_barang'      => $this->request->getVar('nama_barang'),
            'spesifikasi'      => $this->request->getVar('spesifikasi'),
            'tahun_perolehan'  => $this->request->getVar('tahun_perolehan'),
            'nilai_satuan'     => $this->request->getVar('nilai_satuan'),
            'kondisi'      => $this->request->getVar('kondisi'),
            'jumlah'          => $this->request->getVar('jumlah'),
            'pengguna'      => $this->request->getVar('pengguna'),
            'unit_pengguna' => $this->request->getVar('unit_pengguna'),
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan'),
            'kolom_keterangan' => $this->request->getVar('kolom_keterangan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/aset_lainnya');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->asetLainnyaModel->find($id);

        // cek jika file gambarnya default.png
        if ($data['foto_barang'] != 'default.png') {
            // hapus file gambar
            unlink('img/aset_lainnya/' . $data['foto_barang']);
        }

        $this->asetLainnyaModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/aset_lainnya');
    }
}
