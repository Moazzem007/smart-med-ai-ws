<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Featured_medicine\UpdateFeatured_medicineRequest;
use App\Http\Requests\Featured_medicine\CreateFeatured_medicineRequest;
use App\Http\Resources\Featured_medicine\Featured_medicineResource;
use App\Http\Resources\Medicine\MedicineResource;
use App\Models\Featured_medicine;
use App\Models\Medicine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class Featured_medicineController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $featured_medicines = Featured_medicine::useFilters()->dynamicPaginate();

        return Featured_medicineResource::collection($featured_medicines);
    }

    public function store(CreateFeatured_medicineRequest $request): JsonResponse
    {
        $medicine_id = $request->input('medicine_id');

        if (Featured_medicine::where('medicine_id', $medicine_id)->exists()) {
            return $this->responseSuccess('Medicine already featured', []);
        }

        $featured_medicine = Featured_medicine::create($request->validated());

        return $this->responseCreated('Featured_medicine created successfully', new Featured_medicineResource($featured_medicine));
    }

    public function show(Featured_medicine $featured_medicine): JsonResponse
    {
        return $this->responseSuccess(null, new Featured_medicineResource($featured_medicine));
    }

    public function update(UpdateFeatured_medicineRequest $request, Featured_medicine $featured_medicine): JsonResponse
    {
        $featured_medicine->update($request->validated());

        return $this->responseSuccess('Featured_medicine updated Successfully', new Featured_medicineResource($featured_medicine));
    }

    public function destroy($medicine_id): JsonResponse
    {
        $featured_medicine = Featured_medicine::where('medicine_id', $medicine_id)->first();
        $featured_medicine->delete();

        return $this->responseDeleted();
    }

    public function featuredMedicineList()
    {
        $featured_medicines = Featured_medicine::pluck('medicine_id');
        $medicines = Medicine::whereIn('id', $featured_medicines)->get();
        return $this->responseSuccess(null, MedicineResource::collection($medicines));
    }


}
