<?php

namespace App\Http\Requests\BloodBank;

use Illuminate\Foundation\Http\FormRequest;

class CreateBloodBankRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'external_id' => ['required', 'integer'],
			'uuid' => ['required', 'string'],
			'name' => ['required', 'string'],
			'name_bn' => ['required', 'string'],
			'code' => ['required', 'string'],
			'slug' => ['required', 'string'],
			'facility_type' => ['required', 'string'],
			'is_private' => ['required', 'boolean'],
			'division' => ['required', 'string'],
			'district' => ['required', 'string'],
			'city_corporation' => ['required', 'string'],
			'upazila' => ['required', 'string'],
			'mobile_1' => ['required', 'string'],
			'mobile_2' => ['required', 'string'],
			'email' => ['required', 'email', 'string'],
			'address' => ['required', 'string'],
			'latitude' => ['required', 'numeric'],
			'longitude' => ['required', 'numeric'],
			'completeness_percentage' => ['required', 'integer'],
			'is_active' => ['required', 'boolean'],
        ];
    }
}
