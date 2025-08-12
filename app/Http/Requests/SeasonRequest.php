<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tmdb_id' => 'string|max:191',
            'season_index' => 'string|max:191',
            'name' => 'string|max:191',
            'poster_url' => 'string',
            'entertainment_id' => 'integer',
            'trailer_url_type' => 'string|max:191',
            'trailer_url' => 'string',
            'access' => 'string|max:191',
            'status' => 'integer',
            'plan_id' => 'integer',
            'short_desc' => 'string',
            'description' => 'string',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
            'poster_tv_url' => 'string',
        ];
    }
}
