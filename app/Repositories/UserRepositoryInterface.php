<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function createUser(array $userDetails);

    public function updateUser(array $newDetails);

    public function deleteUser($userId);
}
