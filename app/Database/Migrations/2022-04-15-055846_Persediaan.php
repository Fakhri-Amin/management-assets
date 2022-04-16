<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Persediaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_persediaan'      => [
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
            'kode_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'spesifikasi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'tahun_perolehan' => [
                'type' => 'INT',
                'constraint' => '5',
                'null' => true
            ],
            'nilai_satuan' => [
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'jumlah_barang_masuk' => [
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'jumlah_barang_keluar' => [
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'sisa_barang' => [
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'unit_pengguna_barang' => [
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
        $this->forge->createTable('persediaan');    // set table name
    }

    public function down()
    {
        $this->forge->dropTable('persediaan');
    }
}
