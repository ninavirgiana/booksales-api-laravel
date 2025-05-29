<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), 
            'role' => 'admin', 
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
        ]);
    }
}
