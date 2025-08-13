<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeStreamContentMappingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'episode_id' => $this->episode_id,
            'quality' => $this->quality,
            'type' => $this->type,
            'url' => $this->url,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
