<?php

use App\Livewire\Pages\Admin\Animal\CreateAnimal;
use App\Livewire\Pages\Admin\Animal\EditAnimal;
use App\Livewire\Pages\Admin\Animal\IndexAnimal;
use App\Livewire\Pages\Admin\DashboardAdmin;
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
use App\Livewire\Pages\Public\About;
use App\Livewire\Pages\Public\AnimalSingle;
use App\Livewire\Pages\Public\Blog;
use App\Livewire\Pages\Public\BlogSingle;
use App\Livewire\Pages\Public\Index;
use App\Livewire\Pages\Zookeeper\Animal\Index as zookeeperanimal;
use App\Livewire\Pages\Zookeeper\Animal\ZookeeperEditAnimal;
use App\Livewire\Pages\Zookeeper\DashboardZookeeper;
use App\Livewire\Pages\Zookeeper\Post\ZookeeperCreatePost;
use App\Livewire\Pages\Zookeeper\Post\ZookeeperEditPost;
use App\Livewire\Pages\Zookeeper\Post\ZookeeperIndexPost;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', Index::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/animals/{id}', AnimalSingle::class)->name('animal.single');
Route::get('/blog', Blog::class)->name('blog');
Route::get('blog/{id}', BlogSingle::class)->name('blog.single');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login.page');
    Route::get('/register', Register::class)->name('register.page');
});

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout')->middleware('auth');


Route::prefix('admin')
->middleware(['auth', 'role:admin'])
->group(function()
{
    Route::get('/dashboard', DashboardAdmin::class)->name('admin.dashboard');

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

Route::prefix('zookeeper')
->middleware(['auth', 'role:zookeeper'])
->group(function()
{
    Route::get('/dashboard',DashboardZookeeper::class)->name('zookeeper.dashboard');

    Route::get('/animal',zookeeperanimal::class)->name('zookeeper.animal');
    Route::get('/animal/edit/{id}',ZookeeperEditAnimal::class)->name('zookeeper.animal.edit');

    Route::get('/post',ZookeeperIndexPost::class)->name('zookeeper.post');
    Route::get('/post/create',ZookeeperCreatePost::class)->name('zookeeper.post.create');
    Route::get('/post/{id}',ZookeeperEditPost::class)->name('zookeeper.post.edit');
    

});
