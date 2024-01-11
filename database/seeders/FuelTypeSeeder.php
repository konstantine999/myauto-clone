<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FuelType::truncate();

        $manufacturers = [
            ['val0' => '1', 'name' => 'ბენზინი'],
            ['val0' => '2', 'name' => 'დიზელი'],
            ['val0' => '3', 'name' => 'ელექტრო'],
            ['val0' => '4', 'name' => 'ჰიბრიდი'],
            ['val0' => '5', 'name' => 'დატენვადი ჰიბრიდი'],
            ['val0' => '6', 'name' => 'თხევადი გაზი'],
            ['val0' => '7', 'name' => 'ბუნებრივი გაზი'],
            ['val0' => '8', 'name' => 'წყალბადი'],
        ];

        foreach ($manufacturers as $item) {
            FuelType::create([
                'id' => (int) $item['val0'],
                'name' => $item['name'],
            ]);
        }
    }
}
