<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::create([
            'name' => 'A',
            'price' => 50,
        ])->specialPromotion()->create([
            'units' => 3,
            'price_for_units' => 130
        ]);

        Product::create([
            'name' => 'B',
            'price' => 30,
        ])->specialPromotion()->create([
            'units' => 2,
            'price_for_units' => 45
        ]);

        Product::create([
            'name' => 'C',
            'price' => 20,
        ]);

        Product::create([
            'name' => 'D',
            'price' => 10,
        ]);
    }
}
