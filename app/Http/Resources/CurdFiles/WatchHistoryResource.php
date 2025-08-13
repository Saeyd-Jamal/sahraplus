<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WatchHistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'profile_id' => $this->profile_id,
            'watchable_type' => $this->watchable_type,
            'watchable_id' => $this->watchable_id,
            'duration_watched' => $this->duration_watched,
        ];
    }
}
