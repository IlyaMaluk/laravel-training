<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function createUser(array $userData): User
    {
        return User::query()->create($userData);
    }

    public function findByEmail(string $email): ?User
    {
        return User::query()->where('email', $email)->first();
    }
}
