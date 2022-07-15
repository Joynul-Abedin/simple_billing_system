<?php

namespace Database\Seeders;

use App\Models\customer;
use Faker\Extension\Container;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $faker = Faker::create();

        // customer::create([
        //     'name' => $faker->name,
        //     'phone' => $faker->phoneNumber,
        //     'address' => $faker->address,
        // ]);
    }
}