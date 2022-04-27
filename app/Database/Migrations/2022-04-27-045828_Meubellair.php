<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Meubellair extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
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
            'nama_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'spesifikasi'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'tahun_perolehan'       => [
                'type'       => 'int',
                'constraint' => '100',
                'null' => true
            ],
            'nilai_satuan'       => [
                'type'       => 'INT',
                'constraint' => '5',
                'null' => true
            ],
            'kondisi'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'jumlah'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'pengguna'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'unit_pengguna'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'jenis_kepemilikan'       => [
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('meubellair');
    }

    public function down()
    {
        $this->forge->dropTable('meubellair');
    }
}
