<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DashboardAdmin extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.dashboard-admin');
    }
}
