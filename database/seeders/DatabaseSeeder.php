<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use database\factories\UsersFactoy;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this -> call(TypeRoomSeeder::class);
        // $this -> call(HotelSeeder::class);
        $this -> call(RoomSeeder::class);
    }
}
