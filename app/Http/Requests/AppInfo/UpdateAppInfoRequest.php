<?php

namespace App\Http\Requests\AppInfo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppInfoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'platform' => ['sometimes', 'string'],
			'current_version' => ['sometimes', 'string'],
			'minimum_version' => ['sometimes', 'string'],
			'maintenance_mode' => ['sometimes', 'boolean'],
			'maintenance_message' => ['sometimes', 'string'],
			'force_update' => ['sometimes', 'boolean'],
			'active' => ['sometimes', 'boolean'],
        ];
    }
}
