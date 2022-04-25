<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laboratorium extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lab'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // foto barang
            'item_photo'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            // kode barang
            'item_code'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            // nama barang
            'item_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            // spesifikasi / jenis / merek
            'item_spec'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            // tahun perolehan
            'obtained_year'       => [
                'type'       => 'INT',
                'constraint' => '5',
                'null' => true
            ],
            // nilai satuan / harga
            'unit_value'       => [
                'type'       => 'INT',
                'constraint' => '20',
                'null' => true
            ],
            // kondisi
            'condition'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            // jumlah
            'total'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            // unit pengguna
            'user_unit'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            // jenis kepemilikan
            'ownership_type'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_lab', true);
        $this->forge->createTable('laboratorium');
    }

    public function down()
    {
        $this->forge->dropTable('laboratorium');
    }
}
