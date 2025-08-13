<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeasonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'tmdb_id' => $this->tmdb_id,
            'season_index' => $this->season_index,
            'name' => $this->name,
            'poster_url' => $this->poster_url,
            'entertainment_id' => $this->entertainment_id,
            'trailer_url_type' => $this->trailer_url_type,
            'trailer_url' => $this->trailer_url,
            'access' => $this->access,
            'status' => $this->status,
            'plan_id' => $this->plan_id,
            'short_desc' => $this->short_desc,
            'description' => $this->description,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
            'poster_tv_url' => $this->poster_tv_url,
        ];
    }
}
