<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(!auth()->attempt($credentials))
            abort(401, 'Credênciais inválidas');

        $token = $request->user()->createToken($request->token_name);

        return response()
            ->json(
                [
                    'data' => [
                        'token' => $token->plainTextToken
                    ]
                ]
            );
    }
}
