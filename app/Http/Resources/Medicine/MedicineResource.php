<?php

namespace App\Http\Resources\Medicine;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            // 'id' => $this->id,
			// 'sku' => $this->sku,
			// 'gtin' => $this->gtin,
			'brand_name' => $this->brand_name,
			'generic_name' => $this->generic_name,
			'manufacturer' => $this->manufacturer,
			// 'model_code' => $this->model_code,
			'strength' => $this->strength,
			// 'form' => $this->form,
			'pack_size' => $this->pack_size,
			'unit' => $this->unit,
			// 'is_prescription' => $this->is_prescription,
			// 'controlled_drug' => $this->controlled_drug,
			// 'schedule' => $this->schedule,
			// 'storage_temp' => $this->storage_temp,
			// 'expiry_months' => $this->expiry_months,
			'base_price' => $this->base_price ?? '',
			'categories' => $this->categories,
			// 'tags' => $this->tags,
			// 'search_vector' => $this->search_vector,
			// 'attributes' => $this->attributes,
			'images' => $this->images,
			// 'metadata' => $this->metadata,
			// 'active' => $this->active,
			// 'deleted_at' => dateTimeFormat($this->deleted_at),
            // 'created_at' => dateTimeFormat($this->created_at),
            // 'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
