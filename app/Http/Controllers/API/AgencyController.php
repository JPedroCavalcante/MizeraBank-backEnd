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
use Illuminate\Http\Request;

class AgencyController extends Controller
{

    public function index(IndexAgencyService $indexAgencyService, Request $request)
    {
        $Agencies = $indexAgencyService->run($request);
        return AgencyResource::collection($Agencies);
    }

    public function store(
        StoreAgencyRequest $storeAgencyRequest,
        StoreAgencyService $storeAgencyService
    )
    {
        $data = $storeAgencyRequest->validated();
        $agency = $storeAgencyService->run($data);
        return AgencyResource::collection($agency);
    }

    public function update(
        UpdateAgencyRequest $updateAgencyRequest,
        UpdateAgencyService $updateAgencyService,
        Agency              $agency,
    )
    {
        $data = $updateAgencyRequest->validated();
        $agency = $updateAgencyService->run($data, $agency);
        return AgencyResource::collection($agency);
    }

    public function destroy(DeleteAgencyService $deleteAgencyService ,$id)
    {
        $deleteAgencyService->run($id);
        return response()->json([], 204);
    }
}
