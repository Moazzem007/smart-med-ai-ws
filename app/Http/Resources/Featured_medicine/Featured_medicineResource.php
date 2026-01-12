<?php

namespace App\Http\Resources\Featured_medicine;

use Illuminate\Http\Resources\Json\JsonResource;

class Featured_medicineResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
			'medicine_id' => $this->medicine_id,
			'sort_order' => $this->sort_order,
			'active' => $this->active,
        ];
    }
}
