<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            ['user_id' => 1, 'manufacturer_id' => 3, 'model_id' => 1, 'category_id' => 1, 'transmission_id' => 1, 'fuel_type' => 1, 'color_id' => 1, 'interior_material' => 2, 'engine_size' => 4.4, 'cylinder_count' => 8, 'airbag_count' => 12, 'is_turbo' => true, 'mileage' => 65000, 'mileage_dimension' => 'km', 'steering_wheel_position' => 'მარცხენა', 'drive' => 'უკანა', 'door_count' => 2, 'have_cats' => false, 'manufacture_year' => 2015, 'is_duty_paid' => true, 'is_inspection_passed' => true, 'price' => 35000, 'description' => 'კაი მანქანაა'],

        ];
        foreach ($cars as $item) {
            Car::create([
                'id' => (int) 1,
                'user_id' => $item['user_id'],
                'manufacturer_id' => $item['manufacturer_id'],
                'model_id' => $item['model_id'],
                'category_id' => $item['category_id'],
                'transmission_id' => $item['transmission_id'],
                'fuel_type' => $item['fuel_type'],
                'color_id' => $item['color_id'],
                'interior_material' => $item['interior_material'],
                'engine_size' => $item['engine_size'],
                'cylinder_count' => $item['cylinder_count'],
                'airbag_count' => $item['airbag_count'],
                'is_turbo' => $item['is_turbo'],
                'mileage' => $item['mileage'],
                'mileage_dimension' => $item['mileage_dimension'],
                'steering_wheel_position' => $item['steering_wheel_position'],
                'drive' => $item['drive'],
                'door_count' => $item['door_count'],
                'have_cats' => $item['have_cats'],
                'manufacture_year' => $item['manufacture_year'],
                'is_duty_paid' => $item['is_duty_paid'],
                'is_inspection_passed' => $item['is_inspection_passed'],
                'price' => $item['price'],
                'description' => $item['description'],
            ]);
        }
    }
}
