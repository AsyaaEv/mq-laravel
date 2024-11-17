<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 10000,
            'description' => 'Product 1 description',
            'image' => '',
            'soldout' => 0,
            'iscod' => 0,
            'store_id' => 1,
        ]);
    }
}
