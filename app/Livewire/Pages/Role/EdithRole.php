<?php

namespace App\Livewire\Pages\Role;

use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EdithRole extends Component
{
    public $name;

    public Role $role;

    public $permissions = [];

    public $selectedPermissions = [];

    // load permissions in mount
    // add a role $role id for redirect in selected role and edith it
    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
        // load only id and name to minimize payload
        $this->permissions = Permission::select('id', 'name')->get();
    }

    // validation of data for role
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|unique:roles,name,'.$this->role->id, // this will allow h role name to accept even it exist for the unique validation
            'selectedPermissions' => 'required|array|min:1',
            'selectedPermissions.*' => 'exists:permissions,name',
        ];
    }

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
        $this->role->update([
            'name' => $roleName,
        ]);

        // 2. sync permissions
        $this->role->syncPermissions($this->selectedPermissions);

        session()->flash('success', 'Role created successfully.');

        $this->reset([
            'name', 'selectedPermissions',
        ]);
    }
    public function render()
    {
       
        return view('livewire.pages.role.edith-role');
    }
}
