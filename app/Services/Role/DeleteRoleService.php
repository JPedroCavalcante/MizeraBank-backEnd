<?php

namespace App\Services\Role;

use App\Models\Role;

class DeleteRoleService
{
    private Role $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function run($id)
    {
        $role = $this->role->where('id', $id)->firstOrfail();

        return $role->delete();
    }
}
