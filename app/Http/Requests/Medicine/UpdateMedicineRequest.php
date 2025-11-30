<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['sometimes', 'uuid'],
			'sku' => ['sometimes', 'string'],
			'gtin' => ['sometimes', 'string'],
			'brand_name' => ['sometimes', 'string'],
			'generic_name' => ['sometimes', 'string'],
			'manufacturer' => ['sometimes', 'string'],
			'model_code' => ['sometimes', 'string'],
			'strength' => ['sometimes', 'string'],
			'form' => ['sometimes', 'string'],
			'pack_size' => ['sometimes', 'string'],
			'unit' => ['sometimes', 'string'],
			'is_prescription' => ['sometimes', 'boolean'],
			'controlled_drug' => ['sometimes', 'boolean'],
			'schedule' => ['sometimes', 'string'],
			'storage_temp' => ['sometimes', 'string'],
			'expiry_months' => ['sometimes', 'integer'],
			'base_price' => ['sometimes'],
			'categories' => ['sometimes', 'json'],
			'tags' => ['sometimes', 'json'],
			'search_vector' => ['sometimes', 'string'],
			'attributes' => ['sometimes', 'json'],
			'images' => ['sometimes', 'image', 'json'],
			'metadata' => ['sometimes', 'json'],
			'active' => ['sometimes', 'boolean'],
			'deleted_at' => ['sometimes', 'date'],
        ];
    }
}
