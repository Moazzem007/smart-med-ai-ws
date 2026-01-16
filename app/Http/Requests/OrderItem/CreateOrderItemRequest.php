<?php

namespace App\Http\Requests\OrderItem;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order_id' => ['required'],
			'product_id' => ['required'],
			'product_type' => ['required', 'string'],
			'product_name' => ['required', 'string'],
			'unit_price' => ['required'],
			'quantity' => ['required', 'integer'],
			'line_total' => ['required'],
        ];
    }
}
