<?php

namespace App\Services\Role;

class SetPermissionForRoleService
{
    public function run($data, $role): object
    {
        $role->permissions()->sync($data['permissions']);
        $role->load('permissions');
        return $role;
    }
}
