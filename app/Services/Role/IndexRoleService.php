<?php

namespace App\Services\Role;

use App\Models\Role;

class IndexRoleService
{
    private Role $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function run()
    {
        return $this->role->all();
    }
}
