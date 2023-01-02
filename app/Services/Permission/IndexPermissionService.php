<?php

namespace App\Services\Permission;

use App\Models\Permission;

class IndexPermissionService
{
    private Permission $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function run()
    {
        $this->permission->all();
    }
}
