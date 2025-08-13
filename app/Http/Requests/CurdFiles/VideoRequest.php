<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'trailer_url_type' => 'string|max:191',
            'trailer_url' => 'string',
            'access' => 'string|max:191',
            'type' => 'string|max:191',
            'plan_id' => 'integer',
            'IMDb_rating' => 'integer',
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
            'deleted_at' => 'date',
            'poster_tv_url' => 'string',
        ];
    }
}
