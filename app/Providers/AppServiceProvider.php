<?php

namespace App\Providers;

use App\Models\Animal;
use App\Models\Post;
use App\Models\User as UserModel;
use App\Policies\AnimalPolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Animal::class, AnimalPolicy::class);
        Gate::policy(Post::class, PostPolicy::class);
        Gate::policy(UserModel::class, UserPolicy::class);
        Gate::policy(\Spatie\Permission\Models\Role::class, RolePolicy::class);

        Gate::define('can_create', function (UserModel $user) {
            return $user->hasRole('admin') || $user->hasRole('zookeeper');
        });

        Gate::define('can_update', function (UserModel $user) {
            return $user->hasRole('admin') || $user->hasRole('zookeeper');
        });

        Gate::define('can_delete', function (UserModel $user) {
            return $user->hasRole('admin');
        });

        Gate::define('can_view_any', function (UserModel $user) {
            return $user->hasAnyRole(['admin', 'zookeeper']);
        });

        Gate::define('can_view', function (UserModel $user) {
            return $user->hasAnyRole(['admin', 'zookeeper', 'customer']);
        });
    }
}
