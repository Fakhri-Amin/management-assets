<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MeubellairSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'foto_barang' => 'monitor1.jpg',
                'kode_barang'    => '897868',
                'nama_barang'    => 'kayu',
                'spesifikasi'    => '5x5',
                'tahun_perolehan' => 2019,
                'nilai_satuan' => 9000000,
                'kondisi' => 'tidak bagus',
                'jumlah' => 300,
                'pengguna' => 90,
                'unit_pengguna' => 'root',
                'jenis_kepemilikan' => 'Lab jarkom',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'foto_barang' => 'monitor2.jpg',
                'kode_barang'    => '99999',
                'nama_barang'    => 'meja',
                'spesifikasi'    => 'tiga kaki',
                'tahun_perolehan' => 2019,
                'nilai_satuan' => 9000000,
                'kondisi' => 'tidak bagus',
                'jumlah' => 300,
                'pengguna' => 90,
                'unit_pengguna' => 'root',
                'jenis_kepemilikan' => 'Lab jarkom',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'foto_barang' => 'monitor3.jpg',
                'kode_barang'    => '88888',
                'nama_barang'    => 'kursi',
                'spesifikasi'    => '4 kaki',
                'tahun_perolehan' => 2010,
                'nilai_satuan' => 8000000,
                'kondisi' => 'bagus',
                'jumlah' => 300,
                'pengguna' => 90,
                'unit_pengguna' => 'root',
                'jenis_kepemilikan' => 'Lab jarkom',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Using Query Builder
        // $this->db->table('laboratorium')->insert($data);
        $this->db->table('meubellair')->insertBatch($data);
    }
}
