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
use Illuminate\Http\Request;

class HolderController extends Controller
{
    public function index(IndexHolderService $indexHolderService, Request $request)
    {
        $holders = $indexHolderService->run($request);
        return HolderResource::collection($holders);
    }


    public function store(
        StoreHolderRequest $storeHolderRequest,
        StoreHolderService $storeHolderService,
        Holder             $holder
    )
    {
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
        $data = $updateHolderRequest->validated();
        $holder = $updateHolderService->run($data, $holder);
        return response(new HolderResource($holder));
    }

    public function destroy(DeleteHolderService $deleteHolderService, $id)
    {
        $deleteHolderService->run($id);
        return response()->json([], 204);
    }
}
