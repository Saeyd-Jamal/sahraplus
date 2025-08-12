<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CastCrewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'file_url' => 'string|max:191',
            'type' => 'string|max:191',
            'tmdb_id' => 'string|max:191',
            'bio' => 'string',
            'place_of_birth' => 'string|max:191',
            'dob' => 'date',
            'designation' => 'string|max:191',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
