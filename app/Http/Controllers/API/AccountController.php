<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use App\Services\Account\DeleteAccountService;
use App\Services\Account\IndexAccountService;
use App\Services\Account\StoreAccountService;
use App\Services\Account\UpdateAccountService;
use App\Services\Permission\CheckPermissionService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private CheckPermissionService $checkPermissionService;

    public function __construct(CheckPermissionService $checkPermissionService)
    {
        $this->checkPermissionService = $checkPermissionService;
    }

    public function index(IndexAccountService $indexAccountService, Request $request)
    {
        $this->checkPermissionService->run('index-accounts');
        $Accounts = $indexAccountService->run($request);
        return AccountResource::collection($Accounts);
    }

    public function store(
        StoreAccountRequest $storeAccountRequest,
        StoreAccountService $storeAccountService,
    )
    {
        $this->checkPermissionService->run('store-account');
        $data = $storeAccountRequest->validated();
        $account = $storeAccountService->run($data);
        return response(new AccountResource($account));
    }

    public function update(
        UpdateAccountRequest $updateAccountRequest,
        UpdateAccountService $updateAccountService,
        Account              $account
    )
    {
        $this->checkPermissionService->run('update-account');
        $data = $updateAccountRequest->validated();
        $account = $updateAccountService->run($data, $account);
        return response(new AccountResource($account));
    }

    public function destroy(DeleteAccountService $deleteAccountService, $id)
    {
        $this->checkPermissionService->run('delete-account');
        $deleteAccountService->run($id);
        return response()->json([], 204);
    }
}
