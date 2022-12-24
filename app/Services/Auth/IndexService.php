<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

class IndexService
{
    public function run()
    {
        return auth::user();
    }
}
