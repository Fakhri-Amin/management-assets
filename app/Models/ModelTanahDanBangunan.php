<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTanahDanBangunan extends Model
{
    protected $table = 'tanah_dan_bangunan';  // Nama table di database
    protected $primaryKey = 'id'; // Nama field id
    protected $useTimesStamps = true; // Jika menggunakan created_at dan updated_at
    protected $allowedFields = [
        'foto_barang',
        'kondisi',
        'luas_tanah',
        'luas_bangunan',
        'jumlah_bangunan',
        'jumlah_ruangan',
        'peruntukan_ruang',
        'tahun_perolehan',
        'nilai_bangunan_pekerjaan',
        'nilai_satuan_tanah',
        'luas_halaman_taman',
        'nomor_kepemilikan_sertifikat',
        'alamat',
        'batas_lahan',
        'denah_gedung',
        'nomor_imb',
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
