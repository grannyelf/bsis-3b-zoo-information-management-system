<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['zookeeper']);
    }

    public function view(User $user, Role $role): bool
    {
        return $user->hasAnyRole(['zookeeper']);
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Role $role): bool
    {
        return false;
    }

    public function delete(User $user, Role $role): bool
    {
        return false;
    }
}
