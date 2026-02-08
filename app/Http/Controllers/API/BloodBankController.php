<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BloodBank\UpdateBloodBankRequest;
use App\Http\Requests\BloodBank\CreateBloodBankRequest;
use App\Http\Resources\BloodBank\BloodBankResource;
use App\Models\BloodBank;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BloodBankController extends Controller
{
    public function __construct()
    {

    }

    public function index(): JsonResponse
    {
        $bloodBanks = BloodBank::useFilters()->get();

        return $this->responseSuccess("Blood banks retrieved successfully", BloodBankResource::collection($bloodBanks));
    }

    public function store(CreateBloodBankRequest $request): JsonResponse
    {
        $bloodBank = BloodBank::create($request->validated());

        return $this->responseCreated('BloodBank created successfully', new BloodBankResource($bloodBank));
    }

    public function show(BloodBank $bloodBank): JsonResponse
    {
        return $this->responseSuccess(null, new BloodBankResource($bloodBank));
    }

    public function update(UpdateBloodBankRequest $request, BloodBank $bloodBank): JsonResponse
    {
        $bloodBank->update($request->validated());

        return $this->responseSuccess('BloodBank updated Successfully', new BloodBankResource($bloodBank));
    }

    public function destroy(BloodBank $bloodBank): JsonResponse
    {
        $bloodBank->delete();

        return $this->responseDeleted();
    }


}
