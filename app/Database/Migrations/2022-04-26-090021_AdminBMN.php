<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminBMN extends Migration
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
            'penyedia_perusahaan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nama_direktur' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'alamat_penyedia' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nomor_siupal' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nilai_kontrak' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nomor_sp2d' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'tanggal_sp2d' => [
                'type' => 'DATETIME',
                // 'constraint' => '10',
                'null' => true
            ],
            'jumlah_barang' => [
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'spesifikasi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nilai_satuan' => [
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'unit_pengguna' => [
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
        $this->forge->createTable('admin_bmn');    // set table name
    }

    public function down()
    {
        $this->forge->dropTable('admin_bmn');
    }
}
