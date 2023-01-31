<?php

namespace App\Services\Auth;

use App\Exceptions\InvalidCredentialsException;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginService
{

    public function run($data)
    {
        if (!Auth::attempt($data)) {
            throw new InvalidCredentialsException();
        }

        $user = auth()->user();
        $user->tokens()->delete();
        $user->token = $user->createToken('API Token')->plainTextToken;
        return $user;
    }
}
