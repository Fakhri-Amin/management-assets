<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKendaraanBermotor extends Model
{
    protected $table = 'kendaraan_bermotor';  // Nama table di database
    protected $primaryKey = 'id'; // Nama field id
    protected $useTimesStamps = true; // Jika menggunakan created_at dan updated_at
    protected $allowedFields = [
        'foto_barang',
        'no_polisi',
        'merek_tipe',
        'jenis_model',
        'tahun_pembuatan',
        'warna',
        'isi_silinder',
        'nomor_rangka_nik',
        'nomor_mesin',
        'bahan_bakar',
        'stnk_bpkb',
        'kondisi',
        'pejabat_pengguna',
        'sopir',
        'jenis_kepemilikan'
    ];

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
