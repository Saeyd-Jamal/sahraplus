<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'about_self' => $this->about_self,
            'expert' => $this->expert,
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'twitter_link' => $this->twitter_link,
            'dribbble_link' => $this->dribbble_link,
            'user_id' => $this->user_id,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
