<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use database\factories\UsersFactoy;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('rooms')-> insert([
                [
                    'image' => $faker->imageUrl($width = 500, $height = 500, 'hotels'),
                    'hotel_id' => $faker->numberBetween($min = 1, $max = 3),
                    'type_id' => $faker->numberBetween($min = 1, $max = 3),
                    'price' => $faker->numberBetween($min = 1000000, $max = 25000000),
                    'description' => $faker->text,
                    'status' => $faker->text,
                    
                ]
            ]);
        }
    }
}
