<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes'],
			'order_no' => ['sometimes', 'string'],
			'status' => ['sometimes', 'string'],
			'subtotal' => ['sometimes'],
			'discount' => ['sometimes'],
			'tax' => ['sometimes'],
			'grand_total' => ['sometimes'],
			'payment_status' => ['sometimes', 'string'],
        ];
    }
}
