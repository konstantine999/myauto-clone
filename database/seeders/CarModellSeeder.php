<?php

namespace Database\Seeders;

use App\Models\CarModell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarModell::truncate();

        $CarClasses = [
            ['val0' => '1', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '114',],
            ['val0' => '2', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '116',],
            ['val0' => '3', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '118',],
            ['val0' => '4', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '120',],
            ['val0' => '5', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '123',],
            ['val0' => '6', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '125',],
            ['val0' => '7', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '128',],
            ['val0' => '8', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '130',],
            ['val0' => '9', 'manufacturer_id' => 3, 'car_class' => 2,'car_modell' => '135',],

        ];

        foreach ($CarClasses as $item) {
            CarModell::create([
                'id' => (int) $item['val0'],
                'manufacturer_id' => $item['manufacturer_id'],
                'car_class' => $item['car_class'],
                'name' => $item['car_modell']
            ]);
        }
    }
}
