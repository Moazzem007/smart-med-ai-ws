<?php

namespace App\Http\Requests\Promotional_banner;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotional_bannerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'title' => ['sometimes', 'string'],
			'image_path' => ['sometimes', 'image'],
			'link_url' => ['sometimes', 'string'],
			'position' => ['sometimes', 'string'],
			'sort_order' => ['sometimes', 'integer'],
			'start_date' => ['sometimes', 'date'],
			'end_date' => ['sometimes', 'date'],
			'active' => ['sometimes', 'boolean'],
			'company_no' => ['sometimes', 'integer'],
			'entered_by' => ['sometimes', 'integer'],
			'entry_timestamp' => ['sometimes', 'date'],
			'updated_by' => ['sometimes', 'integer'],
			'update_timestamp' => ['sometimes', 'date'],
        ];
    }
}
