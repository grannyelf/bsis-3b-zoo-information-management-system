<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
     protected array $defualtPermissions = [
        'can-create ',
        'can-view ',
        'can-update ',
        'can-delete',
        'can-view-any ',

    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->defualtPermissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }
    }

}
