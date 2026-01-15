<?php

namespace App\Http\Requests\AppInfo;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppInfoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'platform' => ['string'],
			'current_version' => ['string'],
			'minimum_version' => ['string'],
			'maintenance_mode' => ['boolean'],
			'maintenance_message' => ['nullable', 'string'],
			'force_update' => ['boolean'],
			'active' => ['boolean'],
        ];
    }
}
