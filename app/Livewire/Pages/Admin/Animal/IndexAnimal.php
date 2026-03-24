<?php

namespace App\Livewire\Pages\Admin\Animal;

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexAnimal extends Component
{
    public $animal;

    #[Computed()]
    public function animals()
    {
        return Animal::query()
            ->select('id', 'name', 'species_id', 'age', 'weight', 'height', 'habitat_id', 'category_id', 'description', 'image')
            ->with('species:id,species_name,species_desc', 'habitat:id,hab_name,hab_desc,hab_temp', 'category:id,cat_name,cat_desc', 'needs:id,food_name,animal_needs')
            ->orderBy('created_at', 'desc')
            ->get();
        // this should show all the animal with the help of eloquent query builder, 
        // we are selecting the name, species_id, age, weight, height, habitat_id, category_id and description fields from the animals table, 
        // and we are returning all the animals in the database, so we can display them in the view.
    }

    public function delete($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        // this will delete the animal from the database
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.animal.index-animal');
    }
}
