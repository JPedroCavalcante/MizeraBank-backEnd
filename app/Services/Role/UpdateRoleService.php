<?php

namespace App\Services\Role;

class UpdateRoleService
{
    public function run($data, $role)
    {
        $role->update($data);
        return $role;
    }
}
