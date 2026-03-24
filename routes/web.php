<?php

use App\Livewire\Pages\Admin\Animal\CreateAnimal;
use App\Livewire\Pages\Admin\Animal\EditAnimal;
use App\Livewire\Pages\Admin\Animal\IndexAnimal;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\Post\CreatePost;
use App\Livewire\Pages\Admin\Post\EditPost;
use App\Livewire\Pages\Admin\Post\IndexPost;
use App\Livewire\Pages\Admin\Role\CreateRole;
use App\Livewire\Pages\Admin\Role\EdithRole;
use App\Livewire\Pages\Admin\Role\ViewRole;
use App\Livewire\Pages\Admin\User\CreateUser;
use App\Livewire\Pages\Admin\User\EditUser;
use App\Livewire\Pages\Admin\User\IndexUser;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use App\Livewire\Pages\Public\Index;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;


Route::get('/', Index::class)->name('home');
Route::get('/login', Login::class)->name('login.page');
Route::get('/register', Register::class)->name('register.page');


Route::prefix('zookeeper')
->middleware('role:zookeeper')
->group(function(){
    Route::get('/animals', IndexAnimal::class)->name('admin.animal.view');
    Route::get('/animals/{id}', EditAnimal::class)->name('admin.animal.edit');

    Route::get('/posts', IndexPost::class)->name('admin.post.index');
    Route::get('/posts/{id}', EditPost::class)->name('admin.post.edit');

    Route::get('/users', IndexUser::class)->name('admin.user.index');
    Route::get('/users/{id}', EditUser::class)->name('admin.user.edit');

});


Route::prefix('admin')
->middleware('role:admin')
->group(function()
{
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    Route::get('/roles',ViewRole::class)->name('admin.role.view');
    Route::get('/roles/create',CreateRole::class)->name('admin.role.create');
    Route::get('/roles/create/{id}',EdithRole::class)->name('admin.role.edit');

    Route::get('/animals', IndexAnimal::class)->name('admin.animal.view');
    Route::get('/animals/create', CreateAnimal::class)->name('admin.animal.create');
    Route::get('/animals/{id}', EditAnimal::class)->name('admin.animal.edit');

    Route::get('/posts', IndexPost::class)->name('admin.post.index');
    Route::get('/posts/create', CreatePost::class)->name('admin.post.create');
    Route::get('/posts/{id}', EditPost::class)->name('admin.post.edit');

    Route::get('/users', IndexUser::class)->name('admin.user.index');
    Route::get('/users/create', CreateUser::class)->name('admin.user.create');
    Route::get('/users/{id}', EditUser::class)->name('admin.user.edit');

});