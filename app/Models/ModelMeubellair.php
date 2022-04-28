<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMeubellair extends Model
{
    protected $table = 'meubellair';  // nama table di database
    protected $primaryKey = 'id';  // nama field id 
    protected $useTimestamps = true;  // jika menggunakan crated_at dan updated_at

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
        'jenis_kepemilikan'
    ];    //  field / column yang boleh diisi oleh kita, sisanya field id, created_at & updated_at diisi secara otomatis oleh CInya 

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
