<?php

namespace App\Services\Permission;

use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Gate;

class CheckPermissionService
{
    public function run($ability)
    {
        $roleHasPermission = Gate::inspect($ability);
        if ($roleHasPermission->denied()) {
            throw new UnauthorizedException();
        }
    }
}
