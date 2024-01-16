<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ManufacturersSeeder::class,
            TransmissionSeeder::class,
            FuelTypeSeeder::class,
            CarColorSeeder::class,
            InteriorMaterialSeeder::class,
            CarClassSeeder::class,
            CarModellSeeder::class,
        ]);
    }
}
