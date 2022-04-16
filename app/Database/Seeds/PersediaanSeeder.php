<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PersediaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'foto_barang' => 'monitor1.jpg',
                'kode_barang'    => '897868',
                'nama_barang'    => 'Asus ROG',
                'spesifikasi'    => 'Intel Core i12',
                'tahun_perolehan'    => 2019,
                'nilai_satuan'    => 1003452,
                'jumlah_barang_masuk'    => 3,
                'jumlah_barang_keluar'    => 5,
                'sisa_barang'    => 10,
                'unit_pengguna_barang'    => 'Lab jarkom',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor2.jpg',
                'kode_barang'    => '756234',
                'nama_barang'    => 'Acer Predator',
                'spesifikasi'    => 'Intel Core i9',
                'tahun_perolehan'    => 2020,
                'nilai_satuan'    => 1003789,
                'jumlah_barang_masuk'    => 8,
                'jumlah_barang_keluar'    => 2,
                'sisa_barang'    => 10,
                'unit_pengguna_barang'    => 'Lab RPL',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor3.jpg',
                'kode_barang'    => '897868',
                'nama_barang'    => 'Asus ROG',
                'spesifikasi'    => 'Intel Core i12',
                'tahun_perolehan'    => 2019,
                'nilai_satuan'    => 1003452,
                'jumlah_barang_masuk'    => 3,
                'jumlah_barang_keluar'    => 5,
                'sisa_barang'    => 10,
                'unit_pengguna_barang'    => 'Lab Riset',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('persediaan')->insertBatch($data);
    }
}
