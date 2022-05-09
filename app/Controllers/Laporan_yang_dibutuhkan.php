<?php

namespace App\Controllers;

use App\Models\ModelAdminBMN;
use App\Models\ModelLaporan;
use App\Models\ModelLaporanYangDibutuhkan;

class Laporan_yang_dibutuhkan extends BaseController
{
    protected $laporan;

    public function __construct()
    {
        $this->laporan = new ModelLaporanYangDibutuhkan();
        $this->menu = "Laporan yang Dibutuhkan";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->laporan->getData()
        ];
        return view('laporan_yang_dibutuhkan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation()
        ];
        return view('laporan_yang_dibutuhkan/create', $data);
    }

    // edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'data' => $this->laporan->getData($id)
        ];
        return view('laporan_yang_dibutuhkan/edit', $data);
    }

    public function update($id)
    {
        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->laporan->save([
            'id' => $id,
            'tanah_dan_bangunan'  => $this->request->getVar('tanah_dan_bangunan'),
            'kendaraan_bermotor'      => $this->request->getVar('kendaraan_bermotor'),
            'peralatan_dan_mesin'      => $this->request->getVar('peralatan_dan_mesin'),
            'meubellair'  => $this->request->getVar('meubellair'),
            'persediaan'     => $this->request->getVar('persediaan'),
            'aset_lainnya'      => $this->request->getVar('aset_lainnya'),
            'laboratorium'          => $this->request->getVar('laboratorium'),
            'data_hibah'      => $this->request->getVar('data_hibah')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/laporan_yang_dibutuhkan');
    }

    // simpan data
    public function save()
    {

        // $slug = url_title($this->request->getVar('name'), '-', true);
        $this->laporan->save([
            'tanah_dan_bangunan'  => $this->request->getVar('tanah_dan_bangunan'),
            'kendaraan_bermotor'      => $this->request->getVar('kendaraan_bermotor'),
            'peralatan_dan_mesin'      => $this->request->getVar('peralatan_dan_mesin'),
            'meubellair'  => $this->request->getVar('meubellair'),
            'persediaan'     => $this->request->getVar('persediaan'),
            'aset_lainnya'      => $this->request->getVar('aset_lainnya'),
            'laboratorium'          => $this->request->getVar('laboratorium'),
            'data_hibah'      => $this->request->getVar('data_hibah')
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil menambahkan data!');
        return redirect()->to('/laporan_yang_dibutuhkan');
    }

    public function delete($id)
    {
        $this->laporan->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/laporan_yang_dibutuhkan');
    }
}
