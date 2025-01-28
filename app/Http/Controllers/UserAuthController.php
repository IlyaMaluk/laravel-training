<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use App\Services\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserAuthController extends Controller
{
    public function __construct(
        private UserRepository $userRepository,
        private LoginService   $loginService,
    )
    {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->userRepository->createUser($data);

        return response()->json([
            'message' => 'User Created ',
        ]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $token = $this->loginService->login($data['email'], $data['password']);

        if (!$token) {
            return response()->json(['message' => 'Invalid Credentials'], ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'token' => $token
        ]);
    }
}
