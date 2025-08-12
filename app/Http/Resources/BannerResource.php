<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'file_url' => $this->file_url,
            'poster_url' => $this->poster_url,
            'type' => $this->type,
            'type_id' => $this->type_id,
            'type_name' => $this->type_name,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
            'banner_for' => $this->banner_for,
            'poster_tv_url' => $this->poster_tv_url,
        ];
    }
}
