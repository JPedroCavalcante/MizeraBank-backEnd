<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\SetPermissionsForRoleRequest;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Services\Permission\CheckPermissionService;
use App\Services\Role\DeleteRoleService;
use App\Services\Role\IndexRoleService;
use App\Services\Role\SetPermissionForRoleService;
use App\Services\Role\StoreRoleService;
use App\Services\Role\UpdateRoleService;
use App\Services\User\UpdateUserService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private CheckPermissionService $checkPermissionService;

    public function __construct(CheckPermissionService $checkPermissionService)
    {
        $this->checkPermissionService = $checkPermissionService;
    }

    public function index(IndexRoleService $indexRoleService)
    {
        $this->checkPermissionService->run('index-roles');
        $roles = $indexRoleService->run();
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleService $storeRoleService, StoreRoleRequest $storeRoleRequest)
    {
        $this->checkPermissionService->run('store-role');
        $data = $storeRoleRequest->validated();
        $role = $storeRoleService->run($data);
        return response(new RoleResource($role));
    }

    public function update(
        UpdateRoleRequest $updateRoleRequest,
        UpdateRoleService $updateRoleService,
        Role              $role,
    )
    {
        $this->checkPermissionService->run('update-role');
        $data = $updateRoleRequest->validated();
        $role = $updateRoleService->run($data, $role);
        return response(new RoleResource($role));
    }

    public function destroy($id, DeleteRoleService $deleteRoleService)
    {
        $this->checkPermissionService->run('delete-role');
        $deleteRoleService->run($id);
        return response()->json([], 204);
    }

    public function setPermissionsForRole(
        SetPermissionForRoleService  $setPermissionForRoleService,
        SetPermissionsForRoleRequest $setPermissionsForRoleRequest,
        Role                         $role,
    )
    {
        $this->checkPermissionService->run('set-permissions-for-role');
        $data = $setPermissionsForRoleRequest->validated();
        $role = $setPermissionForRoleService->run($data, $role);
        return response(new RoleResource($role));
    }
}
