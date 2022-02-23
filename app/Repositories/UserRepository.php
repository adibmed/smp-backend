<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{


    /**
     * Create a user
     *
     * @param array $userDetails
     * @return User
     */
    public function createUser(array $userDetails): User
    {
        return User::create($userDetails);
    }

    /**
     * Update user details
     *
     * @param array $newDetails
     * @return User
     */
    public function updateUser(array $newDetails): User
    {
        return User::update($newDetails);
    }

    /**
     * Remove a user
     *
     * @param $userId
     */
    public function deleteUser($userId)
    {
        User::destroy($userId);
    }
}
