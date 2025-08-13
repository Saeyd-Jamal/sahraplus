<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntertainmentDownloadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'entertainment_id' => $this->entertainment_id,
            'user_id' => $this->user_id,
            'entertainment_type' => $this->entertainment_type,
            'is_download' => $this->is_download,
            'type' => $this->type,
            'quality' => $this->quality,
            'device_id' => $this->device_id,
            'url' => $this->url,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
