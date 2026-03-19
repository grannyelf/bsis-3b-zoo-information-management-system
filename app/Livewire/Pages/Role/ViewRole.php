<?php

namespace App\Livewire\Pages\Role;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ViewRole extends Component
{
    
    public $permissions = [];

    public $role;

    #[Computed()]
    // this will return rules with permissions in eagerlaoding 
    public function roles()
    {
        return Role::with('permissions')->select('id', 'name', 'created_at')->get();
    }
    public function render()
    {
        
        return view('livewire.pages.role.view-role');
    }
}
