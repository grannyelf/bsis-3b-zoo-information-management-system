<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    protected $defaultSpecies = [
        [
            'species_name' => 'Lion',
            'species_desc' => 'The lion is a large carnivorous feline that is native to Africa and parts of Asia. It is known for its majestic appearance, with a muscular body, a mane of hair around its neck, and a powerful roar. Lions are social animals that live in groups called prides, which consist of related females, their offspring, and a few males. They are known for their strength, speed, and agility, and are often considered the king of the jungle.',
        ],
        [
            'species_name' => 'Elephant',
            'species_desc' => 'The elephant is the largest land animal on Earth, known for its distinctive trunk, large ears, and tusks. Elephants are highly intelligent and social animals that live in herds led by a matriarch. They are herbivores and can consume a wide variety of vegetation, including grasses, leaves, fruits, and bark. Elephants play a crucial role in their ecosystems by shaping the landscape and dispersing seeds. They are also known for their strong family bonds and complex communication.',
        ],
        [
            'species_name' => 'Penguin',
            'species_desc' => 'The penguin is a flightless bird that is native to the Southern Hemisphere. Penguins are excellent swimmers and are known for their distinctive black and white plumage. They live in colonies and are highly social animals. Penguins feed primarily on fish, krill, and squid, which they catch while diving underwater.',
        ],
        [
            'species_name' => 'Whale',
            'species_desc' => 'The whale is a large marine mammal that is native to the world\'s oceans. Whales are known for their massive size, intelligence, and complex social behaviors. They are divided into two main groups: baleen whales, which filter-feed on krill and small fish, and toothed whales, which hunt larger prey like squid and fish.',
        ],
        [
            'species_name' => 'Monkey',
            'species_desc' => 'The monkey is a primate that is native to various regions around the world. Monkeys are highly intelligent and social animals that live in groups called troops. They are known for their agility, playfulness, and ability to use tools. Monkeys feed on a variety of foods, including fruits, leaves, insects, and small animals.',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->defaultSpecies as $species) {
            \App\Models\Species::firstOrCreate($species);
        }
    }
}
