<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Product categories for more realistic names
        $categories = ['Smartphone', 'Laptop', 'Headphone', 'Speaker', 'Powerbank', 
                      'Charger', 'Case', 'Screen Protector', 'Memory Card', 'Flash Drive'];
        
        // Brands for more realistic names
        $brands = ['Samsung', 'Apple', 'Sony', 'LG', 'Asus', 
                  'Lenovo', 'Dell', 'HP', 'Xiaomi', 'Oppo'];

        for ($i = 1; $i <= 50; $i++) {
            $brand = $faker->randomElement($brands);
            $category = $faker->randomElement($categories);
            $price = $faker->numberBetween(50000, 15000000);
            
            Product::create([
                'name' => $brand . ' ' . $category . ' ' . $faker->word,
                'price' => $price,
                'description' => $faker->paragraph(3),
                'image' => '', // Empty image as per original
                'soldout' => $faker->numberBetween(0, 100),
                'iscod' => $faker->boolean(70), // 70% chance of COD being available
                'store_id' => 1,
            ]);
        }
    }
}