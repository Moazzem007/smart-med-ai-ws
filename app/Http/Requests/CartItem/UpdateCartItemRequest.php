<?php

namespace App\Http\Requests\CartItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cart_id' => ['sometimes'],
			'product_id' => ['sometimes'],
			'product_type' => ['sometimes', 'string'],
			'product_name' => ['sometimes', 'string'],
			'unit_price' => ['sometimes'],
			'quantity' => ['sometimes', 'integer'],
			'line_total' => ['sometimes'],
        ];
    }
}
