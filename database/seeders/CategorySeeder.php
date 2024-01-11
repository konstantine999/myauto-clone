<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        $categories = [
            ['val0' => '1', 'category' => 'სედანი'],
            ['val0' => '2', 'category' => 'ჯიპი'],
            ['val0' => '3', 'category' => 'კუპე'],
            ['val0' => '4', 'category' => 'ჰეტჩბეკი'],
            ['val0' => '5', 'category' => 'უნივერსალი'],
            ['val0' => '6', 'category' => 'კაბრიოლეტი'],
            ['val0' => '7', 'category' => 'პიკაპი'],
            ['val0' => '8', 'category' => 'მინივენი'],
            ['val0' => '9', 'category' => 'მიკროავტობუსი'],
            ['val0' => '10', 'category' => 'ფურგონი'],
            ['val0' => '11', 'category' => 'ლიმუზინი'],
            ['val0' => '12', 'category' => 'კროსოვერი'],
        ];

        foreach ($categories as $item) {
            Category::create([
                'id' => (int) $item['val0'],
                'name' => $item['category'],
            ]);
        }
    }
}
