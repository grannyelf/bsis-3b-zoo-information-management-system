<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
    
         Role::firstOrCreate(['name' => 'admin']);

        // Create admin user
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        // Assign role
        $user->assignRole('admin');


        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
        $this->call([
            CategorySeeder::class,
        ]);
        $this->call([
            SpeciesSeeder::class,
        ]);
        $this->call([
            HabitatSeeder::class,
        ]);
        $this->call([
            NeedSeeder::class,
        ]);
    }
     
}
