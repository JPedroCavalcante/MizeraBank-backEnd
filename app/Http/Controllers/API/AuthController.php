<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\IndexService;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegisterService;

class AuthController extends Controller
{

    public function index(IndexService $indexService)
    {
        $index = $indexService->run();
        return response(new UserResource($index));
    }

    public function register(RegisterRequest $registerRequest, RegisterService $registerService)
    {
        $data = $registerRequest->validated();
        $user = $registerService->run($data);
        return response($user);
    }

    public function login(LoginRequest $loginRequest, LoginService $loginService)
    {
        $data = $loginRequest->validated();
        $login = $loginService->run($data);
        return response($login);

    }

    public function logout(LogoutService $logoutService)
    {
        $user = $logoutService->run();
        return $user;
    }
}
