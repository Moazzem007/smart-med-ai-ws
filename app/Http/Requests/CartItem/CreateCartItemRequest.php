<?php

namespace App\Http\Requests\CartItem;

use Illuminate\Foundation\Http\FormRequest;

class CreateCartItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cart_id' => ['required'],
			'product_id' => ['required'],
			'product_type' => ['required', 'string'],
			'product_name' => ['required', 'string'],
			'unit_price' => ['required'],
			'quantity' => ['required', 'integer'],
			'line_total' => ['required'],
        ];
    }
}
