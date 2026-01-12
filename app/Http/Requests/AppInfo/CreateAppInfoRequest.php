<?php

namespace App\Http\Requests\AppInfo;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppInfoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'platform' => ['required', 'string'],
			'current_version' => ['required', 'string'],
			'minimum_version' => ['required', 'string'],
			'maintenance_mode' => ['required', 'boolean'],
			'maintenance_message' => ['nullable', 'string'],
			'force_update' => ['required', 'boolean'],
			'active' => ['required', 'boolean'],
        ];
    }
}
