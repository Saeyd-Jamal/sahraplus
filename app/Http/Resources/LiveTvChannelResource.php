<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LiveTvChannelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'poster_url' => $this->poster_url,
            'category_id' => $this->category_id,
            'thumb_url' => $this->thumb_url,
            'access' => $this->access,
            'plan_id' => $this->plan_id,
            'description' => $this->description,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
            'poster_tv_url' => $this->poster_tv_url,
        ];
    }
}
