<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function login(string $email, string $password): ?string
    {
        $user = $this->userRepository->findByEmail($email);

        if(!$user || !Hash::check($password,$user->password)){
            return null;
        }
        return $user->createToken($user->name.'-AuthToken')->plainTextToken;
    }
}
