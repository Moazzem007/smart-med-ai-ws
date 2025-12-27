<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicine\UpdateMedicineRequest;
use App\Http\Requests\Medicine\CreateMedicineRequest;
use App\Http\Resources\Medicine\MedicineResource;
use App\Models\Medicine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MedicineController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $medicines = Medicine::useFilters()->dynamicPaginate();

        return MedicineResource::collection($medicines);
    }

    public function store(CreateMedicineRequest $request): JsonResponse
    {
        $medicine = Medicine::create($request->validated());

        return $this->responseCreated('Medicine created successfully', new MedicineResource($medicine));
    }

    public function show(Medicine $medicine): JsonResponse
    {
        return $this->responseSuccess(null, new MedicineResource($medicine));
    }

    public function update(UpdateMedicineRequest $request, Medicine $medicine): JsonResponse
    {
        $medicine->update($request->validated());

        return $this->responseSuccess('Medicine updated Successfully', new MedicineResource($medicine));
    }

    public function destroy(Medicine $medicine): JsonResponse
    {
        $medicine->delete();

        return $this->responseDeleted();
    }


    public function importMedicines()
    {
        $path = storage_path('app/imports/medicine.csv');

        if (!file_exists($path)) {
            return "CSV file not found.";
        }

        if (($handle = fopen($path, 'r')) !== false) {

            // Read header
            $header = fgetcsv($handle);

            while (($row = fgetcsv($handle)) !== false) {

                // Map CSV to DB columns
                $id = Medicine::max('id') + 1;
                $data = [
                    // 'id' => $id,
                    'brand_name'       => $row[1] ?? null,
                    'generic_name'    => $row[5] ?? null,
                    'manufacturer'   => $row[7] ?? null,
                    'strength'    => $row[6] ?? null,
                    'pack_size'      => trim(preg_replace('/[0-9]+\\.?[0-9]*/', '', $row[9] ?? '')),
                    'categories'      => json_encode([$row[2] ?? null]),
                    'base_price'      => preg_match('/[0-9]+\.?[0-9]*/', $row[9] ?? '', $matches) ? (float)$matches[0] : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                Medicine::insert($data);
            }

            fclose($handle);
        }

        return "Imported successfully!";
    }



}
