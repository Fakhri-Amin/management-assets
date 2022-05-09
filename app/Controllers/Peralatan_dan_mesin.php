<?php

namespace App\Controllers;

use App\Models\ModelPeralatanDanMesin;

class Peralatan_dan_mesin extends BaseController
{
    protected $peralatan_dan_mesin_model;

    public function __construct()
    {
        $this->peralatan_dan_mesin_model = new ModelPeralatanDanMesin();
        $this->menu = "Peralatan Dan Mesin";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->peralatan_dan_mesin_model->getData()
        ];
        return view('peralatan_dan_mesin/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()
        ];
        return view('peralatan_dan_mesin/create', $data);
    }

    // edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->peralatan_dan_mesin_model->getData($id)
        ];
        return view('peralatan_dan_mesin/edit', $data);
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
            // return redirect()->to('/peralatan_dan_mesin/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/peralatan_dan_mesin/edit/')->withInput();
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
            $filePhoto->move('img/peralatan_dan_mesin/');

            // cari gambar berdasarkan id
            $data = $this->peralatan_dan_mesin_model->find($id);
            // cek jika file gambarnya default.png
            if ($data['foto_barang'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/peralatan_dan_mesin/' . $this->request->getVar('foto_lama'));
            }
            // Ambil nama file
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->peralatan_dan_mesin_model->save([
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
        return redirect()->to('/peralatan_dan_mesin');
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
            // return redirect()->to('/peralatan_dan_mesin/create')->withInput()->with('validation', $validation);
            return redirect()->to('/peralatan_dan_mesin/create')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');

        // apakah tidak ada file yang diupload
        if ($filePhoto->getError() == 4) {
            $fileName = 'default.png';
        } else {
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/peralatan_dan_mesin');
            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->peralatan_dan_mesin_model->save([
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
        return redirect()->to('/peralatan_dan_mesin');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->peralatan_dan_mesin_model->find($id);

        // cek jika file gambarnya default.png
        if ($data['foto_barang'] != 'default.png') {
            // hapus file gambar
            unlink('img/peralatan_dan_mesin/' . $data['foto_barang']);
        }

        $this->peralatan_dan_mesin_model->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/peralatan_dan_mesin');
    }
}
