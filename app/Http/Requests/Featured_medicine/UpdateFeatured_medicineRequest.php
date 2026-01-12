<?php

namespace App\Http\Requests\Featured_medicine;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatured_medicineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['sometimes'],
			'user_id' => ['sometimes'],
			'medicine_id' => ['sometimes'],
			'sort_order' => ['sometimes', 'integer'],
			'active' => ['sometimes', 'boolean'],
			'created_at' => ['sometimes', 'date'],
			'updated_at' => ['sometimes', 'date'],
        ];
    }
}
