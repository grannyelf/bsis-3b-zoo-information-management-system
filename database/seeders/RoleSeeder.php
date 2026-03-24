<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $zookeeper = Role::firstOrCreate(['name' => 'zookeeper']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // get all permissions
        $permissions = Permission::all();

        // admin gets everything
        $admin->syncPermissions($permissions);

        // limited permissions
        $zookeeper->syncPermissions([
            'can-update',
            'can-view',
        ]);

        $user->syncPermissions([
            'can-view',
        ]);
    }
}
