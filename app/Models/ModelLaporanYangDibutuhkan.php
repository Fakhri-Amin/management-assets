<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporanYangDibutuhkan extends Model
{
    protected $table = 'laporan_yang_dibutuhkan';  // Nama table di database
    protected $primaryKey = 'id'; // Nama field id
    protected $useTimesStamps = true; // Jika menggunakan created_at dan updated_at
    protected $allowedFields = [
        'tanah_dan_bangunan',
        'kendaraan_bermotor',
        'peralatan_dan_mesin',
        'meubellair',
        'persediaan',
        'aset_lainnya',
        'laboratorium',
        'data_hibah'
    ];

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
