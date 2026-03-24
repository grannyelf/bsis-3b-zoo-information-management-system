<?php

use App\Livewire\Pages\Admin\Animal\CreateAnimal;
use App\Livewire\Pages\Admin\Animal\EditAnimal;
use App\Livewire\Pages\Admin\Animal\IndexAnimal;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\Role\CreateRole;
use App\Livewire\Pages\Admin\Role\EdithRole;
use App\Livewire\Pages\Admin\Role\ViewRole;
use App\Livewire\Pages\Public\Index;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;


Route::get('/', Index::class)->name('home');


Route::prefix('admin')
->group(function()

{
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    Route::get('/roles',ViewRole::class)->name('admin.role.view');
    Route::get('/roles/create',CreateRole::class)->name('admin..role.create');
    Route::get('/roles/create/{role}',EdithRole::class)->name('admin..role.create');

    Route::get('/animals', IndexAnimal::class)->name('admin.animal.view');
    Route::get('/animals/create', CreateAnimal::class)->name('admin.animal.create');
    Route::get('/animals/{animal}', EditAnimal::class)->name('admin.animal.view');

});
