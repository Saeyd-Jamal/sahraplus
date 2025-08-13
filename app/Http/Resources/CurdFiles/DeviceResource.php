<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'device_id' => $this->device_id,
            'device_name' => $this->device_name,
            'active_profile' => $this->active_profile,
            'platform' => $this->platform,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
