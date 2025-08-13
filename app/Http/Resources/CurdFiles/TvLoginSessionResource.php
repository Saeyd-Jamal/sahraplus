<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TvLoginSessionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'session_id' => $this->session_id,
            'user_id' => $this->user_id,
            'confirmed_at' => $this->confirmed_at,
            'expires_at' => $this->expires_at,
        ];
    }
}
