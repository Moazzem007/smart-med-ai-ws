<?php

namespace App\Http\Requests\Promotional_banner;

use Illuminate\Foundation\Http\FormRequest;

class CreatePromotional_bannerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'title' => ['required', 'string'],
			'image_path' => ['required', 'image'],
			'link_url' => ['nullable', 'string'],
			'position' => ['nullable', 'string'],
			'sort_order' => ['required', 'integer'],
			'start_date' => ['nullable', 'date'],
			'end_date' => ['nullable', 'date'],
			'active' => ['required', 'boolean'],
			// 'company_no' => ['required', 'integer'],
			// 'entered_by' => ['nullable', 'integer'],
			// 'entry_timestamp' => ['required', 'date'],
			// 'updated_by' => ['nullable', 'integer'],
			// 'update_timestamp' => ['nullable', 'date'],
        ];
    }
}
