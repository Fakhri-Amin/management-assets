<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KendaraanBermotorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'foto_barang' => 'monitor1.jpg',
                'no_polisi'    => '10012131',
                'merek_tipe'    => 'Honda',
                'jenis_model'    => "Beat",
                'tahun_pembuatan'    => 2022,
                'warna'    => "Merah Putih",
                'isi_silinder'    => "Emas",
                'nomor_rangka_nik'    => 20000,
                'nomor_mesin'    => 100000,
                'bahan_bakar'    => 'Pertalite',
                'stnk_bpkb'    => '073519',
                'kondisi'    => 'Baik',
                'pejabat_pengguna'    => 'Kepolisian',
                'sopir'    => 'Mas Bagas',
                'jenis_kepemilikan'    => 'UPT TIK',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor2.jpg',
                'no_polisi'    => '10012131',
                'merek_tipe'    => 'Honda',
                'jenis_model'    => "Beat",
                'tahun_pembuatan'    => 2022,
                'warna'    => "Merah Putih",
                'isi_silinder'    => "Emas",
                'nomor_rangka_nik'    => 20000,
                'nomor_mesin'    => 200000,
                'bahan_bakar'    => 'Pertalite',
                'stnk_bpkb'    => '073519',
                'kondisi'    => 'Baik',
                'pejabat_pengguna'    => 'Kepolisian',
                'sopir'    => 'Mas Bagas',
                'jenis_kepemilikan'    => 'UPT TIK',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('kendaraan_bermotor')->insertBatch($data);
    }
}
