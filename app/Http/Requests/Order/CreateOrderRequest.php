<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'subtotal' => ['required'],
			'discount' => ['required'],
			'tax' => ['required'],
			'grand_total' => ['required'],
			'payment_status' => ['required', 'string'],
			'order_items' => ['required', 'array'],
			'order_items.*.product_id' => ['required', 'integer'],
			'order_items.*.product_type' => ['required', 'string'],
			'order_items.*.product_name' => ['required', 'string'],
			'order_items.*.unit_price' => ['required', 'numeric'],
			'order_items.*.quantity' => ['required', 'integer'],
			'order_items.*.line_total' => ['required', 'numeric'],
        ];
    }
}
