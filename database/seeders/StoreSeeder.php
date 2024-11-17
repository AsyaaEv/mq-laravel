<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Store types for more realistic names
        $types = [
            'Electronics', 'Fashion', 'Books', 'Sports', 'Toys', 
            'Furniture', 'Food', 'Beauty', 'Health', 'Automotive'
        ];
        
        // Store name suffixes
        $suffixes = [
            'Store', 'Shop', 'Market', 'Mart', 'Gallery', 
            'Center', 'Place', 'Point', 'Hub', 'Zone'
        ];

        for ($i = 1; $i <= 50; $i++) {
            $type = $faker->randomElement($types);
            $suffix = $faker->randomElement($suffixes);
            $city = $faker->city;
            
            Store::create([
                'name' => $city . ' ' . $type . ' ' . $suffix,
                'description' => $faker->paragraph(2),
                'image' => '', // Empty image as per original
                'tier' => $faker->boolean(30) ? 1 : 0, // 30% chance of being premium
                'user_id' => 1,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}