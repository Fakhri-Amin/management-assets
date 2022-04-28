<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdminBMN extends Model
{
    protected $table = 'admin_bmn';  // Nama table di database
    protected $primaryKey = 'id'; // Nama field id
    protected $useTimesStamps = true; // Jika menggunakan created_at dan updated_at
    protected $allowedFields = [
        'foto_barang',
        'penyedia_perusahaan',
        'nama_direktur',
        'alamat_penyedia',
        'nomor_siupal',
        'nilai_kontrak',
        'pekerjaan',
        'nomor_sp2d',
        'tanggal_sp2d',
        'jumlah_barang',
        'nama_barang',
        'spesifikasi',
        'nilai_satuan',
        'unit_pengguna'
    ];

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
