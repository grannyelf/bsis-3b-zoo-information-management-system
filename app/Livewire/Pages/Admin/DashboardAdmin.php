<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $animal;


    #[Computed()]
    public function animals()
    {
        return Animal::query()
            ->select('id', 'name','year_age', 'month_age', 'gender', 'weight','height','species_id','habitat_id','image','description')
            ->with([
                'species:id,species_name', 'habitat:id,hab_name'
            ])
            ->get();
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.dashboard-admin');
    }
}
