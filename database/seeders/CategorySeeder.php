<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected array $defaultCategories = [
        [
            'cat_name' => 'Mammals',
            'cat_desc' => 'Warm-blooded vertebrates with hair or fur, most give birth to live young.',
        ],
        [
            'cat_name' => 'Birds',
            'cat_desc' => 'Warm-blooded vertebrates with feathers, most can fly and lay eggs.',
        ],
        [
            'cat_name' => 'Reptiles',
            'cat_desc' => 'Cold-blooded vertebrates with scales, most lay eggs and live in various habitats.',
        ],
        [
            'cat_name' => 'Amphibians',
            'cat_desc' => 'Cold-blooded vertebrates that can live both in water and on land, typically undergoing metamorphosis.',
        ],
        [
            'cat_name' => 'Fish',
            'cat_desc' => 'Cold-blooded vertebrates that live in water, breathe through gills, and usually have fins.',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->defaultCategories as $category) {
            \App\Models\Category::firstOrCreate($category);
        }
    }
}
