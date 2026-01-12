<?php

namespace App\Http\Requests\Featured_medicine;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeatured_medicineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'medicine_id' => ['required'],
			'sort_order' => ['required', 'integer'],
			'active' => ['required', 'boolean'],
        ];
    }
}
