<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotional_banner\UpdatePromotional_bannerRequest;
use App\Http\Requests\Promotional_banner\CreatePromotional_bannerRequest;
use App\Http\Resources\Promotional_banner\Promotional_bannerResource;
use App\Models\Promotional_banner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Essa\APIToolKit\MediaHelper;

class PromotionalBannerController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $promotional_banners = Promotional_banner::useFilters()->dynamicPaginate();

        return Promotional_bannerResource::collection($promotional_banners);
    }

    public function store(CreatePromotional_bannerRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        if ($request->image_path && $request->image_path != "null") {
            $filename = time() . '.' . $request->image_path->getClientOriginalExtension();
            $uploadedFilePath = Storage::url(MediaHelper::uploadFile($request->image_path, 'uploads/promotional_banners', $filename, $withOriginalName = false, 'public'));
        }

        $validatedData['link_url'] = $uploadedFilePath;

        $promotional_banner = Promotional_banner::create($validatedData);

        return $this->responseCreated('Promotional_banner created successfully', new Promotional_bannerResource($promotional_banner));
    }

    public function show(Promotional_banner $promotional_banner): JsonResponse
    {
        return $this->responseSuccess(null, new Promotional_bannerResource($promotional_banner));
    }

    public function update(UpdatePromotional_bannerRequest $request, Promotional_banner $promotional_banner): JsonResponse
    {
        $promotional_banner->update($request->validated());

        return $this->responseSuccess('Promotional_banner updated Successfully', new Promotional_bannerResource($promotional_banner));
    }

    public function destroy(Promotional_banner $promotional_banner): JsonResponse
    {
        if ($promotional_banner->link_url) {
            // Remove '/storage/' from the beginning of the path
            $relativePath = str_replace('/storage/', '', $promotional_banner->link_url);

            if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            }
        }

        $promotional_banner->delete();


        return $this->responseDeleted();
    }
}
