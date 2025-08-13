<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProviderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'provider' => $this->provider,
            'provider_id' => $this->provider_id,
            'avatar' => $this->avatar,
        ];
    }
}
