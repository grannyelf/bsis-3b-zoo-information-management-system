<?php

namespace App\Livewire\Pages\Public;

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $species_id;
    public $age;
    public $weight;
    public $height;
    public $habitat_id;
    public $category_id;
    public $need = [];
    public $selectedNeeds = [];
    public $description;
    public $image;

    #[Computed()]
    public function animal()
    {
        return Animal::query()
            ->select('id', 'name','age','weight','height','species_id','habitat_id','image','description')
            ->with('species:id,species_name')
            ->with('habitat:id,habitat_name')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.public.index');
    }
}
