<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AsetLainnyaSeeder extends Seeder
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
                'kondisi'    => "Baik",
                'jumlah'    => 5,
                'pengguna'    => "UPT TIK",
                'unit_pengguna'    => 'Lab jarkom',
                'jenis_kepemilikan'    => 'Unit Fakultas',
                'kolom_keterangan'    => 'Semua kondisi aman',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor2.jpg',
                'kode_barang'    => '035671',
                'nama_barang'    => 'Asus TUF',
                'spesifikasi'    => 'Intel Core i99',
                'tahun_perolehan'    => 2020,
                'nilai_satuan'    => 3403452,
                'kondisi'    => "Buruk",
                'jumlah'    => 50,
                'pengguna'    => "Prodi",
                'unit_pengguna'    => 'Lab RPL',
                'jenis_kepemilikan'    => 'Unit Universitas',
                'kolom_keterangan'    => 'Semua kondisi cukup buruk',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor3.jpg',
                'kode_barang'    => '865432',
                'nama_barang'    => 'Lenovo Ideapad Gaming',
                'spesifikasi'    => 'AMD Ryzen 5',
                'tahun_perolehan'    => 2022,
                'nilai_satuan'    => 14000000,
                'kondisi'    => "Parah",
                'jumlah'    => 1,
                'pengguna'    => "UPT TIK",
                'unit_pengguna'    => 'Lab Riset',
                'jenis_kepemilikan'    => 'Unit Himpunan',
                'kolom_keterangan'    => 'Semua kondisi sangat parah',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('aset_lainnya')->insertBatch($data);
    }
}
