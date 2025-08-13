<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubtitleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'language_name' => $this->language_name,
            'url' => $this->url,
            'subtitable_type' => $this->subtitable_type,
            'subtitable_id' => $this->subtitable_id,
            'default' => $this->default,
        ];
    }
}
