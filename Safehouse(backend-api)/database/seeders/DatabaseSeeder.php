<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        Listing::create([
            'property_name' => 'Imperial Avenue, Dubia, Downtown Dubia Residential',
            'property_type' => 'AL Quoz 4',
            'date_available' => '02 - Dec - 2022',
            'status' => 'true',
        ]);
        Listing::create([
            'property_name' => 'Imperial Avenue, Dubia, Downtown Dubia Residential',
            'property_type' => 'AL Quoz 5',
            'date_available' => '02 - Nov - 2022',
            'status' => 'true',
        ]);
       
    }
}
