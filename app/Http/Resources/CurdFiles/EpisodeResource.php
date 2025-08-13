<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'poster_url' => $this->poster_url,
            'entertainment_id' => $this->entertainment_id,
            'season_id' => $this->season_id,
            'trailer_url_type' => $this->trailer_url_type,
            'trailer_url' => $this->trailer_url,
            'access' => $this->access,
            'plan_id' => $this->plan_id,
            'IMDb_rating' => $this->IMDb_rating,
            'content_rating' => $this->content_rating,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'is_restricted' => $this->is_restricted,
            'short_desc' => $this->short_desc,
            'description' => $this->description,
            'enable_quality' => $this->enable_quality,
            'video_upload_type' => $this->video_upload_type,
            'video_url_input' => $this->video_url_input,
            'download_status' => $this->download_status,
            'download_type' => $this->download_type,
            'download_url' => $this->download_url,
            'enable_download_quality' => $this->enable_download_quality,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'video_quality_url' => $this->video_quality_url,
            'tmdb_id' => $this->tmdb_id,
            'tmdb_season' => $this->tmdb_season,
            'episode_number' => $this->episode_number,
            'deleted_at' => $this->deleted_at,
            'poster_tv_url' => $this->poster_tv_url,
        ];
    }
}
