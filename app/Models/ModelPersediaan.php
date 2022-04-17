<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPersediaan extends Model
{
    protected $table = 'persediaan';  // Nama table di database
    protected $primaryKey = 'id_persediaan'; // Nama field id
    protected $useTimesStamps = true; // Jika menggunakan created_at dan updated_at
    protected $allowedFields = [
        'foto_barang',
        'kode_barang',
        'nama_barang',
        'spesifikasi',
        'tahun_perolehan',
        'nilai_satuan',
        'jumlah_barang_masuk',
        'jumlah_barang_keluar',
        'sisa_barang',
        'unit_pengguna_barang'
    ];

    public function getData($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
