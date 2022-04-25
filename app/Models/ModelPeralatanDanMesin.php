<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeralatanDanMesin extends Model
{
    protected $table = 'peralatan_dan_mesin';  // Nama table di database
    protected $primaryKey = 'id'; // Nama field id
    protected $useTimesStamps = true; // Jika menggunakan created_at dan updated_at
    protected $allowedFields = [
        'foto_barang',
        'kode_barang',
        'nama_barang',
        'spesifikasi',
        'tahun_perolehan',
        'nilai_satuan',
        'kondisi',
        'jumlah',
        'pengguna',
        'unit_pengguna',
        'jenis_kepemilikan',
        'kolom_keterangan'
    ];

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
