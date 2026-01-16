<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\OrderItem\OrderItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
			'order_no' => $this->order_no,
			'status' => $this->status,
			'subtotal' => $this->subtotal,
			'discount' => $this->discount,
			'tax' => $this->tax,
			'grand_total' => $this->grand_total,
			'payment_status' => $this->payment_status,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
            'order_items' => OrderItemResource::collection($this->orderItems),
        ];
    }
}
