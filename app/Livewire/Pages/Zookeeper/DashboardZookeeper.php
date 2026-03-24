<?php

namespace App\Livewire\Pages\Zookeeper;

use App\Models\Animal;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DashboardZookeeper extends Component
{
    public $animal;
    public function animals()
    {
        return Animal::query()
            ->select('id', 'name', 'species_id', 'age', 'weight', 'height', 'habitat_id', 'category_id', 'description')
            ->with('species:id,species_name,species_desc', 'habitat:id,hab_name,hab_desc,hab_temp', 'category:id,cat_name,cat_desc', 'needs:id,food_name,animal_needs')
            ->orderBy('name', 'asc')
            ->get();
    }
    #[Layout('components.layouts.zookeeper')]
    public function render()
    {
        return view('livewire.pages.zookeeper.dashboard-zookeeper');
    }
}
