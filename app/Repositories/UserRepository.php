<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UserRepository extends AbstractRepository
{
    /**
     * @param string $role
     * @return Builder
     */
    public function getUsersByRoleQuery(string $role): Builder
    {
        return User::whereHas(
            'roles',
            fn ($query) => $query->where('name', $role)
        );
    }

    /**
     * @param string $role
     * @return Collection
     */
    public function getUsersByRoleDropdown(string $role): Collection
    {
       return $this->getUsersByRoleQuery($role)->pluck( 'name', 'id');
    }
}
