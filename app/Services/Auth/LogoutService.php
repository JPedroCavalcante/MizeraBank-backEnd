<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

class LogoutService
{

    public function run()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return response('Sessão encerrada!', 200);
    }
}
