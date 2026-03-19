<?php

namespace App\Livewire\Pages\Role;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $name;

    public $permissions = [];

    public $selectedPermissions = [];

    // load permissions in mount
    public function mount()     
    {
        // load only id and name to minimize payload
        $this->permissions = Permission::select('id', 'name')->get();
    }

    // validation of data from the user input/from model binding
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|unique:roles,name',

            'selectedPermissions' => 'required|array|min:1',
            
            'selectedPermissions.*' => 'exists:permissions,name',
        ];
    }
    // validation messages
    public function messages()
    {
        return [
            'name.required' => 'The role name is required.',
            'name.unique' => 'The role name must be unique/already taken.',
            'selectedPermissions.required' => 'Please select at least one permission.',
            'selectedPermissions.*.exists' => 'One or more selected permissions are invalid.',
        ];
    }

    // save method with validation, sanitization adn saving data to table
    public function save()
    {
        $this->validate();

        // sanitize
        $roleName = Str::of($this->name)->trim()->title()->lower();

        // 1. create role
        // error is the name is wrong it right in nyme instead of name
        // and the role is not importetd
        $role = Role::create([
            'name' => $roleName,
        ]);

        // 2. sync permissions 
        $role->syncPermissions($this->selectedPermissions);

        session()->flash('success', 'Role created successfully.');

        $this->reset([
            'name', 'selectedPermissions',
        ]);
    }


    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.role.create-role');
    }
}
