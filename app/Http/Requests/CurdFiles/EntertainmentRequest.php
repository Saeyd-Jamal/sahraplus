<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntertainmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'tmdb_id' => 'string|max:191',
            'thumbnail_url' => 'string',
            'entlogo' => 'string',
            'numberedimage' => 'string',
            'poster_url' => 'string',
            'description' => 'string',
            'trailer_url_type' => 'string|max:191',
            'type' => 'string|max:191',
            'trailer_url' => 'string',
            'movie_access' => 'string|max:191',
            'plan_id' => 'integer',
            'language' => 'string|max:191',
            'IMDb_rating' => 'string|max:191',
            'content_rating' => 'string',
            'duration' => 'string|max:191',
            'release_date' => 'date',
            'is_restricted' => 'integer',
            'video_upload_type' => 'string|max:191',
            'video_url_input' => 'string',
            'video_quality_url' => 'string',
            'enable_quality' => 'integer',
            'download_status' => 'integer',
            'download_type' => 'string|max:191',
            'download_url' => 'string',
            'enable_download_quality' => 'integer',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
            'poster_tv_url' => 'string',
        ];
    }
}
