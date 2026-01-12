<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes'],
			'status' => ['sometimes', 'string'],
			'subtotal' => ['sometimes'],
			'discount' => ['sometimes'],
			'tax' => ['sometimes'],
			'grand_total' => ['sometimes'],
        ];
    }
}
