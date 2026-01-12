<?php

namespace App\Http\Resources\AppInfo;

use Illuminate\Http\Resources\Json\JsonResource;

class AppInfoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'platform' => $this->platform,
			'current_version' => $this->current_version,
			'minimum_version' => $this->minimum_version,
			'maintenance_mode' => $this->maintenance_mode,
			'maintenance_message' => $this->maintenance_message,
			'force_update' => $this->force_update,
			'active' => $this->active,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
