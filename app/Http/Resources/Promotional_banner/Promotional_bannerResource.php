<?php

namespace App\Http\Resources\Promotional_banner;

use Illuminate\Http\Resources\Json\JsonResource;

class Promotional_bannerResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
			'title' => $this->title,
			'image_path' => $this->link_url ? asset($this->link_url) : null,
			// 'position' => $this->position,
			'sort_order' => $this->sort_order,
			// 'start_date' => dateTimeFormat($this->start_date),
			// 'end_date' => dateTimeFormat($this->end_date),
			'active' => $this->active,
			// 'company_no' => $this->company_no,
			// 'entered_by' => $this->entered_by,
			// 'entry_timestamp' => dateTimeFormat($this->entry_timestamp),
			// 'updated_by' => $this->updated_by,
			// 'update_timestamp' => dateTimeFormat($this->update_timestamp),
            // 'created_at' => dateTimeFormat($this->created_at),
            // 'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
