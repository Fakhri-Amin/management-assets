<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AdminBmnSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'foto_barang' => 'monitor1.jpg',
                'penyedia_perusahaan'    => 'Google',
                'nama_direktur'    => 'Bill Gates',
                'alamat_penyedia'    => 'Jln. Google Way',
                'nomor_siupal'    => "012912",
                'nilai_kontrak'    => "Baik",
                'pekerjaan'    => "IT",
                'nomor_sp2d'    => "0012",
                'tanggal_sp2d'    => "26 April 2022",
                'jumlah_barang'    => 5,
                'nama_barang'    => 'PC',
                'spesifikasi'    => 'Intel Core i12',
                'nilai_satuan'    => 10000000,
                'unit_pengguna'    => 'UPT TIK',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor2.jpg',
                'penyedia_perusahaan'    => 'Meta',
                'nama_direktur'    => 'Mark Zukbergerg',
                'alamat_penyedia'    => 'Jln. Meta Way 999',
                'nomor_siupal'    => "2020021",
                'nilai_kontrak'    => "Keren",
                'pekerjaan'    => "Business IT",
                'nomor_sp2d'    => "3412",
                'tanggal_sp2d'    => "26 April 2022",
                'jumlah_barang'    => 90,
                'nama_barang'    => 'PC',
                'spesifikasi'    => 'AMD Ryzen 7',
                'nilai_satuan'    => 20000000,
                'unit_pengguna'    => 'UPT TIK',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor3.jpg',
                'penyedia_perusahaan'    => 'Microsoft',
                'nama_direktur'    => 'Entah',
                'alamat_penyedia'    => 'Jln. Microsoft Way 999',
                'nomor_siupal'    => "23912",
                'nilai_kontrak'    => "Mantab",
                'pekerjaan'    => "Management",
                'nomor_sp2d'    => "4412",
                'tanggal_sp2d'    => "26 April 2022",
                'jumlah_barang'    => 7,
                'nama_barang'    => 'Mouse',
                'spesifikasi'    => 'Logitech',
                'nilai_satuan'    => 2000000,
                'unit_pengguna'    => 'UPT TIK',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('admin_bmn')->insertBatch($data);
    }
}
