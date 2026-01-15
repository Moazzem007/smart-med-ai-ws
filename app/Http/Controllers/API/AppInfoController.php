<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppInfo\UpdateAppInfoRequest;
use App\Http\Requests\AppInfo\CreateAppInfoRequest;
use App\Http\Resources\AppInfo\AppInfoResource;
use App\Models\AppInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AppInfoController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $appInfos = AppInfo::useFilters()->dynamicPaginate();

        return AppInfoResource::collection($appInfos);
    }

    public function store(CreateAppInfoRequest $request): JsonResponse
    {
        $appInfo = AppInfo::create($request->validated());

        return $this->responseCreated('AppInfo created successfully', new AppInfoResource($appInfo));
    }

    public function show(AppInfo $appInfo): JsonResponse
    {
        return $this->responseSuccess(null, new AppInfoResource($appInfo));
    }

    public function update(UpdateAppInfoRequest $request, AppInfo $appInfo): JsonResponse
    {
        $appInfo->update($request->validated());

        return $this->responseSuccess('AppInfo updated Successfully', new AppInfoResource($appInfo));
    }

    public function destroy(AppInfo $appInfo): JsonResponse
    {
        $appInfo->delete();

        return $this->responseDeleted();
    }


}
