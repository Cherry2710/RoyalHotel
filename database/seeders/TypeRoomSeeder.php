<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_rooms')->insert([
            [
                'id' => 1,
                'name' => 'Phòng đơn',
                'description' => 'Có cửa sổ nhỏ'
            ],

            [
                'id' => 2,
                'name' => 'Phòng đôi',
                'description' => 'Hướng ra biển'
            ],

            [
                'id' => 3,
                'name' => 'Phòng ba',
                'description' => 'Có sân thượng'
            ]
        ]);
    }
}
