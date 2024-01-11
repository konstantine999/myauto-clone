<?php

namespace Database\Seeders;

use App\Models\CarColors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarColors::truncate();

        $manufacturers = [
            ['val0' => '1', 'name' => 'თეთრი', 'hex' => '#FFFFFF'],
            ['val0' => '2', 'name' => 'შავი', 'hex' => '#000000'],
            ['val0' => '3', 'name' => 'ვერცხლისფერი', 'hex' => '#C0C0C0 '],
            ['val0' => '4', 'name' => 'რუხი', 'hex' => '#808080'],
            ['val0' => '5', 'name' => 'წითელი', 'hex' => '#ff0000'],
            ['val0' => '6', 'name' => 'ლურჯი', 'hex' => '#0000ff'],
            ['val0' => '7', 'name' => 'ყვითელი', 'hex' => '#FFFF00'],
            ['val0' => '8', 'name' => 'მწვანე', 'hex' => '#00FF00'],
            ['val0' => '9', 'name' => 'ნარინჯისფერი', 'hex' => '#592787'],
            ['val0' => '10', 'name' => 'ოქროსფერი', 'hex' => '#FFD700'],
        ];

        foreach ($manufacturers as $item) {
            CarColors::create([
                'id' => (int) $item['val0'],
                'name' => $item['name'],
                'hex_color' => $item['hex']
            ]);
        }
    }
}
