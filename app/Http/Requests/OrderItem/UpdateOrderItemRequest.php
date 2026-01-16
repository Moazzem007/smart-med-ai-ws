<?php

namespace App\Http\Requests\OrderItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order_id' => ['sometimes'],
			'product_id' => ['sometimes'],
			'product_type' => ['sometimes', 'string'],
			'product_name' => ['sometimes', 'string'],
			'unit_price' => ['sometimes'],
			'quantity' => ['sometimes', 'integer'],
			'line_total' => ['sometimes'],
        ];
    }
}
