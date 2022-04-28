<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LaporanYangDibutuhkanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanah_dan_bangunan' => 'lorem ipsum',
                'kendaraan_bermotor'    => 'lorem ipsum',
                'peralatan_dan_mesin'    => 'lorem ipsum',
                'meubellair'    => 'lorem ipsum',
                'persediaan'    => "lorem ipsum",
                'aset_lainnya'    => "lorem ipsum",
                'laboratorium'    => "lorem ipsum",
                'data_hibah'    => "lorem ipsum",
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'tanah_dan_bangunan' => 'lorem ipsum',
                'kendaraan_bermotor'    => 'lorem ipsum',
                'peralatan_dan_mesin'    => 'lorem ipsum',
                'meubellair'    => 'lorem ipsum',
                'persediaan'    => "lorem ipsum",
                'aset_lainnya'    => "lorem ipsum",
                'laboratorium'    => "lorem ipsum",
                'data_hibah'    => "lorem ipsum",
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'tanah_dan_bangunan' => 'lorem ipsum',
                'kendaraan_bermotor'    => 'lorem ipsum',
                'peralatan_dan_mesin'    => 'lorem ipsum',
                'meubellair'    => 'lorem ipsum',
                'persediaan'    => "lorem ipsum",
                'aset_lainnya'    => "lorem ipsum",
                'laboratorium'    => "lorem ipsum",
                'data_hibah'    => "lorem ipsum",
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('laporan_yang_dibutuhkan')->insertBatch($data);
    }
}
