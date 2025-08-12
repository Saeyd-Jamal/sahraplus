<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LiveTvStreamContentMappingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'tv_channel_id' => $this->tv_channel_id,
            'type' => $this->type,
            'stream_type' => $this->stream_type,
            'embedded' => $this->embedded,
            'server_url' => $this->server_url,
            'server_url1' => $this->server_url1,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
