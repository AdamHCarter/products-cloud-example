<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // clear user table
        User::truncate();

        // clear products table
        Product::truncate();

        // create test users for each role
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'viewer'
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'administrator',
        ]);

        // create 10 random users
        User::factory(10)->create();

        // create 500 random products
        Product::factory(500)->create();
    }
}
