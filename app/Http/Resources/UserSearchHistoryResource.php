<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSearchHistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'profile_id' => $this->profile_id,
            'search_query' => $this->search_query,
            'search_id' => $this->search_id,
            'type' => $this->type,
        ];
    }
}
