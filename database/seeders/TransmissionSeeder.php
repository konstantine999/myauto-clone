<?php

namespace Database\Seeders;

use App\Models\Transmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transmission::truncate();

        $categories = [
            ['val0' => '1', 'transmission' => 'მექანიკა'],
            ['val0' => '2', 'transmission' => 'ავტომატიკა'],
            ['val0' => '3', 'transmission' => 'ტიპტრონიკი'],
            ['val0' => '4', 'transmission' => 'ვარიატორი'],
        ];

        foreach ($categories as $item) {
            Transmission::create([
                'id' => (int) $item['val0'],
                'name' => $item['transmission'],
            ]);
        }
    }
}
