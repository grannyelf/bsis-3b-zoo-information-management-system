<?php

namespace App\Livewire\Pages\Public;

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    
    public $animal;

    #[Computed()]
    public function animals()
    {
        return Animal::query()
            ->select('id', 'name','age','weight','height','species_id','habitat_id','image','description')
            ->with([
                'species:id,species_name', 'habitat:id,hab_name'
            ])
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.public.index');
    }
}
