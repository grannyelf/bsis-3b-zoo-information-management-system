<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeedSeeder extends Seeder
{
    protected $defaultNeeds = [
        [
            'food_name' => 'Meat',
            'animal_needs' => 'Carnivorous animals require a diet primarily composed of meat, which provides essential nutrients and energy for their survival and growth.',
        ],
        [
            'food_name' => 'Plants',
            'animal_needs' => 'Herbivorous animals rely on a diet of plants, which provide them with necessary nutrients, fiber, and energy to sustain their health and well-being.',
        ],
        [
            'food_name' => 'Insects',
            'animal_needs' => 'Insectivorous animals depend on a diet of insects, which offer essential proteins and nutrients necessary for their growth, development, and overall health.',
        ],
        [
            'food_name' => 'Fish',
            'animal_needs' => 'Piscivorous animals require a diet primarily composed of fish, which provide them with essential nutrients, including proteins and omega-3 fatty acids, necessary for their survival and growth.',
        ],
        [
            'food_name' => 'Fruits',
            'animal_needs' => 'Frugivorous animals rely on a diet of fruits, which offer essential vitamins, minerals, and energy necessary for their health and well-being.',
        ],
        [
            'food_name' => 'Nectar',
            'animal_needs' => 'Nectarivorous animals depend on a diet of nectar, which provides them with essential sugars and energy necessary for their survival and growth.',
        ],
        [
            'food_name' => 'Seeds',
            'animal_needs' => 'Granivorous animals require a diet primarily composed of seeds, which provide them with essential nutrients, including proteins and fats, necessary for their survival and growth.',
        ],
        [
            'food_name' => 'Leaves',
            'animal_needs' => 'Folivorous animals rely on a diet of leaves, which offer essential nutrients, including fiber and vitamins, necessary for their health and well-being.',
        ],
        [
            'food_name' => 'Small Vertebrates',
            'animal_needs' => 'Carnivorous animals that consume small vertebrates require a diet that provides them with essential nutrients and energy necessary for their survival and growth.',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->defaultNeeds as $need) {
            \App\Models\Need::firstOrCreate($need);
        }
    }
}
