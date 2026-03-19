<?php

use App\Livewire\Pages\Role\CreateRole;
use App\Livewire\Pages\Role\EdithRole;
use App\Livewire\Pages\Role\ViewRole;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function()
{
    Route::get('/roles',ViewRole::class)->name('admin.role.view');
    Route::get('/roles/create',CreateRole::class)->name('admin..role.create');
    Route::get('/roles/create/{role}',EdithRole::class)->name('admin..role.create');

});
