<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarClass::truncate();

        $CarClasses = [
            ['val0' => '1', 'manufacturer_id' => 3, 'car_class' => 'X'],
            ['val0' => '2', 'manufacturer_id' => 3, 'car_class' => '1-er'],
            ['val0' => '3', 'manufacturer_id' => 3, 'car_class' => '2-er'],
            ['val0' => '4', 'manufacturer_id' => 3, 'car_class' => '3-er'],
            ['val0' => '5', 'manufacturer_id' => 3, 'car_class' => '4-er'],
            ['val0' => '6', 'manufacturer_id' => 3, 'car_class' => '5-er'],
            ['val0' => '7', 'manufacturer_id' => 3, 'car_class' => '6-er'],
            ['val0' => '8', 'manufacturer_id' => 3, 'car_class' => '7-er'],
            ['val0' => '9', 'manufacturer_id' => 3, 'car_class' => '8-er'],
            ['val0' => '10', 'manufacturer_id' => 3, 'car_class' => 'M'],
        ];

        foreach ($CarClasses as $item) {
            CarClass::create([
                'id' => (int) $item['val0'],
                'manufacturer_id' => $item['manufacturer_id'],
                'car_class' => $item['car_class']
            ]);
        }
    }
}
