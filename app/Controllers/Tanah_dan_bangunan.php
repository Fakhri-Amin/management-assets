<?php

namespace App\Controllers;

use App\Models\ModelAdminBMN;
use App\Models\ModelTanahDanBangunan;

class Tanah_dan_bangunan extends BaseController
{
    protected $tanah_dan_bangunan;

    public function __construct()
    {
        $this->tanah_dan_bangunan = new ModelTanahDanBangunan();
        $this->menu = "Tanah Dan Bangunan";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->tanah_dan_bangunan->getData()
        ];
        return view('tanah_dan_bangunan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()
        ];
        return view('tanah_dan_bangunan/create', $data);
    }

    // edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->tanah_dan_bangunan->getData($id)
        ];
        return view('tanah_dan_bangunan/edit', $data);
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
            // return redirect()->to('/tanah_dan_bangunan/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/tanah_dan_bangunan/edit/')->withInput();
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
            $filePhoto->move('img/tanah_dan_bangunan/');

            // cari gambar berdasarkan id
            $data = $this->tanah_dan_bangunan->find($id);
            // cek jika file gambarnya default.png
            if ($data['foto_barang'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/tanah_dan_bangunan/' . $this->request->getVar('foto_lama'));
            }
            // Ambil nama file
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->tanah_dan_bangunan->save([
            'id' => $id,
            'foto_barang'     => $fileName,
            'kondisi_bangunan'  => $this->request->getVar('kondisi_bangunan'),
            'luas_tanah'      => $this->request->getVar('luas_tanah'),
            'luas_bangunan'      => $this->request->getVar('luas_bangunan'),
            'jumlah_bangunan'  => $this->request->getVar('jumlah_bangunan'),
            'jumlah_ruangan'  => $this->request->getVar('jumlah_ruangan'),
            'peruntukan_ruang'     => $this->request->getVar('peruntukan_ruang'),
            'tahun_perolehan'      => $this->request->getVar('tahun_perolehan'),
            'nilai_bangunan_pekerjaan'          => $this->request->getVar('nilai_bangunan_pekerjaan'),
            'nilai_satuan_tanah'      => $this->request->getVar('nilai_satuan_tanah'),
            'luas_halaman_taman' => $this->request->getVar('luas_halaman_taman'),
            'nomor_kepemilikan_sertifikat' => $this->request->getVar('nomor_kepemilikan_sertifikat'),
            'alamat' => $this->request->getVar('alamat'),
            'batas_lahan' => $this->request->getVar('batas_lahan'),
            'denah_gedung' => $this->request->getVar('denah_gedung'),
            'nomor_imb' => $this->request->getVar('nomor_imb'),
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/tanah_dan_bangunan');
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
            // return redirect()->to('/tanah_dan_bangunan/create')->withInput()->with('validation', $validation);
            return redirect()->to('/tanah_dan_bangunan/create')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');

        // apakah tidak ada file yang diupload
        if ($filePhoto->getError() == 4) {
            $fileName = 'default.png';
        } else {
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/tanah_dan_bangunan');
            // ambil nama file :
            $fileName = $filePhoto->getName();
        }

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->tanah_dan_bangunan->save([
            'foto_barang'     => $fileName,
            'kondisi_bangunan'  => $this->request->getVar('kondisi_bangunan'),
            'luas_tanah'      => $this->request->getVar('luas_tanah'),
            'luas_bangunan'      => $this->request->getVar('luas_bangunan'),
            'jumlah_bangunan'  => $this->request->getVar('jumlah_bangunan'),
            'jumlah_ruangan'  => $this->request->getVar('jumlah_ruangan'),
            'peruntukan_ruang'     => $this->request->getVar('peruntukan_ruang'),
            'tahun_perolehan'      => $this->request->getVar('tahun_perolehan'),
            'nilai_bangunan_pekerjaan'          => $this->request->getVar('nilai_bangunan_pekerjaan'),
            'nilai_satuan_tanah'      => $this->request->getVar('nilai_satuan_tanah'),
            'luas_halaman_taman' => $this->request->getVar('luas_halaman_taman'),
            'nomor_kepemilikan_sertifikat' => $this->request->getVar('nomor_kepemilikan_sertifikat'),
            'alamat' => $this->request->getVar('alamat'),
            'batas_lahan' => $this->request->getVar('batas_lahan'),
            'denah_gedung' => $this->request->getVar('denah_gedung'),
            'nomor_imb' => $this->request->getVar('nomor_imb'),
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/tanah_dan_bangunan');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->tanah_dan_bangunan->find($id);

        // cek jika file gambarnya default.png
        if ($data['foto_barang'] != 'default.png') {
            // hapus file gambar
            unlink('img/tanah_dan_bangunan/' . $data['foto_barang']);
        }

        $this->tanah_dan_bangunan->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/tanah_dan_bangunan');
    }
}
