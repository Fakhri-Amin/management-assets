<?php

namespace App\Controllers;

use App\Models\ModelKendaraanBermotor;

class Kendaraan_bermotor extends BaseController
{
    protected $kendaraan_bermotor;

    public function __construct()
    {
        $this->kendaraan_bermotor = new ModelKendaraanBermotor();
        $this->menu = "Kendaraan Bermotor";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->kendaraan_bermotor->getData()
        ];
        return view('kendaraan_bermotor/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()
        ];
        return view('kendaraan_bermotor/create', $data);
    }

    // edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->kendaraan_bermotor->getData($id)
        ];
        return view('kendaraan_bermotor/edit', $data);
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
            ],
            'stnk_bpkb' => [
                'rules' => 'max_size[stnk_bpkb,5120]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                ]
            ],
            'pejabat_pengguna' => [
                'rules' => 'max_size[pejabat_pengguna,5120]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                ]
            ],
            'sopir' => [
                'rules' => 'max_size[sopir,5120]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                ]
            ]
        ])) {
            // return redirect()->to('/kendaraan_bermotor/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/kendaraan_bermotor/edit/')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');
        // Ambil File Nomor Kepemilikan Sertifikat
        $fileStnkBpkb = $this->request->getFile('stnk_bpkb');
        // Ambil File Denah Gedung
        $filePejabatPengguna = $this->request->getFile('pejabat_pengguna');
        // Ambil File Nomor IMB
        $fileSopir = $this->request->getFile('sopir');

        // cek gambar, apakah tetap gambar lama
        if ($filePhoto->getError() == 4) {
            // dd('tidak ganti sampul');
            $filePhotoName = $this->request->getVar('foto_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/kendaraan_bermotor/');

            // cari gambar berdasarkan id
            $data = $this->kendaraan_bermotor->find($id);
            // cek jika file gambarnya default.png
            if ($data['foto_barang'] != 'default.png') {
                // hapus file gambar lama
                unlink('img/kendaraan_bermotor/' . $this->request->getVar('foto_lama'));
            }
            // Ambil nama file
            $filePhotoName = $filePhoto->getName();
        }

        // cek dokumen Stnk / Bpkb, apakah tetap dokumen stnk bpkb
        if ($fileStnkBpkb->getError() == 4) {
            // dd('tidak ganti sampul');
            $fileStnkBpkbName = $this->request->getVar('dokumen_stnk_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $fileStnkBpkb->move('document/kendaraan_bermotor/');

            // cari dokumen nomor sertifikat berdasarkan id
            $data = $this->kendaraan_bermotor->find($id);

            if ($data['stnk_bpkb'] != null) {
                // hapus file dokumen stnk bpkb
                unlink('document/kendaraan_bermotor/' . $this->request->getVar('dokumen_stnk_lama'));
            }

            // Ambil nama file
            $fileStnkBpkbName = $fileStnkBpkb->getName();
        }

        // cek dokumen denah gedung, apakah tetap dokumen denah pejabat pengguna
        if ($filePejabatPengguna->getError() == 4) {
            // dd('tidak ganti sampul');
            $filePejabatPenggunaName = $this->request->getVar('dokumen_pejabat_pengguna_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $filePejabatPengguna->move('document/kendaraan_bermotor/');

            // cari dokumen denah gedung berdasarkan id
            $data = $this->kendaraan_bermotor->find($id);

            if ($data['pejabat_pengguna'] != null) {
                // hapus file dokumen denah gedung lama
                unlink('document/kendaraan_bermotor/' . $this->request->getVar('dokumen_pejabat_pengguna_lama'));
            }

            // Ambil nama file
            $filePejabatPenggunaName = $filePejabatPengguna->getName();
        }

        // cek dokumen nomor IMB, apakah tetap dokumen nomor IMB lama
        if ($fileSopir->getError() == 4) {
            // dd('tidak ganti sampul');
            $fileSopirName = $this->request->getVar('dokumen_sopir_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $fileSopir->move('document/kendaraan_bermotor/');

            // cari dokumen nomor IMB berdasarkan id
            $data = $this->kendaraan_bermotor->find($id);

            if ($data['sopir'] != null) {
                // hapus file dokumen sopir
                unlink('document/kendaraan_bermotor/' . $this->request->getVar('dokumen_sopir_lama'));
            }

            // Ambil nama file
            $fileSopirName = $fileSopir->getName();
        }

        $this->kendaraan_bermotor->save([
            'id' => $id,
            'foto_barang'     => $filePhotoName,
            'no_polisi'  => $this->request->getVar('no_polisi'),
            'merek_tipe'      => $this->request->getVar('merek_tipe'),
            'jenis_model'      => $this->request->getVar('jenis_model'),
            'tahun_pembuatan'  => $this->request->getVar('tahun_pembuatan'),
            'warna'  => $this->request->getVar('warna'),
            'isi_silinder'     => $this->request->getVar('isi_silinder'),
            'nomor_rangka_nik'      => $this->request->getVar('nomor_rangka_nik'),
            'nomor_mesin'          => $this->request->getVar('nomor_mesin'),
            'bahan_bakar'      => $this->request->getVar('bahan_bakar'),
            'stnk_bpkb' => $fileStnkBpkbName,
            'kondisi' => $this->request->getVar('kondisi'),
            'pejabat_pengguna' => $filePejabatPenggunaName,
            'sopir' => $fileSopirName,
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/kendaraan_bermotor');
    }

    // simpan data
    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'foto_barang' => [
                'rules' => 'max_size[foto_barang,3048]|is_image[foto_barang]|mime_in[foto_barang,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'stnk_bpkb' => [
                'rules' => 'max_size[stnk_bpkb,5120]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                ]
            ],
            'pejabat_pengguna' => [
                'rules' => 'max_size[pejabat_pengguna,5120]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                ]
            ],
            'sopir' => [
                'rules' => 'max_size[sopir,5120]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                ]
            ]
        ])) {
            // return redirect()->to('/kendaraan_bermotor/edit/' . $this->request->getVar('id'))->withInput();
            return redirect()->to('/kendaraan_bermotor/edit/')->withInput();
        }

        // Ambil Gambar
        $filePhoto = $this->request->getFile('foto_barang');
        // Ambil File Nomor Kepemilikan Sertifikat
        $fileStnkBpkb = $this->request->getFile('stnk_bpkb');
        // Ambil File Denah Gedung
        $filePejabatPengguna = $this->request->getFile('pejabat_pengguna');
        // Ambil File Nomor IMB
        $fileSopir = $this->request->getFile('sopir');

        // cek gambar, apakah tetap gambar lama
        if ($filePhoto->getError() == 4) {
            // dd('tidak ganti sampul');
            $filePhotoName = $this->request->getVar('foto_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $filePhoto->move('img/kendaraan_bermotor/');

            // Ambil nama file
            $filePhotoName = $filePhoto->getName();
        }

        // cek dokumen Stnk / Bpkb, apakah tetap dokumen stnk bpkb
        if ($fileStnkBpkb->getError() == 4) {
            // dd('tidak ganti sampul');
            $fileStnkBpkbName = $this->request->getVar('dokumen_stnk_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $fileStnkBpkb->move('document/kendaraan_bermotor/');

            // Ambil nama file
            $fileStnkBpkbName = $fileStnkBpkb->getName();
        }

        // cek dokumen denah gedung, apakah tetap dokumen denah pejabat pengguna
        if ($filePejabatPengguna->getError() == 4) {
            // dd('tidak ganti sampul');
            $filePejabatPenggunaName = $this->request->getVar('dokumen_pejabat_pengguna');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $filePejabatPengguna->move('document/kendaraan_bermotor/');

            // Ambil nama file
            $filePejabatPenggunaName = $filePejabatPengguna->getName();
        }

        // cek dokumen nomor IMB, apakah tetap dokumen sopir
        if ($fileSopir->getError() == 4) {
            // dd('tidak ganti sampul');
            $fileSopirName = $this->request->getVar('dokumen_sopir_lama');
        } else {
            // dd('ganti sampul baru');
            // pindahkan ke folder yang diinginkan :
            $fileSopir->move('document/kendaraan_bermotor/');

            // Ambil nama file
            $fileSopirName = $fileSopir->getName();
        }

        $this->kendaraan_bermotor->save([
            'foto_barang'     => $filePhotoName,
            'no_polisi'  => $this->request->getVar('no_polisi'),
            'merek_tipe'      => $this->request->getVar('merek_tipe'),
            'jenis_model'      => $this->request->getVar('jenis_model'),
            'tahun_pembuatan'  => $this->request->getVar('tahun_pembuatan'),
            'warna'  => $this->request->getVar('warna'),
            'isi_silinder'     => $this->request->getVar('isi_silinder'),
            'nomor_rangka_nik'      => $this->request->getVar('nomor_rangka_nik'),
            'nomor_mesin'          => $this->request->getVar('nomor_mesin'),
            'bahan_bakar'      => $this->request->getVar('bahan_bakar'),
            'stnk_bpkb' => $fileStnkBpkbName,
            'kondisi' => $this->request->getVar('kondisi'),
            'pejabat_pengguna' => $filePejabatPenggunaName,
            'sopir' => $fileSopirName,
            'jenis_kepemilikan' => $this->request->getVar('jenis_kepemilikan')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/kendaraan_bermotor');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->kendaraan_bermotor->find($id);

        // cek jika file gambarnya default.png
        if ($data['foto_barang'] != 'default.png') {
            // hapus file gambar
            unlink('img/kendaraan_bermotor/' . $data['foto_barang']);
        }

        // Nomor Kepemilikan Sertifikat : Cek jika null atau tidak, jika tidak null maka hapus
        if ($data['stnk_bpkb'] != null) {
            // hapus file dokumen stnk bpkb
            unlink('document/kendaraan_bermotor/' . $data['stnk_bpkb']);
        }

        // Denah Gedung : Cek jika null atau tidak, jika tidak null maka hapus
        if ($data['pejabat_pengguna'] != null) {
            // hapus file dokumen pejabat pengguna
            unlink('document/kendaraan_bermotor/' . $data['pejabat_pengguna']);
        }

        // Nomor IMB : Cek jika null atau tidak, jika tidak null maka hapus
        if ($data['sopir'] != null) {
            // hapus file dokumen sopir
            unlink('document/kendaraan_bermotor/' . $data['sopir']);
        }

        $this->kendaraan_bermotor->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/kendaraan_bermotor');
    }
}
