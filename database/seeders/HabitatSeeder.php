<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HabitatSeeder extends Seeder
{
    protected array $defaultHabitats = [
        [
            'hab_name' => 'Savannah',
            'hab_temp' => '30°C',
            'hab_desc' => 'A grassy plain with few trees, typically found in tropical and subtropical regions.',
        ],
        [
            'hab_name' => 'Rainforest',
            'hab_temp' => '25°C',
            'hab_desc' => 'A dense forest with high rainfall, home to a wide variety of plants and animals.',
        ],
        [
            'hab_name' => 'Desert',
            'hab_temp' => '40°C',
            'hab_desc' => 'A barren area of land where little precipitation occurs and living conditions are harsh.',
        ],
        [
            'hab_name' => 'Aquatic',
            'hab_temp' => '20°C',
            'hab_desc' => 'A habitat that is primarily water-based, such as oceans, lakes, and rivers.',
        ],
        [
            'hab_name' => 'Tundra',
            'hab_temp' => '-10°C',
            'hab_desc' => 'A cold, treeless region found in Arctic and subarctic areas, characterized by permafrost and low-growing vegetation.',
        ],
        [
            'hab_name' => 'Tropical Rainforest',
            'hab_temp' => '30°C',
            'hab_desc' => 'A dense forest with high rainfall, home to a wide variety of plants and animals.',
        ],
        [
            'hab_name' => 'Arctic',
            'hab_temp' => '-10°C',
            'hab_desc' => 'A cold, treeless region found in Arctic and subarctic areas, characterized by permafrost and low-growing vegetation.',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->defaultHabitats as $habitat) {
            \App\Models\Habitat::firstOrCreate($habitat);
        }
    }
}
