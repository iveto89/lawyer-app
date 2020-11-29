<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Collection;

class UserService
{
    /** @var UserRepository */
    protected UserRepository $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $role
     * @return Collection
     */
    public function getUsersByRoleDropdown(string $role): Collection
    {
        return $this->userRepository->getUsersByRoleDropdown($role);
    }
}
