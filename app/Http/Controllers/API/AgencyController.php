<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agency\StoreAgencyRequest;
use App\Http\Requests\Agency\UpdateAgencyRequest;
use App\Http\Resources\AgencyResource;
use App\Models\Agency;
use App\Services\Agency\DeleteAgencyService;
use App\Services\Agency\IndexAgencyService;
use App\Services\Agency\StoreAgencyService;
use App\Services\Agency\UpdateAgencyService;
use App\Services\Permission\CheckPermissionService;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    private CheckPermissionService $checkPermissionService;

    public function __construct(CheckPermissionService $checkPermissionService)
    {
        $this->checkPermissionService = $checkPermissionService;
    }

    public function index(IndexAgencyService $indexAgencyService, Request $request)
    {
        $this->checkPermissionService->run('index-agencies');
        $agencies = $indexAgencyService->run($request);
        return AgencyResource::collection($agencies);
    }

    public function store(
        StoreAgencyRequest $storeAgencyRequest,
        StoreAgencyService $storeAgencyService
    )
    {
        $this->checkPermissionService->run('store-agency');
        $data = $storeAgencyRequest->validated();
        $agency = $storeAgencyService->run($data);
        return response(new AgencyResource($agency));
    }

    public function update(
        UpdateAgencyRequest $updateAgencyRequest,
        UpdateAgencyService $updateAgencyService,
        Agency              $agency,
    )
    {
        $this->checkPermissionService->run('update-agency');
        $data = $updateAgencyRequest->validated();
        $agency = $updateAgencyService->run($data, $agency);
        return response(new AgencyResource($agency));
    }

    public function destroy(DeleteAgencyService $deleteAgencyService ,$id)
    {
        $this->checkPermissionService->run('delete-agency');
        $deleteAgencyService->run($id);
        return response()->json([], 204);
    }
}
