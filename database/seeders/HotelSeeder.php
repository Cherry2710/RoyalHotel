<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
            [
                'id' => 1,
                'name' => 'Mường Thanh Grand',
                'address' => '962 Ngô Quyền, An Hải Bắc, Sơn Trà, Đà Nẵng 50406'
            ],

            [
                'id' => 2,
                'name' => 'Novotel Danang Premier',
                'address' => '36 Bạch Đằng, Street, Hải Châu, Đà Nẵng 550000'
            ],

            [
                'id' => 3,
                'name' => 'Sala Danang Beach Hotel',
                'address' => '36-38 Đ. Lâm Hoành, Phước Mỹ, Sơn Trà, Đà Nẵng 550000'
            ]
        ]);
    }
}
