<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KendaraanBermotor extends Migration
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
            'no_polisi'       => [
                'type'       => 'INT',
                'constraint' => '12',
                'null' => true
            ],
            'merek_tipe' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'jenis_model' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'tahun_pembuatan' => [
                'type' => 'INT',
                'constraint' => '5',
                'null' => true
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'isi_silinder' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nomor_rangka_nik' => [
                'type' => 'INT',
                'constraint' => '20',
                'null' => true
            ],
            'nomor_mesin' => [
                'type' => 'INT',
                'constraint' => '20',
                'null' => true
            ],
            'bahan_bakar' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'stnk_bpkb' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'kondisi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'pejabat_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'sopir' => [
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
        $this->forge->createTable('kendaraan_bermotor');    // set table name
    }

    public function down()
    {
        $this->forge->dropTable('kendaraan_bermotor');
    }
}
