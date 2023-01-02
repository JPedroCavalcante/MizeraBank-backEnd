<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteUserService;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Permission\CheckPermissionService;
use App\Services\User\IndexUserService;
use App\Services\User\StoreUserService;
use App\Services\User\UpdateUserService;
use Illuminate\Http\Client\Request;

class UserController extends Controller
{
    private CheckPermissionService $checkPermissionService;

    public function __construct(CheckPermissionService $checkPermissionService)
    {
        $this->checkPermissionService = $checkPermissionService;
    }

    public function index(Request $request, IndexUserService $indexUserService)
    {
        $this->checkPermissionService->run('index-users');
        $users = $indexUserService->run($request);
        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $storeUserRequest, StoreUserService $storeUserService)
    {
        $this->checkPermissionService->run('store-user');
        $data = $storeUserRequest->validated();
        $user = $storeUserService->run($data);
        return UserResource::collection($user);
    }

    public function update(UpdateUserRequest $updateUserRequest, UpdateUserService $updateUserService, User $user)
    {
        $this->checkPermissionService->run('update-user');
        $data = $updateUserRequest->validated();
        $user = $updateUserService->run($data, $user);
        return UserResource::collection($user);
    }

    public function destroy($id, DeleteUserService $deleteUserService)
    {
        $this->checkPermissionService->run('delete-user');
        $deleteUserService->run($id);
        return response()->json([], 204);
    }
}
