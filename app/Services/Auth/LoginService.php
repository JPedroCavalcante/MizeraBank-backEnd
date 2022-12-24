<?php

namespace App\Services\Auth;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function run($data)
    {
        if (!Auth::attempt($data)) {
            return Response::denyAsNotFound('Credenciais incorretas!!', 401);
        }

        $user = auth()->user();
        $user->tokens()->delete();
        return $user->createToken('API Token')->plainTextToken;
    }
}
