<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContinueWatchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'entertainment_id' => $this->entertainment_id,
            'user_id' => $this->user_id,
            'profile_id' => $this->profile_id,
            'entertainment_type' => $this->entertainment_type,
            'watched_time' => $this->watched_time,
            'total_watched_time' => $this->total_watched_time,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
            'episode_id' => $this->episode_id,
        ];
    }
}
