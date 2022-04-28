<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TanahDanBangunanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'foto_barang' => 'monitor1.jpg',
                'kondisi_bangunan'    => 'Baik',
                'luas_tanah'    => '100',
                'luas_bangunan'    => '10',
                'jumlah_bangunan'    => 4,
                'jumlah_ruangan'    => 20,
                'peruntukan_ruang'    => "Lab",
                'tahun_perolehan'    => 2022,
                'nilai_bangunan_pekerjaan'    => "20000",
                'nilai_satuan_tanah'    => '100000',
                'luas_halaman_taman'    => '100',
                'nomor_kepemilikan_sertifikat'    => '073519',
                'alamat'    => 'Jln. Aman Sentosa',
                'batas_lahan'    => 'Barat',
                'denah_gedung'    => 'Upload',
                'nomor_imb'    => 'Upload',
                'jenis_kepemilikan'    => 'Universitas',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor2.jpg',
                'kondisi_bangunan'    => 'Baik',
                'luas_tanah'    => '100',
                'luas_bangunan'    => '10',
                'jumlah_bangunan'    => 4,
                'jumlah_ruangan'    => 20,
                'peruntukan_ruang'    => "Lab",
                'tahun_perolehan'    => 2022,
                'nilai_bangunan_pekerjaan'    => "20000",
                'nilai_satuan_tanah'    => '100000',
                'luas_halaman_taman'    => '100',
                'nomor_kepemilikan_sertifikat'    => '073519',
                'alamat'    => 'Jln. Aman Sentosa',
                'batas_lahan'    => 'Barat',
                'denah_gedung'    => 'Upload',
                'nomor_imb'    => 'Upload',
                'jenis_kepemilikan'    => 'Universitas',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ],
            [
                'foto_barang' => 'monitor3.jpg',
                'kondisi_bangunan'    => 'Baik',
                'luas_tanah'    => '100',
                'luas_bangunan'    => '10',
                'jumlah_bangunan'    => 4,
                'jumlah_ruangan'    => 20,
                'peruntukan_ruang'    => "Lab",
                'tahun_perolehan'    => 2022,
                'nilai_bangunan_pekerjaan'    => "20000",
                'nilai_satuan_tanah'    => '100000',
                'luas_halaman_taman'    => '100',
                'nomor_kepemilikan_sertifikat'    => '073519',
                'alamat'    => 'Jln. Aman Sentosa',
                'batas_lahan'    => 'Barat',
                'denah_gedung'    => 'Upload',
                'nomor_imb'    => 'Upload',
                'jenis_kepemilikan'    => 'Universitas',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('tanah_dan_bangunan')->insertBatch($data);
    }
}
