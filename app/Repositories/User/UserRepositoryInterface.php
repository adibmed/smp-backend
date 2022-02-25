<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Create a user
     *
     * @param array $userDetails
     * @return User
     */
    public function createUser(array $userDetails): User;

    /**
     * Update user details
     *
     * @param array $newDetails
     * @return User
     */
    public function updateUser(array $newDetails): User;

    /**
     * Remove a user
     *
     * @param $userId
     */
    public function deleteUser($userId);
}
