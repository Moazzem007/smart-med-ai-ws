<?php

namespace App\Http\Requests\BloodBank;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBloodBankRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'external_id' => ['sometimes', 'integer'],
			'uuid' => ['sometimes', 'string'],
			'name' => ['sometimes', 'string'],
			'name_bn' => ['sometimes', 'string'],
			'code' => ['sometimes', 'string'],
			'slug' => ['sometimes', 'string'],
			'facility_type' => ['sometimes', 'string'],
			'is_private' => ['sometimes', 'boolean'],
			'division' => ['sometimes', 'string'],
			'district' => ['sometimes', 'string'],
			'city_corporation' => ['sometimes', 'string'],
			'upazila' => ['sometimes', 'string'],
			'mobile_1' => ['sometimes', 'string'],
			'mobile_2' => ['sometimes', 'string'],
			'email' => ['sometimes', 'email', 'string'],
			'address' => ['sometimes', 'string'],
			'latitude' => ['sometimes', 'numeric'],
			'longitude' => ['sometimes', 'numeric'],
			'completeness_percentage' => ['sometimes', 'integer'],
			'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
