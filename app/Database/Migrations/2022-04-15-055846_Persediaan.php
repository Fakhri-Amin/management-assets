<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Persediaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'foto_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kode_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'spesifikasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'tahun_perolehan' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
                'null' => true
            ],
            'nilai_satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'jumlah_barang_masuk' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ],
            'jumlah_barang_keluar' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ],
            'sisa_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'unit_pengguna_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('persediaan');    // set table name
    }

    public function down()
    {
        $this->forge->dropTable('persediaan');
    }
}
