<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manufacturer::truncate();

        $manufacturers = [
            ['val0' => '1', 'name' => 'Toyota'],
            ['val0' => '2', 'name' => 'Honda'],
            ['val0' => '3', 'name' => 'Bmw'],
        ];

        foreach ($manufacturers as $item) {
            Manufacturer::create([
                'id' => (int) $item['val0'],
                'name' => $item['name'],
            ]);
        }
    }
}
