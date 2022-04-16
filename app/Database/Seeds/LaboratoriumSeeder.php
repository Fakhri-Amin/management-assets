<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LaboratoriumSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'item_photo' => 'monitor1.jpg',
                'item_code'    => '897868',
                'item_name'    => 'lenovo 25 inch',
                'item_spec'    => '25 inch full hd',
                'obtained_year' => 2019,
                'unit_value' => 1000000,
                'condition' => 'tidak bagus',
                'total' => 5,
                'user_unit' => 5,
                'ownership_type' => 'Lab jarkom',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'item_photo' => 'monitor2.jpg',
                'item_code'    => '854868',
                'item_name'    => 'samsung 20 inch',
                'item_spec'    => '20 inch ips',
                'obtained_year' => 2020,
                'unit_value' => 1000000,
                'condition' => 'tidak bagus',
                'total' => 10,
                'user_unit' => 10,
                'ownership_type' => 'Lab tik',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'item_photo' => 'monitor3.jpg',
                'item_code'    => '892098',
                'item_name'    => 'xiaomi 30 inch',
                'item_spec'    => '30 inch full hd amoled',
                'obtained_year' => 2022,
                'unit_value' => 4000000,
                'condition' => 'tidak bagus',
                'total' => 1,
                'user_unit' => 1,
                'ownership_type' => 'Lab rpl',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        // $this->db->table('laboratorium')->insert($data);
        $this->db->table('laboratorium')->insertBatch($data);
    }
}
