<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'file_url' => $this->file_url,
            'image_url' => $this->image_url,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }
}
