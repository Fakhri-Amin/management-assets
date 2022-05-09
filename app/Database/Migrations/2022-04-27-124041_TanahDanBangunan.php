<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TanahDanBangunan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'foto_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'kondisi_bangunan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'luas_tanah' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'luas_bangunan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'jumlah_bangunan' => [
                'type' => 'INT',
                'constraint' => '5',
                'null' => true
            ],
            'jumlah_ruangan' => [
                'type' => 'INT',
                'constraint' => '5',
                'null' => true
            ],
            'peruntukan_ruang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'tahun_perolehan' => [
                'type' => 'INT',
                'constraint' => '5',
                'null' => true
            ],
            'nilai_bangunan_pekerjaan' => [
                'type' => 'INT',
                'constraint' => '20',
                'null' => true
            ],
            'nilai_satuan_tanah' => [
                'type' => 'INT',
                'constraint' => '20',
                'null' => true
            ],
            'luas_halaman_taman' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nomor_kepemilikan_sertifikat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'batas_lahan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'denah_gedung' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nomor_imb' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'jenis_kepemilikan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);   // set primary key
        $this->forge->createTable('tanah_dan_bangunan');    // set table name
    }

    public function down()
    {
        $this->forge->dropTable('tanah_dan_bangunan');
    }
}
