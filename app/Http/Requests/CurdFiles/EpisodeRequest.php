<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'poster_url' => 'string',
            'entertainment_id' => 'integer',
            'season_id' => 'integer',
            'trailer_url_type' => 'string|max:191',
            'trailer_url' => 'string',
            'access' => 'string|max:191',
            'plan_id' => 'integer',
            'IMDb_rating' => 'string|max:191',
            'content_rating' => 'string',
            'duration' => 'string|max:191',
            'release_date' => 'date',
            'is_restricted' => 'integer',
            'short_desc' => 'string',
            'description' => 'string',
            'enable_quality' => 'integer',
            'video_upload_type' => 'string|max:191',
            'video_url_input' => 'string',
            'download_status' => 'integer',
            'download_type' => 'string|max:191',
            'download_url' => 'string',
            'enable_download_quality' => 'integer',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'video_quality_url' => 'string',
            'tmdb_id' => 'string|max:191',
            'tmdb_season' => 'string|max:191',
            'episode_number' => 'string|max:191',
            'deleted_at' => 'date',
            'poster_tv_url' => 'string',
        ];
    }
}
