<?php

namespace App\Http\Resources\OrderItem;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
			'product_id' => $this->product_id,
			'product_type' => $this->product_type,
			'product_name' => $this->product_name,
			'unit_price' => $this->unit_price,
			'quantity' => $this->quantity,
			'line_total' => $this->line_total,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
