<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'uuid'],
			'sku' => ['nullable', 'string'],
			'gtin' => ['nullable', 'string'],
			'brand_name' => ['required', 'string'],
			'generic_name' => ['nullable', 'string'],
			'manufacturer' => ['nullable', 'string'],
			'model_code' => ['nullable', 'string'],
			'strength' => ['nullable', 'string'],
			'form' => ['nullable', 'string'],
			'pack_size' => ['nullable', 'string'],
			'unit' => ['nullable', 'string'],
			'is_prescription' => ['required', 'boolean'],
			'controlled_drug' => ['required', 'boolean'],
			'schedule' => ['nullable', 'string'],
			'storage_temp' => ['nullable', 'string'],
			'expiry_months' => ['nullable', 'integer'],
			'base_price' => ['nullable'],
			'categories' => ['nullable', 'json'],
			'tags' => ['nullable', 'json'],
			'search_vector' => ['nullable', 'string'],
			'attributes' => ['nullable', 'json'],
			'images' => ['nullable', 'image', 'json'],
			'metadata' => ['nullable', 'json'],
			'active' => ['required', 'boolean'],
			'deleted_at' => ['nullable', 'date'],
        ];
    }
}
