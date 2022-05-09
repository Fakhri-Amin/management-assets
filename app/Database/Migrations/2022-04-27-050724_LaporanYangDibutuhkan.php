<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanYangDibutuhkan extends Migration
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
            'tanah_dan_bangunan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'kendaraan_bermotor'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'peralatan_dan_mesin' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'meubellair'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'persediaan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'aset_lainnya' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'laboratorium' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'data_hibah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
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
        $this->forge->createTable('laporan_yang_dibutuhkan');    // set table name
    }

    public function down()
    {
        $this->forge->dropTable('laporan_yang_dibutuhkan');
    }
}
