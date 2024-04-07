<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Listing::create([
            'property_name' => 'Imperial Avenue, Dubia, Downtown Dubia Residential',
            'property_type' => 'AL Quoz 4',
            'date_available' => '02 - Nov - 2022',
            'status' => 'true',
        ]);
    }
}
