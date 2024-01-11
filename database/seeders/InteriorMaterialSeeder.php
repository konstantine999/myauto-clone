<?php

namespace Database\Seeders;

use App\Models\InteriorMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InteriorMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InteriorMaterial::truncate();

        $interior_materials = [
            ['val0' => '1', 'name' => 'ნაჭერი'],
            ['val0' => '2', 'name' => 'ტყავი'],
            ['val0' => '3', 'name' => 'ხელოვნური ტყავი'],
            ['val0' => '4', 'name' => 'კომბინირებული'],
            ['val0' => '5', 'name' => 'ალკანტარა'],
        ];

        foreach ($interior_materials as $item) {
            InteriorMaterial::create([
                'id' => (int) $item['val0'],
                'name' => $item['name'],
            ]);
        }
    }
}
