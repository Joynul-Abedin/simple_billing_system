<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Energy Lamp',
                'code' => '1000123',
                'rate' => '500'
            ],
            [
                'name' => 'Fan 56 inch',
                'code' => '1000124',
                'rate' => '2000'
            ],
            [
                'name' => 'Tv',
                'code' => '1000125',
                'rate' => '5000'
            ],
            [
                'name' => 'Fridge',
                'code' => '1000126',
                'rate' => '50000'
            ],
            [
                'name' => 'Blender',
                'code' => '1000127',
                'rate' => '2500'
            ],
            [
                'name' => 'Washing Machine',
                'code' => '1000128',
                'rate' => '45000'
            ],

        ];

        foreach ($products as $value) {
            products::create($value);
        }
    }
}