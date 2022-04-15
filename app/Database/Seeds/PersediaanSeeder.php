<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PersediaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'foto_barang' => '123',
            'kode_barang'    => 'komputer',
            'nama_barang'    => 'komputer',
            'spesifikasi'    => 'komputer',
            'tahun_perolehan'    => 'komputer',
            'nilai_satuan'    => 'komputer',
            'jumlah_barang_masuk'    => 3,
            'jumlah_barang_keluar'    => 5,
            'sisa_barang'    => 'komputer',
            'unit_pengguna_barang'    => 'komputer',
            'created_at'            => Time::now(),
            'updated_at'            => Time::now()
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('persediaan')->insert($data);
    }
}
