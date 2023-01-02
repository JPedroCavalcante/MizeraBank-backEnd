<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Holder\StoreHolderRequest;
use App\Http\Requests\Holder\UpdateHolderRequest;
use App\Http\Resources\HolderResource;
use App\Models\Holder;
use App\Services\Holder\DeleteHolderService;
use App\Services\Holder\IndexHolderService;
use App\Services\Holder\StoreHolderService;
use App\Services\Holder\UpdateHolderService;
use App\Services\Permission\CheckPermissionService;
use Illuminate\Http\Request;

class HolderController extends Controller
{
    private CheckPermissionService $checkPermissionService;

    public function __construct(CheckPermissionService $checkPermissionService)
    {
        $this->checkPermissionService = $checkPermissionService;
    }

    public function index(IndexHolderService $indexHolderService, Request $request)
    {
        $this->checkPermissionService->run('index-holders');
        $holders = $indexHolderService->run($request);
        return HolderResource::collection($holders);
    }


    public function store(
        StoreHolderRequest $storeHolderRequest,
        StoreHolderService $storeHolderService
    )
    {
        $this->checkPermissionService->run('store-holder');
        $data = $storeHolderRequest->validated();
        $holder = $storeHolderService->run($data);

        return response(new HolderResource($holder));
    }

    public function update(
        UpdateHolderRequest $updateHolderRequest,
        UpdateHolderService $updateHolderService,
        Holder              $holder
    )
    {
        $this->checkPermissionService->run('update-holder');
        $data = $updateHolderRequest->validated();
        $holder = $updateHolderService->run($data, $holder);
        return response(new HolderResource($holder));
    }

    public function destroy(DeleteHolderService $deleteHolderService, $id)
    {
        $this->checkPermissionService->run('delete-holder');
        $deleteHolderService->run($id);
        return response()->json([], 204);
    }
}
