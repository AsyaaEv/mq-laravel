<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'nohp' => '1234567890',
            'kelas' => 'XII PPLG 2',
            'profile' => '',
            'role' => 'admin',
            'password' => '123',
        ]);
    }
}
